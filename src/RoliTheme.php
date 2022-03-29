<?php
  namespace Roli;

  use Roli\Utilities\Util;

  /**
   * The base theme class for
   */
  class RoliTheme
  {
    /**
     * @var array Class properties
     */
    public array $properties;

    /**
     * RoliTheme constructor
     *
     * @param array $properties
     */
    public function __construct(array $properties = [])
    {
      $this->properties = $properties;
    }

    public function __toString()
    {
      return __CLASS__ . ' -> ' . get_bloginfo('language');
    }

    /**
     * Use namespaced data attribute for Bootstrap's dropdown toggles.
     *
     * @param array     $atts HTML attributes applied to the item's `<a>` element.
     * @param \WP_Post  $item The current menu item.
     * @param \stdClass $args An object of wp_nav_menu() arguments.
     *
     * @return array
     */
    public static function prefix_bs5_dropdown_data_attribute(array $atts, \WP_Post $item, \stdClass $args)
    : array
    {
      if (is_a($args->walker, 'WP_Bootstrap_Navwalker') && array_key_exists('data-toggle', $atts))
      {
        unset($atts['data-toggle']);
        $atts['data-bs-toggle'] = 'dropdown';
      }

      return $atts;
    }

    /**
     * Register Bootstrap Navigation Walker
     *
     * @return void
     */
    public static function register_navwalker()
    : void
    {
      require_once Util::get_template_url('vendor/wp-bootstrap/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php');
    }

    /**
     * Register Bootstrap Navigation Walker Instance
     *
     * @param array|string $args The parsed arguments
     *
     * @return array|string
     */
    public static function slug_provide_walker_instance(array|string $args)
    : array|string
    {
      if (isset($args['walker']) && is_string($args['walker']) && class_exists($args['walker']))
      {
        $args['walker'] = new $args['walker'];
      }

      return $args;
    }

    function wpdev_filter_login_head()
    {
      if (has_custom_logo()) :
        $image = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
        ?>
        <style media="all">
          .login h1 a
          {
            background-image:        url(<?php echo esc_url( $image[0] ); ?>);
            -webkit-background-size: <?php echo absint( $image[1] )?>px;
            background-size:         <?php echo absint( $image[1] ) ?>px;
            height:                  <?php echo absint( $image[2] ) ?>px;
            width:                   <?php echo absint( $image[1] ) ?>px;
          }
        </style>
      <?php
      endif;
    }
  }
