<?php

add_action( 'wp_enqueue_scripts', 'mk_scripts' );

function mk_scripts() {
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css', array(), time() );
    wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.0.2' );
//    wp_enqueue_style( 'bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), '5.0.2' );
    wp_enqueue_style( 'slick-slider-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), time() );
    wp_enqueue_style( 'fancy-style', get_template_directory_uri() . '/fancybox/jquery.fancybox-1.3.4.css', array(), time() );

    wp_deregister_script('jquery');
    wp_register_script('jquery','https://code.jquery.com/jquery-2.2.0.min.js', array(), '2.2.0', true);
    wp_enqueue_script('jquery');

    wp_enqueue_script( 'slider', get_template_directory_uri() . '/js/slider.js', array('jquery'), time(), true );
    wp_enqueue_script('slick-slider-script','//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);

    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '5.0.2', true );
    wp_enqueue_script( 'bootstrap-bundle-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), '5.0.2', true );
    wp_enqueue_script('popper','https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', array(), '2.9.2', true);

//    wp_enqueue_script('bootstr-bundle','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.0.2', true);
//    wp_enqueue_script('bootstr-js','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', array('jquery'), '5.0.2', true);

//    wp_enqueue_script('jquery-1','https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js', array('jquery'), '1.4', true);
    wp_enqueue_script('fancy-box-script',get_template_directory_uri() . '/fancybox/jquery.fancybox-1.3.4.pack.js', array('jquery'), '1.4', true);
    wp_enqueue_script('fancy-swing-and-linear-script',get_template_directory_uri() . '/fancybox/jquery.easing-1.4.pack.js', array('jquery'), '1.4', true);
    wp_enqueue_script('fancy-mouse-wheel-script',get_template_directory_uri() . '/fancybox/jquery.mousewheel-3.0.4.pack.js', array('jquery'), '1.4', true);
}

register_nav_menus( array(
    'menu-header' => 'Header menu',
    'menu-footer' => 'Footer menu',
) );

add_theme_support( 'post-thumbnails' );

add_action( 'after_setup_theme', 'mk_custom_logo_setup' );

function mk_custom_logo_setup() {
    $defaults = array(
        'height'               => 60,
        'width'                => 290,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,
    );

    add_theme_support( 'custom-logo', $defaults );
}

add_action( 'widgets_init', 'register_mk_widgets' );

function register_mk_widgets() {

    register_sidebar( array(
        'name'          => 'Footer Copyright',
        'id'            => 'mk_copyright',
        'description'   => 'Footer section',
        'class'         => '',
        'before_widget' => null,
        'after_widget'  => null,
    ) );
}

// Register custom post type
add_action( 'init', 'mk_register_types' );

function mk_register_types() {
    register_post_type( 'slider', [
        'labels' => [
            'name'               => __( 'Slider', 'split' ),
            'singular_name'      => __( 'Slider', 'split' ),
            'add_new'            => __( 'Add slide', 'split' ),
            'add_new_item'       => __( 'Add new slide', 'split' ),
            'edit_item'          => __( 'Edit slide', 'split' ),
            'new_item'           => __( 'New slide', 'split' ),
            'view_item'          => __( 'View slide', 'split' ),
            'search_items'       => __( 'Search slides', 'split' ),
            'not_found'          => __( 'Not fount slide', 'split' ),
            'not_found_in_trash' => __( 'Not found slide in trash slider', 'split' ),
            'menu_name'          => __( 'Slider', 'split' ),
        ],
        'public'              => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-images-alt2',
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail' ],
        'taxonomies'          => [],
        'has_archive'         => true,
    ]);

    register_post_type( 'islands', [
        'labels' => [
            'name'               => __( 'Islands', 'split' ),
            'singular_name'      => __( 'Islands', 'split' ),
            'add_new'            => __( 'Add island', 'split' ),
            'add_new_item'       => __( 'Add new island', 'split' ),
            'edit_item'          => __( 'Edit island', 'split' ),
            'new_item'           => __( 'New island', 'split' ),
            'view_item'          => __( 'View island', 'split' ),
            'search_items'       => __( 'Search islands', 'split' ),
            'not_found'          => __( 'Not fount island', 'split' ),
            'not_found_in_trash' => __( 'Not found island in trash islands', 'split' ),
            'menu_name'          => __( 'Islands', 'split' ),
        ],
        'public'              => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-admin-site-alt',
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail' ],
        'taxonomies'          => [],
        'has_archive'         => true,
    ]);
}

//class Mk_Nav extends Walker_Nav_Menu {
//
//    /**
//     * Starts the list before the elements are added.
//     *
//     * @since 3.0.0
//     *
//     * @see Walker::start_lvl()
//     *
//     * @param string   $output Used to append additional content (passed by reference).
//     * @param int      $depth  Depth of menu item. Used for padding.
//     * @param stdClass $args   An object of wp_nav_menu() arguments.
//     */
//    public function start_lvl( &$output, $depth = 0, $args = null ) {
//        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
//            $t = '';
//            $n = '';
//        } else {
//            $t = "\t";
//            $n = "\n";
//        }
//        $indent = str_repeat( $t, $depth );
//
//        // Default class.
//        $classes = array( 'dropdown-menu' );
//
//        /**
//         * Filters the CSS class(es) applied to a menu list element.
//         *
//         * @since 4.8.0
//         *
//         * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
//         * @param stdClass $args    An object of `wp_nav_menu()` arguments.
//         * @param int      $depth   Depth of menu item. Used for padding.
//         */
//        $class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
//        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
//
//        $output .= "{$n}{$indent}<ul$class_names aria-labelledby=\"navbarDropdownMenuLink\">{$n}";
//    }
//    /**
//     * Starts the element output.
//     *
//     * @since 3.0.0
//     * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
//     * @since 5.9.0 Renamed `$item` to `$data_object` and `$id` to `$current_object_id`
//     *              to match parent class for PHP 8 named parameter support.
//     *
//     * @see Walker::start_el()
//     *
//     * @param string   $output            Used to append additional content (passed by reference).
//     * @param WP_Post  $data_object       Menu item data object.
//     * @param int      $depth             Depth of menu item. Used for padding.
//     * @param stdClass $args              An object of wp_nav_menu() arguments.
//     * @param int      $current_object_id Optional. ID of the current menu item. Default 0.
//     */
//    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
//        // Restores the more descriptive, specific name for use within this method.
//        $menu_item = $data_object;
//
//        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
//            $t = '';
//            $n = '';
//        } else {
//            $t = "\t";
//            $n = "\n";
//        }
//        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';
//
//        $classes   = empty( $menu_item->classes ) ? array() : (array) $menu_item->classes;
//        $classes[] = 'nav-item';
//
//        if ( in_array( 'menu-item-has-children', $classes ) ) {
//            $classes[] = 'dropdown';
//        }
//
//        /**
//         * Filters the arguments for a single nav menu item.
//         *
//         * @since 4.4.0
//         *
//         * @param stdClass $args      An object of wp_nav_menu() arguments.
//         * @param WP_Post  $menu_item Menu item data object.
//         * @param int      $depth     Depth of menu item. Used for padding.
//         */
//        $args = apply_filters( 'nav_menu_item_args', $args, $menu_item, $depth );
//
//        /**
//         * Filters the CSS classes applied to a menu item's list item element.
//         *
//         * @since 3.0.0
//         * @since 4.1.0 The `$depth` parameter was added.
//         *
//         * @param string[] $classes   Array of the CSS classes that are applied to the menu item's `<li>` element.
//         * @param WP_Post  $menu_item The current menu item object.
//         * @param stdClass $args      An object of wp_nav_menu() arguments.
//         * @param int      $depth     Depth of menu item. Used for padding.
//         */
//        $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $menu_item, $args, $depth ) );
//        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
//
//        $output .= $indent . '<li' . $class_names . '>';
//
//        $atts           = array();
//        $atts['title']  = ! empty( $menu_item->attr_title ) ? $menu_item->attr_title : '';
//        $atts['target'] = ! empty( $menu_item->target ) ? $menu_item->target : '';
//        if ( '_blank' === $menu_item->target && empty( $menu_item->xfn ) ) {
//            $atts['rel'] = 'noopener';
//        } else {
//            $atts['rel'] = $menu_item->xfn;
//        }
//        $atts['href']         = ! empty( $menu_item->url ) ? $menu_item->url : '';
//        $atts['aria-current'] = $menu_item->current ? 'page' : '';
//
//        /**
//         * Filters the HTML attributes applied to a menu item's anchor element.
//         *
//         * @since 3.6.0
//         * @since 4.1.0 The `$depth` parameter was added.
//         *
//         * @param array $atts {
//         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
//         *
//         *     @type string $title        Title attribute.
//         *     @type string $target       Target attribute.
//         *     @type string $rel          The rel attribute.
//         *     @type string $href         The href attribute.
//         *     @type string $aria-current The aria-current attribute.
//         * }
//         * @param WP_Post  $menu_item The current menu item object.
//         * @param stdClass $args      An object of wp_nav_menu() arguments.
//         * @param int      $depth     Depth of menu item. Used for padding.
//         */
//        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $menu_item, $args, $depth );
//
//        if ( in_array( 'menu-item-has-children', $classes ) ) {
//            $dropdown_item_attr = '';
//        }
//
//        $attributes = '';
//        foreach ( $atts as $attr => $value ) {
//            if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
//                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
//                $attributes .= ' ' . $attr . '="' . $value . '"';
//            }
//        }
//
//        /** This filter is documented in wp-includes/post-template.php */
//        $title = apply_filters( 'the_title', $menu_item->title, $menu_item->ID );
//
//        /**
//         * Filters a menu item's title.
//         *
//         * @since 4.4.0
//         *
//         * @param string   $title     The menu item's title.
//         * @param WP_Post  $menu_item The current menu item object.
//         * @param stdClass $args      An object of wp_nav_menu() arguments.
//         * @param int      $depth     Depth of menu item. Used for padding.
//         */
//        $title = apply_filters( 'nav_menu_item_title', $title, $menu_item, $args, $depth );
//
//        $class_active = '';
//        if ( in_array( 'current-menu-item', $classes ) ) {
//            $class_active = ' active';
//        }
//
//        $class_dropdown_toggle  = '';
//        $dropdown_toggle_attr = '';
//        if ( in_array( 'dropdown', $classes ) ) {
//            $class_dropdown_toggle = ' dropdown-toggle';
//            $dropdown_toggle_attr = ' id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true"';
//        }
//
//        $class_dropdown_item = '';
//        if ( in_array( 'dropdown-menu', $classes ) ) {
//            $class_dropdown_item = 'dropdown-item';
//        } else {
//            $class_dropdown_item = 'nav-link';
//        }
//
//        $item_output  = $args->before;
//        $item_output .= '<a class="' . $class_dropdown_item . $class_active . $class_dropdown_toggle . '"' . $attributes . $dropdown_toggle_attr . '>';
//        $item_output .= $args->link_before . $title . $args->link_after;
//        $item_output .= '</a>';
//        $item_output .= $args->after;
//
//        /**
//         * Filters a menu item's starting output.
//         *
//         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
//         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
//         * no filter for modifying the opening and closing `<li>` for a menu item.
//         *
//         * @since 3.0.0
//         *
//         * @param string   $item_output The menu item's starting HTML output.
//         * @param WP_Post  $menu_item   Menu item data object.
//         * @param int      $depth       Depth of menu item. Used for padding.
//         * @param stdClass $args        An object of wp_nav_menu() arguments.
//         */
//        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args );
//    }
//}

class Mk_Menu_Walker extends Walker_Nav_menu
{
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end'
    ];

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $dropdown_menu_class[] = '';
        foreach($this->current_item->classes as $class) {
            if(in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
        $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
        $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
