<?php
/*
Template Name: Продукт
*/
?>



<? get_header() ?>

<section class="page-header container my-5">
  <div class="row">
    <div class="col-12 col-sm-6 mb-5">
      <?php
      if (function_exists('bcn_display')) {
        echo '<div class="breadcrumbs">';
        bcn_display();
        echo '</div>';
      }
      ?>
      <h1 class="header-title">
        <?php the_title() ?>
      </h1>
      <div class="my-5">
        <?php the_content() ?>
        <div>
          <div>
            Стоимость:
          </div>
          <div class="product-details-price">
            <?= CFS()->get('product_price') ?> р
          </div>
        </div>
      </div>
      <div>
        <button class="btn btn-primary">Заказать</button>
      </div>
    </div>

    <div class="col-12 col-sm-6">
      <div class="product-details-image">
        <div class="product-image">
          <div class="product-image-active">
            <div class="single-image">
              <img src="" alt="">
            </div>
          </div>
        </div>
        <div class="product-thumb-image">
          <?php
          $photos = CFS()->get('product_gallery');
          foreach ($photos as $photo) {
            ?>
            <div>
              <img src="<?= $photo['product_photo'] ?>" alt="<?= $photo['product_alt'] ?>">
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!--====== ABOUT ONE PART START ======-->

<section class="about-area about-one">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="about-title text-center">
          <h2 class="title fw-bold">Работаем для вас</h2>
        </div>
      </div>
    </div>
    <!-- row -->
    <div class="row justify-content-center">
      <div class="col-md-4 col-sm-8 d-flex align-items-stretch">
        <div class="single-about-items">
          <div class="items-icon">
            <i class="lni lni-delivery"></i>
          </div>
          <div class="items-content">
            <h4 class="items-title">Доставка по Миру</h4>
            <p class="text">
              Отправим в любую точку планеты чреез ТК или по почте
            </p>
          </div>
        </div>
        <!-- single about items -->
      </div>
      <div class="col-md-4 col-sm-8 d-flex align-items-stretch">
        <div class="single-about-items">
          <div class="items-icon">
            <i class="lni lni-mastercard"></i>
          </div>
          <div class="items-content">
            <h4 class="items-title">Удобная оплата</h4>
            <p class="text">
              Онлайн, наличные, перевод, СБП, биткойны
            </p>
          </div>
        </div>
        <!-- single about items -->
      </div>
      <div class="col-md-4 col-sm-8 d-flex align-items-stretch">
        <div class="single-about-items">
          <div class="items-icon">
            <i class="lni lni-protection"></i>
          </div>
          <div class="items-content">
            <h4 class="items-title">Гарантия качества</h4>
            <p class="text">
              Даем гарантию на изделия до двух лет
            </p>
          </div>
        </div>
        <!-- single about items -->
      </div>
    </div>
    <!-- row -->
  </div>
  <!-- container -->
</section>

<!--====== ABOUT ONE PART ENDS ======-->
<?php
$settings = get_posts([
  'numberposts' => 1,
  'category_name' => 'settings',
  'post_type' => 'post'
]); ?>
<section class="cta-style-1 py-5">
  <div class="container">
    <?php
    foreach ($settings as $post) {
      setup_postdata($post);
      ?>
      <div class="cta-style-1-wrapper primary-gradient-6">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="cta-content">
              <h1 class="mb-3 cta-title">
                <?= CFS()->get('event_title') ?>
              </h1>
              <ul class="mb-3">
                <?php $events_desc = CFS()->get('events_desc');
                foreach ($events_desc as $event_desc) {
                  ?>
                  <li>
                    <?= $event_desc['event_promotion'] ?>
                  </li>
                  <?php
                }
                ?>
              </ul>
              <a href="javascript:void(0)" class="btn primary-btn">
                <i class="mdi mdi-download"></i>
                <?= CFS()->get('event_btn') ?>
              </a>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="cta-img">
              <img src="<?= CFS()->get('event_img') ?>" alt="<?= CFS()->get('event_title') ?>">
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    wp_reset_postdata();
    ?>
  </div>
</section>

<!--====== FOOTER ONE PART START ======-->



<!--====== FOOTER ONE PART ENDS ======-->
<?php get_footer() ?>

</body>

</html>