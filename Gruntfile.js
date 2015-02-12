module.exports = function(grunt) {

    // Load plugins
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-takana');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');

    // Porject configuration
    grunt.initConfig({
        watch: {
            options: {
                livereload: true,
                spawn: false
            },
            php: {
                files: ['*.php', '**/*.php']
            },
            js: {
                files: ['assets/js/*.js', 'assets/js/**/*.js']
            },
            css: {
                files: ['assets/css/**/*'],
                tasks: ['sass']
            }
        },
        sass: {
            dist: {
                options: {
                    includePaths: [],
                    outputStyle: 'compressed'
                },
                files: {
                    'assets/css/style.css': 'assets/css/style.scss',
                }
            }
        },
        clean: {
            css: ['assets/css/style.css']
        },
        takana: {
            dist: {
                options: {
                    includePaths: [
                        '/Users/msotirov/Sites/wp_meetup_demos/awesome/src/wp-content/themes/awesome/assets/css'
                    ],
                    path: '/Users/msotirov/Sites/wp_meetup_demos/awesome/src/wp-content/themes/awesome/'
                }
            }
        }
    });

    // Define the default & other task
    grunt.registerTask('default', []);
    grunt.registerTask('live', ['clean', 'takana']);
};