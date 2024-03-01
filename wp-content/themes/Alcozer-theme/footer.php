<!--====== FOOTER ONE PART START ======-->
<?php
$settings = get_posts([
  'numberposts' => 1,
  'category_name' => 'settings',
  'post_type' => 'post'
]);
?>
<footer class="footer-area footer-one">
  <div class="footer-widget">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-4 col-sm-12">
          <div class="f-about">
            <div class="footer-logo">
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
          </div>

        </div>
        <div class="col-xl-2 col-lg-2 col-sm-4">
          <div class="footer-link">
            <h6 class="footer-title">Клиентам</h6>
            <ul>
            <?php wp_nav_menu([
                'theme_location' => 'bottom_clients',
                'container' => '',
                'menu_id' => '',
                'items_wrap' => '%3$s',
                'add_li_class' => 'text'
              ]) ?>
            </ul>
          </div>
          <!-- footer link -->
        </div>
        <div class="col-xl-2 col-lg-3 col-sm-4">
          <div class="footer-link">
            <h6 class="footer-title">Каталог</h6>
            <ul>
              <?php wp_nav_menu([
                'theme_location' => 'bottom_catalog',
                'container' => '',
                'menu_id' => '',
                'items_wrap' => '%3$s',
                'add_li_class' => 'text'
              ]) ?>
            </ul>
          </div>
          <!-- footer link -->
        </div>
        <div class="col-xl-2 col-lg-3 col-sm-4">
          <!-- Start Footer Contact -->
          <div class="footer-contact">
            <h6 class="footer-title">Контакты</h6>
            <ul>
              <?php

              foreach ($settings as $post) {
                setup_postdata($post);
                ?>
                <li>
                  <i class="lni lni-map-marker"></i>
                  <?= CFS()->get('contacts_city') ?>
                </li>
                <li><i class="lni lni-phone-set"></i>
                  <?= CFS()->get('contacts_tel') ?>
                </li>
                <li><i class="lni lni-envelope"></i>
                  <?= CFS()->get('contacts_email') ?>
                </li>
                <?php
              }
              wp_reset_postdata();
              ?>
            </ul>
          </div>
          <!-- End Footer Contact -->
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </div>
  <!-- footer widget -->

  <div class="footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="
                  copyright
                  text-center
                  d-md-flex
                  justify-content-between
                  align-items-center
                ">
            <p class="text">Санкт-Петербург ©
              <?= date('Y') ?>. Все права защищены
            </p>
            <?php wp_nav_menu([
              'theme_location' => 'politics',
              'container' => '',
              'menu_class' => 'collapse navbar-collapse sub-menu-bar',
              'menu_id' => '',
              'items_wrap' => '%3$s',
              'add_li_class' => 'text'
            ]) ?>
            <ul class="social">
              <?php
              foreach ($settings as $post) {
                setup_postdata($post);

                $vk_url = CFS()->get('vk')['url'];
                $whatsapp_url = CFS()->get('whatsapp')['url'];
                $telegram_url = CFS()->get('telegram')['url'];

                ?>
                <?php if ($vk_url): ?>
                  <li>
                    <a href="<?= $vk_url ?>">
                      <i class="lni lni-vk"></i>
                    </a>
                  </li>
                <?php endif; ?>

                <?php if ($whatsapp_url): ?>
                  <li>
                    <a href="<?= $whatsapp_url ?>">
                      <i class="lni lni-whatsapp"></i>
                    </a>
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
          <!-- copyright -->
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </div>
  <!-- footer copyright -->
</footer>
<!--====== FOOTER ONE PART ENDS ======-->
<script src="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/js/glightbox.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/css/glightbox.min.css" />
<?php wp_footer(); ?>