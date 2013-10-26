requirejs.config({
    //By default load modules from js/lib
    baseUrl : siteBaseUrl +'/js/lib',
    //except
    paths : {
		main  	: siteBaseUrl + '/js/main',
		facet	: siteBaseUrl + '/js/facet',
		search 	: siteBaseUrl + '/js/search',
		register: siteBaseUrl + '/js/register',
		route	: siteBaseUrl + '/js/route'
    },    
    config : {
        isBuild : false
    }
});
require(['jquery', 'knockout', 'infuser-amd', 'koExternalTemplateEngine-amd', 'knockout.validation', 'knockout-postbox.min', 'bootstrap.min', 'bootstrap-datetimepicker.min', 'jhash-2.1.min', 'main/main', 'domReady!'], 
function( $,        knockout,   infuser,       koExtTemplate,                  koValidation,              koPostbox,          bootstrap,       bootstrapDTP,            		route,      	   Main) {
    // Set up some defaults for templates loaded using koExternalTemplateEngine
    infuser.defaults.templateSuffix = ".tmpl.html"
    infuser.defaults.templateUrl = "js";
    infuser.defaults.loadingTemplate.content = '<div class="template-loader"></div>';
    //infuser.defaults.cache = false;
    infuser.defaults.ajax = {cache: false};
    //initialize validation using knockout.validation
    knockout.validation.configure({
        registerExtenders: true,
        parseInputAttributes: true,
        messageTemplate: null
        //messageTemplate: 'main/views/error-message'	
    });
    knockout.validation.init();
    // Init the viewmodel
    var mainVM = new Main();
    // Apply Knockout.js bindings for search viewmodel
    knockout.applyBindings(mainVM);
});