define(function (require) {    
	var ko               = require('knockout');
	var ajaxutil		 = require('ajaxutil');
	var moment		 	 = require('moment');
	var UploadPhoto	 = require('member/uploadPhoto');
	var ChangePassword	 = require('member/changePassword');

	return function(){ 
		var self = this;
		self.memberViewModel = function() {
			var vm = this;
			vm.root = ko.observable().subscribeTo("requestRootObject", true);
			vm.publishMember = ko.observable().syncWith("loggedInMember", true);
			vm.user = ko.observable().subscribeTo("loggedInUser", true);
			
			vm.user.subscribe(function(user){
				if(user){
					vm.clear();
					vm.initializeMember();
				}else{
					vm.publishMember(undefined);
				}
			});
			
			vm.showProfileType = ko.observable('basic-details');			
			vm.showProfileType.subscribe(function(type){
				if(type && type == 'change-photo'){
					vm.uploadPhoto.clear();
				}
			});
			vm.disableButton = ko.observable(false);
			
			vm.sex = ko.observable(0);
			vm.registeredBy = ko.observable().extend({
				required: true
			});
			vm.memberName = ko.observable().extend({
				required: true
			});
			/*vm.dob = ko.observable().extend({
				required: true
			});*/
			vm.age = ko.observable();
			vm.date = ko.observable().extend({
				required: true
			});
			vm.month = ko.observable().extend({
				required: true
			});
			vm.year = ko.observable().extend({
				required: true
			});
			vm.birthHour = ko.observable();
			vm.birthMinute = ko.observable();
			vm.birthAmPm = ko.observable();
			vm.maritalStatus = ko.observable().extend({
				required: true
			});
			vm.childrens = ko.observable(0);
			vm.sect = ko.observable().extend({
				required: true
			});
			vm.subSect = ko.observable().extend({
				required: true
			});
			vm.caste = ko.observable();
			vm.otherCaste = ko.observable();
			vm.motherTongue = ko.observable().extend({
				required: true
			});
			vm.country = ko.observable();
			vm.state = ko.observable().extend({
				required: true
			});
			vm.city = ko.observable().extend({
				required: true
			});
			vm.contactNumber = ko.observable().extend({
				required: true,
                pattern: {
                     message: 'This field required a number',
                     params: /^(\d{10}(,([\s]*)?\d{10})*)?$/
                }
			});
			vm.memberCode = ko.observable();
			vm.memberPhoto = ko.observable();
			vm.emailId = ko.observable();
			vm.height = ko.observable();
			vm.weight = ko.observable();
			vm.bodyType = ko.observable();
			vm.complexion = ko.observable();
			vm.physicalStatus = ko.observable(0);
			vm.aboutMe = ko.observable();		
			vm.homeAddress = ko.observable();
			vm.workingAddress = ko.observable();
			vm.annualIncome = ko.observable();
			vm.marryInSameSect = ko.observable(2);
			vm.aboutMyPartner = ko.observable();			
			vm.gotra = ko.observable();
			vm.manglikStatus = ko.observable(0);
			vm.education = ko.observable();
			vm.employedIn = ko.observable(5);
			vm.occupation = ko.observable();
			vm.status = ko.observable();
			vm.fatherName = ko.observable();
			vm.fatherOccupation = ko.observable();
			vm.motherName = ko.observable();
			vm.motherOccupation = ko.observable();
			vm.unmarriedBrothers = ko.observable();
			vm.marriedBrothers = ko.observable();
			vm.unmarriedSisters = ko.observable();
			vm.marriedSisters = ko.observable();
			vm.aboutFamily = ko.observable();
			vm.createdDate = ko.observable();
			vm.modifiedDate = ko.observable();			
			vm.sectName = ko.observable();
			vm.subSectName = ko.observable();
			vm.countryName = ko.observable();
			vm.stateName = ko.observable();
			vm.educationName = ko.observable();
			vm.occupationName = ko.observable();
			vm.motherToungueName = ko.observable();
			vm.casteName = ko.observable();
			
			vm.message = ko.observable();
			vm.isEditMode = ko.observable(false);
			vm.originalData = ko.observable();
			
			vm.isEditMode.subscribe(function(mode){
				if(mode === false && vm.originalData()){
					vm.setMemberDetails(vm.originalData());
				}
			});
			
			
			vm.clear = function(){
				vm.sex(0);
				vm.registeredBy(undefined);
				vm.memberName(undefined);
				vm.age(undefined);
				vm.date(undefined);
				vm.month(undefined);
				vm.year(undefined);
				vm.birthHour(undefined);
				vm.birthMinute(undefined);
				vm.birthAmPm(undefined);
				vm.maritalStatus(undefined);
				vm.childrens(0);
				vm.sect(undefined);
				vm.subSect(undefined);
				vm.caste(undefined);
				vm.otherCaste(undefined);
				vm.motherTongue(undefined);
				vm.country(undefined);
				vm.state(undefined);
				vm.city(undefined);
				vm.contactNumber(undefined);
				vm.memberCode(undefined);
				vm.memberPhoto(undefined);
				vm.emailId(undefined);
				vm.height(undefined);
				vm.weight(undefined);
				vm.bodyType(undefined);
				vm.complexion(undefined);
				vm.physicalStatus(0);
				vm.aboutMe(undefined);		
				vm.homeAddress(undefined);
				vm.workingAddress(undefined);
				vm.annualIncome(undefined);
				vm.marryInSameSect(2);
				vm.aboutMyPartner(undefined);
				vm.gotra(undefined);
				vm.manglikStatus(0);
				vm.education(undefined);
				vm.employedIn(5);
				vm.occupation(undefined);
				vm.status(undefined);
				vm.fatherName(undefined);
				vm.fatherOccupation(undefined);
				vm.motherName(undefined);
				vm.motherOccupation(undefined);
				vm.unmarriedBrothers(undefined);
				vm.marriedBrothers(undefined);
				vm.unmarriedSisters(undefined);
				vm.marriedSisters(undefined);
				vm.aboutFamily(undefined);
				vm.createdDate(undefined);
				vm.modifiedDate(undefined);
				
				vm.sectName(undefined);
				vm.subSectName(undefined);
				vm.countryName(undefined);
				vm.stateName(undefined);
				vm.educationName(undefined);
				vm.occupationName(undefined);
				vm.motherToungueName(undefined);
				vm.casteName(undefined);
				
				vm.message(undefined);
				vm.isEditMode(false);
				vm.disableButton(false);
				vm.originalData(undefined);
			};
			
			vm.initializeMember = function(){
				if(vm.user()){
					var url = "matrimonyMembers/view/id/"+vm.user().id;
					ajaxutil.findOne(url, function(data){
						if(data){
							// member data
							vm.publishMember(data.member.pkMemberId);
							vm.setMemberDetails(data);				
						}
					},function(error){
						console.log(error);
					});
				}
			};
			
			vm.setMemberDetails = function(data){
				if(data){		
					vm.originalData(data);
					var member = data.member;
					var family = data.family;
					var mm = moment(member.DOB, "YYYY-MM-DD HH:mm:ss");
					var dobDate = mm.format('DD');
					var dobMonth = mm.format('MM');
					var dobYear = mm.format('YYYY');
					var dobHour = mm.format('hh');
					var dobMinute = mm.format('mm');;
					var dobAmPm = mm.format('a');					
					vm.sex(member.Sex);
					vm.registeredBy(member.RegisteredBy);
					vm.memberName(member.MemberName);
					vm.age(member.age);
					vm.date(dobDate);				
					vm.month(dobMonth);
					vm.year(dobYear);
					vm.birthHour(dobHour);
					vm.birthMinute(dobMinute);
					vm.birthAmPm(dobAmPm);
					vm.maritalStatus(member.MaritalStatus);
					vm.childrens(member.Childrens);
					vm.sect(member.fkSect);
					if(vm.sect()){
						vm.root().facetVM.afterSectChange(vm.sect(), function(){
							vm.subSect(member.fkSubSect);
						});
					}
					vm.caste(member.fkCaste);
					vm.otherCaste(member.OtherCaste);
					vm.motherTongue(member.fkMotherTongue);
					vm.country(member.fkCountryLivingIn);
					vm.state(member.fkResidingState);
					vm.city(member.ResidingCity);
					vm.contactNumber(member.ContactNo);
					vm.memberCode(member.MemberCode);
					vm.memberPhoto(member.MemberPhoto);
					vm.emailId(member.Email);
					vm.height(member.Height);
					vm.weight(member.Weight);
					vm.bodyType(member.BodyType);
					vm.complexion(member.Complexion);
					vm.physicalStatus(member.PhysicalStatus);
					vm.aboutMe(member.AboutMe);		
					vm.homeAddress(member.HomeAddress);
					vm.workingAddress(member.WorkingAddress);
					vm.annualIncome(member.IncomeAnnual);
					vm.marryInSameSect(member.MarryInSameSubSect);
					vm.aboutMyPartner(member.AboutMyPartner);
					vm.gotra(member.Gotra);
					vm.manglikStatus(member.Manglik);
					vm.education(member.fkEducation);
					vm.employedIn(member.EmployedIn);
					vm.occupation(member.Occupation);
					vm.status(member.Status);
					vm.createdDate(member.CreatedDate);
					vm.modifiedDate(member.ModifiedDate);
					
					vm.sectName(member.sectName);
					vm.subSectName(member.subSectName);
					vm.countryName(member.country);
					vm.stateName(member.state);
					vm.educationName(member.education);
					vm.occupationName(member.occupation);
					vm.motherToungueName(member.motherTongue);
					vm.casteName(member.caste);
					
					if(family){
						vm.fatherName(family.FatherName);
						vm.fatherOccupation(family.FatherOccupation);
						vm.motherName(family.MotherName);
						vm.motherOccupation(family.MotherOccupation);
						vm.unmarriedBrothers(family.UnmarriedBrothers);
						vm.marriedBrothers(family.MarriedBrothers);
						vm.unmarriedSisters(family.UnmarriedSisters);
						vm.marriedSisters(family.MarriedSisters);
						vm.aboutFamily(family.AboutFamily);
					}	
					
				}
			};
			
			vm.saveMemberDetails = function(formData){
				vm.disableButton(true);
				var path = "matrimonyMembers/updateMemberDetails/id/"+vm.user().id;
				ajaxutil.put(path, formData, function(data){
					if(data){
						var originalData = vm.originalData();
						originalData.member = data;
						alert("Data updated successfully.");
						vm.isEditMode(false);
					}
					vm.disableButton(false);
				},function(error){
					if(error && error.status === 204){
						vm.message(error.responseText);
						vm.hideMessage();							
					}else{
						alert("Error found in updating data, please try after some time.");
						console.log(error);
					}
					vm.disableButton(false);
				});
			};
			
			vm.updateBasicDetails = function(){
				if(vm.validateBasicDetails()){
					var formData = {
						registerBy 	: vm.registeredBy(),
						memberName 	: vm.memberName(),
						sex 		: vm.sex(),
						maritalStatus:vm.maritalStatus(),
						motherTongue: vm.motherTongue(),
						height		: (vm.height()===undefined)?null:vm.height(),
						weight		: (vm.weight()===undefined)?null:vm.weight(),
						bodyType	: (vm.bodyType()===undefined)?null:vm.bodyType(),
						complexion	: (vm.complexion()===undefined)?null:vm.complexion(),
						physicalStatus: (vm.physicalStatus()===undefined)?null:vm.physicalStatus()
					};		
					vm.saveMemberDetails(formData);
				}
			};
			
			vm.updateHoroscopeDetails = function(){
				if(vm.validateHoroscopeDetails()){
					var dob = '';
					if(vm.date() && vm.month() && vm.year()){
						dob = vm.month() + '/'+vm.date()+'/'+vm.year();
					}
					var formData = {
						sect 			: vm.sect(),
						subSect 		: vm.subSect(),
						caste 			: (vm.caste()===undefined)?null:vm.caste(), 
						gotra			: (vm.gotra()===undefined)?null:vm.gotra(), 
						dob				: dob,
						birthHour		: (vm.birthHour()===undefined)?null:vm.birthHour(), 
						birthMinute		: (vm.birthMinute()===undefined)?null:vm.birthMinute(), 
						birthAmPm		: (vm.birthAmPm()===undefined)?null:vm.birthAmPm(), 
						manglikStatus	: (vm.manglikStatus()===undefined)?null:vm.manglikStatus()
					};					
					vm.saveMemberDetails(formData);
				}
			};
			
			vm.updateProfessionalDetails = function(){
				var formData = {
					education		: vm.education(),
					employedIn		: vm.employedIn(),
					occupation		: vm.occupation(),
					annualIncome	: vm.annualIncome()
				};					
				vm.saveMemberDetails(formData);
			};
			
			vm.updatePartnerPreferences = function(){
				var formData = {
					marryInSameSect	: vm.marryInSameSect(),
					aboutMyPartner	: vm.aboutMyPartner()
				};					
				vm.saveMemberDetails(formData);
			};
			
			vm.updateContactDetails = function(){
				if(vm.validateContactDetails()){
					var formData = {
						homeAddress		: vm.homeAddress(),
						workingAddress	: vm.workingAddress(),
						country		: vm.country(),
						state		: vm.state(),
						city		: vm.city(),
						emailId		: vm.emailId(),
						contactNumber: vm.contactNumber()
					};					
					vm.saveMemberDetails(formData);
				}
			};
			
			vm.updateFamilyDetails = function(){
				var formData = {
					fatherName		: vm.fatherName(),
					fatherOccupation: vm.fatherOccupation(),
					motherName		: vm.motherName(),
					motherOccupation: vm.motherOccupation(),
					unmarriedBrothers: vm.unmarriedBrothers(),
					marriedBrothers	: vm.marriedBrothers(),
					unmarriedSisters: vm.unmarriedSisters(),
					marriedSisters	: vm.marriedSisters(),
					aboutFamily		: vm.aboutFamily()
				};				
				
				vm.disableButton(true);
				var path = "matrimonyFamilyDetails/updateFamilyDetails/id/"+vm.user().id;
				ajaxutil.put(path, formData, function(data){
					if(data){
						var originalData = vm.originalData();
						originalData.family = data;
						alert("Data updated successfully.");
						vm.isEditMode(false);
					}
					vm.disableButton(false);
				},function(error){
					if(error && error.status === 204){
						vm.message(error.responseText);
						vm.hideMessage();							
					}else{
						alert("Error found in updating data, please try after some time.");
						console.log(error);
					}
					vm.disableButton(false);
				});
			};
			
			vm.validateBasicDetails = function(){
				if(!vm.registeredBy.isValid() || !vm.memberName.isValid() || !vm.sex.isValid() || !vm.maritalStatus.isValid() || !vm.motherTongue.isValid()){
					vm.errors.showAllMessages();
					$(window).scrollTop(0);
					return false;
				}else{
					return true;
				}
			};
			vm.validateHoroscopeDetails = function(){
				if(!vm.sect.isValid() || !vm.subSect.isValid() || !((vm.date() && vm.month() && vm.year()) || (!vm.date() && !vm.month() && !vm.year()))){
					vm.errors.showAllMessages();
					$(window).scrollTop(0);
					return false;
				}else{
					return true;
				}
			};
			vm.validateContactDetails = function(){
				if(!vm.country.isValid() || !vm.state.isValid() || !vm.city.isValid() || !vm.emailId.isValid() || !vm.contactNumber.isValid()){
					vm.errors.showAllMessages();
					$(window).scrollTop(0);
					return false;
				}else{
					return true;
				}
			};
			
			
			vm.hideMessage = function(){
				setTimeout(function(){
					vm.message(undefined);
				}, 3000);				
			};
			
			// Checks whether the form is valid or not
			vm.isFormValid = function(){
				if(vm.errors().length > 0){
					// Show errors
					vm.errors.showAllMessages();
					return false;
				}
				return true;
			};
			vm.errors = ko.validation.group(vm);
			
			vm.uploadPhoto = new UploadPhoto(vm);
			vm.changePassword = new ChangePassword();
		};
	};
});