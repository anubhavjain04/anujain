define(function (require) {    
	var ko               = require('knockout');
	var $                = require('jquery');
	var ajaxutil		 = require('ajaxutil');

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
		self.facetViewModel = function(root) {
			var vm = this;
			vm.root = root;
			
			vm.sex = ko.observable(0);
			vm.memberCode = ko.observable();
			vm.ageList = [];
			vm.heightList = [];
			vm.maritalStatusList = [new self.SelectObject('1','Unmarried'), new self.SelectObject('2','Widow / Widower'), new self.SelectObject('3','Divorced'), new self.SelectObject('4','Separated')];
			vm.sectList = ko.observableArray();
			vm.subSectList = ko.observableArray();
			vm.casteList = ko.observableArray();
			vm.motherTongueList = ko.observableArray();
			vm.courseGroupList = ko.observableArray();
			vm.countryList = ko.observableArray();
			vm.stateList = ko.observableArray();
			vm.occupationGroupList = ko.observableArray();
			vm.annualIncomeList = [];
			vm.registeredByList = [new self.SelectObject(1, 'Myself'), new self.SelectObject(2, 'Parents'), new self.SelectObject(3, 'Sibling (Brother/Sister)'), new self.SelectObject(4, 'Relative'), new self.SelectObject(5, 'Other')];
			vm.physicalStatusList = [new self.SelectObject(0, 'Normal'), new self.SelectObject(1, 'Physically Challenged')];
			vm.employedInList = [new self.SelectObject('1','Government'),new self.SelectObject('2','Defence'),new self.SelectObject('3','Private'),new self.SelectObject('4','Business'),new self.SelectObject('5','Self Employed'),new self.SelectObject('6','Not Working')];
			vm.manglikList =  [new self.SelectObject(0, 'None'), new self.SelectObject(1, 'Aanshik Manglik'), new self.SelectObject(2, 'Manglik')];
			vm.bodyTypeList =  [new self.SelectObject(1, 'Slim'), new self.SelectObject(2, 'Athletic'), new self.SelectObject(3, 'Average'), new self.SelectObject(4, 'Heavy')];
			vm.complexionList =  [new self.SelectObject(1, 'Very Fair'), new self.SelectObject(2, 'Fair'), new self.SelectObject(3, 'Wheatish'), new self.SelectObject(4, 'Wheatish Brown'), new self.SelectObject(5, 'Dark')];
			vm.registeredByList = [new self.SelectObject(1, 'Myself'), new self.SelectObject(2, 'Parents'), new self.SelectObject(3, 'Sibling'), new self.SelectObject(4, 'Relative'), new self.SelectObject(5, 'Other')];
			
			
			
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
			vm.getObjectText = function(list, key){				
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
							vm.sectList(data.sectList);
						}
						if(data.casteList){
							vm.casteList(data.casteList);
						}
						if(data.motherTongueList){
							vm.motherTongueList(data.motherTongueList);
						}
						if(data.courseGroupList){
							vm.courseGroupList(data.courseGroupList);
						}
						if(data.countryList){
							vm.countryList(data.countryList);
						}
						if(data.stateList){
							vm.stateList(data.stateList);
						}
						if(data.occupationGroupList){
							vm.occupationGroupList(data.occupationGroupList);
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
			// fill sub sect after sect change
			vm.afterSectChange = function(selectedSect){
				vm.subSectList.removeAll();
				if(selectedSect){
					ko.utils.arrayForEach(selectedSect, function(sect){
						if(sect){
							ajaxutil.find("matrimonySubSect/getSubSects", {'sectId': sect}, function(data){
								if(data && data instanceof Array){
									console.log(data);
									vm.subSectList.push.apply(vm.subSectList, data);
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
				vm.fillAgeList();
				vm.fillHeightList();
				vm.fillAnnualIncomeList();
				vm.fillDataList();
			};
		};
	};
});