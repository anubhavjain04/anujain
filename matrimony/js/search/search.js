define(function (require) {    
	var ko               = require('knockout');
	var $                = require('jquery');
	var ajaxutil		 = require('ajaxutil');
	var SearchResults	 = require('search/searchResults');		

	return function(){ 
		var self = this;
		
		self.SelectObject = function(key, text){
			this.key = key;
			this.text = text;
		};
		self.AnnualIncome = function(text, from, to){
			this.text = text;
			this.from = from;
			this.to = to;
		};
		self.searchViewModel = function(mainVM) {
			var vm = this;
			vm.mainVM = mainVM;
			
			vm.searchResults = new SearchResults();
			
			vm.activeSearchTab = ko.observable('regular');
			vm.isInitComplete = false;
			vm.progress = 0;
			
			vm.sex = ko.observable(0);
			vm.memberCode = ko.observable();
			vm.ageList = [];
			vm.ageFrom = ko.observable();
			vm.ageTo = ko.observable();	
			vm.heightFrom = ko.observable(121.92);
			vm.heightTo = ko.observable(167.64);
			vm.heightList = [];
			
			vm.maritalStatusList = [new self.SelectObject('','Any'), new self.SelectObject('1','Unmarried'), new self.SelectObject('2','Widow / Widower'), new self.SelectObject('3','Divorced'), new self.SelectObject('4','Separated')];
			vm.selectedMaritalStatus = ko.observableArray();
			
			vm.sectList = ko.observableArray();
			vm.selectedSect = ko.observableArray();
			
			vm.subSectList = ko.observableArray();
			vm.selectedSubSect = ko.observableArray();
			
			vm.casteList = ko.observableArray();
			vm.selectedCaste = ko.observableArray();
			
			vm.motherTongueList = ko.observableArray();
			vm.selectedMotherTongue = ko.observableArray();
			
			vm.courseGroupList = ko.observableArray();
			vm.selectedCourseGroup = ko.observableArray();
			
			vm.countryList = ko.observableArray();
			vm.selectedCountry = ko.observableArray();
			
			vm.occupationGroupList = ko.observableArray();
			vm.selectedOccupationGroup = ko.observableArray();
			
			vm.annualIncomeList = [];
			vm.selectedAnnualIncome = ko.observable();
			
			vm.physicalStatusList = [new self.SelectObject(0, 'Normal'), new self.SelectObject(1, 'Physically Challenged')];
			vm.selectedPhysicalStatus = ko.observableArray();
			
			vm.employedInList = [];
			vm.selectedEmployedIn = ko.observableArray();
			
			vm.manglikList =  [new self.SelectObject(0, 'None'), new self.SelectObject(1, 'Aanshik Manglik'), new self.SelectObject(2, 'Manglik')];
			vm.bodyTypeList =  [new self.SelectObject(1, 'Slim'), new self.SelectObject(2, 'Athletic'), new self.SelectObject(3, 'Average'), new self.SelectObject(4, 'Heavy')];
			vm.complexionList =  [new self.SelectObject(1, 'Very Fair'), new self.SelectObject(2, 'Fair'), new self.SelectObject(3, 'Wheatish'), new self.SelectObject(4, 'Wheatish Brown'), new self.SelectObject(5, 'Dark')];
			vm.registeredByList = [new self.SelectObject(1, 'Myself'), new self.SelectObject(2, 'Parents'), new self.SelectObject(3, 'Sibling'), new self.SelectObject(4, 'Relative'), new self.SelectObject(5, 'Other')];
			
			vm.changeAgeCriteria = ko.computed(function(){
				var ageStart = (vm.sex()==0)?18:21;
				vm.ageFrom(ageStart);
				vm.ageTo(ageStart+12);
			}, vm);
		
			vm.showSearchResults = ko.observable(false);
			
			vm.searchMember = function(){
				if(vm.memberCode()){
					vm.mainVM.route.searchMember(vm.memberCode());
				}
			};
			
			vm.generateSpecs = function(){
				var specs = {};
				specs.sex = vm.sex();
				specs.ageFrom = vm.ageFrom();
				specs.ageTo = vm.ageTo();
				specs.heightFrom = vm.heightFrom();
				specs.heightTo = vm.heightTo();
				specs.maritalStatus = vm.selectedMaritalStatus();
				specs.sect = vm.selectedSect();
				specs.subsect = vm.selectedSubSect();
				specs.caste = vm.selectedCaste();
				specs.mothertongue = vm.selectedMotherTongue();
				specs.educationGroup = vm.selectedCourseGroup();
				specs.occupationGroup = vm.selectedOccupationGroup();
				if(vm.selectedAnnualIncome()){
					specs.annualIncomeFrom = vm.selectedAnnualIncome().from;
					specs.annualIncomeTo = vm.selectedAnnualIncome().to;
				}
				specs.physicalStatus = vm.selectedPhysicalStatus();
				specs.employedIn = vm.selectedEmployedIn();
				specs.country = vm.selectedCountry();
				return specs;
			};
			
			vm.searchByCriteria = function(){
				vm.mainVM.route.searchRecords(vm.generateSpecs());
			};
			
			vm.fillAgeList = function(){
				var start = (vm.sex()==0)?18:21;
				for(var i=start; i<=70; i++){
					vm.ageList.push(i);
				}	
			};
			vm.fillHeightList = function(){
				var initialValue = 119.38;
				for(var i=4; i<8; i++){					
					for(var j=0; j<12; j++){
						initialValue = initialValue + 2.54;
						var key = parseFloat(initialValue).toFixed(2);
						var value = i+' feet'+((j==0)?'':' '+j+' inches');
						vm.heightList.push(new self.SelectObject(key, value));
					}
				}
			};
			vm.heightInWords = function(heightValue){
				if(heightValue){
					var matchObject = ko.utils.arrayFirst(vm.heightList, function(height) {
						return height.key === heightValue;
					});
					
					if (matchObject) {
						return matchObject.text;
					}
				}
			};
			vm.getSelectedObjectText = function(list, key){				
				if(list){
					var matchObject = ko.utils.arrayFirst(list, function(item) {
						return item.key == key;
					});
					
					if (matchObject) {
						return matchObject.text;
					}
				}
			};
			vm.findAnnualIncome = function(from, to){
				if(from && to){
					var matchObject = ko.utils.arrayFirst(vm.annualIncomeList, function(item) {
						return (item.from == from && item.to == to);
					});
					return matchObject;
				}
			};
			
			
			
			vm.fillDataList = function(){
				ajaxutil.syncFindAll("search/dataList", function(data){
					if(data){
						if(data.sectList){
							vm.subSectList.removeAll();
							ko.utils.arrayForEach(data.sectList, function(item){
								vm.sectList.push(item);
							});
						}
						if(data.casteList){
							vm.casteList.removeAll();
							ko.utils.arrayForEach(data.casteList, function(item){
								vm.casteList.push(item);
							});
						}
						if(data.motherTongueList){
							vm.motherTongueList.removeAll();
							ko.utils.arrayForEach(data.motherTongueList, function(item){
								vm.motherTongueList.push(item);
							});
						}
						if(data.courseGroupList){
							vm.courseGroupList.removeAll();
							ko.utils.arrayForEach(data.courseGroupList, function(item){
								vm.courseGroupList.push(item);
							});
						}
						if(data.countryList){
							vm.countryList.removeAll();
							ko.utils.arrayForEach(data.countryList, function(item){
								vm.countryList.push(item);
							});
						}
						if(data.occupationGroupList){
							vm.occupationGroupList.removeAll();
							ko.utils.arrayForEach(data.occupationGroupList, function(item){
								vm.occupationGroupList.push(item);
							});
						}
					}					
				},function(error){
					console.log(error);
				});
			};
			
			vm.fillAnnualIncomeList = function(){
				var dataArray = [];
				dataArray.push(new self.AnnualIncome('Less than Rs.1 lakh',0, 100000));
				dataArray.push(new self.AnnualIncome('Rs.1 lakh to Rs.3 lakh',100000, 300000));
				dataArray.push(new self.AnnualIncome('Rs.3 lakh to Rs.5 lakh',300000, 500000));
				dataArray.push(new self.AnnualIncome('Rs.5 lakh to Rs.7 lakh',500000, 700000));
				dataArray.push(new self.AnnualIncome('Rs.7 lakh to Rs.10 lakh',700000, 1000000));
				dataArray.push(new self.AnnualIncome('Rs.10 lakh to Rs.15 lakh',1000000, 1500000));
				dataArray.push(new self.AnnualIncome('Rs.15 lakh to Rs.20 lakh',1500000, 2000000));
				dataArray.push(new self.AnnualIncome('Rs.20 lakh to Rs.30 lakh',2000000, 3000000));
				dataArray.push(new self.AnnualIncome('Rs.30 lakh to Rs.50 lakh',3000000, 5000000));
				dataArray.push(new self.AnnualIncome('Rs.50 lakh to Rs.1 crore',5000000, 10000000));
				dataArray.push(new self.AnnualIncome('Rs.1 crore & above',10000000, 9999999999));
				vm.annualIncomeList = dataArray;
			};
			
			vm.fillEmployedInList = function(){
				var dataArray = [];
				dataArray.push(new self.SelectObject('1','Government'));
				dataArray.push(new self.SelectObject('2','Defence'));
				dataArray.push(new self.SelectObject('3','Private'));
				dataArray.push(new self.SelectObject('4','Business'));
				dataArray.push(new self.SelectObject('5','Self Employed'));
				dataArray.push(new self.SelectObject('6','Not Working'));
				vm.employedInList = dataArray;
			};
			
			// fill sub sect after sect change
			vm.afterSectChange = function(){
				var selectedSect = vm.selectedSect();
				vm.subSectList.removeAll();
				if(selectedSect){
					ko.utils.arrayForEach(selectedSect, function(sect){
						if(sect){
							ajaxutil.find("matrimonySubSect/getSubSects", {'sectId': sect}, function(data){
								if(data && data instanceof Array){							
									ko.utils.arrayForEach(data, function(item){
										vm.subSectList.push(item);
									});
								}
							},function(error){
								console.log(error);
							});	
						}
					});
				}
			};
			// init here
			vm.init = function(){
				if(!vm.isInitComplete){
					vm.isInitComplete = true;
					vm.fillHeightList();
					vm.fillAnnualIncomeList();
					vm.fillEmployedInList();
					vm.fillAgeList();
					vm.fillDataList();
				}
			};
			vm.init();
			vm.searchResultsVM = new vm.searchResults.searchResultsViewModel(vm);			
		};
	};
});