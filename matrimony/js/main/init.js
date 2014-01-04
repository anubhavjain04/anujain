requirejs.config({
    //By default load modules from js/lib
    baseUrl : siteBaseUrl +'/js/lib',
    urlArgs: "v="+version,
    //except
    paths : {
		main  	: siteBaseUrl + '/js/main',
		facet	: siteBaseUrl + '/js/facet',
		search 	: siteBaseUrl + '/js/search',
		register: siteBaseUrl + '/js/register',
		member	: siteBaseUrl + '/js/member',
		route	: siteBaseUrl + '/js/route',
		login	: siteBaseUrl + '/js/login',
    },    
    config : {
        isBuild : false
    }
});
require(['jquery', 'jquery-migrate-1.2.1.min', 'knockout', 'infuser-amd', 'koExternalTemplateEngine-amd', 'knockout.validation', 'knockout-postbox.min', 'bootstrap.min', 'jhash-custom-2.1.min', 'main/main', 'domReady!'], 
function( $,        jqueryMigrate,				knockout,   infuser,       koExtTemplate,                  koValidation,              koPostbox,          bootstrap,       	route,      	   Main) {
    // Set up some defaults for templates loaded using koExternalTemplateEngine
    infuser.defaults.templateSuffix = ".tmpl.html?v="+version;
    infuser.defaults.templateUrl = "js";
    infuser.defaults.loadingTemplate.content = '<div class="template-loader"></div>';
    //infuser.defaults.cache = false;
    //infuser.defaults.ajax = {cache: false};
    //initialize validation using knockout.validation
    knockout.validation.configure({
        registerExtenders: true,
        parseInputAttributes: true,
        //messageTemplate: null
        messageTemplate: 'main/views/error-message'	
    });
    knockout.validation.init();
    // Init the viewmodel
    var mainVM = new Main();
    // Apply Knockout.js bindings for search viewmodel
    knockout.applyBindings(mainVM);
});