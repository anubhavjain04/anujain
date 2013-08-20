requirejs.config({
    //By default load modules from js/lib
    baseUrl : siteBaseUrl +'/js/lib',
    //except
    paths : {
		search : siteBaseUrl + '/js/search'
    },
    config : {
        isBuild : false
    }
});

require(['jquery', 'knockout', 'knockout-sortable', 'infuser-amd', 'koExternalTemplateEngine-amd', 'knockout.validation.min', 'bootstrap.min', 'jhash-2.0.min', 'search/search', 'domReady!'], 
function( $,        knockout,   kosortable,          infuser,       koExtTemplate,                  koValidation,              bootstrap,       route,      	  Search) {
    // Set up some defaults for templates loaded using koExternalTemplateEngine
    infuser.defaults.templateSuffix = ".tmpl.html"
    infuser.defaults.templateUrl = "../../js";
    //initialize validation using knockout.validation
    knockout.validation.configure({
        registerExtenders: true,
        parseInputAttributes: true,
        messageTemplate: null,
    });
    knockout.validation.init();
    // Init the viewmodel
    var search = new Search();
    // Apply Knockout.js bindings for search viewmodel
    knockout.applyBindings(new search.searchViewModel());
});