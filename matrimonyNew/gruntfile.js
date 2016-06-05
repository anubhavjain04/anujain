module.exports = function(grunt) {
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-html2js');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.initConfig({
        clean: {
            dist: ["dist/**/*"]
        },
        files: {
            less: ['webui/stylesheets/**/*.less'],
            html: ['webui/html/**/*.html'],
            js: ['webui/javascripts/**/*.js']
        },
        less: {
            dev: {
                files: {
                    "dist/stylesheets/application.css": "webui/stylesheets/application.less"
                }
            },
            prod: {
                options: {
                    compress: true
                },
                files: {
                    'dist/stylesheets/application.css': 'webui/stylesheets/application.less'
                }
            }
        },
        html2js: {
            options: {
                singleModule: true,
                base: 'webui/html/partials'
            },
            main: {
                src: ['webui/html/partials/**/*.html'],
                dest: 'dist/javascripts/view.js'
            }
        },
        concat: {
            dev: {
                src: [
                    'bower_components/jquery/dist/jquery.js',
                    'bower_components/json3/lib/json3.js',
                    'bower_components/bootstrap/dist/js/bootstrap.js',
                    'bower_components/momentjs/moment.js',
                    'bower_components/offline/offline.js',
                    'bower_components/angular/angular.js',
                    'bower_components/angular-resource/angular-resource.js',
                    'bower_components/angular-messages/angular-messages.js',
                    'bower_components/angular-cookie/angular-cookie.js',
                    'bower_components/angular-route/angular-route.js',
                    'bower_components/angular-ui-router/release/angular-ui-router.js',
                    'bower_components/angular-bootstrap/ui-bootstrap-tpls.js',
                    'bower_components/angular-bootstrap-checkbox/angular-bootstrap-checkbox.js',
                    'bower_components/ng-file-upload/ng-file-upload-all.js',
                    'bower_components/ngImgCrop/compile/unminified/ng-img-crop.js',
                    'dist/javascripts/view.js',
                    'webui/javascripts/app.js',
                    'webui/javascripts/**/*.js'
                ],
                dest: "dist/javascripts/application.js"
            }
        },
        uglify: {
            options: {
                mangle: false
            },
            app: {
                src: "dist/javascripts/application.js",
                dest: "dist/javascripts/application.js",
                options: {
                    mangle: false
                }
            }
        },
        copy: {
            main: {
                files: [
                    {
                        expand: true,
                        src: 'webui/images/*',
                        dest: 'dist/images/',
                        flatten: true
                    },
                    {
                        expand: true,
                        src: 'bower_components/bootstrap/fonts/*',
                        dest: 'dist/fonts/',
                        flatten: true
                    },
                    {
                        expand: true,
                        src: 'webui/html/*.html',
                        dest: 'dist/',
                        flatten: true
                    }
                ]
            }
        },
        watch: {
            source: {
                files: ['<%= files.less %>', '<%= files.html %>', '<%= files.js %>'],
                tasks: ['less:dev', 'html2js', 'concat:dev'],
                options: {}
            }
        }
    });
    grunt.registerTask('build', ['clean:dist', 'less:dev', 'html2js', 'concat:dev', 'copy:main']);
    grunt.registerTask('dist', ['clean:dist', 'less:prod', 'html2js', 'concat:dev', 'uglify:app', 'copy:main']);
    grunt.registerTask('default', ['build', 'watch']);
};