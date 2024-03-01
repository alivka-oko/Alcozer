<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>
        <?php
        if (is_404()) {
            echo 'Ошибка 404';
        } else {
            if (is_category()) {
                single_cat_title();
            } else {
                the_title();
            }
        }
        ?>
    </title>

    <!-- <link rel="stylesheet" href="assets/scss/starter.css" /> -->
    <?php wp_head(); ?>
</head>

<body>
    <section class="navbar-area navbar-nine navbar-theme-usadba">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php
                            $header_logo = get_theme_mod('header_logo');
                            if ($header_logo) {
                                echo '<img src="' . esc_url($header_logo) . '" alt="' . get_bloginfo('name') . '">';
                            }
                            ?>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNine" aria-controls="navbarNine" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarNine">
                            <div class="navbar-nav me-auto">
                                <?php
                                wp_nav_menu([
                                    'theme_location' => 'top',
                                    'container' => '',
                                    'menu_class' => 'collapse navbar-collapse sub-menu-bar',
                                    'menu_id' => '',
                                    'items_wrap' => '%3$s',
                                    'add_li_class' => 'nav-item',
                                ])
                                    ?>
                            </div>
                        </div>

                        <div class="navbar-btn d-none d-lg-inline-block">
                            <a class="menu-bar" href="#side-menu-left"><i class="lni lni-menu"></i></a>
                        </div>
                    </nav>
                    <!-- navbar -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <? get_sidebar() ?>