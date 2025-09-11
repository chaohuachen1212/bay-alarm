<section class="health-partner--hero">
    <div class="container">
        <div class="row">
          <figure>
              <img src="<?php the_field('hero_image'); ?>" alt="Hero Image">
          </figure>

          <article>
            <h1><?php the_field('hero_title'); ?></h1>
            <p><?php the_field('hero_copy'); ?></p>

     
          <a href="<?php the_field('hero_button_link'); ?>" class="btn call-btn">
            <span class="small-text"><?php the_field("hero_button_text") ?></span>
          </a>
          </article>
        </div>
    </div>
  </section>