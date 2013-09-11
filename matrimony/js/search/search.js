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
			
			vm.maritalStatusList = ko.observableArray();
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
			
			vm.annualIncomeList = ko.observableArray();
			vm.selectedAnnualIncome = ko.observable();
			
			vm.physicalStatusList = ko.observableArray([new self.SelectObject(0, 'Normal'), new self.SelectObject(1, 'Physically Challenged')]);
			vm.selectedPhysicalStatus = ko.observableArray();
			
			vm.employedInList = ko.observableArray();
			vm.selectedEmployedIn = ko.observableArray();
			
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
					var matchObject = ko.utils.arrayFirst(vm.annualIncomeList(), function(item) {
						return (item.from == from && item.to == to);
					});
					return matchObject;
				}
			};
			
			vm.fillMaritalStatusList = function(){
				vm.maritalStatusList.push(new self.SelectObject('','Any'));
				vm.maritalStatusList.push(new self.SelectObject('1','Unmarried'));
				vm.maritalStatusList.push(new self.SelectObject('2','Widow / Widower'));
				vm.maritalStatusList.push(new self.SelectObject('3','Divorced'));
				vm.maritalStatusList.push(new self.SelectObject('4','Separated'));		
			};
			
			vm.fillDataList = function(){
				ajaxutil.findAll("search/dataList", function(data){
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
				vm.annualIncomeList.push(new self.AnnualIncome('Less than Rs.1 lakh',0, 100000));
				vm.annualIncomeList.push(new self.AnnualIncome('Rs.1 lakh to Rs.3 lakh',100000, 300000));
				vm.annualIncomeList.push(new self.AnnualIncome('Rs.3 lakh to Rs.5 lakh',300000, 500000));
				vm.annualIncomeList.push(new self.AnnualIncome('Rs.5 lakh to Rs.7 lakh',500000, 700000));
				vm.annualIncomeList.push(new self.AnnualIncome('Rs.7 lakh to Rs.10 lakh',700000, 1000000));
				vm.annualIncomeList.push(new self.AnnualIncome('Rs.10 lakh to Rs.15 lakh',1000000, 1500000));
				vm.annualIncomeList.push(new self.AnnualIncome('Rs.15 lakh to Rs.20 lakh',1500000, 2000000));
				vm.annualIncomeList.push(new self.AnnualIncome('Rs.20 lakh to Rs.30 lakh',2000000, 3000000));
				vm.annualIncomeList.push(new self.AnnualIncome('Rs.30 lakh to Rs.50 lakh',3000000, 5000000));
				vm.annualIncomeList.push(new self.AnnualIncome('Rs.50 lakh to Rs.1 crore',5000000, 10000000));
				vm.annualIncomeList.push(new self.AnnualIncome('Rs.1 crore & above',10000000, 9999999999));
			};
			
			vm.fillEmployedInList = function(){
				vm.employedInList.push(new self.SelectObject('1','Government'));
				vm.employedInList.push(new self.SelectObject('2','Defence'));
				vm.employedInList.push(new self.SelectObject('3','Private'));
				vm.employedInList.push(new self.SelectObject('4','Business'));
				vm.employedInList.push(new self.SelectObject('5','Self Employed'));
				vm.employedInList.push(new self.SelectObject('6','Not Working'));
			};
			
			// fill sub sect after sect change
			vm.afterSectChange = function(){
				var selectedSect = vm.selectedSect();
				vm.subSectList.removeAll();
				if(selectedSect){
					ko.utils.arrayForEach(selectedSect, function(sect){
						if(sect){
							ajaxutil.post("matrimonySubSect/getSubSects", {'sectId': sect}, function(data){
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
			vm.incrementPrgressBar = function(value){
				vm.progress = vm.progress+value;
				$("#pageLoader").find(".progress-bar").css("width",vm.progress+"%");
			};
			// init here
			vm.init = function(){
				if(!vm.isInitComplete){
					$("#pageLoader").addClass('block-layer').show();
					vm.progress = 0;
					vm.isInitComplete = true;
					vm.fillHeightList();
					vm.fillMaritalStatusList();
					vm.fillAnnualIncomeList();
					vm.fillEmployedInList();
					vm.fillAgeList();
					vm.incrementPrgressBar(50);
					
					vm.fillDataList();
					vm.incrementPrgressBar(50);
					$("#pageLoader").removeClass('block-layer').hide();
				}
			};
			vm.init();
			vm.searchResultsVM = new vm.searchResults.searchResultsViewModel(vm);			
		};
	};
});