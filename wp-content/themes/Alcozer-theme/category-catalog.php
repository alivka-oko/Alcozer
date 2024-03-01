<?php
/*
Template Name: Главная
*/
?>


<!--====== NAVBAR NINE PART START ======-->

<? get_header() ?>

<!--====== NAVBAR NINE PART ENDS ======-->

<!--====== SIDEBAR PART START ======-->

<!-- header END -->

<section class="portfolio-area portfolio-one">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xxl-6 col-xl-7 col-lg-8">
        <div class="section-title text-center mb-5">
          <h2 class="mb-3 fw-bold"><?=single_cat_title();?></h2>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="portfolio-menu">
          <button data-filter="all" class="active">Все товары</button>

          <?php
          $parent_category_id = 5; // ID рубрики "каталог"
          $categories = get_categories(array('parent' => $parent_category_id));

          foreach ($categories as $category) {
            ?>
            <button data-filter="<?php echo esc_attr($category->slug); ?>">
              <?php echo esc_html($category->name); ?>
            </button>
            <?php
          }
          ?>
        </div>
      </div>
    </div>

    <!-- row -->
    <div class="row grid">
      <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          $all_category = get_the_category();
          $res_name = '';
          foreach ($all_category as $category) {
            $res_name = $category->slug;
          }
        }
      }

      $posts = get_posts([
        'numberposts' => 6,
        'category_name' => 'catalog',
        'orderby' => 'title',
        'order' => 'ASC',
        'post_type' => 'post',
        'suppress_filter' => true,
      ]);
      foreach ($posts as $post) {
        setup_postdata($post);
        $post_categories = get_the_terms($post->ID, 'category');
        $category_slug = '';
        if ($post_categories && !is_wp_error($post_categories)) {
          $category = array_shift($post_categories);
          $category_slug = $category->slug;
        }
        ?>
        <div class="col-lg-4 col-sm-6" data-filter="<?php echo esc_attr($category_slug); ?>">
          <div class="portfolio-style-one text-center">
            <div class="portfolio-image">
              <?php the_post_thumbnail() ?>
            </div>
            <div class="portfolio-overlay d-flex align-items-center">
              <div class="portfolio-content">
                <div class="portfolio-icon">
                  <a class="image-popup-two glightbox"
                    href="<?php echo esc_url(get_the_post_thumbnail_url($post->ID, 'full')); ?>">
                    <i class="lni lni-zoom-in"></i>
                  </a>
                </div>
                <div class="portfolio-text">
                  <h4 class="portfolio-title">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_title() ?>
                    </a>
                  </h4>
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      wp_reset_postdata();
      ?>
    </div>

    <!-- row -->
  </div>
  <!-- container -->
</section>



<? get_footer() ?>

<!-- <script src="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/js/glightbox.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/css/glightbox.min.css" /> -->


</body>

</html>