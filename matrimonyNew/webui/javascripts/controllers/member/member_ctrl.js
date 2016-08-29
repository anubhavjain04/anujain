var MemberCtrl = function($scope, $rootScope, $state, Session, FacetFactory, MemberFactory) {
    $scope.facetVM = FacetFactory;
    $scope.global = Session.sessionData;
    $scope.user = $scope.global.currentUser;
    $scope.isEditMode = false;

    $scope.disableButton = false;
    $scope.changeMode = function(mode){
        $scope.isEditMode = mode;
        if(!$scope.isEditMode){
            $scope.setMemberDetails($scope.user);
        }
    };

    $scope.getSiblingsList = $scope.facetVM.getNumberList(1,6);

    $scope.setMemberDetails = function(data){
        if(data){
            //$scope.originalData = data;
            var member = data;
            var family = data.family;
            var mm = moment(member.DOB, "YYYY-MM-DD HH:mm:ss");
            var dobDate = mm.format('DD');
            var dobMonth = mm.format('MM');
            var dobYear = mm.format('YYYY');
            var dobHour = mm.format('hh');
            var dobMinute = mm.format('mm');
            var dobAmPm = mm.format('a');
            $scope.sex = member.Sex;
            $scope.registeredBy = member.RegisteredBy;
            $scope.memberName = member.MemberName;
            $scope.age = member.age;
            $scope.date = dobDate;
            $scope.month = dobMonth;
            $scope.year = dobYear;
            $scope.birthHour = dobHour;
            $scope.birthMinute = dobMinute;
            $scope.birthAmPm = dobAmPm;
            $scope.maritalStatus = member.MaritalStatus;
            $scope.childrens = member.Childrens;
            $scope.sect = member.fkSect;
            if($scope.sect){
                $scope.facetVM.afterSectChange($scope.sect, function(){
                    $scope.subSect = member.fkSubSect;
                });
            }
            $scope.caste = member.fkCaste;
            $scope.otherCaste = member.OtherCaste;
            $scope.motherTongue = member.fkMotherTongue;
            $scope.country = member.fkCountryLivingIn;
            $scope.state = member.fkResidingState;
            $scope.city = member.ResidingCity;
            $scope.contactNumber = member.ContactNo;
            $scope.memberCode = member.MemberCode;
            $scope.profilePic = member.ProfilePic;
            $scope.emailId = member.Email;
            $scope.height = member.Height;
            $scope.weight = member.Weight;
            $scope.bodyType = member.BodyType;
            $scope.complexion = member.Complexion;
            $scope.physicalStatus = member.PhysicalStatus;
            $scope.aboutMe = member.AboutMe;
            $scope.homeAddress = member.HomeAddress;
            $scope.workingAddress = member.WorkingAddress;
            $scope.annualIncome = member.IncomeAnnual;
            $scope.marryInSameSect = member.MarryInSameSubSect;
            $scope.aboutMyPartner = member.AboutMyPartner;
            $scope.gotra = member.Gotra;
            $scope.manglikStatus = member.Manglik;
            $scope.education = member.fkEducation;
            $scope.employedIn = member.EmployedIn;
            $scope.occupation = member.Occupation;
            $scope.status = member.Status;
            $scope.createdDate = member.CreatedDate;
            $scope.modifiedDate = member.ModifiedDate;

            $scope.sectName = member.sectName;
            $scope.subSectName = member.subSectName;
            $scope.countryName = member.country;
            $scope.stateName = member.state;
            $scope.educationName = member.education;
            $scope.occupationName = member.occupation;
            $scope.motherToungueName = member.motherTongue;
            $scope.casteName = member.caste;

            if(family){
                $scope.fatherName = family.FatherName;
                $scope.fatherOccupation = family.FatherOccupation;
                $scope.motherName = family.MotherName;
                $scope.motherOccupation = family.MotherOccupation;
                $scope.unmarriedBrothers = family.UnmarriedBrothers;
                $scope.marriedBrothers = family.MarriedBrothers;
                $scope.unmarriedSisters = family.UnmarriedSisters;
                $scope.marriedSisters = family.MarriedSisters;
                $scope.aboutFamily = family.AboutFamily;
            }

        }
    };

    $scope.setMemberDetails($scope.user);

    $scope.saveMemberDetails = function(formData){
        $scope.disableButton = true;
        MemberFactory.updateMemberDetails($scope.user.pkMemberId, formData).then(function(data){
            if(data){
                data["family"] = $scope.user.family;
                $scope.user = data;
                $scope.setMemberDetails($scope.user);
                $rootScope.$emit('addFlash', [{
                    type: 'success',
                    msg: 'Member details updated successfully.'
                }]);
                $scope.isEditMode = false;
            }
            $scope.disableButton = false;
        },function(error){
            if(error && error.status === 302){
                $scope.$root.showAlert(error.message);
            }else{
                $scope.$root.showAlert("Something gone wrong, please try after some time.");
            }
            $scope.disableButton = false;

        });
    };

    $scope.updateBasicDetails = function(){
        if($scope.validateForm()){
            var formData = {
                registerBy 	: $scope.registeredBy,
                memberName 	: $scope.memberName,
                sex 		: $scope.sex,
                maritalStatus:$scope.maritalStatus,
                motherTongue: $scope.motherTongue,
                height		: ($scope.height===undefined)?null:$scope.height,
                weight		: ($scope.weight===undefined)?null:$scope.weight,
                bodyType	: ($scope.bodyType===undefined)?null:$scope.bodyType,
                complexion	: ($scope.complexion===undefined)?null:$scope.complexion,
                physicalStatus: ($scope.physicalStatus===undefined)?null:$scope.physicalStatus
            };
            $scope.saveMemberDetails(formData);
        }
    };

    $scope.updateHoroscopeDetails = function(){
        if($scope.validateForm()){
            var dob = '';
            if($scope.date && $scope.month && $scope.year){
                dob = $scope.month + '/'+$scope.date+'/'+$scope.year;
            }
            var formData = {
                sect 			: $scope.sect,
                subSect 		: $scope.subSect,
                caste 			: ($scope.caste===undefined)?null:$scope.caste,
                gotra			: ($scope.gotra===undefined)?null:$scope.gotra,
                dob				: dob,
                birthHour		: $scope.birthHour,
                birthMinute		: $scope.birthMinute,
                birthAmPm		: $scope.birthAmPm,
                manglikStatus	: ($scope.manglikStatus===undefined)?null:$scope.manglikStatus
            };
            $scope.saveMemberDetails(formData);
        }
    };

    $scope.updateProfessionalDetails = function(){
        var formData = {
            education		: $scope.education,
            employedIn		: $scope.employedIn,
            occupation		: $scope.occupation,
            annualIncome	: $scope.annualIncome
        };
        $scope.saveMemberDetails(formData);
    };

    $scope.updatePartnerPreferences = function(){
        var formData = {
            marryInSameSect	: $scope.marryInSameSect,
            aboutMyPartner	: $scope.aboutMyPartner
        };
        $scope.saveMemberDetails(formData);
    };

    $scope.updateContactDetails = function(){
        if($scope.validateForm()){
            var formData = {
                homeAddress		: $scope.homeAddress,
                workingAddress	: $scope.workingAddress,
                country		: $scope.country,
                state		: $scope.state,
                city		: $scope.city,
                emailId		: $scope.emailId,
                contactNumber: $scope.contactNumber
            };
            $scope.saveMemberDetails(formData);
        }
    };

    $scope.updateFamilyDetails = function(){
        var formData = {
            fatherName		: $scope.fatherName,
            fatherOccupation: $scope.fatherOccupation,
            motherName		: $scope.motherName,
            motherOccupation: $scope.motherOccupation,
            unmarriedBrothers: $scope.unmarriedBrothers,
            marriedBrothers	: $scope.marriedBrothers,
            unmarriedSisters: $scope.unmarriedSisters,
            marriedSisters	: $scope.marriedSisters,
            aboutFamily		: $scope.aboutFamily
        };

        $scope.disableButton = true;
        MemberFactory.updateFamilyDetails($scope.user.pkMemberId, formData).then(function(data, status){
            if(data){
                $scope.user.family = data;
                $scope.setMemberDetails($scope.user);
                $rootScope.$emit('addFlash', [{
                    type: 'success',
                    msg: 'Member details updated successfully.'
                }]);
                $scope.isEditMode = false;
            }
            $scope.disableButton = false;
        },function(error){
            if(error && error.status === 403){
                $scope.$root.showAlert(error.message);
            }else{
                $scope.$root.showAlert("Something went wrong, please try after some time.");
            }
            $scope.disableButton = false;
        });
    };

    $scope.validateForm = function(){
        if($scope.myForm.$valid){
            return true;
        }else{
            angular.forEach($scope.myForm.$error, function (field) {
                angular.forEach(field, function(errorField){
                    errorField.$setTouched();
                })
            });
            $(window).scrollTop(0);
            return false;
        }
    };
};

angular.module("BJMMatrimony").controller("MemberCtrl", MemberCtrl);