define(function (require) {
    
	var ko               = require('knockout');
	var $                = require('jquery');

	return function(parent){ 
		var self = this;
		self.parent = parent;
		
		self.searchRecords = function(specs){
			jHash.set('searchResults', specs);
		};
		
		self.setSpecs = function(queryJSON){
			try{
				if(queryJSON.sex)
					self.parent.sex(parseInt(queryJSON.sex));
				if(queryJSON.agefrom)
					self.parent.ageFrom(parseInt(queryJSON.agefrom));
				if(queryJSON.ageto)
					self.parent.ageTo(parseInt(queryJSON.ageto));
				if(queryJSON.heightfrom)
					self.parent.heightFrom(parseFloat(queryJSON.heightfrom));
				if(queryJSON.heightto)
					self.parent.heightTo(parseFloat(queryJSON.heightto));
				if(queryJSON.maritalstatus){
					self.resetSelectedItems(self.parent.selectedMaritalStatus, queryJSON.maritalstatus);
				}
				if(queryJSON.sect){
					self.resetSelectedItems(self.parent.selectedSect, queryJSON.sect);
					self.parent.afterSectChange();
				}
				if(queryJSON.subsect){
					self.resetSelectedItems(self.parent.selectedSubSect, queryJSON.subsect);
				}
				if(queryJSON.caste){
					self.resetSelectedItems(self.parent.selectedCaste, queryJSON.caste);
				}
				if(queryJSON.mothertongue){
					self.resetSelectedItems(self.parent.selectedMotherTongue, queryJSON.mothertongue);
				}
				if(queryJSON.educationgroup){
					self.resetSelectedItems(self.parent.selectedCourseGroup, queryJSON.educationgroup);
				}
				if(queryJSON.occupationgroup){
					self.resetSelectedItems(self.parent.selectedOccupationGroup, queryJSON.occupationgroup);
				}
				if(queryJSON.annualincomefrom && queryJSON.annualincometo){
					self.parent.selectedAnnualIncome(self.parent.findAnnualIncome(queryJSON.annualincomefrom, queryJSON.annualincometo));
				}
				if(queryJSON.physicalstatus){
					self.resetSelectedItems(self.parent.selectedPhysicalStatus, queryJSON.physicalstatus);
				}
				if(queryJSON.employedin){
					self.resetSelectedItems(self.parent.selectedEmployedIn, queryJSON.employedin);
				}				
				if(queryJSON.country){
					self.resetSelectedItems(self.parent.selectedCountry, queryJSON.country);
				}
				// get results
				self.parent.searchResultsVM.showSearchResults(self.parent.generateSpecs());
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
		
		jHash.route("searchAs/{type}", function () {
			self.parent.showSearchResults(false);
			if(this.type=='matrimonyId'){
				self.parent.activeSearchTab('matrimonyId');
			}else{
				self.parent.activeSearchTab('regular');
			}
		});
		jHash.route("searchResults", function () {
			var queryJSON = jHash.val();
			self.setSpecs(queryJSON);
		});
		jHash.route("member/{memberId}", function () {
			if(this.memberId){
				
			}
			
			
		});
		
		jHash.defaultRoute("searchAs/regular");
		jHash.processRoute();
	};
});