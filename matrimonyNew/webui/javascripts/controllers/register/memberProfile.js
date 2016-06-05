var MemberProfileCtrl = function ($scope, $state, $stateParams, FacetFactory, RegisterFactory) {
    //$scope.registration = $scope.$parent;
    $scope.facetVM = FacetFactory;
    $scope.message = undefined;
    $scope.disableButton = false;
    $scope.profile = {
        birthHour: undefined,
        birthMinute: undefined,
        birthAmPm: undefined,
        weight: "",
        bodyType: undefined,
        complexion: undefined,
        physicalStatus: "0",
        aboutMe: "",
        homeAddress: undefined,
        workingAddress: undefined,
        annualIncome: undefined,
        marryInSameSect: "2",
        aboutMyPartner: undefined,
        caste: undefined,
        gotra: undefined,
        manglikStatus: "0",
        education: undefined,
        employedIn: "5",
        occupation: undefined,
        fatherName: undefined,
        fatherOccupation: undefined,
        motherName: undefined,
        motherOccupation: undefined,
        unmarriedBrothers: "",
        marriedBrothers: undefined,
        unmarriedSisters: undefined,
        marriedSisters: undefined,
        aboutFamily: undefined
    };
    $scope.getSiblingsList = $scope.facetVM.getNumberList(1,6);

    $scope.saveProfile = function () {
        if (($scope.birthHour && $scope.birthMinute && $scope.birthAmPm) || (!$scope.birthHour && !$scope.birthMinute && !$scope.birthAmPm)) {
            $scope.disableButton = true;
            RegisterFactory.updateProfile($scope.userObj.id, $scope.profile).then(function (data) {
                if (data) {
                    $scope.showConfirmationPage(data);
                    // member data
                    //alert("Your profile is created/updated successfully. To activate your account, please pay subscription charges.");
                }
                $scope.disableButton = false;
            }, function (error) {
                $scope.message = error.responseText;
                console.log(error);
                $scope.disableButton = false;
                $scope.hideMessage();
            });
        } else {
            alert("Invalid birth time, please correct or deselect birth time");
            $("#birthHour").focus();
        }
    };

    $scope.hideMessage = function () {
        setTimeout(function () {
            $scope.message = undefined;
        }, 3000);
    };

    // Checks whether the form is valid or not
    $scope.isFormValid = function () {
        if ($scope.errors.length > 0) {
            // Show errors
            $scope.errors.showAllMessages();
            return false;
        }
        return true;
    };
    $scope.errors = [];
};
angular.module("BJMMatrimony").controller("MemberProfileCtrl", MemberProfileCtrl);