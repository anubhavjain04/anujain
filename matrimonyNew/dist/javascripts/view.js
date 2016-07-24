angular.module('templates-main', []).run(['$templateCache', function($templateCache) {
  $templateCache.put("auth/login.html",
    "<div ng-show=\"!global.auth\" class=\"panel panel-default\">\n" +
    "    <div class=\"panel-body jumbotron\">\n" +
    "        <div class=\"col-sm-8 \">\n" +
    "            <div>\n" +
    "                <h2>Member Login</h2>\n" +
    "            </div>\n" +
    "            <div class=\"col-sm-8 panel panel-default padt10\">\n" +
    "                <form name=\"loginForm\" class=\"\">\n" +
    "                    <div class=\"form-group input-group-sm\">\n" +
    "                        <label class=\"control-label\">Matrimony ID / Email ID</label>\n" +
    "                        <input type=\"text\" placeholder=\"Matrimony ID / Email ID\" class=\"form-control def-element-width\" required name=\"email\" ng-model=\"user.email\"/>\n" +
    "                        <div ng-messages=\"loginForm.email.$touched && loginForm.email.$error\" class=\"text-danger\">\n" +
    "                            <div ng-message=\"required\">Please write Matrimony ID or registered Email ID.</div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"form-group input-group-sm\">\n" +
    "                        <label class=\"control-label\">Password</label>\n" +
    "                        <input type=\"password\" placeholder=\"Password\" class=\"form-control def-element-width\" name=\"password\" required ng-model=\"user.password\"/>\n" +
    "                        <div ng-messages=\"loginForm.password.$touched && loginForm.password.$error\" class=\"text-danger\">\n" +
    "                            <div ng-message=\"required\">Please write password.</div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div ng-if=\"message\" class=\"text-danger\">\n" +
    "                        <div ng-bind=\"\">message</div>\n" +
    "                    </div>\n" +
    "                    <!--<div class=\"form-group checkbox\">\n" +
    "                        <label>\n" +
    "                          <input type=\"checkbox\" value=\"remember-me\" name=\"LoginForm[rememberMe]\"> Remember me\n" +
    "                        </label>\n" +
    "                    </div>\n" +
    "                    -->\n" +
    "                    <div class=\"form-group\">\n" +
    "                        <button type=\"submit\" class=\"btn btn-sm btn-success\" ng-click=\"login()\">Login</button>\n" +
    "                        <button type=\"button\" class=\"btn btn-sm btn-link\" ng-click=\"forgotPassword()\">Forgot password?</button>\n" +
    "                    </div>\n" +
    "                </form>\n" +
    "            </div>\n" +
    "            <div class=\"col-sm-4\">\n" +
    "               <!--<span>Find your soul mate...</span>-->\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"col-sm-4 panel panel-default\">\n" +
    "            <div class=\"panel-body\">\n" +
    "                <h3>Join BJM Matrimony FREE</h3>\n" +
    "                <ul>\n" +
    "                    <li>It's free of cost</li>\n" +
    "                    <li>Unlimited access to profiles</li>\n" +
    "                    <li>Contact members directly</li>\n" +
    "                    <li>No hidden cost</li>\n" +
    "                    <li>Easy to use</li>\n" +
    "                    <li>Trustworthy, efficient</li>\n" +
    "                    <li>Best matching email alerts (coming soon)</li>\n" +
    "                    <li>Online chat(coming soon)</li>\n" +
    "                </ul>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "<div ng-show=\"global.auth\" class=\"text-center\">\n" +
    "    <div>\n" +
    "        <h2>Logging in...</h2>\n" +
    "    </div>\n" +
    "    <div>\n" +
    "        <img src=\"dist/images/spinner-horizontal.gif\" title=\"Logging..\">\n" +
    "    </div>\n" +
    "</div>");
  $templateCache.put("directives/alert.html",
    "<div class=\"text-center\">\n" +
    "    <div class=\"\">\n" +
    "        <div >\n" +
    "            <h1><i class=\"text-danger glyphicon glyphicon-ban-circle\"></i></h1>\n" +
    "            <h2>Oppss..</h2>\n" +
    "            <h5><span ng-bind=\"message\"></span></h5>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"modal-footer\">\n" +
    "        <button type=\"button\" class=\"btn btn-lg btn-primary\" autofocus ng-click=\"close()\" >Ok</button>\n" +
    "    </div>\n" +
    "</div>\n" +
    "");
  $templateCache.put("home/home.html",
    "<div class=\"jmm_banner\">\n" +
    "    <img src=\"dist/images/banner.jpg\" />\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"register-panel\">\n" +
    "    <div class=\"register-home panel panel-green\">\n" +
    "        <div class=\"panel-heading\">\n" +
    "            <h3 class=\"panel-title\">Register Now - It's FREE !</h3>\n" +
    "        </div>\n" +
    "        <div class=\"panel-body\">\n" +
    "            <div ng-include=\"'register/required-register-details.html'\"></div>\n" +
    "            <!--<div class=\"disabled-block-layer\"></div>-->\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"clearfix\"></div>\n" +
    "<div style=\"position: relative;\">\n" +
    "    <div ng-include=\"'search/quickSearch.html'\"></div>\n" +
    "</div>\n" +
    "");
  $templateCache.put("layouts/flash.html",
    "<div class=\"ng-cloak\" ng-controller='FlashCtrl', ng-init='flash=[]'>\n" +
    "    <uib-alert close='closeAlert($index)', ng-repeat='alert in flash', type='{{ alert.type }}'>\n" +
    "        <span ng-bind=\"alert.msg\"></span>\n" +
    "    </uib-alert>\n" +
    "</div>");
  $templateCache.put("layouts/footer.html",
    "<!-- footer starts -->\n" +
    "<div class=\"panel-footer\" style=\"position: relative;\">\n" +
    "    <div id=\"footer\" class=\"container\">\n" +
    "        <div class=\"padb10 col-xs-12 col-sm-12\">\n" +
    "            <p>\n" +
    "                <span>Reach Out:</span>\n" +
    "                <a ui-sref=\"contactUs\">Contact Us</a>\n" +
    "                |<a href=\"javascript:void(0)\">Report Abuse</a>\n" +
    "                |<a href=\"javascript:void(0)\">Feedback</a>\n" +
    "            </p>\n" +
    "            <p>\n" +
    "                <span>Information:</span>\n" +
    "                <a ui-sref=\"aboutUs\">About Us</a>\n" +
    "                |<a ui-sref=\"privacyPolicy\">Privacy Policy</a>\n" +
    "                |<a ui-sref=\"termsNConditions\">Terms &amp; Conditions</a>\n" +
    "            </p>\n" +
    "            <p>\n" +
    "                <span>Quick Links:</span>\n" +
    "                <a href=\"javascript:void(0)\">Post Success Story of BJM Matrimonial</a>\n" +
    "                |<a href=\"javascript:void(0)\">Popular Matrimony Searches</a>\n" +
    "            </p>\n" +
    "        </div>\n" +
    "        <div class=\"paddt15 copyright\">\n" +
    "            <div class=\"text-center text-muted\">Copyright &copy; 2013. All rights reserved.</div>\n" +
    "            <div class=\"text-center text-muted\"><small>Jain Milan Matrimonial is a part of <a href=\"http://www.bhartiyajainmilan.com\" target=\"_blank\">www.bhartiyajainmilan.com</a></small></div>\n" +
    "\n" +
    "        </div>\n" +
    "        <div class=\"clearfix\"></div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "<!-- footer ends --> ");
  $templateCache.put("layouts/topbar.html",
    "<div id=\"wrapper\" ng-controller='MenuCtrl' ng-class=\"{'toggled':isOpened}\">\n" +
    "    <div class=\"overlay\" ng-show=\"isOpened\"></div>\n" +
    "    <div id=\"sidebar-wrapper\" class=\"navbar navbar-fixed-top\" role='navigation'>\n" +
    "\n" +
    "        <div class=\"\">\n" +
    "            <div >\n" +
    "                <ul class=\"nav navbar-nav sidebar-nav\" ng-click=\"$parent.toggleMenu()\">\n" +
    "                    <li class=\"sidebar-brand\">\n" +
    "                        <a href=\"#\">\n" +
    "                            <img src=\"dist/images/symbol-sm-grey.png\" />\n" +
    "                            JM Matrimonial\n" +
    "                        </a>\n" +
    "                    </li>\n" +
    "                    <li ui-sref-active=\"active\">\n" +
    "                        <a ui-sref=\"home\" ng-bind=\"global.currentUser? 'My Matrimony' : 'Home' \"></a>\n" +
    "                    </li>\n" +
    "                    <li ui-sref-active=\"active\">\n" +
    "                        <a ui-sref=\"search\">Search</a></li>\n" +
    "                    <li ng-if=\"!global.currentUser\" ui-sref-active=\"active\">\n" +
    "                        <a ui-sref=\"register\">Register</a>\n" +
    "                    </li>\n" +
    "                    <li ng-if=\"global.currentUser\" ui-sref-active=\"active\">\n" +
    "                        <a ui-sref=\"userProfile.basicDetails\">My Profile</a>\n" +
    "                    </li>\n" +
    "                    <li ng-if=\"global.currentUser\" ui-sref-active=\"active\">\n" +
    "                        <a ui-sref=\"userProfile.changePassword\">Change Password</a>\n" +
    "                    </li>\n" +
    "                    <li ui-sref-active=\"active\">\n" +
    "                        <a ui-sref=\"contactUs\">Contact Us</a>\n" +
    "                    </li>\n" +
    "                </ul>\n" +
    "            </div>\n" +
    "            <!--/.navbar-collapse -->\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"handle-sidebar-wrapper\">\n" +
    "        <button type=\"button\" class=\"handle-sidebar\" ng-click=\"toggleMenu()\" ng-class=\"{'is-closed': !isOpened, 'is-open': isOpened}\">\n" +
    "            <span class=\"hand-top\"></span>\n" +
    "            <span class=\"hand-middle\"></span>\n" +
    "            <span class=\"hand-bottom\"></span>\n" +
    "        </button>\n" +
    "    </div>\n" +
    "</div>\n" +
    "");
  $templateCache.put("layouts/topheader.html",
    "<div id=\"top-header\" class=\"container\">\n" +
    "    <div class=\"pull-left\">\n" +
    "        <a class=\"brand\" ui-sref='home'>\n" +
    "            <img src=\"dist/images/spacer.gif\"/>\n" +
    "        </a>\n" +
    "        <div class=\"text-muted version\"><small>version: <span ng-bind=\"version\"></span></small></div>\n" +
    "    </div>\n" +
    "    <div ng-if=\"!global.auth\" class=\"pull-right login-panel\" ng-controller=\"LoginCtrl\">\n" +
    "        <span class=\"login-link\">\n" +
    "            <a ui-sref=\"login\" class=\"btn btn-xs btn-primary\">Login</a>\n" +
    "        </span>\n" +
    "        <form name=\"loginForm\" class=\"form-inline login-form\">\n" +
    "            <div ng-messages=\"(loginForm.password.$touched && loginForm.password.$error) || (loginForm.email.$touched && loginForm.email.$error)\"\n" +
    "                 class=\"text-danger\">\n" +
    "                <div ng-message=\"required\">Invalid username/e-mail or password.</div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"control-label sr-only\">Matrimony ID / Email ID</label>\n" +
    "                <input type=\"text\" placeholder=\"Matrimony ID / Email ID\" class=\"form-control input-sm\" required\n" +
    "                       name=\"email\" ng-model=\"user.email\"/>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"control-label sr-only\">Password</label>\n" +
    "                <input type=\"password\" placeholder=\"Password\" class=\"form-control input-sm\" name=\"password\" required\n" +
    "                       ng-model=\"user.password\"/>\n" +
    "\n" +
    "                <div></div>\n" +
    "                <button type=\"button\" class=\"btn btn-sm btn-link\" ng-click=\"forgotPassword()\">Forgot password?</button>\n" +
    "            </div>\n" +
    "            <button type=\"submit\" class=\"btn btn-sm btn-success\" ng-click=\"login()\">Login</button>\n" +
    "        </form>\n" +
    "    </div>\n" +
    "    <div ng-if=\"global.auth && global.currentUser\" class=\"pull-right login-panel\" ng-controller=\"MemberCtrl\">\n" +
    "        <div class=\"pull-left mini-profile-pic\">\n" +
    "            <img ng-if=\"profilePic\" ng-src=\"{{global.profilePicData}}\" ng-attr-title=\"{{memberName+' ('+memberCode+')'}}\" />\n" +
    "        </div>\n" +
    "        <div class=\"pull-left member-details padl8\">\n" +
    "            <div>\n" +
    "                <a ui-sref=\"searchMember({memberCode: memberCode})\" ng-bind=\"memberName+' ('+memberCode+')'\"></a>\n" +
    "            </div>\n" +
    "\n" +
    "            <div class=\"padt10\"><span>Free Member</span></div>\n" +
    "        </div>\n" +
    "        <div class=\"pull-left padl8\">\n" +
    "            <a ui-sref=\"logout\" class=\"btn btn-primary btn-sm\" ui-sref=\"logout\">Sign Out</a>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>");
  $templateCache.put("member/basic-details.html",
    "<form name=\"myForm\">\n" +
    "    <h1>Basic Details\n" +
    "        <small ng-show=\"!isEditMode\"><button class=\"btn btn-primary btn-sm\" ng-click=\"changeMode(true)\">Edit</button></small>\n" +
    "        <small ng-show=\"isEditMode\"><button class=\"btn btn-primary btn-sm\" ng-click=\"changeMode(false)\">Cancel Edit</button></small>\n" +
    "    </h1>\n" +
    "\n" +
    "    <div class=\"col-xs-12 col-sm-12 tab-content\">\n" +
    "        <div id=\"register-member\">\n" +
    "            <div class=\"padt20 form-horizontal\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label>Matrimony ID</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <label><span class=\"clr9\" ng-bind=\"memberCode\"></span></label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label>Registered by<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-bind=\"facetVM.getObjectText(facetVM.registeredByList,registeredBy)\"></span>\n" +
    "                            <span ng-show=\"isEditMode\" class=\"text-muted pull-right\">\n" +
    "                                <small>To edit, please contact to customer care.</small>\n" +
    "                            </span>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Name<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"memberName\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" ng-class=\"{'has-error': myForm.memberName.$touched && myForm.memberName.$invalid, 'has-success': myForm.memberName.$touched && myForm.memberName.$valid}\">\n" +
    "                                <input type=\"text\" class=\"form-control def-element-width\" placeholder=\"Name\" ng-model=\"memberName\" />\n" +
    "                                <div ng-messages=\"myForm.memberName.$touched && myForm.memberName.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please write your name.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Gender<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-bind=\"(sex==1)?'Male':'Female'\"></span>\n" +
    "                            <span ng-show=\"isEditMode\" class=\"text-muted pull-right\">\n" +
    "                                <small>To edit, please contact to customer care.</small>\n" +
    "                            </span>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Marital Status<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"facetVM.getObjectText(facetVM.maritalStatusList, maritalStatus)\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" ng-class=\"{'has-error': myForm.maritalStatus.$touched && myForm.maritalStatus.$invalid, 'has-success': myForm.maritalStatus.$touched && myForm.maritalStatus.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"maritalStatus\" required ng-model=\"maritalStatus\">\n" +
    "                                    <option value=\"\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.maritalStatusList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"maritalStatus==item.key\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.maritalStatus.$touched && myForm.maritalStatus.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select marital status.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Mother Tongue<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"motherToungueName\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" ng-class=\"{'has-error': myForm.motherTongue.$touched && myForm.motherTongue.$invalid, 'has-success': myForm.motherTongue.$touched && myForm.motherTongue.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"motherTongue\" required ng-model=\"motherTongue\">\n" +
    "                                    <option value=\"\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.motherTongueList track by item.pkTongueId\" ng-attr-value=\"{{item.pkTongueId}}\" ng-bind=\"item.TongueName\" ng-selected=\"motherTongue==item.pkTongueId\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.motherTongue.$touched && myForm.motherTongue.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select mother tongue.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "\n" +
    "\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Height</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"facetVM.getObjectText(facetVM.heightList,height)\"></span>\n" +
    "                            <select ng-show=\"isEditMode\" class=\"form-control def-element-width\" name=\"height\" ng-model=\"height\" ng-options=\"item.key as item.text for item in facetVM.heightList\">\n" +
    "                                <option value=\"\">--select--</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Weight</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"facetVM.getObjectText(facetVM.weightList,weight)\"></span>\n" +
    "                            <select ng-show=\"isEditMode\" class=\"form-control def-element-width\" ng-model=\"weight\" ng-options=\"item.key as item.text for item in facetVM.weightList\">\n" +
    "                                <option value=\"\">--select--</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Body Type</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"facetVM.getObjectText(facetVM.bodyTypeList, bodyType)\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" class=\"btn-group\">\n" +
    "                                <label for=\"b_Slim\" class=\"btn btn-default\" ng-class=\"{'active': bodyType=='1'}\">\n" +
    "                                    <input type=\"radio\" id=\"b_Slim\" name=\"bodytype\" value=\"1\" ng-model=\"bodyType\" />\n" +
    "                                    Slim </label>\n" +
    "                                &nbsp;\n" +
    "                                <label for=\"b_Athletic\" class=\"btn btn-default\" ng-class=\"{'active': bodyType=='2'}\">\n" +
    "                                    <input type=\"radio\" id=\"b_Athletic\" name=\"bodytype\" value=\"2\" ng-model=\"bodyType\" />\n" +
    "                                    Athletic </label>\n" +
    "                                <label for=\"b_Average\" class=\"btn btn-default\" ng-class=\"{'active': bodyType=='3'}\">\n" +
    "                                    <input type=\"radio\" id=\"b_Average\" name=\"bodytype\" value=\"3\" ng-model=\"bodyType\" />\n" +
    "                                    Average </label>\n" +
    "                                <label for=\"b_Heavy\" class=\"btn btn-default\" ng-class=\"{'active': bodyType=='4'}\">\n" +
    "                                    <input type=\"radio\" id=\"b_Heavy\" name=\"bodytype\" value=\"4\" ng-model=\"bodyType\" />\n" +
    "                                    Heavy </label>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Complexion</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"facetVM.getObjectText(facetVM.complexionList, complexion)\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" class=\"btn-group\">\n" +
    "                                <label for=\"c_VeryFair\" class=\"btn btn-default\" ng-class=\"{'active': complexion=='1'}\">\n" +
    "                                    <input type=\"radio\" id=\"c_VeryFair\" name=\"complexion\" value=\"1\" ng-model=\"complexion\" />\n" +
    "                                    Very Fair </label>\n" +
    "                                &nbsp;\n" +
    "                                <label for=\"c_Fair\" class=\"btn btn-default\" ng-class=\"{'active': complexion=='2'}\">\n" +
    "                                    <input type=\"radio\" id=\"c_Fair\" name=\"complexion\" value=\"2\" ng-model=\"complexion\" />\n" +
    "                                    Fair </label>\n" +
    "                                <label for=\"c_Wheatish\" class=\"btn btn-default\" ng-class=\"{'active': complexion=='3'}\">\n" +
    "                                    <input type=\"radio\" id=\"c_Wheatish\" name=\"complexion\" value=\"3\" ng-model=\"complexion\" />\n" +
    "                                    Wheatish </label>\n" +
    "                                <label for=\"c_WheatishBrown\" class=\"btn btn-default\" ng-class=\"{'active': complexion=='4'}\">\n" +
    "                                    <input type=\"radio\" id=\"c_WheatishBrown\" name=\"complexion\" value=\"4\" ng-model=\"complexion\" />\n" +
    "                                    Wheatish Brown </label>\n" +
    "                                <label for=\"c_Dark\" class=\"btn btn-default\" ng-class=\"{'active': complexion=='5'}\">\n" +
    "                                    <input type=\"radio\" id=\"c_Dark\" name=\"complexion\" value=\"5\" ng-model=\"complexion\" />\n" +
    "                                    Dark </label>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Physical Status</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"facetVM.getObjectText(facetVM.physicalStatusList, physicalStatus)\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" class=\"btn-group\">\n" +
    "                                <label for=\"ps_Normal\" class=\"btn btn-default\" ng-class=\"{'active': physicalStatus=='0'}\">\n" +
    "                                    <input type=\"radio\" id=\"ps_Normal\" name=\"physicalStatus\" value=\"0\" ng-model=\"physicalStatus\" />\n" +
    "                                    Normal </label>\n" +
    "                                <label for=\"ps_Challenged\" class=\"btn btn-default\" ng-class=\"{'active': physicalStatus=='1'}\">\n" +
    "                                    <input type=\"radio\" id=\"ps_Challenged\" name=\"physicalStatus\" value=\"1\" ng-model=\"physicalStatus\" />\n" +
    "                                    Physically Challenged </label>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "\n" +
    "                <div ng-show=\"isEditMode\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\"></div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\">\n" +
    "                                <div id=\"captchadiv\"></div>\n" +
    "                                <button class=\"btn btn-success\" ng-click=\"updateBasicDetails()\" ng-disabled=\"disableButton\">Save</button>\n" +
    "                                <button class=\"btn btn-primary\" ng-click=\"changeMode(false)\">Cancel</button>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padb35\"></div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</form>");
  $templateCache.put("member/change-password.html",
    "<form name=\"myForm\">\n" +
    "    <h1>Change Password</h1>\n" +
    "    <div class=\"col-xs-12 col-sm-12 tab-content\">\n" +
    "        <div id=\"register-member\">\n" +
    "            <div class=\"padt20 form-horizontal\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Old Password<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.oldPassword.$touched && myForm.oldPassword.$invalid, 'has-success': myForm.oldPassword.$touched && myForm.oldPassword.$valid}\">\n" +
    "                            <input type=\"password\" placeholder=\"old password\" name=\"oldPassword\" required class=\"form-control def-element-width\" ng-model=\"oldPassword\" />\n" +
    "                            <div ng-messages=\"myForm.oldPassword.$touched && myForm.oldPassword.$error\" class=\"text-danger\">\n" +
    "                                <div ng-message=\"required\">Please write old password.</div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">New Password<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.newPassword.$touched && myForm.newPassword.$invalid, 'has-success': myForm.newPassword.$touched && myForm.newPassword.$valid}\">\n" +
    "                            <input type=\"password\" placeholder=\"password\" name=\"newPassword\" required class=\"form-control def-element-width\" ng-model=\"newPassword\" ng-minlength=\"8\" />\n" +
    "                                <!--<span style=\"display:none\" class=\"help-inline\" ng-show=\"passwordStrength != undefined\">-->\n" +
    "                                    <!--<b ng-style=\"{color:passwordColor}\">Strength:</b> <span ng-bind=\"passwordStrength\">0</span>%-->\n" +
    "                                <!--</span>-->\n" +
    "                            <div ng-messages=\"myForm.newPassword.$touched && myForm.newPassword.$error\" class=\"text-danger\">\n" +
    "                                <div ng-message=\"required\">Please write password.</div>\n" +
    "                                <div ng-message=\"minlength\">Password should be minimum 8 characters.</div>\n" +
    "                            </div>\n" +
    "\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Confirm Password<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.confirmPassword.$touched && myForm.confirmPassword.$invalid, 'has-success': myForm.confirmPassword.$touched && myForm.confirmPassword.$valid}\">\n" +
    "                            <input type=\"password\" placeholder=\"password again\" name=\"confirmPassword\" required class=\"form-control def-element-width\" ng-pattern=\"{{password}}\" ng-model=\"confirmPassword\" ng-minlength=\"8\">\n" +
    "                            <div ng-messages=\"myForm.confirmPassword.$touched && myForm.confirmPassword.$error\" class=\"text-danger\">\n" +
    "                                <div ng-message=\"required\">Please write password.</div>\n" +
    "                                <div ng-message=\"minlength\">Password should be minimum 8 characters.</div>\n" +
    "                                <div ng-message=\"pattern\">Password and confirm password should match.</div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\"></div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <div id=\"captchadiv\"></div>\n" +
    "                            <button class=\"btn btn-success\" ng-click=\"change()\" ng-disabled=\"disableButton\">Change Password</button>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"padb35\"></div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</form>\n" +
    "");
  $templateCache.put("member/change-photo.html",
    "<form name=\"myForm\">\n" +
    "    <h1>Change Profile photo</h1>\n" +
    "    <div>\n" +
    "        <div>\n" +
    "            <div><label>Upload Member Photo</label></div>\n" +
    "            <div><button ngf-select ng-model=\"picFile\" accept=\"image/*\">Select Picture</button></div>\n" +
    "            <div><span class=\"text-muted\">.jpg, .gif, .bmp, .png file only (max. size 1MB)</span></div>\n" +
    "        </div>\n" +
    "        <div class=\"pull-left\">\n" +
    "            <div ngf-drop ng-model=\"picFile\" ngf-pattern=\"image/*\" class=\"cropArea\">\n" +
    "                <img-crop image=\"picFile  | ngfDataUrl\" result-image=\"croppedDataUrl\" area-type=\"square\" ng-init=\"croppedDataUrl=''\" on-change=\"updateCoords($dataURI)\"></img-crop>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"pull-left\" style=\"margin-left: 20px;\">\n" +
    "            <h4>Preview of cropped image</h4>\n" +
    "            <div>\n" +
    "                <img ng-src=\"{{croppedDataUrl}}\" />\n" +
    "            </div>\n" +
    "            <div>\n" +
    "                <button class=\"btn btn-primary\" ng-click=\"uploadImage(croppedDataUrl, picFile.name)\" ng-disabled=\"uploadingImage\">Save</button>\n" +
    "            </div>\n" +
    "            <div class=\"progress progress-striped\" ng-show=\"uploadProgress >= 0\">\n" +
    "                <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" ng-attr-aria-valuenow=\"{{uploadProgress}}\"\n" +
    "                     aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:{{uploadProgress}}%\">\n" +
    "                    <span ng-bind=\"uploadProgress + '% Complete'\"></span>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"clearfix\"></div>\n" +
    "</form>\n" +
    "");
  $templateCache.put("member/contact-details.html",
    "<form name=\"myForm\">\n" +
    "    <h1>Location/Contact Details\n" +
    "        <small ng-show=\"!isEditMode\"><button class=\"btn btn-primary btn-sm\" ng-click=\"changeMode(true)\">Edit</button></small>\n" +
    "        <small ng-show=\"isEditMode\"><button class=\"btn btn-primary btn-sm\" ng-click=\"changeMode(false)\">Cancel Edit</button></small>\n" +
    "    </h1>\n" +
    "\n" +
    "    <div class=\"col-xs-12 col-sm-12 tab-content\">\n" +
    "        <div id=\"register-member\">\n" +
    "            <div class=\"padt20 form-horizontal\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Home Address</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"homeAddress\"></span>\n" +
    "                            <textarea ng-show=\"isEditMode\" class=\"form-control\" placeholder=\"home address\" ng-model=\"homeAddress\" ></textarea>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Working Address</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"workingAddress\"></span>\n" +
    "                            <textarea ng-show=\"isEditMode\" class=\"form-control\" placeholder=\"working address\" ng-model=\"workingAddress\" ></textarea>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Country living in<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"countryName\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" ng-class=\"{'has-error': myForm.country.$touched && myForm.country.$invalid, 'has-success': myForm.country.$touched && myForm.country.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"country\" required ng-model=\"country\" ng-disabled=\"true\">\n" +
    "                                    <option value=\"\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.countryList track by item.pkCountryId\" ng-attr-value=\"{{item.pkCountryId}}\" ng-bind=\"item.CountryName\" ng-selected=\"country==item.pkCountryId\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.country.$touched && myForm.country.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select country.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">State<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"stateName\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" ng-class=\"{'has-error': myForm.state.$touched && myForm.state.$invalid, 'has-success': myForm.state.$touched && myForm.state.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"state\" required ng-model=\"state\">\n" +
    "                                    <option value=\"\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.stateList track by item.pkStateId\" ng-attr-value=\"{{item.pkStateId}}\" ng-bind=\"item.StateName\" ng-selected=\"state==item.pkStateId\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.state.$touched && myForm.state.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select state.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">City<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"city\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" ng-class=\"{'has-error': myForm.city.$touched && myForm.city.$invalid, 'has-success': myForm.city.$touched && myForm.city.$valid}\">\n" +
    "                                <input type=\"text\" class=\"form-control def-element-width\" name=\"city\" required placeholder=\"City\"  ng-model=\"city\" />\n" +
    "                                <div ng-messages=\"myForm.city.$touched && myForm.city.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please write city name.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label>Email<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-bind=\"emailId\"></span>\n" +
    "                            <span ng-show=\"isEditMode\" class=\"text-muted pull-right\">\n" +
    "                                <small>To edit, please contact to customer care.</small>\n" +
    "                            </span>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label>Contact Number<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-bind=\"contactNumber\"></span>\n" +
    "                            <span ng-show=\"isEditMode\" class=\"text-muted pull-right\">\n" +
    "                                <small>To edit, please contact to customer care.</small>\n" +
    "                            </span>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div ng-show=\"isEditMode\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\"></div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\">\n" +
    "                                <div id=\"captchadiv\"></div>\n" +
    "                                <button class=\"btn btn-success\" ng-click=\"updateContactDetails()\">Save</button>\n" +
    "                                <button class=\"btn btn-primary\" ng-click=\"changeMode(false)\">Cancel</button>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padb35\"></div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</form>");
  $templateCache.put("member/family-details.html",
    "<div>\n" +
    "    <h1>Family Details\n" +
    "        <small ng-show=\"!isEditMode\"><button class=\"btn btn-primary btn-sm\" ng-click=\"changeMode(true)\">Edit</button></small>\n" +
    "        <small ng-show=\"isEditMode\"><button class=\"btn btn-primary btn-sm\" ng-click=\"changeMode(false)\">Cancel Edit</button></small>\n" +
    "    </h1>\n" +
    "\n" +
    "    <div class=\"col-xs-12 col-sm-12 tab-content\">\n" +
    "        <div id=\"register-member\">\n" +
    "            <div class=\"padt20 form-horizontal\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Father Name</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"fatherName\"></span>\n" +
    "                            <input ng-show=\"isEditMode\" type=\"text\" class=\"form-control def-element-width\" placeholder=\"father name\" ng-model=\"fatherName\" />\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Father's Occupation</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"fatherOccupation\"></span>\n" +
    "                            <input ng-show=\"isEditMode\" type=\"text\" class=\"form-control def-element-width\" placeholder=\"father's occupation\" ng-model=\"fatherOccupation\" />\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Mother Name</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"motherName\"></span>\n" +
    "                            <input ng-show=\"isEditMode\" type=\"text\" class=\"form-control def-element-width\" placeholder=\"mother name\" ng-model=\"motherName\" />\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Mother's Occupation</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"motherOccupation\"></span>\n" +
    "                            <input ng-show=\"isEditMode\" type=\"text\" class=\"form-control def-element-width\" placeholder=\"mother's occupation\" ng-model=\"motherOccupation\" />\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Unmarried Brothers</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"unmarriedBrothers\"></span>\n" +
    "                            <select ng-show=\"isEditMode\" class=\"form-control def-element-width\" ng-model=\"unmarriedBrothers\" ng-options=\"item.key as item.text for item in getSiblingsList\">\n" +
    "                                <option value=\"\">None</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Married Brothers</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"marriedBrothers\"></span>\n" +
    "                            <select ng-show=\"isEditMode\" class=\"form-control def-element-width\" ng-model=\"marriedBrothers\" ng-options=\"item.key as item.text for item in getSiblingsList\">\n" +
    "                                <option value=\"\">None</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Unmarried Sisters</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"unmarriedSisters\"></span>\n" +
    "                            <select ng-show=\"isEditMode\" class=\"form-control def-element-width\" ng-model=\"unmarriedSisters\" ng-options=\"item.key as item.text for item in getSiblingsList\">\n" +
    "                                <option value=\"\">None</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Married Sisters</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"marriedSisters\"></span>\n" +
    "                            <select ng-show=\"isEditMode\" class=\"form-control def-element-width\" ng-model=\"marriedSisters\" ng-options=\"item.key as item.text for item in getSiblingsList\">\n" +
    "                                <option value=\"\">None</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">About Family</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" data-bind=\"text: aboutFamily\"></span>\n" +
    "                            <textarea ng-show=\"isEditMode\" class=\"form-control\" placeholder=\"about family\" ng-model=\"aboutFamily\" ></textarea>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div ng-show=\"isEditMode\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\"></div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\">\n" +
    "                                <div id=\"captchadiv\"></div>\n" +
    "                                <button class=\"btn btn-success\" ng-click=\"updateFamilyDetails()\">Save</button>\n" +
    "                                <button class=\"btn btn-primary\" ng-click=\"changeMode(false)\">Cancel</button>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padb35\"></div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>");
  $templateCache.put("member/horoscope.html",
    "<form name=\"myForm\">\n" +
    "    <h1>Religious/Horoscope Details\n" +
    "        <small ng-show=\"!isEditMode\"><button class=\"btn btn-primary btn-sm\" ng-click=\"changeMode(true)\">Edit</button></small>\n" +
    "        <small ng-show=\"isEditMode\"><button class=\"btn btn-primary btn-sm\" ng-click=\"changeMode(false)\">Cancel Edit</button></small>\n" +
    "    </h1>\n" +
    "\n" +
    "    <div class=\"col-xs-12 col-sm-12 tab-content\">\n" +
    "        <div id=\"register-member\">\n" +
    "            <div class=\"padt20 form-horizontal\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Sect<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"sectName\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" ng-class=\"{'has-error': myForm.sect.$touched && myForm.sect.$invalid, 'has-success': myForm.sect.$touched && myForm.sect.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"sect\" required ng-model=\"sect\" ng-change=\"facetVM.afterSectChange(sect)\">\n" +
    "                                    <option value=\"\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.sectList track by item.pkSectId\" ng-attr-value=\"{{item.pkSectId}}\" ng-bind=\"item.SectName\" ng-selected=\"sect==item.pkSectId\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.sect.$touched && myForm.sect.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select sect.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Sub Sect<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"subSectName\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" ng-class=\"{'has-error': myForm.subSect.$touched && myForm.subSect.$invalid, 'has-success': myForm.subSect.$touched && myForm.subSect.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"subSect\" required ng-model=\"subSect\">\n" +
    "                                    <option value=\"{{undefined}}\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.subSectList\" value=\"{{item.pkSubSectId}}\" ng-bind=\"item.SubSectName\" ng-selected=\"subSect==item.pkSubSectId\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.subSect.$touched && myForm.subSect.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select sub sect.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Caste</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"casteName\"></span>\n" +
    "                            <select ng-show=\"isEditMode\" class=\"form-control def-element-width\" ng-model=\"caste\" ng-options=\"item.pkCasteId as item.CasteName for item in facetVM.casteList\">\n" +
    "                                <option value=\"\">--select--</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Gotra</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"gotra\"></span>\n" +
    "                            <input ng-show=\"isEditMode\" type=\"text\" class=\"form-control def-element-width\" placeholder=\"gotra\" ng-model=\"gotra\" />\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Date of Birth<span class=\"requiredFields\"> *</span></label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"date+' '+facetVM.getObjectText(facetVM.monthList,month)+' '+year\"></span>\n" +
    "                            <div ng-show=\"isEditMode\">\n" +
    "                                <div class=\"clearfix media\">\n" +
    "                                    <div class=\"pull-left\" ng-class=\"{'has-error': myForm.dobDate.$touched && myForm.dobDate.$invalid, 'has-success': myForm.dobDate.$touched && myForm.dobDate.$valid}\">\n" +
    "                                        <select class=\"form-control clearwidth\" name=\"dobDate\" required ng-model=\"date\">\n" +
    "                                            <option value=\"\">-dd-</option>\n" +
    "                                            <option ng-repeat=\"item in facetVM.dateList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"date==item.key\"></option>\n" +
    "                                        </select>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"pull-left\" ng-class=\"{'has-error': myForm.dobMonth.$touched && myForm.dobMonth.$invalid, 'has-success': myForm.dobMonth.$touched && myForm.dobMonth.$valid}\">\n" +
    "                                        <select class=\"form-control clearwidth\" name=\"dobMonth\" required ng-model=\"month\">\n" +
    "                                            <option value=\"\">-mm-</option>\n" +
    "                                            <option ng-repeat=\"item in facetVM.monthList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"month==item.key\"></option>\n" +
    "                                        </select>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"pull-left\" ng-class=\"{'has-error': myForm.dobYear.$touched && myForm.dobYear.$invalid, 'has-success': myForm.dobYear.$touched && myForm.dobYear.$valid}\">\n" +
    "                                        <select class=\"form-control clearwidth\" name=\"dobYear\" required ng-model=\"year\">\n" +
    "                                            <option value=\"\">-yyyy-</option>\n" +
    "                                            <option ng-repeat=\"item in facetVM.yearList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"year==item.key\"></option>\n" +
    "                                        </select>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                                <div ng-messages=\"myForm.dobDate.$touched && myForm.dobDate.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select date.</div>\n" +
    "                                </div>\n" +
    "                                <div ng-messages=\"myForm.dobMonth.$touched && myForm.dobMonth.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select month.</div>\n" +
    "                                </div>\n" +
    "                                <div ng-messages=\"myForm.dobYear.$touched && myForm.dobYear.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select year.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Time of Birth</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"birthHour+':'+birthMinute+' '+birthAmPm\"></span>\n" +
    "                            <div ng-show=\"isEditMode\">\n" +
    "                                <div class=\"pull-left\">\n" +
    "                                    <select id=\"birthHour\" class=\"form-control clearwidth\" name=\"birthHour\" ng-model=\"birthHour\">\n" +
    "                                        <option value=\"\">-hour-</option>\n" +
    "                                        <option ng-repeat=\"item in facetVM.hourList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"birthHour==item.key\"></option>\n" +
    "                                    </select>\n" +
    "                                </div>\n" +
    "                                <div class=\"pull-left\">\n" +
    "                                    <select class=\"form-control clearwidth\" name=\"birthMinute\" ng-model=\"birthMinute\">\n" +
    "                                        <option value=\"\">-minutes-</option>\n" +
    "                                        <option ng-repeat=\"item in facetVM.minuteList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"birthMinute==item.key\"></option>\n" +
    "                                    </select>\n" +
    "                                </div>\n" +
    "                                <div class=\"pull-left\">\n" +
    "                                    <select class=\"form-control clearwidth\" name=\"birthAmPm\" ng-model=\"birthAmPm\" ng-options=\"item for item in facetVM.ampmList\">\n" +
    "                                        <option value=\"\">-am/pm-</option>\n" +
    "                                    </select>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Manglik</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"facetVM.getObjectText(facetVM.manglikList, manglikStatus)\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" class=\"btn-group\">\n" +
    "                                <label for=\"m_None\" class=\"btn btn-default\" ng-class=\"{'active': manglikStatus=='0'}\">\n" +
    "                                    <input type=\"radio\" id=\"m_None\" name=\"manglik\" value=\"0\" ng-model=\"manglikStatus\" />\n" +
    "                                    None </label>\n" +
    "                                &nbsp;\n" +
    "                                <label for=\"m_AanshikManglik\" class=\"btn btn-default\" ng-class=\"{'active': manglikStatus=='1'}\">\n" +
    "                                    <input type=\"radio\" id=\"m_AanshikManglik\" name=\"manglik\" value=\"1\" ng-model=\"manglikStatus\" />\n" +
    "                                    Aanshik Manglik </label>\n" +
    "                                <label for=\"m_Manglik\" class=\"btn btn-default\" ng-class=\"{'active': manglikStatus=='2'}\">\n" +
    "                                    <input type=\"radio\" id=\"m_Manglik\" name=\"manglik\" value=\"2\" ng-model=\"manglikStatus\" />\n" +
    "                                    Manglik </label>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div ng-show=\"isEditMode\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\"></div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\">\n" +
    "                                <div id=\"captchadiv\"></div>\n" +
    "                                <button class=\"btn btn-success\" ng-click=\"updateHoroscopeDetails()\">Save</button>\n" +
    "                                <button class=\"btn btn-primary\" ng-click=\"changeMode(false)\">Cancel</button>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padb35\"></div>\n" +
    "\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</form>");
  $templateCache.put("member/my-matrimony.html",
    "<form name=\"myForm\">\n" +
    "    <div class=\"clearfix\">\n" +
    "        <h1>My Matrimony Profile</h1>\n" +
    "        <p class=\"text-muted\">Below is your short profile view when sombody search for profile:-</p>\n" +
    "        <div class=\"well clearfix\">\n" +
    "            <div class=\"col-xs-12 col-sm-3 sidebar-offcanvas\" id=\"sidebar\" role=\"navigation\" >\n" +
    "                <div class=\"panel panel-default\">\n" +
    "                    <div class=\"panel-heading\">\n" +
    "                        <h3 class=\"panel-title\" ng-bind=\"memberCode\"></h3>\n" +
    "                    </div>\n" +
    "                    <div class=\"panel-body\">\n" +
    "                        <center><div class=\"bdr1 pad-reset profile-pic text-center\" ng-class=\"{'women': (sex=='0' && !profilePic), 'men': (sex=='1' && !profilePic)}\">\n" +
    "                            <img ng-if=\"profilePic\" ng-src=\"{{global.profilePicData}}\" ng-attr-title=\"{{memberName}}\" />\n" +
    "                        </div></center>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <p class=\"text-muted\">We are working on below links:</p>\n" +
    "                            <ul class=\"list-unstyled\">\n" +
    "                                <li><a ui-sref=\"userProfile.changePhoto\" title=\"change or add your profile photo\">Change/Add Photo</a></li>\n" +
    "                                <li><a ui-sref=\"userProfile\" title=\"update your profile\">Change Profile</a></li>\n" +
    "                                <li><a ui-sref=\"searchMember({memberCode: memberCode})\" title=\"how your profile will look\">View Full Profile</a></li>\n" +
    "                            </ul>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"col-xs-12 col-sm-9 \">\n" +
    "                <div >\n" +
    "                    <h2>Hi <span ng-bind=\"memberName\"></span></h2>\n" +
    "                    <p class=\"text-muted\">Your basic profile details are:</p>\n" +
    "                    <div class=\"padt5 col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"clr3 col-xs-3 col-sm-3\">Age, Height</div>\n" +
    "                        <div class=\"clrblack col-xs-9 col-sm-9\"> : <span ng-bind=\"age+' yrs,'\"></span> <span ng-bind=\"facetVM.heightInWords(height)\"></span> </div>\n" +
    "                        <div class=\"clearfix\"></div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padt5 col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"clr3 col-xs-3 col-sm-3\">Sect</div>\n" +
    "                        <div class=\"clrblack col-xs-9 col-sm-9\"> : <span ng-bind=\"sectName\"></span> </div>\n" +
    "                        <div class=\"clearfix\"></div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padt5 col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"clr3 col-xs-3 col-sm-3\">Sub Sect</div>\n" +
    "                        <div class=\"clrblack col-xs-9 col-sm-9\"> : <span ng-bind=\"subSectName\"></span> </div>\n" +
    "                        <div class=\"clearfix\"></div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padt5 col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"clr3 col-xs-3 col-sm-3\">Location</div>\n" +
    "                        <div class=\"clrblack col-xs-9 col-sm-9\"> : <span ng-bind=\"city+', '+stateName+', '+countryName\"></span> </div>\n" +
    "                        <div class=\"clearfix\"></div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padt5 col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"clr3 col-xs-3 col-sm-3\">Education</div>\n" +
    "                        <div class=\"clrblack col-xs-9 col-sm-9\"> : <span ng-bind=\"educationName\"></span> </div>\n" +
    "                        <div class=\"clearfix\"></div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padt5 col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"clr3 col-xs-3 col-sm-3\">Occupation</div>\n" +
    "                        <div class=\"clrblack col-xs-9 col-sm-9\"> : <span ng-bind=\"occupationName\"></span> </div>\n" +
    "                        <div class=\"clearfix\"></div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"col-xs-12 col-sm-12\">\n" +
    "                    <h3>About Me</h3>\n" +
    "                    <p ng-bind=\"aboutMe\"></p>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "\n" +
    "        </div>\n" +
    "        <div class=\"clearfix\"></div>\n" +
    "    </div>\n" +
    "</form>\n" +
    "<div ng-include=\"'search/quickSearch.html'\"></div>\n" +
    "");
  $templateCache.put("member/partner-preference.html",
    "<div>\n" +
    "    <h1>Partner Preference\n" +
    "        <small ng-show=\"!isEditMode\"><button class=\"btn btn-primary btn-sm\" ng-click=\"changeMode(true)\">Edit</button></small>\n" +
    "        <small ng-show=\"isEditMode\"><button class=\"btn btn-primary btn-sm\" ng-click=\"changeMode(false)\">Cancel Edit</button></small>\n" +
    "    </h1>\n" +
    "\n" +
    "    <div class=\"col-xs-12 col-sm-12 tab-content\">\n" +
    "        <div id=\"register-member\">\n" +
    "            <div class=\"padt20 form-horizontal\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Willing to marry from the same/other sub sect</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"(marryInSameSect==1)?'same':'other also'\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" class=\"btn-group\">\n" +
    "                                <label for=\"marrySame_Yes\" class=\"btn btn-default\" ng-class=\"{'active': marryInSameSect=='1'}\">\n" +
    "                                    <input type=\"radio\" id=\"marrySame_Yes\" name=\"marryInSameSect\" value=\"1\" ng-model=\"marryInSameSect\" />\n" +
    "                                    Willing to marry from the same sub sect </label>\n" +
    "                                <label for=\"marrySame_No\" class=\"btn btn-default\" ng-class=\"{'active': marryInSameSect=='2'}\">\n" +
    "                                    <input type=\"radio\" id=\"marrySame_No\" name=\"marryInSameSect\" value=\"2\" ng-model=\"marryInSameSect\" />\n" +
    "                                    Willing to marry from other sub sect also </label>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">About My Partner</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"aboutMyPartner\"></span>\n" +
    "                            <textarea ng-show=\"isEditMode\" class=\"form-control\" placeholder=\"write something about your partner preferance\" ng-model=\"aboutMyPartner\" ></textarea>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div ng-show=\"isEditMode\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\"></div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\">\n" +
    "                                <div id=\"captchadiv\"></div>\n" +
    "                                <button class=\"btn btn-success\" ng-click=\"updatePartnerPreferences()\">Save</button>\n" +
    "                                <button class=\"btn btn-primary\" ng-click=\"changeMode(false)\">Cancel</button>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padb35\"></div>\n" +
    "\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>");
  $templateCache.put("member/professional-details.html",
    "<div>\n" +
    "    <h1>Professional Details\n" +
    "        <small ng-show=\"!isEditMode\"><button class=\"btn btn-primary btn-sm\" ng-click=\"changeMode(true)\">Edit</button></small>\n" +
    "        <small ng-show=\"isEditMode\"><button class=\"btn btn-primary btn-sm\" ng-click=\"changeMode(false)\">Cancel Edit</button></small>\n" +
    "    </h1>\n" +
    "\n" +
    "    <div class=\"col-xs-12 col-sm-12 tab-content\">\n" +
    "        <div id=\"register-member\">\n" +
    "            <div class=\"padt20 form-horizontal\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Education</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"educationName\"></span>\n" +
    "                            <div ng-show=\"isEditMode\">\n" +
    "                                <select class=\"form-control def-element-width\" ng-model=\"education\" ng-options=\"item.pkCourseId as item.CourseName group by item.group for item in facetVM.educationList\">\n" +
    "                                    <option value=\"\">--select--</option>\n" +
    "                                </select>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Employed In</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"facetVM.getObjectText(facetVM.employedInList, employedIn)\"></span>\n" +
    "                            <div ng-show=\"isEditMode\" class=\"btn-group\">\n" +
    "                                <label for=\"emp_Government\" class=\"btn btn-default\" ng-class=\"{'active': employedIn=='1'}\">\n" +
    "                                    <input type=\"radio\" id=\"emp_Government\" name=\"employedIn\" value=\"1\" ng-model=\"employedIn\" />\n" +
    "                                    Government </label>\n" +
    "                                <label for=\"emp_Defence\" class=\"btn btn-default\" ng-class=\"{'active': employedIn=='2'}\">\n" +
    "                                    <input type=\"radio\" id=\"emp_Defence\" name=\"employedIn\" value=\"2\" ng-model=\"employedIn\" />\n" +
    "                                    Defence </label>\n" +
    "                                <label for=\"emp_Private\" class=\"btn btn-default\" ng-class=\"{'active': employedIn=='3'}\">\n" +
    "                                    <input type=\"radio\" id=\"emp_Private\" name=\"employedIn\" value=\"3\" ng-model=\"employedIn\" />\n" +
    "                                    Private </label>\n" +
    "                                <label for=\"emp_Business\" class=\"btn btn-default\" ng-class=\"{'active': employedIn=='4'}\">\n" +
    "                                    <input type=\"radio\" id=\"emp_Business\" name=\"employedIn\" value=\"4\" ng-model=\"employedIn\" />\n" +
    "                                    Business </label>\n" +
    "                                <label for=\"emp_Employed\" class=\"btn btn-default\" ng-class=\"{'active': employedIn=='5'}\">\n" +
    "                                    <input type=\"radio\" id=\"emp_Employed\" name=\"employedIn\" value=\"5\" ng-model=\"employedIn\" />\n" +
    "                                    Self Employed </label>\n" +
    "                                <label for=\"emp_Working\" class=\"btn btn-default\" ng-class=\"{'active': employedIn=='6'}\">\n" +
    "                                    <input type=\"radio\" id=\"emp_Working\" name=\"employedIn\" value=\"6\" ng-model=\"employedIn\" />\n" +
    "                                    Not Working </label>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Occupation</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"occupationName\"></span>\n" +
    "                            <div ng-show=\"isEditMode\">\n" +
    "                                <select class=\"form-control def-element-width\" ng-model=\"occupation\" ng-options=\"item.pkOccupationId as item.OccupationName group by item.group for item in facetVM.occupationList\">\n" +
    "                                    <option value=\"\">--select--</option>\n" +
    "                                </select>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label ng-class=\"{'control-label':isEditMode}\">Annual Income</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <span ng-show=\"!isEditMode\" ng-bind=\"annualIncome\"></span>\n" +
    "                            <input ng-show=\"isEditMode\" type=\"text\" class=\"form-control def-element-width\" placeholder=\"annual Income\" ng-model=\"annualIncome\" />\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div ng-show=\"isEditMode\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\"></div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\">\n" +
    "                                <div id=\"captchadiv\"></div>\n" +
    "                                <button class=\"btn btn-success\" ng-click=\"updateProfessionalDetails()\">Save</button>\n" +
    "                                <button class=\"btn btn-primary\" ng-click=\"changeMode(false)\">Cancel</button>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padb35\"></div>\n" +
    "\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>");
  $templateCache.put("member/user-profile.html",
    "<div class=\"padt30\">\n" +
    "    <div class=\"col-xs-6 col-sm-3\">\n" +
    "        <div class=\"panel panel-default\">\n" +
    "\n" +
    "            <div class=\"panel-body\">\n" +
    "                <center><div class=\"bdr1 pad-reset profile-pic text-center\" ng-class=\"{'women': (user.Sex=='0' && !user.ProfilePic), 'men': (user.Sex=='1' && !user.ProfilePic)}\">\n" +
    "                    <img ng-if=\"user.ProfilePic\" ng-src=\"{{global.profilePicData}}\" ng-attr-title=\"{{user.MemberName}}\" />\n" +
    "                </div></center>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"panel panel-default\">\n" +
    "            <div class=\"panel-heading\">\n" +
    "                <h3 class=\"panel-title\">Member Profile</h3>\n" +
    "            </div>\n" +
    "            <div class=\"panel-body\">\n" +
    "                <div>\n" +
    "                    <p> You can modify/change your profile details:- </p>\n" +
    "                </div>\n" +
    "                <div>\n" +
    "                    <ul class=\"nav nav-pills nav-stacked\">\n" +
    "                        <li ui-sref-active=\"active\"><a ui-sref=\"userProfile.basicDetails\">Basic Details</a></li>\n" +
    "                        <li ui-sref-active=\"active\"><a ui-sref=\"userProfile.horoscope\">Religious/Horoscope</a></li>\n" +
    "                        <li ui-sref-active=\"active\"><a ui-sref=\"userProfile.professionalDetails\">Professional &amp; Occupation</a></li>\n" +
    "                        <li ui-sref-active=\"active\"><a ui-sref=\"userProfile.familyDetails\">Family Details</a></li>\n" +
    "                        <li ui-sref-active=\"active\"><a ui-sref=\"userProfile.partnerPreference\">Partner Preference</a></li>\n" +
    "                        <li ui-sref-active=\"active\"><a ui-sref=\"userProfile.contactDetails\">Location/Contact Details</a></li>\n" +
    "                        <li ui-sref-active=\"active\"><a ui-sref=\"userProfile.changePhoto\">Change Profile Photo</a></li>\n" +
    "                        <li ui-sref-active=\"active\"><a ui-sref=\"userProfile.changePassword\">Change Password</a></li>\n" +
    "                        <!-- <li ui-sref-active=\"active\"><a ui-sref=\"userProfile.deactivateProfile\">Deactivate Profile</a></li> -->\n" +
    "                    </ul>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"col-xs-12 col-sm-9\">\n" +
    "        <div ui-view></div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "");
  $templateCache.put("register/confirmation.html",
    "<div class=\"panel panel-primary\">\n" +
    "    <div class=\"panel-heading\">\n" +
    "        <div class=\"panel-title\"><h2>Congrats! <span ng-bind=\"userDetails.member.MemberName\"></span></h2></div>\n" +
    "        <h5>You have successfully registered with BJM Matrimony.</h5>\n" +
    "    </div>\n" +
    "    <div class=\"panel-body\">\n" +
    "        <h4><u>Your Login Details</u></h4>\n" +
    "        <h4><span class=\"label label-primary\">Your Matrimony ID: <strong ng-bind=\"userDetails.member.MemberCode\"></strong></span></h4>\n" +
    "        <p>\n" +
    "            Henceforth please use above matrimony ID to login to your profile at <strong><a href=\"http://www.jainmilanmatrimonial.com\">http://www.jainmilanmatrimonial.com</a></strong>.\n" +
    "            A confirmation e-mail has been sent to your registered e-mail.\n" +
    "            <br />\n" +
    "            Please <a ui-sref=\"login\">login</a> to see or update your profile.\n" +
    "        </p>\n" +
    "        <h5 class=\"text-primary\">\n" +
    "            Your profile will be activated and available in search with in 24 to 48 hours.\n" +
    "            In the mean time, you can login with your credentials and update your details.\n" +
    "        </h5>\n" +
    "    </div>\n" +
    "</div>");
  $templateCache.put("register/member-profile.html",
    "<div ng-controller=\"MemberProfileCtrl\">\n" +
    "    <form name=\"myForm\">\n" +
    "        <h3>Add your personal details</h3>\n" +
    "        <p>We recommend you add more details about you, your life style and family to get exactly matching profiles.</p>\n" +
    "        <div class=\"panel panel-default\">\n" +
    "            <div class=\"panel-heading\">\n" +
    "                <label class=\"panel-title\">Appearance</label>\n" +
    "            </div>\n" +
    "            <div class=\"panel-body\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Weight</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control def-element-width\" ng-model=\"profile.weight\" ng-options=\"item.key as item.text for item in facetVM.weightList\">\n" +
    "                                <option value=\"\">--select--</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Body Type</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10 btn-group\">\n" +
    "                            <label for=\"b_Slim\" class=\"btn btn-default\" ng-class=\"{'active': profile.bodyType=='1'}\">\n" +
    "                                <input type=\"radio\" id=\"b_Slim\" name=\"bodytype\" value=\"1\" ng-model=\"profile.bodyType\" />\n" +
    "                                Slim </label>\n" +
    "                            &nbsp;\n" +
    "                            <label for=\"b_Athletic\" class=\"btn btn-default\" ng-class=\"{'active': profile.bodyType=='2'}\">\n" +
    "                                <input type=\"radio\" id=\"b_Athletic\" name=\"bodytype\" value=\"2\" ng-model=\"profile.bodyType\" />\n" +
    "                                Athletic </label>\n" +
    "                            <label for=\"b_Average\" class=\"btn btn-default\" ng-class=\"{'active': profile.bodyType=='3'}\">\n" +
    "                                <input type=\"radio\" id=\"b_Average\" name=\"bodytype\" value=\"3\" ng-model=\"profile.bodyType\" />\n" +
    "                                Average </label>\n" +
    "                            <label for=\"b_Heavy\" class=\"btn btn-default\" ng-class=\"{'active': profile.bodyType=='4'}\">\n" +
    "                                <input type=\"radio\" id=\"b_Heavy\" name=\"bodytype\" value=\"4\" ng-model=\"profile.bodyType\" />\n" +
    "                                Heavy </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Complexion</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10 btn-group\">\n" +
    "                            <label for=\"c_VeryFair\" class=\"btn btn-default\" ng-class=\"{'active': profile.complexion=='1'}\">\n" +
    "                                <input type=\"radio\" id=\"c_VeryFair\" name=\"complexion\" value=\"1\" ng-model=\"profile.complexion\" />\n" +
    "                                Very Fair </label>\n" +
    "                            &nbsp;\n" +
    "                            <label for=\"c_Fair\" class=\"btn btn-default\" ng-class=\"{'active': profile.complexion=='2'}\">\n" +
    "                                <input type=\"radio\" id=\"c_Fair\" name=\"complexion\" value=\"2\" ng-model=\"profile.complexion\" />\n" +
    "                                Fair </label>\n" +
    "                            <label for=\"c_Wheatish\" class=\"btn btn-default\" ng-class=\"{'active': profile.complexion=='3'}\">\n" +
    "                                <input type=\"radio\" id=\"c_Wheatish\" name=\"complexion\" value=\"3\" ng-model=\"profile.complexion\" />\n" +
    "                                Wheatish </label>\n" +
    "                            <label for=\"c_WheatishBrown\" class=\"btn btn-default\" ng-class=\"{'active': profile.complexion=='4'}\">\n" +
    "                                <input type=\"radio\" id=\"c_WheatishBrown\" name=\"complexion\" value=\"4\" ng-model=\"profile.complexion\" />\n" +
    "                                Wheatish Brown </label>\n" +
    "                            <label for=\"c_Dark\" class=\"btn btn-default\" ng-class=\"{'active': profile.complexion=='5'}\">\n" +
    "                                <input type=\"radio\" id=\"c_Dark\" name=\"complexion\" value=\"5\" ng-model=\"profile.complexion\" />\n" +
    "                                Dark </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Physical Status</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10 btn-group\">\n" +
    "                            <label for=\"ps_Normal\" class=\"btn btn-default\" ng-class=\"{'active': profile.physicalStatus=='0'}\">\n" +
    "                                <input type=\"radio\" id=\"ps_Normal\" name=\"physicalStatus\" value=\"0\" ng-model=\"profile.physicalStatus\" />\n" +
    "                                Normal </label>\n" +
    "                            <label for=\"ps_Challenged\" class=\"btn btn-default\" ng-class=\"{'active': profile.physicalStatus=='1'}\">\n" +
    "                                <input type=\"radio\" id=\"ps_Challenged\" name=\"physicalStatus\" value=\"1\" ng-model=\"profile.physicalStatus\" />\n" +
    "                                Physically Challenged </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"panel panel-default\">\n" +
    "            <div class=\"panel-heading\">\n" +
    "                <label class=\"panel-title\">Personal Details</label>\n" +
    "            </div>\n" +
    "            <div class=\"panel-body\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">About Me</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <textarea class=\"form-control\" placeholder=\"write something about yourself\" ng-model=\"profile.aboutMe\" ></textarea>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Home Address</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <textarea class=\"form-control\" placeholder=\"home address\" ng-model=\"profile.homeAddress\" ></textarea>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Working Address</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <textarea class=\"form-control\" placeholder=\"working address\" ng-model=\"profile.workingAddress\" ></textarea>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Annual Income</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <input type=\"text\" class=\"form-control def-element-width\" placeholder=\"annual Income\" ng-model=\"profile.annualIncome\" />\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"panel panel-default\">\n" +
    "            <div class=\"panel-heading\">\n" +
    "                <label class=\"panel-title\">Marry Preferances</label>\n" +
    "            </div>\n" +
    "            <div class=\"panel-body\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Marry In Same Sub Sect</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10 btn-group\">\n" +
    "                            <label for=\"marrySame_Yes\" class=\"btn btn-default\" ng-class=\"{'active': profile.marryInSameSect=='1'}\">\n" +
    "                                <input type=\"radio\" id=\"marrySame_Yes\" name=\"marryInSameSect\" value=\"1\" ng-model=\"profile.marryInSameSect\" />\n" +
    "                                Willing to marry from the same sub sect </label>\n" +
    "                            <label for=\"marrySame_No\" class=\"btn btn-default\" ng-class=\"{'active': profile.marryInSameSect=='2'}\">\n" +
    "                                <input type=\"radio\" id=\"marrySame_No\" name=\"marryInSameSect\" value=\"2\" ng-model=\"profile.marryInSameSect\" />\n" +
    "                                Willing to marry from other sub sect also </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">About My Partner</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <textarea class=\"form-control\" placeholder=\"write something about your partner preferance\" ng-model=\"profile.aboutMyPartner\" ></textarea>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"panel panel-default\">\n" +
    "            <div class=\"panel-heading\">\n" +
    "                <label class=\"panel-title\">Horoscope</label>\n" +
    "            </div>\n" +
    "            <div class=\"panel-body\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Birth Time</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <div class=\"clearfix media\">\n" +
    "                                <div class=\"pull-left\">\n" +
    "                                    <select id=\"birthHour\" class=\"form-control\" ng-model=\"profile.birthHour\" ng-options=\"item.key as item.text for item in facetVM.hourList\">\n" +
    "                                        <option value=\"\">--hour--</option>\n" +
    "                                    </select>\n" +
    "                                </div>\n" +
    "                                <div class=\"pull-left\">\n" +
    "                                    <select class=\"form-control\" ng-model=\"profile.birthMinute\" ng-options=\"item.key as item.text for item in facetVM.minuteList\">\n" +
    "                                        <option value=\"\">--minute--</option>\n" +
    "                                    </select>\n" +
    "                                </div>\n" +
    "                                <div class=\"pull-left\">\n" +
    "                                    <select class=\"form-control\" ng-model=\"profile.birthAmPm\" ng-options=\"item for item in facetVM.ampmList track by item\">\n" +
    "                                        <option value=\"\">--am/pm--</option>\n" +
    "                                    </select>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Caste</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control def-element-width\" ng-model=\"profile.caste\" ng-options=\"item.pkCasteId as item.CasteName for item in facetVM.casteList\">\n" +
    "                                <option value=\"\">--select--</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Gotra</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <input type=\"text\" class=\"form-control def-element-width\" placeholder=\"gotra\" ng-model=\"profile.gotra\" />\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Manglik</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10 btn-group\">\n" +
    "                            <label for=\"m_None\" class=\"btn btn-default\" ng-class=\"{'active': profile.manglikStatus=='0'}\">\n" +
    "                                <input type=\"radio\" id=\"m_None\" name=\"manglik\" value=\"0\" ng-model=\"profile.manglikStatus\" />\n" +
    "                                None </label>\n" +
    "                            &nbsp;\n" +
    "                            <label for=\"m_AanshikManglik\" class=\"btn btn-default\" ng-class=\"{'active': profile.manglikStatus=='1'}\">\n" +
    "                                <input type=\"radio\" id=\"m_AanshikManglik\" name=\"manglik\" value=\"1\" ng-model=\"profile.manglikStatus\" />\n" +
    "                                Aanshik Manglik </label>\n" +
    "                            <label for=\"m_Manglik\" class=\"btn btn-default\" ng-class=\"{'active': profile.manglikStatus=='2'}\">\n" +
    "                                <input type=\"radio\" id=\"m_Manglik\" name=\"manglik\" value=\"2\" ng-model=\"profile.manglikStatus\" />\n" +
    "                                Manglik </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"panel panel-default\">\n" +
    "            <div class=\"panel-heading\">\n" +
    "                <label class=\"panel-title\">Professional Details</label>\n" +
    "            </div>\n" +
    "            <div class=\"panel-body\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Education</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control def-element-width\" ng-model=\"profile.education\" ng-options=\"item.pkCourseId as item.CourseName group by item.group for item in facetVM.educationList\">\n" +
    "                                <option value=\"\">--select--</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Employed In</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10 btn-group\">\n" +
    "                            <label for=\"emp_Government\" class=\"btn btn-default\" ng-class=\"{'active': profile.employedIn=='1'}\">\n" +
    "                                <input type=\"radio\" id=\"emp_Government\" name=\"employedIn\" value=\"1\" ng-model=\"profile.employedIn\" />\n" +
    "                                Government </label>\n" +
    "                            <label for=\"emp_Defence\" class=\"btn btn-default\" ng-class=\"{'active': profile.employedIn=='2'}\">\n" +
    "                                <input type=\"radio\" id=\"emp_Defence\" name=\"employedIn\" value=\"2\" ng-model=\"profile.employedIn\" />\n" +
    "                                Defence </label>\n" +
    "                            <label for=\"emp_Private\" class=\"btn btn-default\" ng-class=\"{'active': profile.employedIn=='3'}\">\n" +
    "                                <input type=\"radio\" id=\"emp_Private\" name=\"employedIn\" value=\"3\" ng-model=\"profile.employedIn\" />\n" +
    "                                Private </label>\n" +
    "                            <label for=\"emp_Business\" class=\"btn btn-default\" ng-class=\"{'active': profile.employedIn=='4'}\">\n" +
    "                                <input type=\"radio\" id=\"emp_Business\" name=\"employedIn\" value=\"4\" ng-model=\"profile.employedIn\" />\n" +
    "                                Business </label>\n" +
    "                            <label for=\"emp_Employed\" class=\"btn btn-default\" ng-class=\"{'active': profile.employedIn=='5'}\">\n" +
    "                                <input type=\"radio\" id=\"emp_Employed\" name=\"employedIn\" value=\"5\" ng-model=\"profile.employedIn\" />\n" +
    "                                Self Employed </label>\n" +
    "                            <label for=\"emp_Working\" class=\"btn btn-default\" ng-class=\"{'active': profile.employedIn=='6'}\">\n" +
    "                                <input type=\"radio\" id=\"emp_Working\" name=\"employedIn\" value=\"6\" ng-model=\"profile.employedIn\" />\n" +
    "                                Not Working </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Occupation</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control def-element-width\" ng-model=\"profile.occupation\" ng-options=\"item.pkOccupationId as item.OccupationName group by item.group for item in facetVM.occupationList\">\n" +
    "                                <option value=\"\">--select--</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"panel panel-default\">\n" +
    "            <div class=\"panel-heading\">\n" +
    "                <label class=\"panel-title\">Family Details</label>\n" +
    "            </div>\n" +
    "            <div class=\"panel-body\">\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Father Name</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <input type=\"text\" class=\"form-control def-element-width\" placeholder=\"father name\" ng-model=\"profile.fatherName\" />\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Father's Occupation</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <input type=\"text\" class=\"form-control def-element-width\" placeholder=\"father's occupation\" ng-model=\"profile.fatherOccupation\" />\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Mother Name</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <input type=\"text\" class=\"form-control def-element-width\" placeholder=\"mother name\" ng-model=\"profile.motherName\" />\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Mother's Occupation</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <input type=\"text\" class=\"form-control def-element-width\" placeholder=\"mother's occupation\" ng-model=\"profile.motherOccupation\" />\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Unmarried Brothers</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control def-element-width\" ng-model=\"profile.unmarriedBrothers\" ng-options=\"item.key as item.text for item in getSiblingsList\">\n" +
    "                                <option value=\"\">None</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Married Brothers</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control def-element-width\" ng-model=\"profile.marriedBrothers\" ng-options=\"item.key as item.text for item in getSiblingsList\">\n" +
    "                                <option value=\"\">None</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Unmarried Sisters</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control def-element-width\" ng-model=\"profile.unmarriedSisters\" ng-options=\"item.key as item.text for item in getSiblingsList\">\n" +
    "                                <option value=\"\">None</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Married Sisters</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control def-element-width\" ng-model=\"profile.marriedSisters\" ng-options=\"item.key as item.text for item in getSiblingsList\">\n" +
    "                                <option value=\"\">None</option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">About Family</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <textarea class=\"form-control\" placeholder=\"about family\" ng-model=\"profile.aboutFamily\" ></textarea>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div>\n" +
    "            <div class=\"row\">\n" +
    "                <div class=\"padt10\">\n" +
    "                    <div class=\"col-xs-12 col-sm-2\"></div>\n" +
    "                    <div class=\"col-xs-12 col-sm-10\">\n" +
    "                        <button class=\"btn btn-success\" ng-click=\"saveProfile()\" ng-disabled=\"disableButton\">Save</button>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"padb35\"></div>\n" +
    "        <div ng-if=\"message\">\n" +
    "            <div class=\"alert alert-danger alert-dismissable\">\n" +
    "                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
    "                <span ng-bind=\"message\"></span>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </form>\n" +
    "</div>\n" +
    "");
  $templateCache.put("register/register-member.html",
    "<div ng-controller=\"RegistrationCtrl\">\n" +
    "    <form name=\"myForm\">\n" +
    "        <div class=\"col-xs-12 col-sm-12 tab-content\">\n" +
    "            <div id=\"register-member\">\n" +
    "                <div class=\"padt20 form-horizontal\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Registered by<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.registerdBy.$touched && myForm.registerdBy.$invalid, 'has-success': myForm.registerdBy.$touched && myForm.registerdBy.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"registerdBy\" ng-model=\"registeredBy\" required>\n" +
    "                                    <option value=\"\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.registeredByList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"registeredBy==item.key\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.registerdBy.$touched && myForm.registerdBy.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select the profile registered by.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Name<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.memberName.$touched && myForm.memberName.$invalid, 'has-success': myForm.memberName.$touched && myForm.memberName.$valid}\">\n" +
    "                                <input type=\"text\" class=\"form-control def-element-width\" name=\"memberName\" required placeholder=\"Name\" ng-model=\"memberName\" />\n" +
    "                                <div ng-messages=\"myForm.memberName.$touched && myForm.memberName.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please write your name.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Gender<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10 btn-group\">\n" +
    "                                <label for=\"gendermale\" class=\"btn btn-default\" ng-class=\"{'active': sex=='1'}\">\n" +
    "                                    <input type=\"radio\" id=\"gendermale\" name=\"gender\" value=\"1\" ng-model=\"sex\" />\n" +
    "                                    Male </label>\n" +
    "                                &nbsp;\n" +
    "                                <label for=\"genderfemale\" class=\"btn btn-default\" ng-class=\"{'active': sex=='0'}\">\n" +
    "                                    <input type=\"radio\" id=\"genderfemale\" name=\"gender\" value=\"0\" ng-model=\"sex\" />\n" +
    "                                    Female </label>\n" +
    "\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Date of birth<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\">\n" +
    "                                <div class=\"clearfix media\">\n" +
    "                                    <div class=\"pull-left\" ng-class=\"{'has-error': myForm.dobDate.$touched && myForm.dobDate.$invalid, 'has-success': myForm.dobDate.$touched && myForm.dobDate.$valid}\">\n" +
    "                                        <select class=\"form-control clearwidth\" name=\"dobDate\" required ng-model=\"date\">\n" +
    "                                            <option value=\"\">-dd-</option>\n" +
    "                                            <option ng-repeat=\"item in facetVM.dateList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"date==item.key\"></option>\n" +
    "                                        </select>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"pull-left\" ng-class=\"{'has-error': myForm.dobMonth.$touched && myForm.dobMonth.$invalid, 'has-success': myForm.dobMonth.$touched && myForm.dobMonth.$valid}\">\n" +
    "                                        <select class=\"form-control clearwidth\" name=\"dobMonth\" required ng-model=\"month\">\n" +
    "                                            <option value=\"\">-mm-</option>\n" +
    "                                            <option ng-repeat=\"item in facetVM.monthList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"month==item.key\"></option>\n" +
    "                                        </select>\n" +
    "                                    </div>\n" +
    "                                    <div class=\"pull-left\" ng-class=\"{'has-error': myForm.dobYear.$touched && myForm.dobYear.$invalid, 'has-success': myForm.dobYear.$touched && myForm.dobYear.$valid}\">\n" +
    "                                        <select class=\"form-control clearwidth\" name=\"dobYear\" required ng-model=\"year\">\n" +
    "                                            <option value=\"\">-yyyy-</option>\n" +
    "                                            <option ng-repeat=\"item in facetVM.yearList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"year==item.key\"></option>\n" +
    "                                        </select>\n" +
    "                                    </div>\n" +
    "                                </div>\n" +
    "                                <div ng-messages=\"myForm.dobDate.$touched && myForm.dobDate.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select date.</div>\n" +
    "                                </div>\n" +
    "                                <div ng-messages=\"myForm.dobMonth.$touched && myForm.dobMonth.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select month.</div>\n" +
    "                                </div>\n" +
    "                                <div ng-messages=\"myForm.dobYear.$touched && myForm.dobYear.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select year.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Height<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.height.$touched && myForm.height.$invalid, 'has-success': myForm.height.$touched && myForm.height.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"height\" ng-model=\"height\" required ng-options=\"item.key as item.text for item in facetVM.heightList\">\n" +
    "                                    <option value=\"\">--select--</option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.height.$touched && myForm.height.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select height.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Marital Status<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.maritalStatus.$touched && myForm.maritalStatus.$invalid, 'has-success': myForm.maritalStatus.$touched && myForm.maritalStatus.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"maritalStatus\" required ng-model=\"maritalStatus\">\n" +
    "                                    <option value=\"\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.maritalStatusList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"maritalStatus==item.key\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.maritalStatus.$touched && myForm.maritalStatus.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select marital status.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Sect<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.sect.$touched && myForm.sect.$invalid, 'has-success': myForm.sect.$touched && myForm.sect.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"sect\" required ng-model=\"sect\" ng-change=\"facetVM.afterSectChange(sect)\">\n" +
    "                                    <option value=\"\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.sectList track by item.pkSectId\" ng-attr-value=\"{{item.pkSectId}}\" ng-bind=\"item.SectName\" ng-selected=\"sect==item.pkSectId\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.sect.$touched && myForm.sect.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select sect.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Sub Sect<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.subSect.$touched && myForm.subSect.$invalid, 'has-success': myForm.subSect.$touched && myForm.subSect.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"subSect\" required ng-model=\"subSect\">\n" +
    "                                    <option value=\"\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.subSectList track by item.pkSubSectId\" ng-attr-value=\"{{item.pkSubSectId}}\" ng-bind=\"item.SubSectName\" ng-selected=\"subSect==item.pkSubSectId\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.subSect.$touched && myForm.subSect.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select sub sect.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Mother Tongue<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.motherTongue.$touched && myForm.motherTongue.$invalid, 'has-success': myForm.motherTongue.$touched && myForm.motherTongue.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"motherTongue\" required ng-model=\"motherTongue\">\n" +
    "                                    <option value=\"\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.motherTongueList track by item.pkTongueId\" ng-attr-value=\"{{item.pkTongueId}}\" ng-bind=\"item.TongueName\" ng-selected=\"motherTongue==item.pkTongueId\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.motherTongue.$touched && myForm.motherTongue.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select mother tongue.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Country living in<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.country.$touched && myForm.country.$invalid, 'has-success': myForm.country.$touched && myForm.country.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"country\" required ng-model=\"country\" ng-disabled=\"true\">\n" +
    "                                    <option value=\"\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.countryList track by item.pkCountryId\" ng-attr-value=\"{{item.pkCountryId}}\" ng-bind=\"item.CountryName\" ng-selected=\"country==item.pkCountryId\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.country.$touched && myForm.country.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select country.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">State<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.state.$touched && myForm.state.$invalid, 'has-success': myForm.state.$touched && myForm.state.$valid}\">\n" +
    "                                <select class=\"form-control def-element-width\" name=\"state\" required ng-model=\"state\">\n" +
    "                                    <option value=\"\">--Select--</option>\n" +
    "                                    <option ng-repeat=\"item in facetVM.stateList track by item.pkStateId\" ng-attr-value=\"{{item.pkStateId}}\" ng-bind=\"item.StateName\" ng-selected=\"state==item.pkStateId\"></option>\n" +
    "                                </select>\n" +
    "                                <div ng-messages=\"myForm.state.$touched && myForm.state.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please select state.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">City<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.city.$touched && myForm.city.$invalid, 'has-success': myForm.city.$touched && myForm.city.$valid}\">\n" +
    "                                <input type=\"text\" class=\"form-control def-element-width\" name=\"city\" required placeholder=\"City\" ng-model=\"city\" />\n" +
    "                                <div ng-messages=\"myForm.city.$touched && myForm.city.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please write city name.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Contact Number<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.contactNumber.$touched && myForm.contactNumber.$invalid, 'has-success': myForm.contactNumber.$touched && myForm.contactNumber.$valid}\">\n" +
    "                                <div class=\"input-group\">\n" +
    "                                    <span class=\"input-group-addon\">+91</span>\n" +
    "                                    <input type=\"text\" class=\"form-control def-element-width\" name=\"contactNumber\" required placeholder=\"contact number\" ng-pattern=\"/^\\d{10}$/\" ng-model=\"contactNumber\" />\n" +
    "                                </div>\n" +
    "                                <span class=\"text-muted\">Hint: 99xxxxxxxx</span>\n" +
    "                                <div ng-messages=\"myForm.contactNumber.$touched && myForm.contactNumber.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please write contact number.</div>\n" +
    "                                    <div ng-message=\"pattern\">Please write valid contact number.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">E-mail<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.email.$touched && myForm.email.$invalid, 'has-success': myForm.email.$touched && myForm.email.$valid}\">\n" +
    "                                <input type=\"email\" class=\"form-control def-element-width\" name=\"email\" required placeholder=\"(ex: xyz@abc.com)\" ng-model=\"emailId\" ng-focus=\"isFocusEmail\" />\n" +
    "                                <div ng-messages=\"myForm.email.$touched && myForm.email.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please write email address.</div>\n" +
    "                                    <div ng-message=\"email\">Please write a vaild email address.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Password<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.password.$touched && myForm.password.$invalid, 'has-success': myForm.password.$touched && myForm.password.$valid}\">\n" +
    "\n" +
    "                                <input type=\"password\" placeholder=\"password\" name=\"password\" required class=\"form-control def-element-width\" ng-model=\"password\" ng-minlength=\"8\" />\n" +
    "                                <span style=\"display:none\" class=\"help-inline\" ng-show=\"passwordStrength != undefined\">\n" +
    "                                    <b ng-style=\"{color:passwordColor}\">Strength:</b> <span ng-bind=\"passwordStrength\">0</span>%\n" +
    "                                </span>\n" +
    "                                <div ng-messages=\"myForm.password.$touched && myForm.password.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please write password.</div>\n" +
    "                                    <div ng-message=\"minlength\">Password should be minimum 8 characters.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">Confirm Password<span class=\"requiredFields\"> *</span></label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': myForm.confirmPassword.$touched && myForm.confirmPassword.$invalid, 'has-success': myForm.confirmPassword.$touched && myForm.confirmPassword.$valid}\">\n" +
    "                                <input type=\"password\" placeholder=\"password again\" name=\"confirmPassword\" required class=\"form-control def-element-width\" ng-pattern=\"{{password}}\" ng-model=\"confirmPassword\" ng-minlength=\"8\">\n" +
    "                                <div ng-messages=\"myForm.confirmPassword.$touched && myForm.confirmPassword.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please write password.</div>\n" +
    "                                    <div ng-message=\"minlength\">Password should be minimum 8 characters.</div>\n" +
    "                                    <div ng-message=\"pattern\">Password and confirm password should match.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\">\n" +
    "                                <label class=\"label-normal\">\n" +
    "                                    <checkbox ng-model=\"termsConditions\" ></checkbox>\n" +
    "                                    I agree to the <a href=\"#nogo\" class=\"link\" data-toggle=\"modal\" data-target=\"#privacyPolicy\">Privacy Policy</a>\n" +
    "                                    and\n" +
    "                                    <a href=\"#nogo\" class=\"link\" data-toggle=\"modal\" data-target=\"#termsConditions\">Terms &amp; Conditions</a>\n" +
    "                                </label>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\"></div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\">\n" +
    "                                <div id=\"captchadiv\"></div>\n" +
    "                                <button class=\"btn btn-success\" ng-click=\"registerUser()\" ng-disabled=\"!termsConditions || disableButton || myForm.$invalid\">Register and proceed to next step</button>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padb35\"></div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "    </form>\n" +
    "    <div ng-include=\"'register/register-modal.html'\"></div>\n" +
    "</div>");
  $templateCache.put("register/register-modal.html",
    "<!-- Modal -->\n" +
    "<div class=\"modal fade\" id=\"privacyPolicy\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"privacyPolicyLabel\" aria-hidden=\"true\">\n" +
    "    <div class=\"modal-dialog\">\n" +
    "        <div class=\"modal-content\" style=\"width: 700px;\">\n" +
    "            <div class=\"modal-header\">\n" +
    "                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\n" +
    "                <!--<h4 class=\"modal-title\" id=\"privacyPolicyLabel\">Privacy Policy</h4>-->\n" +
    "            </div>\n" +
    "            <div class=\"modal-body\">\n" +
    "                <div ng-include=\"'static/privacypolicy.html'\"></div>\n" +
    "            </div>\n" +
    "            <div class=\"modal-footer\">\n" +
    "                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>\n" +
    "            </div>\n" +
    "        </div><!-- /.modal-content -->\n" +
    "    </div><!-- /.modal-dialog -->\n" +
    "</div><!-- /.modal -->\n" +
    "\n" +
    "<!-- Modal -->\n" +
    "<div class=\"modal fade\" id=\"termsConditions\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"termsConditionsLabel\" aria-hidden=\"true\">\n" +
    "    <div class=\"modal-dialog\">\n" +
    "        <div class=\"modal-content\" style=\"width: 700px;\">\n" +
    "            <div class=\"modal-header\">\n" +
    "                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\n" +
    "                <!--<h4 class=\"modal-title\" id=\"termsConditionsLabel\">Terms &amp; Conditions</h4>-->\n" +
    "            </div>\n" +
    "            <div class=\"modal-body\">\n" +
    "                <div ng-include=\"'static/termsnconditions.html'\"></div>\n" +
    "            </div>\n" +
    "            <div class=\"modal-footer\">\n" +
    "                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>\n" +
    "            </div>\n" +
    "        </div><!-- /.modal-content -->\n" +
    "    </div><!-- /.modal-dialog -->\n" +
    "</div><!-- /.modal -->");
  $templateCache.put("register/register.html",
    "<div>\n" +
    "    <h1>Register</h1>\n" +
    "    <br />\n" +
    "    <div>\n" +
    "        <div class=\"pull-left\">\n" +
    "            <div ng-class=\"{'selected-step': showPage == 'register-member'}\">STEP 1</div>\n" +
    "            <div><img ng-class=\"{'arw-active': showPage == 'register-member', 'arw-inactive': showPage != 'register-member'}\" src=\"dist/images/spacer.gif\" width=\"83\" height=\"10\" border=\"0\" alt=\"\"></div>\n" +
    "            <div ng-class=\"{'selected-step-text': showPage == 'register-member'}\">BASIC DETAILS</div>\n" +
    "        </div>\n" +
    "        <div class=\"pull-left\" style=\"margin-left: 50px;\">\n" +
    "            <div ng-class=\"{'selected-step': showPage == 'member-profile'}\">STEP 2</div>\n" +
    "            <div><img ng-class=\"{'arw-active': showPage == 'member-profile', 'arw-inactive': showPage != 'member-profile'}\" src=\"dist/images/spacer.gif\" width=\"83\" height=\"10\" border=\"0\" alt=\"\"></div>\n" +
    "            <div ng-class=\"{'selected-step-text': showPage == 'member-profile'}\">PROFILE DETAILS</div>\n" +
    "        </div>\n" +
    "        <div class=\"pull-left\" style=\"margin-left: 50px;\">\n" +
    "            <div ng-class=\"{'selected-step': showPage == 'confirmation'}\">STEP 3</div>\n" +
    "            <div><img ng-class=\"{'arw-active': showPage == 'confirmation', 'arw-inactive': showPage != 'confirmation'}\" src=\"dist/images/spacer.gif\" width=\"83\" height=\"10\" border=\"0\" alt=\"\"></div>\n" +
    "            <div ng-class=\"{'selected-step-text': showPage == 'confirmation'}\">CONFIRMATION</div>\n" +
    "        </div>\n" +
    "        <div class=\"clearfix\"></div>\n" +
    "    </div>\n" +
    "    <br />\n" +
    "    <div ng-if=\"showPage == 'register-member'\" >\n" +
    "        <div ng-include=\"'register/register-member.html'\" ng-init=\"obj = this\"></div>\n" +
    "    </div>\n" +
    "    <div ng-if=\"showPage == 'member-profile'\">\n" +
    "        <div ng-include=\"'register/member-profile.html'\" ng-init=\"obj = this\"></div>\n" +
    "    </div>\n" +
    "    <div ng-if=\"showPage == 'confirmation'\">\n" +
    "        <div ng-include=\"'register/confirmation.html'\" ng-init=\"obj = this\"></div>\n" +
    "    </div>\n" +
    "\n" +
    "</div>\n" +
    "");
  $templateCache.put("register/required-register-details.html",
    "<div ng-controller=\"RegisterMainCtrl\">\n" +
    "    <div class=\"form-horizontal\" ng-controller=\"RegistrationCtrl\">\n" +
    "        <form name=\"myForm\">\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Registered by<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.registerdBy.$touched && myForm.registerdBy.$invalid, 'has-success': myForm.registerdBy.$touched && myForm.registerdBy.$valid}\">\n" +
    "                    <select class=\"form-control\" name=\"registerdBy\" required ng-model=\"registeredBy\">\n" +
    "                        <option value=\"\">--Select--</option>\n" +
    "                        <option ng-repeat=\"item in facetVM.registeredByList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"registeredBy==item.key\"></option>\n" +
    "                    </select>\n" +
    "                    <div ng-messages=\"myForm.registerdBy.$touched && myForm.registerdBy.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please select the profile registered by.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Name<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.memberName.$touched && myForm.memberName.$invalid, 'has-success': myForm.memberName.$touched && myForm.memberName.$valid}\">\n" +
    "                    <input type=\"text\" class=\"form-control\" name=\"memberName\" required placeholder=\"Name\" ng-model=\"memberName\" />\n" +
    "                    <div ng-messages=\"myForm.memberName.$touched && myForm.memberName.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please write your name.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Gender<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\">\n" +
    "                    <label for=\"gendermale\" class=\"radio-inline\">\n" +
    "                        <input type=\"radio\" id=\"gendermale\" name=\"gender\" value=\"1\" ng-model=\"sex\" />\n" +
    "                        Male </label>\n" +
    "                    &nbsp;\n" +
    "                    <label for=\"genderfemale\" class=\"radio-inline\">\n" +
    "                        <input type=\"radio\" id=\"genderfemale\" name=\"gender\" value=\"0\" ng-model=\"sex\" />\n" +
    "                        Female </label>\n" +
    "\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Date of birth<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\">\n" +
    "                    <div class=\"clearfix\">\n" +
    "                        <div class=\"pull-left\" ng-class=\"{'has-error': myForm.dobDate.$touched && myForm.dobDate.$invalid, 'has-success': myForm.dobDate.$touched && myForm.dobDate.$valid}\">\n" +
    "                            <select class=\"form-control clearwidth\" name=\"dobDate\" required ng-model=\"date\">\n" +
    "                                <option value=\"\">Date</option>\n" +
    "                                <option ng-repeat=\"item in facetVM.dateList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"date==item.key\"></option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                        <div class=\"pull-left\" ng-class=\"{'has-error': myForm.dobMonth.$touched && myForm.dobMonth.$invalid, 'has-success': myForm.dobMonth.$touched && myForm.dobMonth.$valid}\">\n" +
    "                            <select class=\"form-control clearwidth\" name=\"dobMonth\" required ng-model=\"month\">\n" +
    "                                <option value=\"\">Month</option>\n" +
    "                                <option ng-repeat=\"item in facetVM.monthList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"month==item.key\"></option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                        <div class=\"pull-left\" ng-class=\"{'has-error': myForm.dobYear.$touched && myForm.dobYear.$invalid, 'has-success': myForm.dobYear.$touched && myForm.dobYear.$valid}\">\n" +
    "                            <select class=\"form-control clearwidth\" name=\"dobYear\" required ng-model=\"year\">\n" +
    "                                <option value=\"\">Year</option>\n" +
    "                                <option ng-repeat=\"item in facetVM.yearList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"year==item.key\"></option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div ng-messages=\"myForm.dobDate.$touched && myForm.dobDate.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please select date.</div>\n" +
    "                    </div>\n" +
    "                    <div ng-messages=\"myForm.dobMonth.$touched && myForm.dobMonth.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please select month.</div>\n" +
    "                    </div>\n" +
    "                    <div ng-messages=\"myForm.dobYear.$touched && myForm.dobYear.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please select year.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Height<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.height.$touched && myForm.height.$invalid, 'has-success': myForm.height.$touched && myForm.height.$valid}\">\n" +
    "                    <select class=\"form-control\" name=\"height\" ng-model=\"height\" required ng-options=\"item.key as item.text for item in facetVM.heightList\">\n" +
    "                        <option value=\"\">--select--</option>\n" +
    "                    </select>\n" +
    "                    <div ng-messages=\"myForm.height.$touched && myForm.height.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please select height.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Marital Status<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.maritalStatus.$touched && myForm.maritalStatus.$invalid, 'has-success': myForm.maritalStatus.$touched && myForm.maritalStatus.$valid}\">\n" +
    "                    <select class=\"form-control\" name=\"maritalStatus\" required ng-model=\"maritalStatus\">\n" +
    "                        <option value=\"\">--Select--</option>\n" +
    "                        <option ng-repeat=\"item in facetVM.maritalStatusList track by item.key\" ng-attr-value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"maritalStatus==item.key\"></option>\n" +
    "                    </select>\n" +
    "                    <div ng-messages=\"myForm.maritalStatus.$touched && myForm.maritalStatus.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please select marital status.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Sect<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.sect.$touched && myForm.sect.$invalid, 'has-success': myForm.sect.$touched && myForm.sect.$valid}\">\n" +
    "                    <select class=\"form-control\" name=\"sect\" required ng-model=\"sect\" ng-change=\"facetVM.afterSectChange(sect)\">\n" +
    "                        <option value=\"\">--Select--</option>\n" +
    "                        <option ng-repeat=\"item in facetVM.sectList track by item.pkSectId\" ng-attr-value=\"{{item.pkSectId}}\" ng-bind=\"item.SectName\" ng-selected=\"sect==item.pkSectId\"></option>\n" +
    "                    </select>\n" +
    "                    <div ng-messages=\"myForm.sect.$touched && myForm.sect.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please select sect.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Sub Sect<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.subSect.$touched && myForm.subSect.$invalid, 'has-success': myForm.subSect.$touched && myForm.subSect.$valid}\">\n" +
    "                    <select class=\"form-control\" name=\"subSect\" required ng-model=\"subSect\">\n" +
    "                        <option value=\"\">--Select--</option>\n" +
    "                        <option ng-repeat=\"item in facetVM.subSectList track by item.pkSubSectId\" ng-attr-value=\"{{item.pkSubSectId}}\" ng-bind=\"item.SubSectName\" ng-selected=\"subSect==item.pkSubSectId\"></option>\n" +
    "                    </select>\n" +
    "                    <div ng-messages=\"myForm.subSect.$touched && myForm.subSect.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please select sub sect.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Mother Tongue<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.motherTongue.$touched && myForm.motherTongue.$invalid, 'has-success': myForm.motherTongue.$touched && myForm.motherTongue.$valid}\">\n" +
    "                    <select class=\"form-control\" name=\"motherTongue\" required ng-model=\"motherTongue\">\n" +
    "                        <option value=\"\">--Select--</option>\n" +
    "                        <option ng-repeat=\"item in facetVM.motherTongueList track by item.pkTongueId\" ng-attr-value=\"{{item.pkTongueId}}\" ng-bind=\"item.TongueName\" ng-selected=\"motherTongue==item.pkTongueId\"></option>\n" +
    "                    </select>\n" +
    "                    <div ng-messages=\"myForm.motherTongue.$touched && myForm.motherTongue.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please select mother tongue.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Country living in<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.country.$touched && myForm.country.$invalid, 'has-success': myForm.country.$touched && myForm.country.$valid}\">\n" +
    "                    <select class=\"form-control\" name=\"country\" required ng-model=\"country\" ng-disabled=\"true\">\n" +
    "                        <option value=\"\">--Select--</option>\n" +
    "                        <option ng-repeat=\"item in facetVM.countryList track by item.pkCountryId\" ng-attr-value=\"{{item.pkCountryId}}\" ng-bind=\"item.CountryName\" ng-selected=\"country==item.pkCountryId\"></option>\n" +
    "                    </select>\n" +
    "                    <div ng-messages=\"myForm.country.$touched && myForm.country.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please select country.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">State<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.state.$touched && myForm.state.$invalid, 'has-success': myForm.state.$touched && myForm.state.$valid}\">\n" +
    "                    <select class=\"form-control\" name=\"state\" required ng-model=\"state\">\n" +
    "                        <option value=\"\">--Select--</option>\n" +
    "                        <option ng-repeat=\"item in facetVM.stateList track by item.pkStateId\" ng-attr-value=\"{{item.pkStateId}}\" ng-bind=\"item.StateName\" ng-selected=\"state==item.pkStateId\"></option>\n" +
    "                    </select>\n" +
    "                    <div ng-messages=\"myForm.state.$touched && myForm.state.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please select state.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">City<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.city.$touched && myForm.city.$invalid, 'has-success': myForm.city.$touched && myForm.city.$valid}\">\n" +
    "                    <input type=\"text\" name=\"city\" required class=\"form-control\" placeholder=\"City\" ng-model=\"city\" />\n" +
    "                    <div ng-messages=\"myForm.city.$touched && myForm.city.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please write city name.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Contact Number<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.contactNumber.$touched && myForm.contactNumber.$invalid, 'has-success': myForm.contactNumber.$touched && myForm.contactNumber.$valid}\">\n" +
    "                    <div class=\"input-group\">\n" +
    "                        <span class=\"input-group-addon\">+91</span>\n" +
    "                        <input type=\"text\" class=\"form-control\" name=\"contactNumber\" required placeholder=\"contact number\" ng-pattern=\"/^\\d{10}$/\" ng-model=\"contactNumber\" />\n" +
    "                    </div>\n" +
    "                    <span class=\"text-muted\">Hint: 99xxxxxxxx</span>\n" +
    "                    <div ng-messages=\"myForm.contactNumber.$touched && myForm.contactNumber.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please write contact number.</div>\n" +
    "                        <div ng-message=\"pattern\">Please write valid contact number.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">E-mail<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.email.$touched && myForm.email.$invalid, 'has-success': myForm.email.$touched && myForm.email.$valid}\">\n" +
    "                    <input type=\"email\" name=\"email\" required class=\"form-control\" placeholder=\"(ex: xyz@abc.com)\" ng-model=\"emailId\" />\n" +
    "                    <div ng-messages=\"myForm.email.$touched && myForm.email.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please write email address.</div>\n" +
    "                        <div ng-message=\"email\">Please write a vaild email address.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Password<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.password.$touched && myForm.password.$invalid, 'has-success': myForm.password.$touched && myForm.password.$valid}\">\n" +
    "                    <input type=\"password\" class=\"form-control\" name=\"password\" required placeholder=\"password\" ng-model=\"password\" ng-minlength=\"8\">\n" +
    "                    <div ng-messages=\"myForm.password.$touched && myForm.password.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please write password.</div>\n" +
    "                        <div ng-message=\"minlength\">Password should be minimum 8 characters.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <label class=\"col-sm-4 \">Confirm Password<span class=\"requiredFields\"> *</span></label>\n" +
    "                <div class=\"col-sm-8\" ng-class=\"{'has-error': myForm.confirmPassword.$touched && myForm.confirmPassword.$invalid, 'has-success': myForm.confirmPassword.$touched && myForm.confirmPassword.$valid}\">\n" +
    "                    <input type=\"password\" class=\"form-control\" name=\"confirmPassword\" required placeholder=\"password again\" ng-pattern=\"{{password}}\" ng-model=\"confirmPassword\" ng-minlength=\"8\">\n" +
    "                    <div ng-messages=\"myForm.confirmPassword.$touched && myForm.confirmPassword.$error\" class=\"text-danger\">\n" +
    "                        <div ng-message=\"required\">Please write password.</div>\n" +
    "                        <div ng-message=\"minlength\">Password should be minimum 8 characters.</div>\n" +
    "                        <div ng-message=\"pattern\">Password and confirm password should match.</div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <div class=\"col-sm-12\">\n" +
    "                    <label>\n" +
    "                        <checkbox ng-model=\"termsConditions\" ></checkbox>\n" +
    "                        I agree to the <a href=\"#nogo\" class=\"link\" data-toggle=\"modal\" data-target=\"#privacyPolicy\">Privacy Policy</a>\n" +
    "                        and\n" +
    "                        <a href=\"#nogo\" class=\"link\" data-toggle=\"modal\" data-target=\"#termsConditions\">Terms &amp; Conditions</a>\n" +
    "                    </label>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"form-group\">\n" +
    "                <div class=\"col-sm-8 col-sm-offset-4\">\n" +
    "                    <button class=\"btn btn-success\" ng-click=\"registerUser()\" ng-disabled=\"!termsConditions || disableButton || myForm.$invalid\">Register</button>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </form>\n" +
    "    </div>\n" +
    "</div>\n" +
    "<div ng-include=\"'register/register-modal.html'\"></div>");
  $templateCache.put("search/choosenSearchCriteria.html",
    "<div><h4>Search criteria:</h4></div>\n" +
    "<div>\n" +
    "	<span class=\"padr10\" ng-if=\"ageFrom && ageTo\">\n" +
    "		<strong>Age</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "		<span ng-bind=\"ageFrom\"></span> yrs - <span ng-bind=\"ageTo\"></span> yrs\n" +
    "	</span>\n" +
    "	<span class=\"padr10\" ng-if=\"heightFrom && heightTo\">\n" +
    "		<strong>Height</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "		<span ng-bind=\"facetVM.heightInWords(heightFrom)\"></span> - <span ng-bind=\"facetVM.heightInWords(heightTo)\"></span>\n" +
    "	</span>\n" +
    "\n" +
    "	<span class=\"padr10\" ng-if=\"!(selectedMaritalStatus.length==0 || (selectedMaritalStatus.length==1 && !selectedMaritalStatus[0]))\">\n" +
    "		<strong>Marital Status</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "        <span ng-repeat=\"item in selectedMaritalStatus track by item\">\n" +
    "            <span ng-bind=\"getSelectedItem(item, facetVM.maritalStatusList, 'key').text\"></span><span ng-if=\"$index < selectedMaritalStatus.length-1\">,</span>\n" +
    "        </span>\n" +
    "	</span>\n" +
    "	<span class=\"padr10\" ng-if=\"!(selectedMotherTongue.length==0 || (selectedMotherTongue.length==1 && !selectedMotherTongue[0]))\">\n" +
    "		<strong>Mother Toungue</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "        <span ng-repeat=\"item in selectedMotherTongue track by item\">\n" +
    "            <span ng-bind=\"getSelectedItem(item, facetVM.motherTongueList, 'pkTongueId').TongueName\"></span><span ng-if=\"$index < selectedMotherTongue.length-1\">,</span>\n" +
    "        </span>\n" +
    "	</span>\n" +
    "	<span class=\"padr10\" ng-if=\"!(selectedSect.length==0 || (selectedSect.length==1 && !selectedSect[0]))\">\n" +
    "		<strong>Sect</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "        <span ng-repeat=\"item in selectedSect track by item\">\n" +
    "            <span ng-bind=\"getSelectedItem(item, facetVM.sectList, 'pkSectId').SectName\"></span><span ng-if=\"$index < selectedSect.length-1\">,</span>\n" +
    "        </span>\n" +
    "	</span>\n" +
    "\n" +
    "	<span class=\"padr10\" ng-if=\"!(selectedSubSect.length==0 || (selectedSubSect.length==1 && !selectedSubSect[0]))\">\n" +
    "		<strong>Sub Sect</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "        <span ng-repeat=\"item in selectedSubSect track by item\">\n" +
    "            <span ng-bind=\"getSelectedItem(item, facetVM.subSectList, 'pkSubSectId').SubSectName\"></span><span ng-if=\"$index < selectedSubSect.length-1\">,</span>\n" +
    "        </span>\n" +
    "	</span>\n" +
    "	<span class=\"padr10\" ng-if=\"!(selectedCaste.length==0 || (selectedCaste.length==1 && !selectedCaste[0]))\">\n" +
    "		<strong>Caste</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "        <span ng-repeat=\"item in selectedCaste track by item\">\n" +
    "            <span ng-bind=\"getSelectedItem(item, facetVM.casteList, 'pkCasteId').CasteName\"></span><span ng-if=\"$index < selectedCaste.length-1\">,</span>\n" +
    "        </span>\n" +
    "	</span>\n" +
    "	<span class=\"padr10\" ng-if=\"!(selectedCourseGroup.length==0 || (selectedCourseGroup.length==1 && !selectedCourseGroup[0]))\">\n" +
    "		<strong>Education</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "        <span ng-repeat=\"item in selectedCourseGroup track by item\">\n" +
    "            <span ng-bind=\"getSelectedItem(item, facetVM.courseGroupList, 'pkCourseGroupId').GroupName\"></span><span ng-if=\"$index < selectedCourseGroup.length-1\">,</span>\n" +
    "        </span>\n" +
    "	</span>\n" +
    "	<span class=\"padr10\" ng-if=\"!(selectedOccupationGroup.length==0 || (selectedOccupationGroup.length==1 && !selectedOccupationGroup[0]))\">\n" +
    "		<strong>Occupation</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "        <span ng-repeat=\"item in selectedOccupationGroup track by item\">\n" +
    "            <span ng-bind=\"getSelectedItem(item, facetVM.occupationGroupList, 'pkOccGroupId').GroupName\"></span><span ng-if=\"$index < selectedOccupationGroup.length-1\">,</span>\n" +
    "        </span>\n" +
    "	</span>\n" +
    "	<span class=\"padr10\" ng-if=\"selectedAnnualIncome\">\n" +
    "		<strong>Annual Income</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "        <span ng-bind=\"selectedAnnualIncome.text\"></span>\n" +
    "	</span>\n" +
    "	<span class=\"padr10\" ng-if=\"!(selectedCountry.length==0 || (selectedCountry.length==1 && !selectedCountry[0]))\">\n" +
    "		<strong>Country</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "        <span ng-repeat=\"item in selectedCountry track by item\">\n" +
    "            <span ng-bind=\"getSelectedItem(item, facetVM.countryList, 'pkCountryId').CountryName\"></span><span ng-if=\"$index < selectedCountry.length-1\">,</span>\n" +
    "        </span>\n" +
    "	</span>\n" +
    "	<span class=\"padr10\" ng-if=\"!(selectedPhysicalStatus.length==0 || (selectedPhysicalStatus.length==1 && !selectedPhysicalStatus[0]))\">\n" +
    "		<strong>Physical Status</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "        <span ng-repeat=\"item in selectedPhysicalStatus track by item\">\n" +
    "            <span ng-bind=\"getSelectedItem(item, facetVM.physicalStatusList, 'key').text\"></span><span ng-if=\"$index < selectedPhysicalStatus.length-1\">,</span>\n" +
    "        </span>\n" +
    "	</span>\n" +
    "	<span class=\"padr10\" ng-if=\"!(selectedEmployedIn.length==0 || (selectedEmployedIn.length==1 && !selectedEmployedIn[0]))\">\n" +
    "		<strong>Employed In</strong><span class=\"glyphicon glyphicon-triangle-right\"></span>\n" +
    "        <span ng-repeat=\"item in selectedEmployedIn track by item\">\n" +
    "            <span ng-bind=\"getSelectedItem(item, facetVM.employedInList, 'key').text\"></span><span ng-if=\"$index < selectedEmployedIn.length-1\">,</span>\n" +
    "        </span>\n" +
    "	</span>\n" +
    "</div>\n" +
    " ");
  $templateCache.put("search/memberDetailsPage.html",
    "<div class=\"padt30\" ng-if=\"member && isLoaded\">\n" +
    "    <div>\n" +
    "        <!--<button type=\"button\" class=\"btn btn-info\" ng-click=\"back()\">Back to Results</button>-->\n" +
    "    </div>\n" +
    "    <div class=\"row-fluid padt20\">\n" +
    "        <div class=\"bdr1 mrgb20 curve10\">\n" +
    "            <div class=\"pad15\"> <span ng-bind=\"member.MemberCode\"></span>\n" +
    "                <h3 ng-bind=\"member.MemberName\"></h3>\n" +
    "                <div ng-bind=\"member.ResidingCity+', '+member.state+', '+member.country\"></div>\n" +
    "            </div>\n" +
    "            <div class=\"pad15\">\n" +
    "                <div class=\"bdr1 col-xs-3 col-sm-3 pad-reset profile-pic text-center\" ng-class=\"{'women': (member.Sex=='0' && !member.ProfilePic), 'men': (member.Sex=='1' && !member.ProfilePic)}\">\n" +
    "                    <span ng-if=\"member.ProfilePic\">\n" +
    "                        <img ng-src=\"{{getMemberProfilePic(member.ProfilePic)}}\" ng-attr-title=\"{{member.MemberName}}\" />\n" +
    "                    </span>\n" +
    "                </div>\n" +
    "                <div class=\"pad5 col-xs-9 col-sm-9\">\n" +
    "                    <div class=\"padt5 col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"clr3 col-xs-3 col-sm-3\">Age, Height</div>\n" +
    "                        <div class=\"clrblack col-xs-9 col-sm-9\"> : <span ng-bind=\"member.age+' yrs,'\"></span> <span ng-bind=\"facetVM.heightInWords(member.Height)\"></span> </div>\n" +
    "                        <div class=\"clearfix\"></div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padt5 col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"clr3 col-xs-3 col-sm-3\">Sect</div>\n" +
    "                        <div class=\"clrblack col-xs-9 col-sm-9\"> : <span ng-bind=\"member.sectName\"></span> </div>\n" +
    "                        <div class=\"clearfix\"></div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padt5 col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"clr3 col-xs-3 col-sm-3\">Sub Sect</div>\n" +
    "                        <div class=\"clrblack col-xs-9 col-sm-9\"> : <span ng-bind=\"member.subSectName\"></span> </div>\n" +
    "                        <div class=\"clearfix\"></div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padt5 col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"clr3 col-xs-3 col-sm-3\">Location</div>\n" +
    "                        <div class=\"clrblack col-xs-9 col-sm-9\"> : <span ng-bind=\"member.ResidingCity+', '+member.state+', '+member.country\"></span> </div>\n" +
    "                        <div class=\"clearfix\"></div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padt5 col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"clr3 col-xs-3 col-sm-3\">Education</div>\n" +
    "                        <div class=\"clrblack col-xs-9 col-sm-9\"> : <span ng-bind=\"member.education\"></span> </div>\n" +
    "                        <div class=\"clearfix\"></div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padt5 col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"clr3 col-xs-3 col-sm-3\">Occupation</div>\n" +
    "                        <div class=\"clrblack col-xs-9 col-sm-9\"> : <span ng-bind=\"member.occupation\"></span> </div>\n" +
    "                        <div class=\"clearfix\"></div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"clearfix\"></div>\n" +
    "                <div class=\"padt10\"> <strong>About Me:</strong>\n" +
    "                    <div class=\"pad5 bgclr4\" ng-bind=\"member.AboutMe\"> </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"well\">\n" +
    "            <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                <h4>Basic Details</h4>\n" +
    "                <div class=\"col-xs-12 col-sm-6\">\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Profile Created By</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"facetVM.getObjectText(facetVM.registeredByList, member.RegisteredBy)\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Name</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.MemberName\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Gender</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.Sex=='0'?'Female':'Male'\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Age</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.age+' yrs'\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Height</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"facetVM.getObjectText(facetVM.heightList, member.Height)\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Weight</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.Weight?member.Weight +' kg': ''\"></span> </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"col-xs-12 col-sm-6\">\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Marital Status</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"facetVM.getObjectText(facetVM.maritalStatusList, member.MaritalStatus)\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Mother Toungue</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.motherTongue\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Body Type</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"facetVM.getObjectText(facetVM.bodyTypeList, member.BodyType)\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Complexion</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"facetVM.getObjectText(facetVM.complexionList, member.Complexion)\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Physical Status</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"facetVM.getObjectText(facetVM.physicalStatusList, member.PhysicalStatus)\"></span> </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"dot-line padt10 padb10 col-xs-12 col-sm-12\"></div>\n" +
    "            <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                <h4>Religious Information</h4>\n" +
    "                <div class=\"col-xs-12 col-sm-6\">\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Sect</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.sectName\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Sub Sect</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.subSectName\"></span> </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"col-xs-12 col-sm-6\">\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Caste</label></div>\n" +
    "                        <!-- ko if: fkCaste !=0 -->\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.caste\"></span> </div>\n" +
    "                        <!-- /ko -->\n" +
    "                        <!-- ko if: fkCaste ==0 -->\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.OtherCaste\"></span> </div>\n" +
    "                        <!-- /ko -->\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Gotra</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.Gotra\"></span> </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"dot-line padt10 padb10 col-xs-12 col-sm-12\"></div>\n" +
    "            <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                <h4>Professional Information</h4>\n" +
    "                <div class=\"col-xs-12 col-sm-6\">\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Education</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.education\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Occupation</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.occupation\"></span> </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"col-xs-12 col-sm-6\">\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Employed in</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"facetVM.getObjectText(facetVM.employedInList, member.EmployedIn)\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Annual Income</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-if=\"member.IncomeAnnual\" ng-bind=\"'Rs. '+member.IncomeAnnual+' / per annum'\"></span></div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"dot-line padt10 padb10 col-xs-12 col-sm-12\"></div>\n" +
    "            <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                <h4>Location</h4>\n" +
    "                <div class=\"col-xs-12 col-sm-6\">\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Home Address</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.HomeAddress\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Working Address</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.WorkingAddress\"></span> </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"col-xs-12 col-sm-6\">\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>City</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.ResidingCity\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>State</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.state\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Country</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.country\"></span> </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"dot-line padt10 padb10 col-xs-12 col-sm-12\"></div>\n" +
    "            <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                <h4>Horoscope</h4>\n" +
    "                <div class=\"col-xs-12 col-sm-6\">\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Manglik Status</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"facetVM.getObjectText(facetVM.manglikList, member.Manglik)\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Birth Date</label></div>\n" +
    "\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"facetVM.getDateAsString(member.DOB)\"></span>  </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Birth Time</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"facetVM.getTimeAsString(member.DOB)\"></span> </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div ng-if=\"member.familyDetails\">\n" +
    "                <div class=\"dot-line padt10 padb10 col-xs-12 col-sm-12\"></div>\n" +
    "                <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                    <h4>Family Details</h4>\n" +
    "                    <div class=\"col-xs-12 col-sm-6\">\n" +
    "                        <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"><label>Father Name</label></div>\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.familyDetails.FatherName\"></span> </div>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"><label>Father's Occupation</label></div>\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.familyDetails.FatherOccupation\"></span> </div>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"><label>Mother Name</label></div>\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.familyDetails.MotherName\"></span> </div>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"><label>Mother's Occupation</label></div>\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.familyDetails.MotherOccupation\"></span> </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-6\">\n" +
    "                        <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"><label>Married Brothers</label></div>\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.familyDetails.MarriedBrothers\"></span> </div>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"><label>Unmarried Brothers</label></div>\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.familyDetails.UnmarriedBrothers\"></span> </div>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"><label>Married Sisters</label></div>\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.familyDetails.MarriedSisters\"></span> </div>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"><label>Unmarried Sisters</label></div>\n" +
    "                            <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.familyDetails.UnmarriedSisters\"></span> </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"clearfix\"></div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-3 col-sm-3\"><label>About Family</label></div>\n" +
    "                        <div class=\"col-xs-9 col-sm-9\"> : <span ng-bind=\"member.familyDetails.AboutFamily\"></span> </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"dot-line padt10 padb10 col-xs-12 col-sm-12\"></div>\n" +
    "            <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                <h4>Contact Details</h4>\n" +
    "                <div class=\"col-xs-12 col-sm-6\">\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Contact No.</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.ContactNo\"></span> </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"col-xs-12 col-sm-12 row\">\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"><label>Email</label></div>\n" +
    "                        <div class=\"col-xs-6 col-sm-6\"> : <span ng-bind=\"member.Email\"></span> </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "            <div class=\"clearfix\"></div>\n" +
    "        </div>\n" +
    "        <h4>Partner Prefrences</h4>\n" +
    "        <p ng-bind=\"member.AboutMyPartner\"></p>\n" +
    "    </div>\n" +
    "</div>\n" +
    "<div ng-if=\"!member && isLoaded\">\n" +
    "    <div class=\"panel panel-default text-center\">\n" +
    "        <div class=\"panel-body\">\n" +
    "            <h1><i class=\"text-danger glyphicon glyphicon-ban-circle\"></i></h1>\n" +
    "            <h2>Sorry, something went wrong</h2>\n" +
    "            <div>This member's profile does not exists.</div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>");
  $templateCache.put("search/modals/age.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Age in years</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body form-horizontal\">\n" +
    "    <div class=\"form-group\">\n" +
    "        <div class=\"col-xs-12 col-sm-2\">\n" +
    "            <label class=\"control-label\">From</label>\n" +
    "        </div>\n" +
    "        <div class=\"col-xs-12 col-sm-10\">\n" +
    "            <select class=\"form-control\" ng-model=\"$parent.ageFrom\" ng-options=\"item for item in $parent.facetVM.ageList track by item\">\n" +
    "            </select>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"form-group\">\n" +
    "        <div class=\"col-xs-12 col-sm-2\">\n" +
    "            <label class=\"control-label\">To</label>\n" +
    "        </div>\n" +
    "        <div class=\"col-xs-12 col-sm-10\">\n" +
    "            <select class=\"form-control\" ng-model=\"$parent.ageTo\" ng-options=\"item for item in $parent.facetVM.ageList track by item\">\n" +
    "            </select>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\" >Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/modals/annualIncome.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Income (INR)</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body form-horizontal\">\n" +
    "    <div class=\"form-group\">\n" +
    "        <div class=\"col-xs-12 col-sm-3\">\n" +
    "            <label class=\"control-label\">Annual Income</label>\n" +
    "        </div>\n" +
    "        <div class=\"col-xs-12 col-sm-9\">\n" +
    "            <select class=\"form-control\" ng-model=\"$parent.selectedAnnualIncome\" ng-options=\"item.text for item in facetVM.annualIncomeList\">\n" +
    "                <option value=\"\">Any</option>\n" +
    "            </select>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\">Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/modals/caste.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Caste</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body\">\n" +
    "    <ul class=\"list-unstyled list-group\">\n" +
    "        <li class=\"list-group-item\" ng-repeat=\"item in facetVM.casteList track by item.pkCasteId\">\n" +
    "            <label class=\"label-normal\">\n" +
    "                <checkbox ng-init=\"item.selected = $parent.selectedCaste.indexOf(item.pkCasteId)>-1?true:false\" name=\"caste\" ng-model=\"item.selected\" ng-change=\"toggleSelection(item.pkCasteId, $parent.selectedCaste)\" ></checkbox>\n" +
    "                <span ng-bind=\"item.CasteName\" class=\"disinblk\"></span>\n" +
    "            </label>\n" +
    "        </li>\n" +
    "    </ul>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\">Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/modals/country.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Country</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body\">\n" +
    "    <ul class=\"list-unstyled list-group\">\n" +
    "        <li class=\"list-group-item\" ng-repeat=\"item in facetVM.countryList track by item.pkCountryId\">\n" +
    "            <label class=\"label-normal\">\n" +
    "                <checkbox ng-init=\"item.selected = $parent.selectedCountry.indexOf(item.pkCountryId)>-1?true:false\" name=\"country\" ng-model=\"item.selected\" ng-change=\"toggleSelection(item.pkCountryId, $parent.selectedCountry)\" ></checkbox>\n" +
    "                <span ng-bind=\"item.CountryName\" class=\"disinblk\"></span>\n" +
    "            </label>\n" +
    "        </li>\n" +
    "    </ul>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\">Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/modals/courseGroup.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Education</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body\">\n" +
    "    <ul class=\"list-unstyled list-group\">\n" +
    "        <li class=\"list-group-item\" ng-repeat=\"item in facetVM.courseGroupList track by item.pkCourseGroupId\">\n" +
    "            <label class=\"label-normal\">\n" +
    "                <checkbox ng-init=\"item.selected = $parent.selectedCourseGroup.indexOf(item.pkCourseGroupId)>-1?true:false\" name=\"courseGroup\" ng-model=\"item.selected\" ng-change=\"toggleSelection(item.pkCourseGroupId, $parent.selectedCourseGroup)\" ></checkbox>\n" +
    "                <span ng-bind=\"item.GroupName\" class=\"disinblk\"></span>\n" +
    "            </label>\n" +
    "        </li>\n" +
    "    </ul>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\">Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/modals/employedIn.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Employed In</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body\">\n" +
    "    <ul class=\"list-unstyled list-group\" >\n" +
    "        <li class=\"list-group-item\" ng-repeat=\"item in facetVM.employedInList track by item.key\">\n" +
    "            <label class=\"label-normal\">\n" +
    "                <checkbox ng-init=\"item.selected = $parent.selectedEmployedIn.indexOf(item.key)>-1?true:false\" name=\"physicalStatus\" ng-model=\"item.selected\" ng-change=\"toggleSelection(item.key, $parent.selectedEmployedIn)\" ></checkbox>\n" +
    "                <span ng-bind=\"item.text\" class=\"disinblk\"></span>\n" +
    "            </label>\n" +
    "        </li>\n" +
    "    </ul>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\">Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/modals/height.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Height</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body form-horizontal\">\n" +
    "    <div class=\"form-group\">\n" +
    "        <div class=\"col-xs-12 col-sm-2\">\n" +
    "            <label class=\"control-label\">From</label>\n" +
    "        </div>\n" +
    "        <div class=\"col-xs-12 col-sm-10\">\n" +
    "            <select class=\"form-control\" ng-model=\"$parent.heightFrom\">\n" +
    "                <option ng-repeat=\"item in facetVM.heightList track by item.key\" value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"item.key==$parent.heightFrom\"></option>\n" +
    "            </select>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"form-group\">\n" +
    "        <div class=\"col-xs-12 col-sm-2\">\n" +
    "            <label class=\"control-label\">To</label>\n" +
    "        </div>\n" +
    "        <div class=\"col-xs-12 col-sm-10\">\n" +
    "            <select class=\"form-control\" ng-model=\"$parent.heightTo\">\n" +
    "                <option ng-repeat=\"item in facetVM.heightList track by item.key\" value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"item.key==$parent.heightTo\"></option>\n" +
    "            </select>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\">Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/modals/maritalStatus.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Marital Status</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body\">\n" +
    "    <ul class=\"list-unstyled list-group\" >\n" +
    "        <li class=\"list-group-item\" ng-repeat=\"item in facetVM.maritalStatusList track by item.key\">\n" +
    "            <label class=\"label-normal\">\n" +
    "                <checkbox ng-init=\"item.selected = $parent.selectedMaritalStatus.indexOf(item.key)>-1?true:false\" name=\"maritalStatus\" ng-model=\"item.selected\" ng-change=\"toggleSelection(item.key, $parent.selectedMaritalStatus)\" ></checkbox>\n" +
    "                <span ng-bind=\"item.text\" class=\"disinblk\"></span>\n" +
    "            </label>\n" +
    "        </li>\n" +
    "    </ul>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\">Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/modals/motherToungue.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Mother Toungue</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body\">\n" +
    "    <ul class=\"list-unstyled list-group\" >\n" +
    "        <li class=\"list-group-item\" ng-repeat=\"item in facetVM.motherTongueList track by item.pkTongueId\">\n" +
    "            <label class=\"label-normal\">\n" +
    "                <checkbox ng-init=\"item.selected = $parent.selectedMotherTongue.indexOf(item.pkTongueId)>-1?true:false\" name=\"motherToungue\" ng-model=\"item.selected\" ng-change=\"toggleSelection(item.pkTongueId, $parent.selectedMotherTongue)\" ></checkbox>\n" +
    "                <span ng-bind=\"item.TongueName\" class=\"disinblk\"></span>\n" +
    "            </label>\n" +
    "        </li>\n" +
    "    </ul>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\">Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/modals/occupationGroup.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Occupation</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body\">\n" +
    "    <ul class=\"list-unstyled list-group\">\n" +
    "        <li class=\"list-group-item\" ng-repeat=\"item in facetVM.occupationGroupList track by item.pkOccGroupId\">\n" +
    "            <label class=\"label-normal\">\n" +
    "                <checkbox ng-init=\"item.selected = $parent.selectedOccupationGroup.indexOf(item.pkOccGroupId)>-1?true:false\" name=\"occupationGroup\" ng-model=\"item.selected\" ng-change=\"toggleSelection(item.pkOccGroupId, $parent.selectedOccupationGroup)\" ></checkbox>\n" +
    "                <span ng-bind=\"item.GroupName\" class=\"disinblk\"></span>\n" +
    "            </label>\n" +
    "        </li>\n" +
    "    </ul>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\">Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/modals/physicalStatus.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Physical Status</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body\">\n" +
    "    <ul class=\"list-unstyled list-group\">\n" +
    "        <li class=\"list-group-item\" ng-repeat=\"item in facetVM.physicalStatusList track by item.key\">\n" +
    "            <label class=\"label-normal\">\n" +
    "                <checkbox ng-init=\"item.selected = $parent.selectedPhysicalStatus.indexOf(item.key)>-1?true:false\" name=\"physicalStatus\" ng-model=\"item.selected\" ng-change=\"toggleSelection(item.key, $parent.selectedPhysicalStatus)\" ></checkbox>\n" +
    "                <span ng-bind=\"item.text\" class=\"disinblk\"></span>\n" +
    "            </label>\n" +
    "        </li>\n" +
    "    </ul>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\">Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/modals/sect.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Sect</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body\">\n" +
    "    <ul class=\"list-unstyled list-group\">\n" +
    "        <li class=\"list-group-item\" ng-repeat=\"item in facetVM.sectList track by item.pkSectId\">\n" +
    "            <label class=\"label-normal\">\n" +
    "                <checkbox ng-init=\"item.selected = $parent.selectedSect.indexOf(item.pkSectId)>-1?true:false\" name=\"sect\" ng-model=\"item.selected\" ng-change=\"toggleSelection(item.pkSectId, $parent.selectedSect)\" ></checkbox>\n" +
    "                <span ng-bind=\"item.SectName\" class=\"disinblk\"></span>\n" +
    "            </label>\n" +
    "        </li>\n" +
    "    </ul>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\">Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/modals/subsect.html",
    "<div class=\"modal-header\">\n" +
    "    <button type=\"button\" class=\"close\" ng-click=\"closeModal()\" aria-hidden=\"true\">&times;</button>\n" +
    "    <h4 class=\"modal-title\">Sub Sect</h4>\n" +
    "</div>\n" +
    "<div class=\"modal-body\">\n" +
    "    <ul class=\"list-unstyled list-group\">\n" +
    "        <li class=\"list-group-item\" ng-repeat=\"item in facetVM.subSectList track by item.pkSubSectId\">\n" +
    "            <label class=\"label-normal\">\n" +
    "                <checkbox ng-init=\"item.selected = $parent.selectedSubSect.indexOf(item.pkSubSectId)>-1?true:false\" name=\"subsect\" ng-model=\"item.selected\" ng-change=\"toggleSelection(item.pkSubSectId, $parent.selectedSubSect)\" ></checkbox>\n" +
    "                <span ng-bind=\"item.SubSectName\" class=\"disinblk\"></span>\n" +
    "            </label>\n" +
    "        </li>\n" +
    "    </ul>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "    <button type=\"button\" class=\"btn btn-default\" ng-click=\"closeModal()\">Close</button>\n" +
    "    <button type=\"button\" class=\"btn btn-primary\" ng-click=\"search()\">Search</button>\n" +
    "</div>");
  $templateCache.put("search/quickSearch.html",
    "<div class=\"well\" ng-controller=\"SearchCtrl\">\n" +
    "    <h3>Quick Search:</h3>\n" +
    "    <div>\n" +
    "        <div class=\"pull-left\">\n" +
    "            <div class=\"btn-group\">\n" +
    "                <label for=\"gendermale\" class=\"btn btn-default\" ng-class=\"{'active': sex=='1'}\">\n" +
    "                    <input type=\"radio\" id=\"gendermale\" name=\"gender\" value=\"1\" ng-model=\"sex\" />\n" +
    "                    Groom </label>\n" +
    "                &nbsp;\n" +
    "                <label for=\"genderfemale\" class=\"btn btn-default\" ng-class=\"{'active': sex=='0'}\">\n" +
    "                    <input type=\"radio\" id=\"genderfemale\" name=\"gender\" value=\"0\" ng-model=\"sex\" />\n" +
    "                    Bride </label>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"pull-left mrgl20\">\n" +
    "            <select class=\"form-control clearwidth disinblk\" ng-model=\"ageFrom\" ng-options=\"item for item in facetVM.ageList track by item\"></select>\n" +
    "            <span class=\"padl5 padr5\">To</span>\n" +
    "            <select class=\"form-control clearwidth disinblk\" ng-model=\"ageTo\" ng-options=\"item for item in facetVM.ageList track by item\"></select>\n" +
    "            <span class=\"padl5 padr5\">Years</span>\n" +
    "        </div>\n" +
    "        <div class=\"pull-left mrgl20\">\n" +
    "            <select class=\"form-control clearwidth\" ng-model=\"selectedCaste[0]\">\n" +
    "                <option value=\"\">Any</option>\n" +
    "                <option ng-repeat=\"item in facetVM.casteList track by item.pkCasteId\" value=\"{{item.pkCasteId}}\" ng-bind=\"item.CasteName\" ng-selected=\"item.pkCasteId==selectedCaste[0]\"></option>\n" +
    "            </select>\n" +
    "        </div>\n" +
    "        <div class=\"pull-left mrgl20\">\n" +
    "            <select class=\"form-control clearwidth\" ng-model=\"selectedMotherTongue[0]\">\n" +
    "                <option value=\"\">Any</option>\n" +
    "                <option ng-repeat=\"item in facetVM.motherTongueList track by item.pkTongueId\" value=\"{{item.pkTongueId}}\" ng-bind=\"item.TongueName\" ng-selected=\"item.pkTongueId==selectedMotherTongue[0]\"></option>\n" +
    "            </select>\n" +
    "        </div>\n" +
    "        <div class=\"pull-left mrgl20\">\n" +
    "            <button type=\"button\" class=\"btn btn-success\" ng-click=\"searchByCriteria()\">Search</button>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"clearfix\"></div>\n" +
    "</div>");
  $templateCache.put("search/renderResults.html",
    "<div class=\"row-fluid\">\n" +
    "    <h1>Your Search Results (<span ng-bind=\"totalItems\"></span>)</h1>\n" +
    "    <div class=\"dot-line mrgb20\"></div>\n" +
    "    <!-- choosen search criteria -->\n" +
    "    <div >\n" +
    "        <div ng-include=\"'search/choosenSearchCriteria.html'\"></div>\n" +
    "    </div>\n" +
    "    <div ng-if=\"dataList && dataList.length>0 && isLoaded\">\n" +
    "        <div class=\"pager\"> Go to page:\n" +
    "            <ul class=\"yiiPager\" >\n" +
    "                <li class=\"previous\" ng-class=\"{'disabled': disablePrevious}\"><a href=\"javascript:void(0)\" ng-click=\"previousPage()\">&lt; Previous</a></li>\n" +
    "                <li class=\"page\" ng-repeat=\"item in pageList track by item.pageNo\" ng-class=\"{'selected': item.selected}\">\n" +
    "                    <a href=\"javascript:void(0)\" ng-bind=\"item.pageNo\" ng-click=\"goToPage(item.pageNo)\"></a>\n" +
    "                </li>\n" +
    "                <li class=\"next\" ng-class=\"{'disabled': disableNext}\"><a href=\"javascript:void(0)\" ng-click=\"nextPage()\">Next &gt;</a></li>\n" +
    "            </ul>\n" +
    "        </div>\n" +
    "        <div ng-repeat=\"item in dataList track by item.pkMemberId\">\n" +
    "            <div class=\"bdr1 mrgb20 curve10\">\n" +
    "                <div class=\"pad15\">\n" +
    "                    <div class=\"pull-left\"> <span class=\"h3\" ng-bind=\"item.MemberCode\"></span> </div>\n" +
    "                    <div class=\"pull-right\">\n" +
    "                        <button type=\"button\" class=\"btn btn-primary\" ng-click=\"viewMember(item.MemberCode)\">View Full Profile</button>\n" +
    "                    </div>\n" +
    "                    <div class=\"clearfix\"></div>\n" +
    "                </div>\n" +
    "                <div class=\"pad15 padt0\">\n" +
    "                    <div class=\"bdr1 col-sm-3 pad-reset profile-pic text-center\" ng-class=\"{'women': (item.Sex=='0' && !item.ProfilePic), 'men': (item.Sex=='1' && !item.ProfilePic)}\">\n" +
    "                        <a ui-sref=\"searchMember({memberCode: item.MemberCode})\" ng-if=\"item.ProfilePic\"><img ng-src=\"{{getMemberProfilePic(item.ProfilePic)}}\" ng-attr-title=\"{{item.MemberName}}\" /></a>\n" +
    "                    </div>\n" +
    "                    <div class=\"pad5 col-sm-9\">\n" +
    "                        <div class=\"padt3 padb10 col-sm-12 row\">\n" +
    "                            <div class=\"bigtxt-s\"><a ui-sref=\"searchMember({memberCode: item.MemberCode})\" class=\"clr5\" ng-bind=\"item.MemberName\"></a></div>\n" +
    "                        </div>\n" +
    "                        <div class=\"padt5 col-sm-12 row\">\n" +
    "                            <div class=\"clr3 col-sm-3\">Age, Height</div>\n" +
    "                            <div class=\"clrblack col-sm-9\"> : <span ng-bind=\"item.age+' yrs, '+facetVM.heightInWords(item.Height)\"></span> </div>\n" +
    "                            <div class=\"clearfix\"></div>\n" +
    "                        </div>\n" +
    "                        <div class=\"padt5 col-sm-12 row\">\n" +
    "                            <div class=\"clr3 col-sm-3\">Sect</div>\n" +
    "                            <div class=\"clrblack col-sm-9\"> : <span ng-bind=\"item.sectName\"></span> </div>\n" +
    "                            <div class=\"clearfix\"></div>\n" +
    "                        </div>\n" +
    "                        <div class=\"padt5 col-sm-12 row\">\n" +
    "                            <div class=\"clr3 col-sm-3\">Sub Sect</div>\n" +
    "                            <div class=\"clrblack col-sm-9\"> : <span ng-bind=\"item.subSectName\"></span> </div>\n" +
    "                            <div class=\"clearfix\"></div>\n" +
    "                        </div>\n" +
    "                        <div class=\"padt5 col-sm-12 row\">\n" +
    "                            <div class=\"clr3 col-sm-3\">Location</div>\n" +
    "                            <div class=\"clrblack col-sm-9\"> : <span ng-bind=\"item.ResidingCity+', '+item.state+', '+item.country\"></span> </div>\n" +
    "                            <div class=\"clearfix\"></div>\n" +
    "                        </div>\n" +
    "                        <div class=\"padt5 col-sm-12 row\">\n" +
    "                            <div class=\"clr3 col-sm-3\">Education</div>\n" +
    "                            <div class=\"clrblack col-sm-9\"> : <span ng-bind=\"item.education\"></span> </div>\n" +
    "                            <div class=\"clearfix\"></div>\n" +
    "                        </div>\n" +
    "                        <div class=\"padt5 col-sm-12 row\">\n" +
    "                            <div class=\"clr3 col-sm-3\">Occupation</div>\n" +
    "                            <div class=\"clrblack col-sm-9\"> : <span ng-bind=\"item.occupation\"></span> </div>\n" +
    "                            <div class=\"clearfix\"></div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"clearfix\"></div>\n" +
    "                    <div class=\"padt10\">\n" +
    "                        <div class=\"pad5 bgclr4\" ng-bind=\"item.AboutMe\"> </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"pager\"> Go to page:\n" +
    "            <ul class=\"yiiPager\" >\n" +
    "                <li class=\"previous\" ng-class=\"{'disabled': disablePrevious}\"><a href=\"javascript:void(0)\" ng-click=\"previousPage()\">&lt; Previous</a></li>\n" +
    "                <li class=\"page\" ng-repeat=\"item in pageList track by item.pageNo\" ng-class=\"{'selected': item.selected}\">\n" +
    "                    <a href=\"javascript:void(0)\" ng-bind=\"item.pageNo\" ng-click=\"goToPage(item.pageNo)\"></a>\n" +
    "                </li>\n" +
    "                <li class=\"next\" ng-class=\"{'disabled': disableNext}\"><a href=\"javascript:void(0)\" ng-click=\"nextPage()\">Next &gt;</a></li>\n" +
    "            </ul>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "    <div class=\"text-center\" ng-if=\"dataList && dataList.length === 0 && isLoaded\">\n" +
    "        <h4>----No match found----</h4>\n" +
    "    </div>\n" +
    "</div>\n" +
    "");
  $templateCache.put("search/search.html",
    "<div>\n" +
    "    <h1>Search</h1>\n" +
    "    <ul id=\"search_tab\" class=\"nav nav-tabs\">\n" +
    "        <li class=\"\" ng-class=\"{'active': activeSearchTab=='regular'}\"><a href=\"#tabs-1\" data-toggle=\"pill\">Regular</a></li>\n" +
    "        <li class=\"\" ng-class=\"{'active': activeSearchTab=='matrimonyId'}\"><a href=\"#tabs-2\" data-toggle=\"pill\">By Matrimony Id</a></li>\n" +
    "    </ul>\n" +
    "    <div class=\"col-xs-12 col-sm-12 tab-content\">\n" +
    "        <div id=\"tabs-1\" class=\"tab-pane\" ng-class=\"{'active': activeSearchTab=='regular'}\">\n" +
    "            <h3>Basic Search Criteria</h3>\n" +
    "            <div class=\"padt20 form-horizontal\">\n" +
    "                <div class=\"row\" ng-show=\"!global.currentUser\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Looking for</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10 btn-group\">\n" +
    "                            <label for=\"genderfemale\" class=\"btn btn-default\" ng-class=\"{'active': sex=='0'}\">\n" +
    "                                <input type=\"radio\" id=\"genderfemale\" name=\"gender\" value=\"0\" ng-model=\"sex\" />\n" +
    "                                Bride </label>\n" +
    "                            &nbsp;\n" +
    "                            <label for=\"gendermale\" class=\"btn btn-default\" ng-class=\"{'active': sex=='1'}\">\n" +
    "                                <input type=\"radio\" id=\"gendermale\" name=\"gender\" value=\"1\" ng-model=\"sex\" />\n" +
    "                                Groom </label>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Age</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <div class=\"form-inline\">\n" +
    "                                <select class=\"form-control clearwidth\" ng-model=\"ageFrom\" ng-options=\"item for item in facetVM.ageList track by item\"></select>\n" +
    "                                <span class=\"padl5 padr5\">To</span>\n" +
    "                                <select class=\"form-control clearwidth\" ng-model=\"ageTo\" ng-options=\"item for item in facetVM.ageList track by item\"></select>\n" +
    "                                <span class=\"padl5 padr5\">Years</span>\n" +
    "                            </div>\n" +
    "\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Height</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <div class=\"form-inline\">\n" +
    "                                <select class=\"form-control clearwidth\" ng-model=\"heightFrom\">\n" +
    "                                    <option ng-repeat=\"item in facetVM.heightList track by item.key\" value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"item.key==heightFrom\"></option>\n" +
    "                                </select>\n" +
    "                                <span class=\"padl5 padr5\">To</span>\n" +
    "                                <select class=\"form-control clearwidth\" ng-model=\"heightTo\">\n" +
    "                                    <option ng-repeat=\"item in facetVM.heightList track by item.key\" value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"item.key==heightTo\"></option>\n" +
    "                                </select>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Marital Status</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control clearwidth\" ng-model=\"selectedMaritalStatus\" size=\"5\" multiple=\"true\">\n" +
    "                                <option value=\"\">Any</option>\n" +
    "                                <option ng-repeat=\"item in facetVM.maritalStatusList track by item.key\" value=\"{{item.key}}\" ng-bind=\"item.text\" ng-selected=\"item.key\"></option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Sect</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control clearwidth\" ng-model=\"selectedSect[0]\" ng-change=\"facetVM.afterSectChange(selectedSect)\">\n" +
    "                                <option value=\"\">Any</option>\n" +
    "                                <option ng-repeat=\"item in facetVM.sectList track by item.pkSectId\" value=\"{{item.pkSectId}}\" ng-bind=\"item.SectName\" ng-selected=\"item.pkSectId==selectedSect[0]\"></option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Sub Sect</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control clearwidth\" ng-model=\"selectedSubSect[0]\">\n" +
    "                                <option value=\"\">Any</option>\n" +
    "                                <option ng-repeat=\"item in facetVM.subSectList track by item.pkSubSectId\" value=\"{{item.pkSubSectId}}\" ng-bind=\"item.SubSectName\" ng-selected=\"item.pkSubSectId==selectedSubSect[0]\"></option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Caste</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control clearwidth\" ng-model=\"selectedCaste[0]\">\n" +
    "                                <option value=\"\">Any</option>\n" +
    "                                <option ng-repeat=\"item in facetVM.casteList track by item.pkCasteId\" value=\"{{item.pkCasteId}}\" ng-bind=\"item.CasteName\" ng-selected=\"item.pkCasteId==selectedCaste[0]\"></option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Mother Tongue</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control clearwidth\" ng-model=\"selectedMotherTongue[0]\">\n" +
    "                                <option value=\"\">Any</option>\n" +
    "                                <option ng-repeat=\"item in facetVM.motherTongueList track by item.pkTongueId\" value=\"{{item.pkTongueId}}\" ng-bind=\"item.TongueName\" ng-selected=\"item.pkTongueId==selectedMotherTongue[0]\"></option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Education</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control clearwidth\" no-model=\"selectedCourseGroup[0]\">\n" +
    "                                <option value=\"\">Any</option>\n" +
    "                                <option ng-repeat=\"item in facetVM.courseGroupList track by item.pkCourseGroupId\" value=\"{{item.pkCourseGroupId}}\" ng-bind=\"item.GroupName\" ng-selected=\"item.pkCourseGroupId==selectedCourseGroup[0]\"></option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\">\n" +
    "                            <label class=\"control-label\">Country</label>\n" +
    "                        </div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <select class=\"form-control clearwidth\" ng-model=\"selectedCountry[0]\">\n" +
    "                                <option value=\"\">Any</option>\n" +
    "                                <option ng-repeat=\"item in facetVM.countryList track by item.pkCountryId\" value=\"{{item.pkCountryId}}\" ng-bind=\"item.CountryName\" ng-selected=\"item.pkCountryId==selectedCountry[0]\"></option>\n" +
    "                            </select>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"row\">\n" +
    "                    <div class=\"dot-line padt10\"></div>\n" +
    "                    <div class=\"padt20\">\n" +
    "                        <div class=\"col-xs-12 col-sm-2\"></div>\n" +
    "                        <div class=\"col-xs-12 col-sm-10\">\n" +
    "                            <button type=\"button\" class=\"btn btn-success\" ng-click=\"searchByCriteria()\">Search</button>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "                <div class=\"padb35\"></div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div id=\"tabs-2\" class=\"tab-pane\" ng-class=\"{'active': activeSearchTab=='matrimonyId'}\">\n" +
    "            <h3>BY MATRIMONY ID</h3>\n" +
    "            <form name=\"memberForm\">\n" +
    "                <div class=\"padt20 form-horizontal\">\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\">\n" +
    "                                <label class=\"control-label\">BJM Matrimony ID</label>\n" +
    "                            </div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\" ng-class=\"{'has-error': memberForm.memberCode.$touched && memberForm.memberCode.$invalid, 'has-success': memberForm.memberCode.$touched && memberForm.memberCode.$valid}\">\n" +
    "                                <input class=\"form-control clearwidth\" type=\"text\" name=\"memberCode\" required ng-model=\"memberCode\"/>\n" +
    "                                <div ng-messages=\"memberForm.memberCode.$touched && memberForm.memberCode.$error\" class=\"text-danger\">\n" +
    "                                    <div ng-message=\"required\">Please write matrimony ID.</div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"row\">\n" +
    "                        <div class=\"dot-line padt10\"></div>\n" +
    "                        <div class=\"padt20\">\n" +
    "                            <div class=\"col-xs-12 col-sm-2\"></div>\n" +
    "                            <div class=\"col-xs-12 col-sm-10\">\n" +
    "                                <button type=\"button\" class=\"btn btn-success\" ng-disabled=\"memberForm.memberCode.$invalid\" ng-click=\"searchMember()\" >Search</button>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                    <div class=\"padb35\"></div>\n" +
    "                </div>\n" +
    "            </form>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "");
  $templateCache.put("search/searchResults.html",
    "<div id=\"searchbar\" class=\"row row-offcanvas row-offcanvas-left\">\n" +
    "    <div class=\"padt30\">\n" +
    "        <div class=\"col-xs-6 col-sm-3 sidebar-offcanvas\" id=\"sidebar\" role=\"navigation\">\n" +
    "            <div class=\"panel panel-default\">\n" +
    "                <div class=\"panel-heading\">\n" +
    "                    <h3 class=\"panel-title\">Refine your search</h3>\n" +
    "                </div>\n" +
    "                <div class=\"panel-body\">\n" +
    "                    <div>\n" +
    "                        <p> You can refine your search results by simply modify/change search criteria as given below:- </p>\n" +
    "                    </div>\n" +
    "                    <div class=\"accordion\" id=\"accordion1\">\n" +
    "                        <!-- Age -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse1\"> Age </a> </div>\n" +
    "                            <div id=\"collapse1\" class=\"accordion-body collapse in\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div><span class=\"glyphicon glyphicon-triangle-right\"></span><span ng-bind=\"ageFrom\"></span> yrs - <span ng-bind=\"ageTo\"></span> yrs </div>\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/age.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <!-- Height -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse2\"> Height </a> </div>\n" +
    "                            <div id=\"collapse2\" class=\"accordion-body collapse\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div> <span class=\"glyphicon glyphicon-triangle-right\"></span> <span ng-bind=\"facetVM.heightInWords(heightFrom)\"></span> - <span ng-bind=\"facetVM.heightInWords(heightTo)\"></span> </div>\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/height.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <!-- Marital Status -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse3\"> Marital Status </a> </div>\n" +
    "                            <div id=\"collapse3\" class=\"accordion-body collapse\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div ng-if=\"selectedMaritalStatus.length > 0\" ng-repeat=\"item in selectedMaritalStatus track by item\">\n" +
    "                                        <span class=\"glyphicon glyphicon-triangle-right\"></span><span ng-bind=\"getSelectedItem(item, facetVM.maritalStatusList, 'key').text\"></span>\n" +
    "                                    </div>\n" +
    "                                    <div ng-if=\"selectedMaritalStatus.length == 0 || (selectedMaritalStatus.length==1 && !selectedMaritalStatus[0])\"><span class=\"glyphicon glyphicon-triangle-right\"></span><span>Any</span></div>\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/maritalStatus.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                        <!-- Mother Toungue -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse4\"> Mother Toungue </a> </div>\n" +
    "                            <div id=\"collapse4\" class=\"accordion-body collapse\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div ng-if=\"selectedMotherTongue.length > 0\" ng-repeat=\"item in selectedMotherTongue track by item\">\n" +
    "                                        <span class=\"glyphicon glyphicon-triangle-right\"></span><span ng-bind=\"getSelectedItem(item, facetVM.motherTongueList, 'pkTongueId').TongueName\"></span>\n" +
    "                                    </div>\n" +
    "                                    <div ng-if=\"selectedMotherTongue.length==0 || (selectedMotherTongue.length==1 && !selectedMotherTongue[0])\"><span class=\"glyphicon glyphicon-triangle-right\"></span><span>Any</span></div>\n" +
    "\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/motherToungue.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <!-- Sect -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse5\"> Sect </a> </div>\n" +
    "                            <div id=\"collapse5\" class=\"accordion-body collapse\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div ng-if=\"selectedSect.length > 0\" ng-repeat=\"item in selectedSect track by item\">\n" +
    "                                        <span class=\"glyphicon glyphicon-triangle-right\"></span><span ng-bind=\"getSelectedItem(item, facetVM.sectList, 'pkSectId').SectName\"></span>\n" +
    "                                    </div>\n" +
    "                                    <div ng-if=\"selectedSect.length==0 || (selectedSect.length==1 && !selectedSect[0])\"><span class=\"glyphicon glyphicon-triangle-right\"></span><span>Any</span></div>\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/sect.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <!-- Sub Sect -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse6\"> Sub Sect </a> </div>\n" +
    "                            <div id=\"collapse6\" class=\"accordion-body collapse\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div ng-if=\"selectedSubSect.length > 0\" ng-repeat=\"item in selectedSubSect track by item\">\n" +
    "                                        <span class=\"glyphicon glyphicon-triangle-right\"></span><span ng-bind=\"getSelectedItem(item, facetVM.subSectList, 'pkSubSectId').SubSectName\"></span>\n" +
    "                                    </div>\n" +
    "                                    <div ng-if=\"selectedSubSect.length==0 || (selectedSubSect.length==1 && !selectedSubSect[0])\"><span class=\"glyphicon glyphicon-triangle-right\"></span><span>Any</span></div>\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/subsect.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <!-- Caste -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse7\"> Caste </a> </div>\n" +
    "                            <div id=\"collapse7\" class=\"accordion-body collapse\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div ng-if=\"selectedCaste.length > 0\" ng-repeat=\"item in selectedCaste track by item\">\n" +
    "                                        <span class=\"glyphicon glyphicon-triangle-right\"></span><span ng-bind=\"getSelectedItem(item, facetVM.casteList, 'pkCasteId').CasteName\"></span>\n" +
    "                                    </div>\n" +
    "                                    <div ng-if=\"selectedCaste.length==0 || (selectedCaste.length==1 && !selectedCaste[0])\"><span class=\"glyphicon glyphicon-triangle-right\"></span><span>Any</span></div>\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/caste.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <!-- Education -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse8\"> Education </a> </div>\n" +
    "                            <div id=\"collapse8\" class=\"accordion-body collapse\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div ng-if=\"selectedCourseGroup.length > 0\" ng-repeat=\"item in selectedCourseGroup track by item\">\n" +
    "                                        <span class=\"glyphicon glyphicon-triangle-right\"></span><span ng-bind=\"getSelectedItem(item, facetVM.courseGroupList, 'pkCourseGroupId').GroupName\"></span>\n" +
    "                                    </div>\n" +
    "                                    <div ng-if=\"selectedCourseGroup.length==0 || (selectedCourseGroup.length==1 && !selectedCourseGroup[0])\"><span class=\"glyphicon glyphicon-triangle-right\"></span><span>Any</span></div>\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/courseGroup.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <!-- Occupation -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse9\"> Occupation </a> </div>\n" +
    "                            <div id=\"collapse9\" class=\"accordion-body collapse\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div ng-if=\"selectedOccupationGroup.length > 0\" ng-repeat=\"item in selectedOccupationGroup track by item\">\n" +
    "                                        <span class=\"glyphicon glyphicon-triangle-right\"></span><span ng-bind=\"getSelectedItem(item, facetVM.occupationGroupList, 'pkOccGroupId').GroupName\"></span>\n" +
    "                                    </div>\n" +
    "                                    <div ng-if=\"selectedOccupationGroup.length==0 || (selectedOccupationGroup.length==1 && !selectedOccupationGroup[0])\"><span class=\"glyphicon glyphicon-triangle-right\"></span><span>Any</span></div>\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/occupationGroup.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <!-- Annual Income -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse10\"> Annual Income </a> </div>\n" +
    "                            <div id=\"collapse10\" class=\"accordion-body collapse\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div ng-if=\"selectedAnnualIncome\"><span class=\"glyphicon glyphicon-triangle-right\"></span><span ng-bind=\"selectedAnnualIncome.text\"></span></div>\n" +
    "                                    <div ng-if=\"!selectedAnnualIncome\"><span class=\"glyphicon glyphicon-triangle-right\"></span><span>Any</span></div>\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/annualIncome.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "\n" +
    "                        <!-- Country -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse11\"> Country </a> </div>\n" +
    "                            <div id=\"collapse11\" class=\"accordion-body collapse\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div ng-if=\"selectedCountry.length > 0\" ng-repeat=\"item in selectedCountry track by item\">\n" +
    "                                        <span class=\"glyphicon glyphicon-triangle-right\"></span><span ng-bind=\"getSelectedItem(item, facetVM.countryList, 'pkCountryId').CountryName\"></span>\n" +
    "                                    </div>\n" +
    "                                    <div ng-if=\"selectedCountry.length==0 || (selectedCountry.length==1 && !selectedCountry[0])\"><span class=\"glyphicon glyphicon-triangle-right\"></span><span>Any</span></div>\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/country.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                        <!-- Physical Status -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse12\"> Physical Status </a> </div>\n" +
    "                            <div id=\"collapse12\" class=\"accordion-body collapse\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div ng-if=\"selectedPhysicalStatus.length > 0\" ng-repeat=\"item in selectedPhysicalStatus track by item\">\n" +
    "                                        <span class=\"glyphicon glyphicon-triangle-right\"></span><span ng-bind=\"getSelectedItem(item, facetVM.physicalStatusList, 'key').text\"></span>\n" +
    "                                    </div>\n" +
    "                                    <div ng-if=\"selectedPhysicalStatus.length==0 || (selectedPhysicalStatus.length==1 && !selectedPhysicalStatus[0] && selectedPhysicalStatus[0] !== 0)\"><span class=\"glyphicon glyphicon-triangle-right\"></span><span>Any</span></div>\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/physicalStatus.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                        <!-- Employed in -->\n" +
    "                        <div class=\"accordion-group\">\n" +
    "                            <div class=\"accordion-heading\"> <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse13\"> Employed in </a> </div>\n" +
    "                            <div id=\"collapse13\" class=\"accordion-body collapse\">\n" +
    "                                <div class=\"accordion-inner\">\n" +
    "                                    <div ng-if=\"selectedEmployedIn.length > 0\" ng-repeat=\"item in selectedEmployedIn track by item\">\n" +
    "                                        <span class=\"glyphicon glyphicon-triangle-right\"></span><span ng-bind=\"getSelectedItem(item, facetVM.employedInList, 'key').text\"></span>\n" +
    "                                    </div>\n" +
    "                                    <!-- ko if:  -->\n" +
    "                                    <div ng-if=\"selectedEmployedIn.length==0 || (selectedEmployedIn.length==1 && !selectedEmployedIn[0])\"><span class=\"glyphicon glyphicon-triangle-right\"></span><span>Any</span></div>\n" +
    "                                    <!-- /ko -->\n" +
    "                                    <div class=\"tlright\"> <a class=\"btn btn-primary\" ng-click=\"openModal('search/modals/employedIn.html')\" title=\"click here to change criteria\">change</a> </div>\n" +
    "                                </div>\n" +
    "                            </div>\n" +
    "                        </div>\n" +
    "                    </div>\n" +
    "                </div>\n" +
    "            </div>\n" +
    "        </div>\n" +
    "        <div class=\"col-xs-12 col-sm-9\">\n" +
    "            <p class=\"pull-left visible-xs\">\n" +
    "                <button type=\"button\" class=\"btn btn-primary btn-xs\" data-toggle=\"offcanvas\" data-bind=\"click: function(){$root.toggleClass('#searchbar','active');}\">Refine Your Search</button>\n" +
    "            </p>\n" +
    "            <div class=\"clearfix\"></div>\n" +
    "            <div ng-include=\"'search/renderResults.html'\"></div>\n" +
    "        </div>\n" +
    "    </div>\n" +
    "</div>\n" +
    "");
  $templateCache.put("static/aboutus.html",
    "<div >\n" +
    "    <h3>About Us</h3>\n" +
    "    <div class=\"dot-line padt10\"></div>\n" +
    "    <h4>A exclusive matrimony portal for the Indian JAIN Community.</h4>\n" +
    "    <p> The <strong><a href=\"http://www.jainmilanmatrimonial.com\">http://www.jainmilanmatrimonial.com</a></strong> is a part of an religious organization named <strong>Bhartiya Jain Milan</strong> which is spreaded all over india. </p>\n" +
    "    <p> Bhartiya Jain Milan is the most trusted organization <strong>since 21st June 1953</strong>. It's first unit is established at sangam of\n" +
    "        holy rivers in Allahabad. </p>\n" +
    "    <p> This organization is a unit of diffrent branches of jain religion (Digamber, Shavetamber, Sthanakvasi and Terahpanthi). </p>\n" +
    "</div>\n" +
    "");
  $templateCache.put("static/contactus.html",
    "<div >\n" +
    "    <h3>Contact Us</h3>\n" +
    "    <div class=\"dot-line padt10\"></div>\n" +
    "    <h4>Narendra Jain Rajkamal</h4>\n" +
    "    <span><strong>General Secretary (Organization) of Bhartiya Jain Milan</strong></span>\n" +
    "    <h5><strong>Mobile:</strong> 09837048560</h5>\n" +
    "    <h5><strong>Email:</strong> contactus@bhartiyajainmilan.com</h5>\n" +
    "    <br><br>\n" +
    "    <h4>Caretaker of Jain Milan Matrimonial</h4>\n" +
    "    <div class=\"dot-line padt10\"></div>\n" +
    "    <h5>Narendra Jain Rajkamal</h5>\n" +
    "    <div><span>Rajkamal House, Gandhi Road, Baraut</span></div>\n" +
    "    <div><span>Distt. Baghpat (Uttar Pradesh) Pin: 250611</span></div>\n" +
    "    <div><span>Email: contactus@bhartiyajainmilan.com</span></div>\n" +
    "</div>\n" +
    "");
  $templateCache.put("static/privacypolicy.html",
    "<div >\n" +
    "    <h3>Privacy Policy</h3>\n" +
    "    <div class=\"dot-line padt10\"></div>\n" +
    "    <p> <strong><a href=\"http://www.jainmilanmatrimonial.com\">http://www.jainmilanmatrimonial.com</a></strong> is an online matrimonial portal endeavouring constantly to provide you with premium matrimonial services. This privacy statement is common to all the matrimonial sites operated under <a href=\"http://www.jainmilanmatrimonial.com\">http://www.jainmilanmatrimonial.com</a>. Since we are strongly committed to your right to privacy, we have drawn out a privacy statement with regard to the information we collect from you. </p>\n" +
    "    <p> We use a secure server for credit card transactions to protect the credit card information of our users and Cookies are used to store the login information. </p>\n" +
    "    <dl>\n" +
    "        <dt>What information you need to give in to use this site?</dt>\n" +
    "        <dd>\n" +
    "            <p> The information we gather from members and visitors who apply for the various services our site offers includes, but may not be limited to, email address, first name, last name, a user-specified password, mailing address, zip code and telephone number or fax number. </p>\n" +
    "            <p> If you establish a credit account with us to pay the fees we charge, some additional information, including a billing address, a credit card number and a credit card expiration date and tracking information from checks or money orders is collected. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>How the site uses the information it collects/tracks?</dt>\n" +
    "        <dd>\n" +
    "            <p> Bhartiya Jain Milan collects information from our users primarily to ensure that we are able to fulfill your requirements and to deliver Personalised experience. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>With whom the site shares the information it collects/tracks?</dt>\n" +
    "        <dd>\n" +
    "            <p> The information collected from any of our users is not shared with any individual or organisation without the former's approval. <br>\n" +
    "                <a href=\"http://www.jainmilanmatrimonial.com\">http://www.jainmilanmatrimonial.com</a> does not sell, rent, or loan any identifiable information at the individual level regarding its customers to any third party. Any information you give us is held with the utmost care and security. We are also bound to cooperate fully should a situation arise where we are required by law or legal process to provide information about a customer. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>Do all visitors have to pay?</dt>\n" +
    "        <dd>\n" +
    "            <p> NO. All visitors to our site may browse the site, search the ads and view any articles or features our site has to offer without entering any personal information or paying money. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>How to unsubscribe the membership?</dt>\n" +
    "        <dd>\n" +
    "            <p> The members are requested to login to the relevant pages for unsubscription. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>Can users contact any number of profiles in a single day?</dt>\n" +
    "        <dd>\n" +
    "            <p> As a paid member of this site, you have the privilege to contact hundreds of profiles. However, there is a specified limit to 150 contacts per day for security reasons. If you want to contact more profiles than the specified limit in a single day, you can do so after the completion of 12 hours of login time. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>Notice</dt>\n" +
    "        <dd>\n" +
    "            <p> We may change this Privacy Policy from time to time based on your comments or as a result of a change of policy in our company. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <p> If you have any questions regarding our Privacy Statement, please write in to <a href=\"mailto:matrimony@bhartiyajainmilan.com\">matrimony@bhartiyajainmilan.com</a> </p>\n" +
    "</div>");
  $templateCache.put("static/termsnconditions.html",
    "<div >\n" +
    "    <h3>Terms and Conditions governing usage of Jain Milan Matrimonial</h3>\n" +
    "    <div class=\"dot-line padt10\"></div>\n" +
    "    <h4>Dear User:</h4>\n" +
    "    <h5><strong>Welcome to Jain Milan Matrimonial (herein referred as JMM).</strong></h5>\n" +
    "    <p> JMM and its affiliates provide their services to you subject to the following terms and conditions. On your visit or signing up at JMM, you consciously accept the terms and conditions as set out hereinbelow. In addition, when you use or visit any current or future JMM service or any business affiliated with JMM, whether or not included in the JMM Web site, you will also be subject to the guidelines and conditions applicable to such service or business. Please read the various services provided by JMM before making any payment in respect of any service. </p>\n" +
    "    <p> The Users availing services from JMM shall be deemed to have read, understood and expressly accepted and agreed to the terms and conditions hereof and this agreement shall govern the relationship between you and JMM and all transactions or services by, with or in connection with JMM for all purposes, and shall be unconditionally binding between the parties without any reservation. All rights, privileges, obligations and liabilities of you and/or JMM with respect to any transactions or services by, with or in connection with JMM for all purposes shall be governed by this agreement. The terms and conditions may be changed and/or altered by JMM from time to time at its sole discretion. </p>\n" +
    "    <dl>\n" +
    "        <dt>1. Criteria</dt>\n" +
    "        <dd>\n" +
    "            <p> JMM shall act on the basis of the information that may be submitted by you, believing the same to be true and accurate even if the information is provided during the registration by your family, friends, relatives on your behalf under your express consent . JMM is under no obligation to verify the accuracy or genuineness of the information submitted by you. </p>\n" +
    "            <ul>\n" +
    "                <li> The minimum age for registering in JMM is 18 years for women and 21 years for men and the maximum age limit is 70 years. </li>\n" +
    "                <li> You represent and warrant that you have the right, authority and legal capability to enter into this Agreement and that you are neither prohibited nor disabled by any law in force from entering into a contract. </li>\n" +
    "                <li> You have gone through the Terms and Conditions and agree to be bound by them. </li>\n" +
    "            </ul>\n" +
    "            <p> If at any time JMM, in its sole discretion, is of the opinion or has any reason to believe that You are not eligible to become a member or that you have made any misrepresentation about your eligibility, JMM hereby reserves the right to forthwith terminate your membership and/or your right to use the services of JMM without any refund of any monies paid to JMM. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>2. Invitation</dt>\n" +
    "        <dd>\n" +
    "            <p> 2. 1. You hereby expressly solicit and invite JMM and/or its authorized personnel to communicate to you through any telecom resources in the registered number provided by you to explain, explicate and clarify the various services provided by JMM and to assist, aid or support you in availing the said services of JMM. </p>\n" +
    "            <p> 2. 2. If at any time, you wish to discontinue receiving the communications (including, but not limited to emails, sms and phone calls) from JMM, you may by email to matrimony@bhartiyajainmilan.com to indicate the same to JMM and/or its authorized personnel regarding such discontinuance and You hereby agree that, unless expressly communicated to You about discontinuing communications from JMM to JMM and/or its authorized personnel, it will be deemed to be that you want to continue and solicit and invite all such or other communications from JMM. </p>\n" +
    "            <p> 2. 3. You are representing that you or the mobile number submitted by you is not registered with the Do Not Disturb / National Customer Preference Register and/or you have already changed your registration suitably. </p>\n" +
    "            <p> 2. 4. Further and in any event, you do hereby also unconditionally agree and undertake that this invitation and solicitation shall supersede any preferences set by you with or registration done with the Do Not Disturb (\"DND Register\")/ National Customer Preference Register (\"NCPR\"). Without prejudice to the aforesaid and in any event, by expressly inviting and soliciting the services from JMM, you also unconditionally agree that your rights under the Telecom Commercial Communications Customer Preference Regulations, 2010 or any subsequent amendments thereto or under NCPR, are kept in abeyance or remain extinguished till you expressly communicate for discontinuation of relationship. </p>\n" +
    "            <p> 2. 5. You also unconditionally agree to indemnify JMM against all losses, damages, penalties, costs or consequences whether direct or indirect, that may arise out of any breach or violation of the aforesaid representation, commitment and undertaking. </p>\n" +
    "            <p> 2. 6. When you visit JMM or send e-mails to us, you are communicating with us electronically. You consent to receive communications from us electronically. We will communicate with you by e-mail or by posting notices on this site. You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>3. Privacy Policy</dt>\n" +
    "        <dd>\n" +
    "            <p> Please read and comprehend our Privacy Policy, which also governs your visit to JMM, to understand our practices. Members agree that their profile(s) may be crawled and indexed by search engines, where JMM and its network does not have any control over the search engines behavior and JMM shall not be responsible for such activities of other search engines. </p>\n" +
    "            <p> JMM is not responsible for any errors, omissions or representations on any of its pages or on any links or on any of the linked website pages. JMM does not endorse any advertiser on its web pages in any manner and you are requested to verify the accuracy of all information on your own before undertaking any reliance on such information. The linked sites are not under the control of JMM and JMM is not responsible for the contents of any linked site or any link contained in a linked site, or any changes or updates to such sites. </p>\n" +
    "            <p> JMM has the right to change its features and services from time to time based on members comments or as a result of a change of policy in our company. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>4. Copyright</dt>\n" +
    "        <dd>\n" +
    "            <p> All contents included on this site, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property of JMM or its content suppliers and protected by Indian and international copyright laws. The compilation of all contents on this site is the exclusive property of JMM and protected by Indian and international copyright laws. All software used on this site is the property of JMM or its software suppliers and protected by Indian and international copyright laws. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>5. Trademark</dt>\n" +
    "        <dd>\n" +
    "            <p> JMM is the owner and authorized user of the following domain names: </p>\n" +
    "            <ul>\n" +
    "                <li><a href=\"http://www.bhartiyajainmilan.com\">http://www.bhartiyajainmilan.com</a></li>\n" +
    "                <li><a href=\"http://www.jainmilanmatrimonial.com\">http://www.jainmilanmatrimonial.com</a></li>\n" +
    "            </ul>\n" +
    "            <p> JMM graphics, logos, page headers, button icons, scripts, and service names are trademarks or trade address of JMM or its subsidiaries. JMM's trademarks and trade address may not be used in connection with any product or service that is not JMM, in any manner that is likely to cause confusion among customers or in any manner that disparages or discredits JMM. All other trademarks not owned by JMM or its subsidiaries that appear on this site are the property of their respective owners, who may or may not be affiliated with, connected to, or sponsored by JMM or its subsidiaries. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>6. License and Site Access</dt>\n" +
    "        <dd>\n" +
    "            <p> JMM grants you a limited license to access and make personal use of this site and not to download (other than page caching) or modify it, or any portion of it, except with express written consent of JMM. This license does not include any resale or commercial use of this site or its contents; any collection and use of any product listings, descriptions, or prices; any derivative use of this site or its contents; any downloading or copying of account information for the benefit of another merchant; or any use of data mining, robots, or similar data gathering and extraction tools. This site or any portion of this site may not be reproduced, duplicated, copied, sold, resold, visited, or otherwise exploited for any commercial purpose without express written consent of JMM. You may not frame or utilize framing techniques to enclose any trademark, logo, or other proprietary information (including images, text, page layout, or form) of JMM and our affiliates without express written consent. You may not use any Meta tags or any other \"hidden text\" utilizing JMM name or trademarks without the express written consent of JMM. Any unauthorized use terminates the permission or license granted by JMM. You may not use any JMM logo or other proprietary graphic or trademark as part of the link without express written permission. By registering your profile through any of our domains [Listed in the Annexure], you explicitly authorize JMM to automatically copy your profiles from JMM domain to its Community Bases Matrimonial Sites based on member information relevance like caste, sub caste, religion, age, marital status etc. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>7. Your Account</dt>\n" +
    "        <dd>\n" +
    "            <p> If you use or register in this site, you are responsible for maintaining the confidentiality of your account and password and for restricting access to your computer, and you agree to accept responsibility for all activities that occur under your account or password. You also hereby expressly agree that the information provided by you is available to the other users of JMM also and that JMM neither has any control nor any responsibility or accountability if information is misused, exploited or abused by any third party. JMM and its affiliates reserve the right to refuse service, terminate accounts, remove or edit content, or cancel subscription at their sole discretion. </p>\n" +
    "            <p> You cannot engage in advertising to, or solicitation of, other members to buy or sell any products or services through JMM. You will not transmit any chain letters or junk email to other members. You understand and agree that JMM cannot monitor the conduct of its members off JMM Site, it is also a violation of these rules to use any information obtained from JMM in order to harass, abuse, or harm another person, or in order to contact, advertise to, solicit, or sell to any member without the prior explicit consent of the member or JMM. </p>\n" +
    "            <p> The Partner Preference should be set by every member. In case the member has not set the Preference or has not set the Preference correctly, then JMM shall set the Partner Preference based on his/her profile information where member can also edit the same at any point of time. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>8. Membership and Money back Guarantee</dt>\n" +
    "        <dd>\n" +
    "            <p> By registering your profile through any of our domains [Listed in the Annexure] or by the remittance of fees you become a member of JMM. </p>\n" +
    "            <p> JMM offers a 100% refund if members do not get any response within 30 days. To be eligible for the refund, members should fulfill the following: </p>\n" +
    "            <ul>\n" +
    "                <li> Upload atleast one photo. </li>\n" +
    "                <li> Contact a minimum of 10 members. </li>\n" +
    "            </ul>\n" +
    "            <p>Inspite of fulfilling these requirements,</p>\n" +
    "            <ul>\n" +
    "                <li> If members do not get a reply to their Personalised Messages. </li>\n" +
    "                <li> If members are not contacted by other members. </li>\n" +
    "                <li> If members do not view/take any verified contact numbers. </li>\n" +
    "                <li> If others don't view/take your contact number. </li>\n" +
    "            </ul>\n" +
    "            <p> Moneyback guarantee is available only for 3, 6 & 9 months Classic Super, Classic Plus and Classic Memberships. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <p> <strong>Membership is not automatic:</strong> The right of admission vests with JMM. You become a member upon due acceptance of the Profile/Payment by JMM. Membership and rights of admission is reserved solely for </p>\n" +
    "    <ul>\n" +
    "        <li>Indian Nationals &amp; Citizens.</li>\n" +
    "        <li>Persons of Indian Origin (PIO).</li>\n" +
    "        <li>Non Resident Indians (NRI).</li>\n" +
    "        <li>Persons of Indian Descent or Indian Heritage.</li>\n" +
    "    </ul>\n" +
    "    <p> <strong>Length of Membership:</strong> You continue to be a member of JMM till: </p>\n" +
    "    <ul>\n" +
    "        <li>JMM discharges its obligations to you by rendering its services to you; or JMM or yourself terminate the membership arrangement.</li>\n" +
    "        <li><strong>Paid Memberships:</strong> Validity of your paid membership is based on days (90, 180 or 270) and not based on months (3, 6 or 9).</li>\n" +
    "    </ul>\n" +
    "    <p> <strong>Expiry of Membership -</strong> Once your membership with us expires, you will not be able to access your personalized messages sent, and mobile numbers viewed by you. We request you to save all your contacts you had contacted already and also upgrade your membership with us to enjoy access to these features. </p>\n" +
    "    <p> <strong>Privacy of Membership:</strong> Your Membership is only for personal use. It is not to be assigned, transferred or licensed so as to be used by any other person/entity, without the express written consent of JMM. </p>\n" +
    "    <p> Members are advised to make appropriate/thorough enquiries before acting upon any matrimonial advertisement. JMM does not provide guarantee for or assurance of or subscribe to the claims and representations made by advertisers regarding particulars of status, age, income of other members. JMM also does not vouch for the contents of the Voice Messages exchanged between members. </p>\n" +
    "    <p> JMM reserves the right but is not obligated, to place Matrimonial Classifieds derived from your JMM profile in newspapers, television or any other media at the sole discretion of JMM. Members are advised to make appropriate/thorough enquiries before acting upon any response to these matrimonial advertisements. JMM does not provide guarantee for or assurance of or subscribe to the claims and representations made by respondants regarding any particulars including but not limited to status, age, income. </p>\n" +
    "    <p> <strong>Auto Renewal - Only for payments made other than Indian Currency</strong> </p>\n" +
    "    <p> In order to ensure that members have uninterrupted access to JMM services, for all those members who have made online payment other than Indian Currency , will be automatically renewed on the day of the membership expiry. Members will be intimated a week in advance, prior to auto renewal and on the day of auto-renewal, an e-mail intimation will be sent to the member about the auto renewal process. The membership will automatically be renewed by charging the membership fee to the credit card, which was used to make the initial payment. </p>\n" +
    "    <p> Members have an option to turn off the auto renewal process. 7 days prior to auto renewal the member will be intimated by e-mail with an option to cancel auto renewal. On the day of renewal, the member will receive an e-mail with a cancellation button. Upon clicking the same, you will get the confirmation call from JMM Customer Care Executive. </p>\n" +
    "    <dl>\n" +
    "        <dt>9. Online Conduct</dt>\n" +
    "        <dd>\n" +
    "            <p> You are responsible for the content and information [including profile and photograph] you post or transmit through JMM's services. You will not post or transmit any content or information [in whatever form they may be contained] that is defamatory, blasphemous, abusive, obscene, sexually oriented, profane, intimidating, illegal or in violation of the rights of any person, including intellectual property rights. No content or information shall contain details or particulars of any of JMM's competitors, including their contact details. You will not use either your online or offline membership as a platform for any kind of promotional campaign, solicitation, advertising or dealing in any products or services or transmit any chain letters or junk mails. </p>\n" +
    "            <p> Extraneous contents: JMM hereby alerts and warns its members of the possibility of unauthorized posting of contents by any person including members and unauthorized users and advises discretion in access since such content, information or representation may not be suitable to you including being offensive. JMM will not in any way be responsible for such content, information or representations. JMM is also not responsible for alterations, modifications, deletion, reproduction, sale, transmission or any such misuse of data and content in the public domain by any user. </p>\n" +
    "            <p> There is a limit to the number of profiles you are allowed to contact each day. Also, you cannot contact more than 3000 profiles in a period of 3 months. </p>\n" +
    "            <p> Mobile number verification is mandatory to contact other members. Effective 20th November 2012, JMM has become the Only Matrimony Site in the World with 100% Verified Mobile Numbers. All profiles are reachable through mobile. Profiles who have not verified their mobile numbers will not be part of JMM sites any more. </p>\n" +
    "            <p> Being a free member you can express your interest to a limited number of members. This is valid for a limited period only. JMM reserves the right to provide this feature to its members. </p>\n" +
    "            <p> Your membership will automatically be suspended if you send \"abusive, obscene or sexually oriented\" message/s to other members. </p>\n" +
    "            <p> JMM has the right to suspend your profile without any prior notice. </p>\n" +
    "            <p> JMM reserves the right to edit/delete your photo/horoscope if it's not a valid/clear/related one. </p>\n" +
    "            <p> If we find duplicate profiles then we have rights to suspend any of the profile or all the profiles. </p>\n" +
    "            <p> Messages sent to members of the opposite gender should be only for the purpose of finding a life partner. You are not allowed to misuse the services of JMM in the name of \"Dating\", \"Flirting\", \"Friendship\" etc. </p>\n" +
    "            <p> JMM reserves the right to modify your profile if any prohibitive or objectionable content is found, or in the case of your contact details being entered in irrelevant fields. JMM may also modify the profile for other reasons not mentioned herewith. If any abusive content is found in your video clipping, JMM has the right to suspend your profile. </p>\n" +
    "            <p> You will not post or transmit any content, information or trademarks without the prior consent of the person holding its proprietary or licensed rights. JMM will not in any way be responsible or answerable to any action brought by any person arising out of your acts as described above. </p>\n" +
    "            <p> JMM reserves the right to remove/edit any information posted by the member on the publicly accessible areas of the site which talks about social media related content. </p>\n" +
    "            <p> JMM reserves the right but is not obligated, to edit, delete, eclipse or withhold display of such content or information as it deems fit in the light of the rules prescribed above. </p>\n" +
    "            <p> To enhance the security of its members, JMM has restricted copying and saving images and content from certain sections of the portal. </p>\n" +
    "            <p> We validate only the profile details of the member. Character verification has to be done by interested parties themselves. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>10. Disclaimer of Warranties And Limitation of Liability</dt>\n" +
    "        <dd>\n" +
    "            <p> This site is provided by JMM on an \"as is\" and \"as available\" basis. JMM makes no representations or warranties of any kind, express or implied, as to the operation of this site or the information, content, materials, or products included on this site. You expressly agree that your use of this site is at your sole risk. </p>\n" +
    "            <p> To the full extent permissible by applicable law, JMM disclaims all warranties, express or implied, including, but not limited to, implied warranties of merchantability and fitness for a particular purpose. JMM does not warrant that this site, its servers, or e-mail sent from JMM are free of viruses or other harmful components. JMM will not be liable for any damages of any kind arising from the use of this site, including, but not limited to direct, indirect, incidental, punitive, and consequential damages. </p>\n" +
    "            <p> Notwithstanding anything contrary contained anywhere, under no circumstances, JMM shall be held responsible or liable whatsoever ort howsoever, arising out of, relating to or connected with: </p>\n" +
    "            <ul>\n" +
    "                <li> any act or omission not done by JMM; </li>\n" +
    "                <li> any untrue or incorrect information submitted by you or on your behalf; </li>\n" +
    "                <li> any decision taken by you or on your behalf or any consequences thereof, based on any information provided by any other user; </li>\n" +
    "                <li> any unauthorized or illegal act done by any third party relating to or connected with any information submitted by you or on your behalf; </li>\n" +
    "                <li> any cybercrime attempted or committed by anyone; </li>\n" +
    "                <li> any incident of force-majeure or 'act of god'. </li>\n" +
    "            </ul>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>11. Refund Of Fee</dt>\n" +
    "        <dd>\n" +
    "            <p> If you choose to terminate your membership, the MEMBERSHIP FEES ARE NOT REFUNDABLE under any circumstances. </p>\n" +
    "            <p> Your membership in the JMM service is for your sole, personal use. You may not authorize others to use your membership and you may not assign or transfer your account to any other person or entity. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>12. No Agency</dt>\n" +
    "        <dd>\n" +
    "            <p> Besides the provision of services, JMM acts as a platform for all its members to interchange information that would promote their common matrimonial objectives. It is to be distinctly understood that JMM will only provide contact between and among members within its service framework and not the direct contact details of such members. JMM is not the agent of any member and does not partake in the interchange or the results thereof. JMM reserves the right, but has no obligation, to monitor disputes between you and other members of JMM. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>13. Right to form Consortium/Associates</dt>\n" +
    "        <dd>\n" +
    "            <p> While providing services, JMM may outsource any part thereof to any competent person or organization, with or without disclosing it to you. However, your membership rights and responsibilities continue as against JMM only and not against such persons or organizations. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>14. Indemnity</dt>\n" +
    "        <dd>\n" +
    "            <p> You hereby agree to indemnify, defend and hold harmless JMM and/or its affiliates, their websites and their respective lawful successors and assigns from and against any and all losses, liabilities, claims, damages, costs and expenses (including reasonable legal fees and disbursements in connection therewith and interest chargeable thereon) asserted against or incurred by JMM and/or its affiliates, partner websites and their respective lawful successors and assigns that arise out of, result from, or may be payable by virtue of, any breach or non-performance of any representation, warranty, covenant or agreement made or obligation to be performed by You pursuant to this agreement. </p>\n" +
    "            <p> You shall be solely and exclusively liable for any breach of any country specific rules and regulations or general code of conduct and JMM cannot be held responsible for the same. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>15. General Provisions</dt>\n" +
    "        <dd>\n" +
    "            <p> <strong>Confidentiality:</strong> JMM will maintain confidential, all personal information [other than that meant for posting or transmission] furnished by members and shall take all possible and /or bonafide steps for maintaining the confidentiality. However, JMM may divulge such information if required by law. It is unconditionally agreed, understood and acknowledged by you that the information and/or data that may be submitted by you shall be preserved and retained by JMM for all time to come as permissible under law, notwithstanding cessation, termination or discontinuation of the membership. </p>\n" +
    "            <p> <strong>Termination of Membership:</strong> The membership may be terminated by either party by serving a written notice on the other. JMM reserves the right to terminate the membership, to suspend a profile or to disable access in respect of any member in breach of any of the terms. In any case the Membership fees will not be refundable. </p>\n" +
    "            <p> <strong>Site Policies, Modification and Severability</strong> </p>\n" +
    "            <p> Please review our other policies, such as our pricing policy, posted on this site. These policies also govern your visit to www.matrimony.bharatiyajainmilan.com and consortium of portals. We reserve the right to make changes to our site, policies, and these Terms and Conditions of Use at any time. If any of these conditions shall be deemed invalid, void, or for any reason unenforceable, that condition shall be deemed severable and shall not affect the validity and enforceability of any remaining condition. </p>\n" +
    "            <p> <strong>Suggestions, Complaints, Disputes:</strong> Suggestions and complaints are to be first addressed to JMM's customer care team at customercare@matrimony.bharatiyajainmilan.com. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <dl>\n" +
    "        <dt>16. Applicable Law</dt>\n" +
    "        <dd>\n" +
    "            <p> The membership is deemed to have been entered into at Chennai, India and the laws of India will govern the membership and any violation of the terms and conditions provided herein. Disputes arising out of or in any way affecting the membership including interpretation of any of the terms are subject to Courts of appropriate jurisdiction in Chennai. You hereby explicitly agree for Chennai courts jurisdiction for any disputes that may arise. </p>\n" +
    "        </dd>\n" +
    "    </dl>\n" +
    "    <p> <strong>17.</strong> In the event, you are not agreeable to any of the terms or conditions herein contained, please reconsider and please refrain from registration. </p>\n" +
    "</div>");
  $templateCache.put("test.html",
    "<div class=\"modal-header\">\n" +
    "  <h3>Add new provider</h3>\n" +
    "</div>\n" +
    "<div class=\"modal-body\">\n" +
    "  <form name=\"form\" novalidate=\"true\" role=\"form\">\n" +
    "    <div class=\"form-group\">\n" +
    "      <label>Name</label>\n" +
    "      <input ng-model=\"referrer.name\" placeholder=\"Provider name\" type=\"text\" class=\"form-control\"/>\n" +
    "    </div>\n" +
    "  </form>\n" +
    "</div>\n" +
    "<div class=\"modal-footer\">\n" +
    "  <button ng-click=\"cancel()\" class=\"btn btn-info\">Cancel</button>\n" +
    "  <button data-style=\"expand-right\" ladda=\"{{ saving }}\" ng-click=\"create()\" style=\"margin:10px;\" class=\"ladda-button btn btn-primary\">\n" +
    "    <span class=\"ladda-label\">Create</span>\n" +
    "    <span ng-show=\"saving\" class=\"ladda-spinner\">\n" +
    "      <img src=\"dist/images/button-spinner.gif\"/>\n" +
    "    </span>\n" +
    "  </button>\n" +
    "</div>\n" +
    "");
}]);
