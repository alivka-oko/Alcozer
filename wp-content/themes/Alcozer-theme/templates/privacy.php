<?
/*
Template Name: Политика конфиденциальности
*/
get_header();
?>

<section class="page-header container my-5">
  <div class="row">
    <?php
    if (function_exists('bcn_display')) {
      echo '<div class="breadcrumbs">';
      bcn_display();
      echo '</div>';
    }
    ?>
    <div class="col-12">
      <h1 class="header-title">
        Политика конфиденциальности
      </h1>
    </div>
  </div>
</section>

<div class="container">
  <?php the_content() ?>
</div>


<!--====== FOOTER ONE PART START ======-->


<? get_footer() ?>
</body>

</html>