define(function (require) {
    
	var ko               = require('knockout');
	var $                = require('jquery');
	var ajaxutil		 = require('ajaxutil');

	return function(){ 
		var self = this;
		self.Page = function(pageNo, selected){
			this.pageNo = pageNo;
			this.selected = selected;
		};
		self.searchResultsViewModel = function(searchVM) {
			var vm = this;
			vm.searchVM = searchVM;			
			vm.totalItems = ko.observable(0);
			vm.start = ko.observable(0);
			vm.end = ko.observable(0);
			vm.count = ko.observable(0);			
			vm.pageSize = ko.observable(10);
			vm.pageCount = ko.observable();
			vm.currentPage = ko.observable();
			vm.dataList = ko.observableArray();
			vm.specs = ko.observable();
			
			vm.disablePrevious = ko.observable(true);
			vm.disableNext = ko.observable(false);
			vm.pageLinkDisplaySize = 10;
			vm.pageList = ko.observableArray();
			
			vm.clearData = function(){
				vm.totalItems(0);
				vm.start(0);
				vm.end(0);
				vm.count(0);
				vm.pageCount(0);
				vm.dataList.removeAll();
				vm.pageList.removeAll();
			};
			vm.resetModel = function(){
				vm.clearData();
				vm.currentPage('undefined');
				vm.specs('undefined');
			};
			
			vm.getSearchResults = function(){
				var dataObject = {
					Search: ko.toJSON(vm.specs()), 
					pageSize: vm.pageSize()	
				};
				if(vm.currentPage()){
					dataObject.page = vm.currentPage();
				}
				ajaxutil.post("search/results", dataObject, function(data){
					if(data){
						vm.searchVM.mainVM.showPage('search-results-page');
						vm.totalItems(data.total);
						vm.start(data.start);
						vm.end(data.end);
						vm.count(data.count);
						vm.currentPage(data.currentPage);
						vm.pageSize(data.pageSize);
						vm.pageCount(data.pageCount);
						vm.dataList(data.dataList);
						vm.setPageList();
					}else{
						vm.clearData();
						alert("error found in getting results.");
					}

				},function(error){
					vm.clearData();
					alert("error found in getting results.");
					console.log(error);
				});
			};
			
			vm.reflectChanges = ko.computed(function(){
				if(!vm.currentPage() || vm.currentPage()==1){
					vm.disablePrevious(true);
				}else{
					vm.disablePrevious(false);
				}
				if(vm.currentPage() && vm.currentPage()==vm.pageCount()){
					vm.disableNext(true);
				}else{
					vm.disableNext(false);
				}
			}, vm);
			
			vm.goToPage = function(pageNo){
				vm.currentPage(pageNo);
				vm.getSearchResults();
			};
			vm.previousPage = function(){
				if(!vm.disablePrevious()){
					if(vm.currentPage() && vm.currentPage()>1){
						vm.currentPage(vm.currentPage()-1);
					}
					vm.getSearchResults();
				}
			};
			vm.nextPage = function(){
				if(!vm.disableNext()){
					if(vm.currentPage() && vm.currentPage()<vm.pageCount()){
						vm.currentPage(vm.currentPage()+1);
					}
					vm.getSearchResults();
				}
			};
			
			vm.setPageList = function(){
				vm.pageList.removeAll();
				var start = 1;
				var end = start + vm.pageLinkDisplaySize;
				if(vm.pageCount()<vm.pageLinkDisplaySize){
					end = start + vm.pageCount(); 
				}else{
					if((vm.currentPage()-(vm.pageLinkDisplaySize/2))>0){
						start = parseInt(vm.currentPage()-(vm.pageLinkDisplaySize/2))+1; 
					}
					if((vm.pageCount()-start)<vm.pageLinkDisplaySize){
						start = vm.pageCount()-vm.pageLinkDisplaySize+1;
					}
					end = start + vm.pageLinkDisplaySize; 
				}
				for(var i=start; i<end; i++){
					var isSelected = false;
					if(i==vm.currentPage()){
						isSelected = true;
					}
					vm.pageList.push(new self.Page(i, isSelected));	
				}
			};
			
			vm.viewMember = function(memberId){
				vm.searchVM.mainVM.route.searchMember(memberId);
			};
			
			vm.showSearchResults = function(specs){
				vm.specs(specs);
				vm.getSearchResults();
			};
		};
	};
});