<div class="sidebar-left">
    <div class="sidebar-close">
        <a class="close" href="#close"><i class="lni lni-close"></i></a>
    </div>
    <div class="sidebar-content">
        <div class="sidebar-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php
                $footer_logo = get_theme_mod('footer_logo');
                if ($footer_logo) {
                    echo '<img src="' . esc_url($footer_logo) . '" alt="' . get_bloginfo('name') . '">';
                }
                ?>
            </a>

        </div>
        <?php
        $settings = get_posts([
            'numberposts' => 1,
            'category_name' => 'settings',
            'post_type' => 'post'
        ]);
        foreach ($settings as $post) {
            setup_postdata($post);
            ?>
            <p class="text">
                <?= CFS()->get('slogan') ?>
            </p>
            <?php
        }
        wp_reset_postdata();
        ?>
        <!-- logo -->
        <div class="sidebar-menu">
            <h5 class="menu-title">Меню</h5>
            <div class="sidebar-menu-list">
                <?php wp_nav_menu([
                    'theme_location' => 'top',
                    'container' => '',
                    'menu_id' => '',
                    'items_wrap' => '%3$s',
                    'depth' => 1,
                ]) ?>

            </div>
        </div>
        <!-- menu -->
        <div class="sidebar-social align-items-center justify-content-center">
            <h5 class="social-title">Пишите, мы на связи</h5>
            <ul>
                <?php
                foreach ($settings as $post) {
                    setup_postdata($post);
                
                    $vk_url = CFS()->get('vk')['url'];
                    $whatsapp_url = CFS()->get('whatsapp')['url'];
                    $telegram_url = CFS()->get('telegram')['url'];
                
                    ?>
                    <?php if ($vk_url): ?>
                        <li>
                            <a href="<?= $vk_url ?>"><i class="lni lni-vk"></i></a>
                        </li>
                    <?php endif; ?>
                
                    <?php if ($whatsapp_url): ?>
                        <li>
                            <a href="<?= $whatsapp_url ?>"><i class="lni lni-whatsapp"></i></a>
                        </li>
                    <?php endif; ?>
                
                    <?php if ($telegram_url): ?>
                        <li>
                            <a href="<?= $telegram_url ?>"><i class="lni lni-telegram-original"></i></a>
                        </li>
                    <?php endif; ?>
                
                    <?php
                }
                
                wp_reset_postdata();
                ?>


            </ul>
        </div>
        <!-- sidebar social -->
    </div>
    <!-- content -->
</div>
<div class="overlay-left"></div>