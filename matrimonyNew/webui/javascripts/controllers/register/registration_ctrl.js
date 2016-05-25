"use strict";
var RegistrationCtrl = function($scope, $rootScope, $state, $stateParams, $timeout, FacetFactory, RegisterFactory, PasswordScore) {
    $scope.facetVM = FacetFactory;
    $scope.disableButton = false;
    $scope.termsConditions = true;
    $scope.sex = "0";
    $scope.registeredBy = null;
    $scope.memberName = null;
    $scope.date = null;
    $scope.month = null;
    $scope.year = null;
    $scope.maritalStatus = null;
    $scope.sect = null;
    $scope.subSect = null;
    $scope.caste = null;
    $scope.motherTongue = null;
    $scope.country = 1;
    $scope.state = null;
    $scope.city = null;
    $scope.contactNumber = null;
    $scope.emailId = null;
    $scope.password = "";
    $scope.confirmPassword = "";
    //$scope.message = undefined;
    $scope.isFocusEmail = false;

    /**
     * Computed Observables
     */
    $scope.$watch("password", function(newValue){
        if(newValue){
            if(!$scope.password || $scope.password.length <= 0) {
                $scope.passwordStrength = 0;
            }else{
                $scope.passwordStrength = Math.round(PasswordScore.checkPassword($scope.password) / 100 * 100);
            }
        }
    });


    $scope.$watch("passwordStrength", function(newValue){
        if(angular.isDefined(newValue)){
            var color = "red";
            if(newValue == 0) {
                color = "black";
            }else if(newValue > 80) {
                color = "green";
            }else if(newValue > 50) {
                color = "#B0C705";
            }else if(newValue > 25) {
                color = "#FFC23F";
            }
            $scope.passwordColor = color;
        }
    });

    /*$scope.showRecaptcha = function() {
     Recaptcha.create("6Lepn9sSAAAAAEM0srD2FE9Tko1JoAZ-LqRyy3rP", 'captchadiv', {
     tabindex: 1,
     theme: "red",
     callback: Recaptcha.focus_response_field
     });
     };*/

    $scope.registerUser = function(){
        $scope.isFocusEmail = false;
        if($scope.termsConditions && $scope.myForm.$valid){
            //var recaptchaValue = $("#recaptcha_response_field").val();
            //var recaptchaChallenge = $("#recaptcha_challenge_field").val();

            $scope.disableButton = true;
            var dob = '';
            if($scope.date && $scope.month && $scope.year){
                dob = $scope.month + '/'+$scope.date+'/'+$scope.year;
            }
            var formData = {
                registerBy 	: $scope.registeredBy,
                memberName 	: $scope.memberName,
                sex 		: $scope.sex,
                dob 		: dob,
                maritalStatus:$scope.maritalStatus,
                sect		: $scope.sect,
                subSect		: $scope.subSect,
                motherTongue: $scope.motherTongue,
                contactNumber: $scope.contactNumber,
                country		: $scope.country,
                state		: $scope.state,
                city		: $scope.city,
                emailId		: $scope.emailId,
                password	: $scope.password
                //,
                //recaptchaChallenge : recaptchaChallenge,
                //recaptchaValue: recaptchaValue
            };
            RegisterFactory.registerMember(formData).then(function(data){
                $scope.disableButton = false;
                if(data){
                    $scope.showRegisterProfilePage(data);
                }
            },function(error){
                $scope.disableButton = false;
                if(error.status === 302){
                    $scope.isFocusEmail = true;
                }
                $scope.$root.showAlert(error.message);
            });
        }else{
            angular.forEach($scope.myForm.$error, function (field) {
                angular.forEach(field, function(errorField){
                    errorField.$setTouched();
                })
            });
            $scope.$root.showAlert("Please fill required details.");
        }
    };
};
angular.module("BJMMatrimony").controller("RegistrationCtrl", RegistrationCtrl);