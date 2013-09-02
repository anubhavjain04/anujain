define(function (require) {
    
	var ko      = require('knockout');
	var $       = require('jquery');
	var Label   = require('label');

	return function(mainVM){ 
		var self = this;
		self.mainVM = mainVM;		
		self.searchVM = self.mainVM.searchVM;
		self.label = new Label();
		
		self.searchRecords = function(specs){
			jHash.set(self.label.SEARCH_PAGE+'/results', specs);
		};
		
		self.searchMember = function(memberId){
			jHash.set(self.label.SEARCH_PAGE+'/member/'+memberId, {});
		};
		
		self.setSpecs = function(queryJSON){
			try{
				if(queryJSON.sex)
					self.searchVM.sex(parseInt(queryJSON.sex));
				if(queryJSON.agefrom)
					self.searchVM.ageFrom(parseInt(queryJSON.agefrom));
				if(queryJSON.ageto)
					self.searchVM.ageTo(parseInt(queryJSON.ageto));
				if(queryJSON.heightfrom)
					self.searchVM.heightFrom(parseFloat(queryJSON.heightfrom));
				if(queryJSON.heightto)
					self.searchVM.heightTo(parseFloat(queryJSON.heightto));
				if(queryJSON.maritalstatus){
					self.resetSelectedItems(self.searchVM.selectedMaritalStatus, queryJSON.maritalstatus);
				}
				if(queryJSON.sect){
					self.resetSelectedItems(self.searchVM.selectedSect, queryJSON.sect);
					self.searchVM.afterSectChange();
				}
				if(queryJSON.subsect){
					self.resetSelectedItems(self.searchVM.selectedSubSect, queryJSON.subsect);
				}
				if(queryJSON.caste){
					self.resetSelectedItems(self.searchVM.selectedCaste, queryJSON.caste);
				}
				if(queryJSON.mothertongue){
					self.resetSelectedItems(self.searchVM.selectedMotherTongue, queryJSON.mothertongue);
				}
				if(queryJSON.educationgroup){
					self.resetSelectedItems(self.searchVM.selectedCourseGroup, queryJSON.educationgroup);
				}
				if(queryJSON.occupationgroup){
					self.resetSelectedItems(self.searchVM.selectedOccupationGroup, queryJSON.occupationgroup);
				}
				if(queryJSON.annualincomefrom && queryJSON.annualincometo){
					self.searchVM.selectedAnnualIncome(self.searchVM.findAnnualIncome(queryJSON.annualincomefrom, queryJSON.annualincometo));
				}
				if(queryJSON.physicalstatus){
					self.resetSelectedItems(self.searchVM.selectedPhysicalStatus, queryJSON.physicalstatus);
				}
				if(queryJSON.employedin){
					self.resetSelectedItems(self.searchVM.selectedEmployedIn, queryJSON.employedin);
				}				
				if(queryJSON.country){
					self.resetSelectedItems(self.searchVM.selectedCountry, queryJSON.country);
				}
				// get results
				self.searchVM.searchResultsVM.showSearchResults(self.searchVM.generateSpecs());
			}
			catch(error){
			}
		};
		self.resetSelectedItems = function(itemObject, newItems){
			itemObject.removeAll();
			var itemArray = newItems.split(",");
			if(itemArray){
				ko.utils.arrayForEach(itemArray, function(item){
					if(item)
						itemObject.push(item);
				});
			}
		};
	};
});