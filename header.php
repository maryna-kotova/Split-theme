<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_get_document_title() ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><?php the_custom_logo(); ?></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="main-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-header',
                            'container' => false,
                            'menu_class' => 'navbar-nav',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                            'depth' => 2,
                            'walker' => new Mk_Menu_Walker()
                        ));
                        ?>
                    </div>
                </div>
            </nav>
        </header>