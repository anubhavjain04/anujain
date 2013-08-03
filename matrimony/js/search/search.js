define(function (require) {
    
	var ko               = require('knockout');
	var $                = require('jquery');
	var ajaxutil		 = require('ajaxutil');
	
	//JQueryDialog 		 = require('knockoutJqueryuiDialog'),
//	SearchDialogs 		 = require('search/searchDialogs');
	

	return function(){ 
		var self = this;
		
		self.Height = function(key, text){
			this.key 	= key;
			this.text 	= text;
		};
		self.MaritalStatus = function(key, text){
			this.key 	= key;
			this.text 	= text;
		};
		self.searchViewModel = function() {
			var vm = this;
			
			vm.sex = ko.observable(0);
			// age
			vm.ageList = [];
			vm.ageFrom = ko.observable();
			vm.ageTo = ko.observable();	
			// height
			vm.heightFrom = ko.observable(121.92);
			vm.heightTo = ko.observable(167.64);
			vm.heightList = [];		
					
			vm.changeAgeCriteria = ko.computed(function(){
				var ageStart = (vm.sex()==0)?18:21;
				vm.ageFrom(ageStart);
				vm.ageTo(ageStart+12);
			}, vm);
			
			vm.maritalStatusList = ko.observableArray();
			vm.selectedMaritalStatus = ko.observableArray(['']);
			
			vm.sectList = ko.observableArray([{'SectName':'Any', 'pkSectId': ''}]);
			vm.selectedSect = ko.observableArray(['']);
			
			vm.subSectList = ko.observableArray([{'SubSectName':'Any', 'pkSubSectId': ''}]);
			vm.selectedSubSect = ko.observableArray(['']);
			
			
			/*vm.heightInWords = function(height){
				if(isNaN(height))
					return "";
				var returnValue = '';	
				ko.utils.arrayForEach(vm.heightList, function (item) {
					if(item.key===height){
						returnValue = item.value;
					}
            	});	
				return returnValue;
			};*/
			
			
			
			
			// initialize search dialogs
			//vm.searchDialogs = new SearchDialogs(vm);
			
			
			
			
			
			
			
					
			// height		
			
			
			
			
			
			
			
			
			//vm.searchDialogViewModel = new vm.searchDialogs.searchDialogViewModel();
			
			vm.afterSectChange = function(){
				var selectedSect = vm.selectedSect();
				if(selectedSect && selectedSect.pkSectId){
					ajaxutil.findByData("matrimonySubSect/getSubSects", {'sectId': selectedSect.pkSectId}, function(data){
						if(data && data instanceof Array){
							vm.subSectList.removeAll();
							ko.utils.arrayForEach(data, function(item){
								vm.subSectList.push(item);
							});
						}
					},function(error){
						console.log(error);
					});
				}else{
					vm.subSectList([{'SubSectName':'Any', 'pkSubSectId': ''}]);
				}
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
						vm.heightList.push(new self.Height(key, value));
					}
				}
			};
			vm.fillMaritalStatusList = function(){
				vm.maritalStatusList.push(new self.MaritalStatus('','Any'));
				vm.maritalStatusList.push(new self.MaritalStatus('1','Unmarried'));
				vm.maritalStatusList.push(new self.MaritalStatus('2','Widow / Widower'));
				vm.maritalStatusList.push(new self.MaritalStatus('3','Divorced'));
				vm.maritalStatusList.push(new self.MaritalStatus('4','Separated'));		
			};
			vm.fillSectList = function(){
				ajaxutil.findAll("matrimonySect/findAll", function(data){
					if(data && data instanceof Array){
						vm.subSectList.removeAll();
						ko.utils.arrayForEach(data, function(item){
							vm.sectList.push(item);
						});
					}
				},function(error){
					console.log(error);
				});
			};
			vm.init = function(){
				vm.fillAgeList();
				vm.fillHeightList();
				vm.fillMaritalStatusList();
				vm.fillSectList();
			};
			
			vm.init();
		};
	};
});