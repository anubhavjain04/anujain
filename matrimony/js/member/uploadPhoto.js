define(function (require) { 
	var ko               = require('knockout');
	var ajaxutil		 = require('ajaxutil');
	var Label   		 = require('label');
	var JqueryFrom 		 = require('jquery.form');
	var JqueryCrop 		 = require('Jcrop/jquery.Jcrop');
	var JqueryColor		 = require('Jcrop/jquery.color');

	return function(member){ 
		var self = this;
		self.member = member;
		self.user = ko.observable().subscribeTo("loggedInUser", true);
		
		self.previewWidth = ko.observable(100);
		self.previewHeight = ko.observable(140);
		self.cropID = 0;
		self.cropDimension = {'x': 0, 'y': 0, 'w':100, 'h':100};
		self.uploadedImage = ko.observable();
		self.previewImgSrc = ko.observable();
		self.previewImgStyle = {'width': ko.observable(0), 'height': ko.observable(0), 'marginLeft': ko.observable(0), 'marginTop': ko.observable(0)};
		self.changeUploadPhoto = function(){
			self.uploadedImage('<img src="'+siteBaseUrl+'/images/ajax-loader-small.gif" alt="Uploading...."/>');
			$("#imageform").ajaxForm({
				target: '#uploadedImage',
				success: function(){
					self.cropID = 1;
					$("#preview").attr("src",$("#prewImg").attr("src"));
					$('#uploadedImage').find("#prewImg").Jcrop({
						onChange: self.updateCoords,
						onSelect: self.updateCoords,
						aspectRatio: .75,
						boxWidth: 600,
						boxHeight: 600,
						bgFade: true,
						bgOpacity: .6,
						setSelect: [ 0, 0, 150, 200 ],
						onRelease: self.clearCoords
					  });
				}
			}).submit();
		};
		self.clearCoords = function(){
			self.cropID = 0;
			self.previewImgStyle.width(0);
			self.previewImgStyle.height(0);
			self.previewImgStyle.marginLeft(0);
			self.previewImgStyle.marginTop(0);
		};
		self.updateCoords = function(c){
			self.cropID = 1;
			self.cropDimension.x = c.x;
			self.cropDimension.y = c.y;
			self.cropDimension.w = c.w;
			self.cropDimension.h = c.h;
			
			var rx = self.previewWidth() / c.w;
			var ry = self.previewHeight() / c.h;
			
			self.previewImgStyle.width(Math.round(rx * $('#prewImg').width()));
			self.previewImgStyle.height(Math.round(ry * $('#prewImg').height()));
			self.previewImgStyle.marginLeft('-' + Math.round(rx * c.x));
			self.previewImgStyle.marginTop('-' + Math.round(ry * c.y));
		};
		self.clear = function(){
			self.clearCoords();
			self.cropDimension.x = 0;
			self.cropDimension.y = 0;
			self.cropDimension.w = 100;
			self.cropDimension.h = 100;
			self.uploadedImage(undefined);
			self.previewImgSrc(undefined);
		};
		self.uploadImage = function(){
			if(self.user()){
				var formData = {
					cropID 	: self.cropID,
					cropX 	: self.cropDimension.x,
					cropY 	: self.cropDimension.y,
					cropW 	: self.cropDimension.w,
					cropH 	: self.cropDimension.h,
				};
				var url = "matrimonyMembers/changeUploadedImage/id/"+self.user().id;
				ajaxutil.put(url, formData, function(data){
					if(data){
						if(data.status == 'success'){
							alert("your photo has been changed successfully.");
							//jHash.set(Label.HOME_PAGE, {});
							var oldPath = self.member.memberPhoto();
							self.member.memberPhoto('');
							self.member.memberPhoto(oldPath);
							self.clear();
						}else{
							alert("error in change password");
						}
					}
				},function(error){
					console.log(error);
				});
			}
		};
		
		
	};
});