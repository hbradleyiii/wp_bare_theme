<?php wp_theme_debug(__FILE__, $output_to_header = true);

////////////////////////////////////////////////////////////
// functions/debug.php - Debug code
//
//      The code in this file is only run if the WordPress site is set in debug
//      mode.
//
//      This file also includes a section that is only run when the
//      "XDEBUG_SESSION" cookie is set.
//


if ( isset($_COOKIE['XDEBUG_SESSION']) ) {

    // Auto-reloading code.
    // Using site-watch bash script for updating site-watch file.
    // Note that XDEBUG_SESSION cookie must be set for this to work!
    add_action( 'wp_footer', function() { ?>
        <script type='text/javascript'>
            jQuery( function ($) {
                var last_update = 0;
                var start_time = Date.now();

                function init( response ) {
                    last_update = get_update_time( response );
                    process = process_watch;
                    process_watch ( response );
                    console.log( 'Watching for updates...' );
                }

                function process_watch( response ) {
                    if ( last_update < get_update_time( response ) ) {
                        console.log( 'Reloading to updated page...' );
                        location.reload();
                    } else if ( Date.now() < start_time + 3600000 ) {
                        setTimeout( check_watch, 800 );
                    } else {
                        console.warn( 'No changes for over an hour. No longer watching.' )
                        console.warn( 'Please refresh the page to continue watching for changes.' )
                    }
                }

                function check_watch() {
                    $.ajax({
                        url: '<?php echo get_template_directory_uri() . '/.site-watch'; ?>',
                        success: process,
                        error: function () { console.warn( 'Site Watch is not running! Set up site-watch on server and reload the page.' ); }
                    });
                }

                function get_update_time( response ) {
                    return parseInt( response.split( '\n' ) );
                }

                var process = init;
                check_watch();
            });
        </script>
    <?php });

}

?>
