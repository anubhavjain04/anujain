// Karma configuration
// Generated on Wed Jan 08 2014 11:56:12 GMT+0800 (HKT)

module.exports = function (config) {
  config.set({

    // base path, that will be used to resolve files and exclude
    basePath: '',

    preprocessors: {
      'assets/javascripts/**/*.js': ['coverage'],
      'assets/html/partial/**/*.html': ['ng-html2js']
    },
    ngHtml2JsPreprocessor: {
      moduleName: 'directives'
    },

    // frameworks to use
    frameworks: ['jasmine'],

    plugins: [
      'karma-jasmine',
      'protractor',
      'karma-phantomjs-launcher',
      'karma-coverage'
    ],

    // list of files / patterns to load in the browser
    files: [
      'bower_components/jquery/dist/jquery.js',
      'bower_components/jquery-ui/jquery-ui.js',
      'bower_components/jquery-i18n-properties/jquery.i18n.properties.js',
      'bower_components/bootstrap/dist/js/bootstrap.js',
      'bower_components/momentjs/moment.js',
      'bower_components/offline/offline.js',
      'bower_components/angular/angular.js',
      'bower_components/angular-resource/angular-resource.js',
      'bower_components/angular-bootstrap/ui-bootstrap.js',
      'bower_components/angular-cookies/angular-cookies.js',
      'bower_components/angular-route/angular-route.js',
      'bower_components/angular-ui-router/release/angular-ui-router.js',
      'bower_components/angularjs-imageupload-directive/public/javascripts/imageupload.js',
      'bower_components/ng-file-upload/ng-file-upload.js',
      'build/javascripts/view.js',
      'assets/javascripts/app.js',
      'assets/javascripts/**/*.js',
      'test/**/*.js'
    ],
    // list of files to exclude
    exclude: [],

    // test results reporter to use
    // possible values: 'dots', 'progress', 'junit', 'growl', 'coverage'
    reporters: ['progress', 'coverage'],

    urlRoot: '/__karma/',

    // web server port
    port: 9876,


    // enable / disable colors in the output (reporters and logs)
    colors: true,


    // level of logging
    // possible values: config.LOG_DISABLE || config.LOG_ERROR || config.LOG_WARN || config.LOG_INFO || config.LOG_DEBUG
    logLevel: config.LOG_INFO,


    // enable / disable watching file and executing tests whenever any file changes
    autoWatch: true,

    coverageReporter: {
      type: 'html',
      dir: 'coverage/',
      subdir: '.'
    },

    // Start these browsers, currently available:
    // - Chrome
    // - ChromeCanary
    // - Firefox
    // - Opera (has to be installed with `npm install karma-opera-launcher`)
    // - Safari (only Mac; has to be installed with `npm install karma-safari-launcher`)
    // - PhantomJS
    // - IE (only Windows; has to be installed with `npm install karma-ie-launcher`)
    browsers: ['PhantomJS'],


    // If browser does not capture in given timeout [ms], kill it
    captureTimeout: 60000,


    // Continuous Integration mode
    // if true, it capture browsers, run tests and exit
    singleRun: false
  });
};
