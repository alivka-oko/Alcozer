<?
/*
Template Name: Контакты
*/

?>

<!--====== NAVBAR NINE PART START ======-->

<? get_header() ?>

<!--====== NAVBAR NINE PART ENDS ======-->

<!--====== SIDEBAR PART START ======-->



<section class="page-header container my-5">
  <div class="row">
    <div class="col-12 breadcrumbs">
      <?php
      if (function_exists('bcn_display')) {
        echo '<div class="breadcrumbs">';
        bcn_display();
        echo '</div>';
      }
      ?>
    </div>
    <div class="col-12">
      <h1 class="header-title">
        Контакты
      </h1>
    </div>
  </div>
</section>
<div class="container ">
  <div class="row">
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
        Адрес:
        <?= CFS()->get('contacts_city') ?>,
        <?= CFS()->get('contacts_full_address') ?>
      </p>
      <p class="text">
        Телефоны:
        <?= CFS()->get('contacts_tel') ?>
      </p>
      <?php
    }
    wp_reset_postdata();

    ?>
    <div class="col-12 col-sm-6 my-3 form-style form-style-two">
      <h2>Свяжитесь с нами:</h2>
      <?php the_content()?>
      <!-- <form action="#" class="form-input">
        <div class="form-row">
          <label>ФИО</label>
          <div class="input-items default">
            <input type="text" placeholder="ФИО">
            <i class="lni lni-user"></i>
          </div>
        </div>
        <div class="form-row">
          <label>Телефон</label>
          <div class="input-items default">
            <input type="text" placeholder="+7 911 111 11 11">
            <i class="lni lni-user"></i>
          </div>
        </div>
        <div class="form-row">
          <label>Сообщение</label>
          <div class="input-items default">
            <textarea placeholder="Сообщение"></textarea>
            <i class="lni lni-pencil-alt"></i>
          </div>
        </div>
        <div class="form-row">
          <input type="checkbox" class=" mr-2" checked="checked">
          Отправляя форму, вы соглашаетесь на <a href="/privacy/">обработку персональных данных</a>
        </div>
        <div class="form-row mt-3">
          <button type="submit" class="btn primary-btn">Отправить</button>
        </div>
      </form> -->
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row ">
    <div class="col-12">
      <script type="text/javascript" charset="utf-8" async
        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A116c7919696849bf67a339de321355309ac1675eeefffe81b46528cc1f72543f&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
  </div>
</div>

<!--====== FOOTER ONE PART START ======-->

<? get_footer() ?>




</body>

</html>