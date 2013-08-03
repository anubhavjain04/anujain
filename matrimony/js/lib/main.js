//Main viewmodel class
define(function (require) {
    
	var ko               = require('knockout'),
	$                    = require('jquery'),
	GridViewModelFactory = require('pragya/gridViewModelFactory'),
	MyHome               = require('myHome/myHome'),
	Search               = require('search/search'),
	User                 = require('user/user'),
	Login                = require('login/login'),
	Institute            = require('institute/institute'),
	Topic                = require('topic/topic');
	Level                = require('level/level');
	Template             = require('template/template');
	LearningContent      = require('learningContent/learningContent');
	datepicker           = require('datepicker');
	bootstrapTooltip     = require('bootstrap-tooltip');
	bootstrapPopover     = require('bootstrap-popover');
	Label                = require('label/label');
	Help                 = require('help/help');
	HomePage             = require('homepage/homepage');
	Course             	 = require('course/course');
	EditPassword		 = require('user/editPassword');
	Tool             	 = require('tool/tool');
	ToolProxy            = require('tool/toolProxyViewModel');
	UserPreferences      = require('userPreferences/userPreferences');
	UserFeedBack 		 = require('userFeedBack/userFeedBack');
	Report               = require('report/report');
	FeedbackReport       = require('report/feedbackReport');
	Unit                = require('learningUnit/learningUnit');
	
	return function appViewModel() {

		var self = this;

		self.init = function (id) {
			//console.log('init called');
		};

		self.objectId = "";
		
		self.subCategories         = ko.observableArray();
		self.chosenCategoryId      = ko.observable();
		self.chosenCategoryData    = ko.observable();
		self.requestCategorySwitch = ko.observable().syncWith("requestCategorySwitch");
		self.userLoggedIn          = ko.observable();
		self.showPage          	   = ko.observable('home');
		self.toolProxyToBeVisible  = ko.observable(false).syncWith("toolProxyVisible");
		self.userPermission		   = ko.observable().subscribeTo("currentUserPermission", true);;

		// Accept requests to switch category from other modules
		self.categoryRequest = ko.observable().subscribeTo("requestCategorySwitch", true, function(newValue) {
			//console.log("Dashboard: got request to switch category to " + newValue);
			if (newValue) {
				//console.log('switching to ' + newValue);
				self.chosenCategoryId(newValue);
				if(newValue === 'studentHome' || newValue === 'ToolProxyLaunch'){
					self.toolProxyToBeVisible(true);
				}
				else{
					self.toolProxyToBeVisible(false);
				}
				return newValue;
			}
		});
		self.download =function(){
			
			//alert("Test123");
		}

        // The GridViewModel factory
        self.gridViewModelFactory = new GridViewModelFactory();
		
		// Use the search module to embed a search
		self.search = new Search();
		self.search.init();
		self.searchViewModel = new self.search.searchViewModel();
		// This function is used to refresh myHome search grid
		self.searchViewModel.refreshSearchGrid = ko.observable().subscribeTo("refreshSearchGrid", true, function(newValue){
			console.log("refresh grid subscribe called.");
			self.searchViewModel.searchNow(1000);
		});
			 
		// Init the login module
		self.login = new Login();
		self.loginViewModel = ko.observable(self.login.loginViewModel)

		// Init the user module
		self.user = new User();
		self.user.init(self);
		self.userViewModel = ko.observable(self.user.userViewModel);

		// Init the institute module
		self.institute = new Institute();
		self.institute.init(self);
		self.instituteViewModel = ko.observable(self.institute.instituteViewModel);

		// Init the Learning Level
		self.level = new Level();
		self.level.init(self);
		self.levelViewModel = ko.observable(self.level.levelViewModel);
		
		// Init the Topic  Template
		self.template = new Template();
		self.template.init(self);
		self.templateViewModel = ko.observable(self.template.templateViewModel);
		
		// Init the Learning Content Template
		self.learningContent = new LearningContent();
		self.learningContent.init(self);
		//self.learningContent.learningContentViewModel.lcGridViewModel = new self.learningContent.learningContentViewModel.gridViewModelTemplate();
		self.learningContentViewModel = ko.observable(self.learningContent.learningContentViewModel);

		// Init the topic module
		self.topic = new Topic();
		self.topic.init(self);
		topicVM = new self.topic.topicViewModel();
		//topicVM.topicGridViewModel = new topicVM.gridViewModelTemplate()
		self.topicViewModel = ko.observable(topicVM);

		// MyHome ViewModel (leverages the learning content and topic views and viewmodesls)
		self.myHome = new MyHome();
		self.myHomeViewModel = ko.observable(new self.myHome.myHomeViewModel());	

		// Init the Instructor Delivery Content Template
		/*self.dc = new DC();
    	self.dc.init(self);    	
		self.dcViewModel = ko.observable(self.dc.dcViewModel);*/
		
		// Help ViewModel 
		self.help = new Help();
		self.helpViewModel = ko.observable(self.help.helpViewModel);
				
		// HomePage ViewModel 
		self.homepage = new HomePage();
		self.homepageViewModel = ko.observable(self.homepage.homepageViewModel);
		
		// Course ViewModel 
		self.course = new Course();
		self.course.init();
		courseVM = new self.course.courseViewModel();
		self.courseViewModel = ko.observable(courseVM);
		
		// Tool ViewModel 
		self.tool = new Tool();
		self.tool.init();
		toolVM = new self.tool.toolViewModel();
		self.toolViewModel = ko.observable(toolVM);
		
		// Init Label module
		self.label = new Label();
		
		self.editPassword = new EditPassword();
		editPasswordVM = new self.editPassword.editPasswordVM();
		self.editPasswordVM = ko.observable(editPasswordVM);
		
		// Init the User Preferences
		self.userPreferences = new UserPreferences();
		self.userPreferences.init(self);
		self.userPreferencesVM = ko.observable(self.userPreferences.userPreferencesVM);
		
		
		self.report = new Report();
		self.report.init();
		self.reportViewModel = ko.observable(new self.report.reportViewModel());
		
		self.userFeedback= new UserFeedBack();
		self.userFeedback.init();
		self.userFeedbackViewModel = ko.observable(new self.userFeedback.userFeedbackViewModel());
		
		self.feedbackReport = new FeedbackReport();
		self.feedbackReport.init();
		self.feedbackReportViewModel = new self.feedbackReport.feedbackReportViewModel();
		
		// Init the unit module
		self.unit = new Unit();
		self.unit.init(self);
		self.unitViewModel = ko.observable(new self.unit.unitViewModel());
		
		//	Subscribe elements
		
		//	Subscribe institute name from selected institute by super Admin.
		
		self.institute.instituteViewModel.currentInstituteName.subscribe(self.login.loginViewModel.updateCurrentInstituteName, self.login.loginViewModel);
		self.login.loginViewModel.currentUserRole.subscribe(self.user.userViewModel.getCurrentUserRole, self.user.userViewModel);
		//self.login.loginViewModel.currentUserRole.subscribe(self.dc.dcViewModel.getCurrentUserRole, self.dc.dcViewModel);
		self.login.loginViewModel.loggedUUIDValue.subscribe(self.user.userViewModel.getCurrentUserUuid, self.user.userViewModel);
		self.login.loginViewModel.currentInstituteUuid.subscribe(self.user.userViewModel.getCurrentInstitutionUuid, self.user.userViewModel);
		self.institute.instituteViewModel.loggedUserRole.subscribe(self.user.userViewModel.getCurrentUserRole, self.user.userViewModel);
		self.institute.instituteViewModel.currentInstituteUUID.subscribe(self.user.userViewModel.getCurrentInstitutionUuid, self.user.userViewModel);
		self.login.loginViewModel.personal_LS_UUID.subscribe(self.learningContent.learningContentViewModel.updateUserPersonalLS_UUID, self.learningContent.learningContentViewModel);
		//self.login.loginViewModel.selectedFilterLSList.subscribe(self.dc.dcViewModel.updateFilterLSList, self.dc.dcViewModel); //Causing build failure
		self.login.init(self);	
         
		// Navigate into a category
		self.goToCategory = function(category) {
			self.requestCategorySwitch(category);
			self.topicViewModel().requestCategorySwitch(category);
		};
		
        // Navigate into a subCategory
		self.goToSubCategory = function (subCategory) {   
			self.user.userViewModel.shouldShowCreateUserDiv(false);
			self.user.userViewModel.shouldShowUserListDiv(true);
	
            if (subCategory === "Institutions") {
                self.user.resetFormFields();
                self.institute.instituteViewModel.setAllMessagesFalse();
                self.institute.instituteViewModel.showInstituteList(true);
                self.institute.instituteViewModel.showCreateInstitute(false);
                self.user.userViewModel.shouldShowUserAddMessage(false);    
                self.user.userViewModel.shouldShowEditingMessage(false);    
                self.user.userViewModel.shouldShowUserHeaderMessage("Add User");
                self.user.userViewModel.shouldShowUserButtonMessage("Save");
				self.institute.instituteViewModel.refreshInstituteList();
				$(".institution-grid").resize();
            }
            self.chosenCategoryId(subCategory);
            self.chosenCategoryData(subCategory);
            self.requestCategorySwitch(subCategory);
		};     
    	
		self.goToPage = function(pageName)
		{
			self.showPage(pageName);
		}
		
		// Set active class for user menu
		self.setActiveClassForUserMenu = function(element)
		{
			$("li.active").removeClass("active");
			$("#" + element).addClass('active');
		}
	};
});