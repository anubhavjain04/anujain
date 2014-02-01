define(function (require) {    
	var ko               = require('knockout');
	var ajaxutil		 = require('ajaxutil');
	var Label   		 = require('label');

	return function(registration){ 
		var self = this;
		self.registration = registration;
		self.message = ko.observable();
		self.disableButton = ko.observable(false);
		self.birthHour = ko.observable();
		self.birthMinute = ko.observable();
		self.birthAmPm = ko.observable();
		self.height = ko.observable();
		self.weight = ko.observable();
		self.bodyType = ko.observable();
		self.complexion = ko.observable();
		self.physicalStatus = ko.observable("0");
		self.aboutMe = ko.observable();		
		self.homeAddress = ko.observable();
		self.workingAddress = ko.observable();
		self.annualIncome = ko.observable();
		self.marryInSameSect = ko.observable("2");
		self.aboutMyPartner = ko.observable();
		self.caste = ko.observable();
		self.gotra = ko.observable();
		self.manglikStatus = ko.observable("0");
		self.education = ko.observable();
		self.employedIn = ko.observable("5");
		self.occupation = ko.observable();
		self.fatherName = ko.observable();
		self.fatherOccupation = ko.observable();
		self.motherName = ko.observable();
		self.motherOccupation = ko.observable();
		self.unmarriedBrothers = ko.observable();
		self.marriedBrothers = ko.observable();
		self.unmarriedSisters = ko.observable();
		self.marriedSisters = ko.observable();
		self.aboutFamily = ko.observable();
		
		self.clear = function(){
			self.birthHour(undefined);
			self.birthMinute(undefined);
			self.birthAmPm(undefined);
			self.height(undefined);
			self.weight(undefined);
			self.bodyType(undefined);
			self.complexion(undefined);
			self.physicalStatus("0");
			self.aboutMe(undefined);		
			self.homeAddress(undefined);
			self.workingAddress(undefined);
			self.annualIncome(undefined);
			self.marryInSameSect("2");
			self.aboutMyPartner(undefined);
			self.caste(undefined);
			self.gotra(undefined);
			self.manglikStatus("0");
			self.education(undefined);
			self.employedIn("5");
			self.occupation(undefined);
			self.fatherName(undefined);
			self.fatherOccupation(undefined);
			self.motherName(undefined);
			self.motherOccupation(undefined);
			self.unmarriedBrothers(undefined);
			self.marriedBrothers(undefined);
			self.unmarriedSisters(undefined);
			self.marriedSisters(undefined);
			self.aboutFamily(undefined);
			self.message(undefined);
			self.disableButton(false);
		};
		
		self.saveProfile = function(){
			if((self.birthHour() && self.birthMinute() && self.birthAmPm()) || (!self.birthHour() && !self.birthMinute() && !self.birthAmPm())){
				self.disableButton(true);
				var formData = {
					birthHour		: self.birthHour(),
					birthMinute		: self.birthMinute(),
					birthAmPm		: self.birthAmPm(),
					height 			: self.height(),
					weight 			: self.weight(),
					bodyType 		: self.bodyType(),
					complexion 		: self.complexion(),
					physicalStatus	: self.physicalStatus(),
					aboutMe			: self.aboutMe(),
					homeAddress		: self.homeAddress(),
					workingAddress	: self.workingAddress(),
					annualIncome	: self.annualIncome(),
					marryInSameSect	: self.marryInSameSect(),
					aboutMyPartner	: self.aboutMyPartner(),
					caste			: self.caste(),
					gotra			: self.gotra(),
					manglikStatus	: self.manglikStatus(),
					education		: self.education(),
					employedIn		: self.employedIn(),
					occupation		: self.occupation(),
					fatherName		: self.fatherName(),
					fatherOccupation: self.fatherOccupation(),
					motherName		: self.motherName(),
					motherOccupation: self.motherOccupation(),
					unmarriedBrothers: self.unmarriedBrothers(),
					marriedBrothers	: self.marriedBrothers(),
					unmarriedSisters: self.unmarriedSisters(),
					marriedSisters	: self.marriedSisters(),
					aboutFamily		: self.aboutFamily()
				};
				
				var path = "register/updateProfile/id/"+self.registration.user().id;
				ajaxutil.put(path, formData, function(data){
					if(data){
						// member data						
						alert("Your profile is created/updated successfully. To activate your account, please pay subscription charges.");
						jHash.set(Label.UPGRADE_PAGE, {});
					}
					self.disableButton(false);
				},function(error){
					self.message(error.responseText);
					console.log(error);
					self.disableButton(false);
					self.hideMessage();
				});
			}else{
				alert("Invalid birth time, please correct or deselect birth time");
				$("#birthHour").focus();
			}
		};
		
		self.hideMessage = function(){
			setTimeout(function(){
				self.message(undefined);
			}, 3000);				
		};
		
		// Checks whether the form is valid or not
		self.isFormValid = function(){
			if(self.errors().length > 0){
				// Show errors
				self.errors.showAllMessages();
				return false;
			}
			return true;
		};
		self.errors = ko.validation.group(self);
	};
});