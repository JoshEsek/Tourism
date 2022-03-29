
 <pre class='pre-scrollable'>
<?php
  $options        = Database::load_option_files();
  $DB_BASE_TABLES = $options['database_options']['DB_BASE_TABLES'];
  //  print_r([$test_base, $options]);
  print_r([
      'database has connection error'         => Database::has_connection_error() ? 'true' : 'false',
      'database connected'                    => Database::is_connected() ? 'true' : 'false',
      'database has_primary_tables'           => Database::has_primary_tables() ? 'true' : 'false',
      'database get connection exception'     => Database::get_connection_exception(),
      'database get primary tables exception' => Database::get_primary_tables_exception(),
      'base uri'                              => Util::get_base_uri('tourism'),
      'base url'                              => Util::get_base_url('tourism'),
      'core css'                              => Util::get_file_path('assets/css/core.css'),
      'config file'                           => Util::get_file_path('src/Data/Configure/config.inc.php'),
      'config options'                        => $options,
      'REQUEST_URI'                           => $_SERVER['REQUEST_URI'],
      '__FILE__'                              => __FILE__,
      'parse_url'                             => parse_url($_SERVER['SCRIPT_FILENAME']),
      '_SERVER'                               => $_SERVER
  ])
?>
 </pre>
    // *
    function sample_admin_notice__error()
    {
        WP_Alert::notice([
            'notice' => '</p><pre class="pre-scrollable">' . print_r([
                    'plugins_url'     => plugins_url('public/assets/js/bootstrap/5.1.3/bootstrap.bundle.min.js'),
                    'plugin_dir_url'  => plugin_dir_url('autoload.php'),
                    'plugin_dir_path' => plugin_dir_path('autoload.php'),
                    'plugin_basename' => plugin_basename('autoload.php')
                ], 1) . '</pre>',
            'type'   => 'error'
        ]);
    }

function wporg_custom() {
   // If save_post has been run more than once, skip the rest of the code.
   if ( did_action( 'save_post' ) !== 1 ) {
      return;
   }
   // ...
}
add_action( 'save_post', 'wporg_custom' );
add_action( 'load-' . $hookname, 'wporg_options_page_submit' );

Whether the form is being submitted ('POST' === $_SERVER['REQUEST_METHOD']).
CSRF verification
Validation
Sanitization
add_submenu_page
<form action="<?php menu_page_url( 'wporg' ) ?>" method="post">
//    add_action('admin_notices', 'sample_admin_notice__error');
//    add_action('admin_notices', [Alert::class, 'danger']);
//    add_action('admin_notices', [Alert::class, 'dark']);
//    add_action('admin_notices', [Alert::class, 'info']);
//    add_action('admin_notices', [Alert::class, 'light']);
//    add_action('admin_notices', [Alert::class, 'primary']);
//    add_action('admin_notices', [Alert::class, 'secondary']);
//    add_action('admin_notices', [Alert::class, 'success']);
//    add_action('admin_notices', [Alert::class, 'warning']);
//    add_action('admin_notices', [WP_Alert::class, 'success']);
//    add_action('admin_notices', [WP_Alert::class, 'warning']);
//    add_action('admin_notices', [WP_Alert::class, 'error']);
//    add_action('admin_notices', [WP_Alert::class, 'info']);

add_filter( 'plugin_action_links', 'disable_plugin_deletion', 10, 4 );
function disable_plugin_deletion( $actions, $plugin_file, $plugin_data, $context ) {
 
    // Remove delete action link for plugins
    if ( array_key_exists( 'delete', $actions ) && in_array( $plugin_file, array(
        'akismet/akismet.php',
        'plugin-folder-name/plugin.php'
    ) ) )
        unset( $actions['delete'] );
 
    return $actions;
}
/**
         * Build HTML attribute
         *
         * @param array $attributes The attributes to use
         *
         * @return string
         * @uses empty()
         * @uses \is_array()
         */
        #[Pure] private static function app_to_html_attributes(array $attributes)
        {
            if (!($html = '') && !empty($attributes))
            {
                foreach ($attributes as $key => $attribute)
                {
                    if (is_array($attribute))
                    {
                        $attribute = array_unique($attribute);
                    }
                    // * Done
                    $html .= !is_numeric($key) ? (" $key=\"" . (is_array($attribute) ? implode(' ', $attribute) : $attribute) . '"') : " $attribute";
                }
            }

            return $html;
        }we need to change habeeb@sga-uae.com to talha@sga-uae.com
            $args     = wp_parse_args($args, $defaults);
            echo '<div class="notice notice-success is-dismissible">';
            // Note: value of $name is case-sensitive.
            echo "Calling static method '$name' $type\n<br/>";
            echo '<pre class="pre-scrollable">';
            print_r([
                'name'            => $name,
                'first arguments' => $arguments[0],
                'arguments'       => $arguments,
                'first args'      => $args[0],
                'args'            => $args
            ]);
            echo '</pre>';
            /**
             * <div class='alert alert-warning alert-dismissible fade show' role='alert'>
             * <strong>Holy guacamole!</strong> You should check in on some of those fields below.
             * <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
             * </div>
             * danger
             * dark
             * info
             * light
             * primary
             * secondary
             * success
             * warning
             */
            echo '<div class="notice notice-success is-dismissible">';
            // Note: value of $name is case-sensitive.
            echo "Calling static method '$name' " . implode(', ', $arguments) . "\n<br/>" . __CLASS__ . "\n<br/>";
            echo '<pre class="pre-scrollable">';
            print_r([
                'name'            => $name,
                'first arguments' => $arguments[0],
                'arguments'       => $arguments
            ]);
            echo '</pre></div>';