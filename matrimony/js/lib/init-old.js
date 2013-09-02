/*requirejs.config({
    //By default load modules from js/lib
    baseUrl : siteBaseUrl +'/js/lib',
    //except
    paths : {
		main           : siteBaseUrl + '/js/main'
     
    },
    config : {
        isBuild : false
    }
});

require(['jquery', 'jquery-ui', 'koGrid-2.1.1.debug', 'knockout', 'knockout-sortable', 'infuser-amd', 'koExternalTemplateEngine-amd', 'knockout.validation.min', 'knockout-postbox.min', 'bootstrap.min', 'ajaxutil', 'ajaxfileupload', 'underscore-min', 'main/main', 'domReady!'], 
function( $,        jqueryui,                     koGrid,               knockout,   kosortable,          infuser,       koExtTemplate,                  koValidation,              koPostbox,              bootstrap,       ajaxutil,   ajaxfileupload,   underscoremin,  Main) {

    // Set up some defaults for templates loaded using koExternalTemplateEngine
    infuser.defaults.templateSuffix = ".tmpl.html"
    infuser.defaults.templateUrl = "../../";

    //initialize validation using knockout.validation
    knockout.validation.configure({
        registerExtenders: true,
        parseInputAttributes: true,
        messageTemplate: null,
    });
    knockout.validation.init();

	// Get the spaceId
    //var spaceId = $('div.currentLearningSpace').attr('id');

    // Init the viewmodel for the dashboard
    var main = new Main();
	var mainViewModel = new main.mainViewModel();
 
    // Init pager with the viewModel
    //pager.extendWithPage(viewModel);
              
    // Apply Knockout.js bindings for dashboard viewmodel
    knockout.applyBindings(mainViewModel);

    // start pager
    //pager.start();
    //console.log("DONE initializing pager... hash value is " + pager.Href.hash);
    //console.log("Pager details" + window.define);
});*/