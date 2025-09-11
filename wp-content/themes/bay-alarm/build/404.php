<?php
  update_option('current_page_template','error'); // <----- this adds a body class
  get_header();
?>

<section class="error--sec">
  <div class="container">
    <div class="row">
      <article class="text-box">
        <span>404</span>
        <h1>The page you’re looking for has fallen and can’t get up.</h1>
        <p>Please push your medical alert button below
and stay calm. Help is on the way!</p>
        <div class="buttons-wrap">
          <a href="<?php echo home_url(); ?>" class="btn">
           Get Help Now
          </a>
        </div>
      </article>

      <div class="img-wrap">
        <img class="close" src="<?php echo GET_TEMP ?>/img/404-img.png" alt="404 Image">
      </div>
    </div>
  </div>
</section>

<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>
