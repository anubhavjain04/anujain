var UploadPhotoCtrl = function($scope, $rootScope, $serverPath, Upload, UploadDataUrl, $state, Session, FacetFactory, MemberFactory) {
    $scope.facetVM = FacetFactory;
    $scope.global = Session.sessionData;
    $scope.user = $scope.global.currentUser;
    $scope.uploadImage = function(dataUrl, name){
        if($scope.user){
            $scope.uploadingImage = true;
            Upload.upload({
                url: $serverPath + 'matrimonyMembers/changeProfilePic/id/'+$scope.user.pkMemberId,
                data: {
                    file: Upload.dataUrltoBlob(dataUrl, name)
                },
                sendFieldsAs: 'form'
            }).progress(function(evt){
                $scope.uploadProgress = parseInt(100.0 * evt.loaded / evt.total);
            }).success(function (imageDataUrl) {
                Session.sessionData.profilePicData = imageDataUrl;
                $scope.uploadingImage = false;
                $rootScope.$emit('addFlash', [{
                    type: 'success',
                    msg: "Your profile picture has been updated successfully."
                }]);
            }).error(function (error) {
                $scope.uploadingImage = false;
                if(error && error.status === 302){
                    $scope.$root.showAlert(error.message);
                }else{
                    $scope.$root.showAlert("Something gone wrong, please try after some time.");
                }
            });
        }
    };
};
angular.module("BJMMatrimony").controller("UploadPhotoCtrl", UploadPhotoCtrl);