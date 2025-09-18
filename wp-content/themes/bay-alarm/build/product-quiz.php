<?php
  //Template Name:  Product Quiz
  update_option('current_page_template','product-quiz');
  get_header();
?>

  <div class="progress--steps">
    <div class="progress-bar-bg">
      <div class="progress-bar-fill"><p>(Step <span class="number">1</span> of <span class="total-number">6</span>)</p></div>
    </div>
  </div>

  <section class="product-quiz--main-content">

    <div class="container">
      <div class="quiz-steps-wrap">
        <div class="quiz-step is-active">
          <article>
            <div class="inner-wrap">
              <h2>Where will you primarily use the medical alert system?1</h2>
              <div class="btn-wrap">
                <span class="btn is-active">At home only</span>
                <span class="btn">Both at home and on the go</span>
                <span class="btn">Both at home and on the go</span>
              </div>

              <div class="copy">
                <p><strong>Purpose:</strong> Helps determine if they need a home-only, mobile.</p>
              </div>

              <span class="btn-back">
                <?php include 'inc/vectors/arrow-left-circle-fill.svg'; ?>
                Go Back
              </span>
            </div>
          </article>

          <figure>
            <img class="image" src="http://bay-alarm-cc.local/wp-content/uploads/Group-8482@2x.webp" alt="image">
          </figure>
        </div>
        <div class="quiz-step">
          <article>
            <div class="inner-wrap">
              <h2>Do you have reliable cellular coverage at home?2</h2>
              <div class="btn-wrap">
                <span class="btn is-active">Yes</span>
                <span class="btn">No</span>
                <span class="btn">Not Sure</span>
              </div>

              <div class="copy">
                <p><strong>Purpose:</strong> Determines whether landline or cellular system is appropriate.</p>
              </div>

              <span class="btn-back">
                <?php include 'inc/vectors/arrow-left-circle-fill.svg'; ?>
                Go Back
              </span>
            </div>
          </article>

          <figure>
            <img class="image" src="http://bay-alarm-cc.local/wp-content/uploads/Group-8482@2x.webp" alt="image">
          </figure>
        </div>

        <div class="quiz-step">
          <article>
            <div class="inner-wrap">
              <h2>Do you have reliable cellular coverage at home?3</h2>
              <div class="btn-wrap">
                <span class="btn is-active">Yes</span>
                <span class="btn">No</span>
                <span class="btn">Not Sure</span>
              </div>

              <div class="copy">
                <p><strong>Purpose:</strong> Determines whether landline or cellular system is appropriate.</p>
              </div>

              <span class="btn-back">
                <?php include 'inc/vectors/arrow-left-circle-fill.svg'; ?>
                Go Back
              </span>
            </div>
          </article>

          <figure>
            <img class="image" src="http://bay-alarm-cc.local/wp-content/uploads/Group-8482@2x.webp" alt="image">
          </figure>
        </div>
      </div>
    </div>
  </section>


<?php
  include 'inc/bottom-get-started.php';
  get_footer();
?>