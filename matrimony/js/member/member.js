define(function (require) {    
	var ko               = require('knockout');
	var ajaxutil		 = require('ajaxutil');

	return function(){ 
		var self = this;
		self.memberViewModel = function() {
			var vm = this;
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
					var member = data.member;
					var family = data.family;
					var dob = new Date(member.DOB);
					var dobDate = undefined;
					var dobMonth = undefined;
					var dobYear = undefined;
					var dobHour = undefined;
					var dobMinute = undefined;
					var dobAmPm = undefined;
					if(dob){
						dobDate = dob.getDate();
						dobMonth = dob.getMonth();
						if(dobMonth.length==1){
							dobMonth = '0'+dobMonth;
						}
						dobYear = dob.getFullYear();
						if(dob.getHours() <= 12){
							dobHour = dob.getHours();
							if(dobHour == 0){
								dobHour = 12;
							}
							dobAmPm = 'am';
						}else{
							dobHour = dob.getHours() - 12;
							dobAmPm = 'pm';
						}
						dobMinute = dob.getMinutes();
					}				
					
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
					vm.subSect(member.fkSubSect);
					vm.caste(member.fkCaste);
					vm.otherCaste(member.OtherCaste);
					vm.motherTongue(member.fkMotherTongue);
					vm.country(member.fkCountryLivingIn);
					vm.state(member.fkResidingState);
					vm.city(member.ResidingCity);
					vm.contactNumber(member.ContactNo);
					vm.memberCode(member.MemberCode);
					vm.memberPhoto(member.MemberPhoto);
					vm.emailId(member.MemberPhoto);
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
					console.log(ko.toJS(vm));
				}
			};
			
		};
	};
});