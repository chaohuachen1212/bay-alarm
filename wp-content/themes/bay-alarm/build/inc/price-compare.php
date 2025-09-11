<?php if (get_field('turn_on_price_compare')==='on'): ?>
<section class="price-compare">
  <div class="inner-max-container">
    <div class="top-wrap">
      <h2><?php the_field('price_compare_title') ?></h2>
      <?php the_field('price_compare_copy') ?>
    </div>

    <?php
      $header = get_field('price_compare_header_row');
      $header1 = $header[0]['text'];
      $header2 = $header[1]['text'];
      $header3 = $header[2]['text'];
      $header4 = $header[3]['text'];
      $header5 = $header[4]['text'];

      $bamRow = get_field('price_compare_bam_row');
    ?>
    <div class="price-compare--table desktop">

      <?php
        $m = 1;
      	if( have_rows('price_compare_tables') ):
      	while( have_rows('price_compare_tables') ): the_row();
      ?>
      <div class="table <?php if($m===1): echo 'is-active'; endif; ?>">
        <div class="header-row">
          <div class="header-cell">
            <h3></h3>
          </div>
          <div class="header-cell device">
            <h3><?php echo $header1; ?></h3>
          </div>
          <div class="header-cell monthly">
            <h3><?php echo $header2; ?></h3>
          </div>
          <div class="header-cell one">
            <h3><?php echo $header3; ?></h3>
          </div>
          <div class="header-cell two">
            <h3><?php echo $header4; ?></h3>
          </div>
          <div class="header-cell three">
            <h3><?php echo $header5; ?></h3>
          </div>
        </div>
        <div id="bam-cost" class="cost-row bam">
          <div class="price-cell">
            <?php include 'vectors/new-logo.svg'; ?>
          </div>

          <div class="bam-row-wrap">
            <div class="price-cell device">
            <span>$</span><p class="device"><?php the_sub_field('bam_device') ?></p>
            </div>
            <div class="price-cell monthly">
              <span>$</span><p class="monthly"><?php the_sub_field('bam_monthly') ?></p><span>/mo</span>
            </div>
            <div class="price-cell one">
              <span>$</span><p class="one"><?php the_sub_field('bam_one') ?></p>
            </div>
            <div class="price-cell two">
              <span>$</span><p class="two"><?php the_sub_field('bam_two') ?></p>
            </div>
            <div class="price-cell three">
              <span>$</span><p class="three"><?php the_sub_field('bam_three') ?></p>
            </div>
          </div>

        </div>


          <div class="cost-row comp">
            <div class="price-cell comp">
              <div class="show-val-wrap">
                <p class="comp show-val"><img src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian.png" alt="Image"></p>
                <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.22781 1.23431C1.53155 0.921895 2.02401 0.921895 2.32775 1.23431L8 7.06863L13.6722 1.23431C13.976 0.921895 14.4685 0.921895 14.7722 1.23431C15.0759 1.54673 15.0759 2.05327 14.7722 2.36569L8.54997 8.76569C8.24623 9.0781 7.75377 9.0781 7.45003 8.76569L1.22781 2.36569C0.924065 2.05327 0.924065 1.54673 1.22781 1.23431Z" fill="#3C3A42" stroke="#3C3A42" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

              </div>

              <ul class="comp-dropdown" id="comp-item">
                <?php
                	$c = 1;
                	if( have_rows('providers') ):
                	while( have_rows('providers') ): the_row();
                   $item= get_sub_field('name');
                ?>
                <li class="<?php if($c===1): echo 'is-active'; endif; ?>" data-item="<?php echo $item; ?>">
                   <?php if ($item==='life-alert'): ?>
                    <img class="non-hover"  src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert.png" alt="Image">
                    <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert-hover.png" alt="Image">
                  <?php else: ?>
                      <img class="non-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian.png" alt="Image">
                      <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian-hover.png" alt="Image">
                  <?php endif; ?>
                </li>
                <?php
                	$c++; endwhile; endif;
                ?>
              </ul>
            </div>

            <?php
              $c = 1;
              if( have_rows('providers') ):
              while( have_rows('providers') ): the_row();
                $item = get_sub_field('name');
            ?>

            <div class="cel-wrap <?php if($c===1): echo 'is-active'; endif; ?>" data-comp="<?php echo $item?>">
              <div class="price-cell device">
                <span>$</span><p class="device"><?php the_sub_field('device') ?></p>
              </div>
              <div class="price-cell monthly">
                <span>$</span><p class="monthly"><?php the_sub_field('monthly') ?></p><span>/mo</span>
              </div>
              <div class="price-cell one">
                <span>$</span><p class="one"><?php the_sub_field('one') ?></p>
              </div>
              <div class="price-cell two">
                <span>$</span><p class="two"><?php the_sub_field('two') ?></p>
              </div>
              <div class="price-cell three">
                <span>$</span><p class="three"><?php the_sub_field('three') ?></p>
              </div>
            </div>

            <?php
              $c++; endwhile; endif;
            ?>
          </div>


        <div class="cost-row savings">
          <div class="price-cell savings">
            <p>Savings</p>
          </div>
          <div class="price-cell">
            <p></p>
          </div>
          <div class="price-cell">
            <p></p>
          </div>
          <div class="price-cell one">
            <div class="btn-cell">
              <span>$</span><p class="one"></p>
            </div>
          </div>
          <div class="price-cell two">
            <div class="btn-cell">
              <span>$</span><p class="two"></p>
            </div>
          </div>
          <div class="price-cell three">
            <div class="btn-cell">
              <span>$</span><p class="three"></p>
            </div>
          </div>
        </div>
      </div>
      <?php
      	$m++; endwhile; endif;
      ?>
    </div>

    <div class="price-compare--mobile">



      <?php
        $q = 1;
      	if( have_rows('price_compare_tables') ):
      	while( have_rows('price_compare_tables') ): the_row();
      ?>


      <div class="box-wrap <?php if($q===1): echo 'is-active'; endif; ?>">
        <div class="dropdown-wrap">
          <div class="select">
            <span class="empty-click"></span>
            <ul class="mobile-comp-dropdown">
              <?php
                $c = 1;
                if( have_rows('providers') ):
                while( have_rows('providers') ): the_row();
                $item = get_sub_field('name');
              ?>

              <li class="<?php if($c===1): echo 'is-active'; endif; ?>" data-item="<?php echo $item; ?>">
                <span>
                 <?php if ($item==='life-alert'): ?>
                    <img class="non-hover"  src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert.png" alt="Image">
                    <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert-hover.png" alt="Image">
                  <?php else: ?>
                      <img class="non-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian.png" alt="Image">
                      <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian-hover.png" alt="Image">
                  <?php endif; ?>
              </span></li>
              <?php
                $c++; endwhile; endif;
              ?>
            </ul>
            <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.22781 1.23431C1.53155 0.921895 2.02401 0.921895 2.32775 1.23431L8 7.06863L13.6722 1.23431C13.976 0.921895 14.4685 0.921895 14.7722 1.23431C15.0759 1.54673 15.0759 2.05327 14.7722 2.36569L8.54997 8.76569C8.24623 9.0781 7.75377 9.0781 7.45003 8.76569L1.22781 2.36569C0.924065 2.05327 0.924065 1.54673 1.22781 1.23431Z" fill="#3C3A42" stroke="#3C3A42" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
        </div>
        <div class="box">
          <div class="header">
            <div class="price-cell">
              <h3><?php echo $header1; ?></h3>
            </div>
          </div>
          <div class="cost-row bam">
            <div class="price-cell">
              <?php include 'vectors/pricing/mobile-logo.svg'; ?>
            </div>

            <div class="bam-row-wrap">
              <div class="price-cell device">
                <span>$</span><p class="device"><?php the_sub_field('bam_device'); ?></p>
              </div>
            </div>

          </div>

          <div class="comp-rows-wrap">
            <?php
              $c = 1;
              if( have_rows('providers') ):
              while( have_rows('providers') ): the_row();
              $item = get_sub_field('name');
            ?>
              <div class="cost-row comp <?php if($c===1): echo 'is-active'; endif; ?>" data-comp="<?php echo $item; ?>">
                <div class="price-cell">
                  <?php if ($item==='life-alert'): ?>
                    <img class="non-hover"  src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert.png" alt="Image">
                    <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert-hover.png" alt="Image">
                  <?php else: ?>
                      <img class="non-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian.png" alt="Image">
                      <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian-hover.png" alt="Image">
                  <?php endif; ?>
                </div>

                <div class="price-cell device">
                  <span>$</span><p class="device"><?php the_sub_field('device'); ?></p>
                </div>
              </div>

            <?php
              $c++; endwhile; endif;
            ?>
          </div>
        </div>



        <div class="box">
          <div class="header">
            <div class="price-cell">
              <h3><?php echo $header2; ?></h3>
            </div>
          </div>
          <div class="cost-row bam">
            <div class="price-cell">
              <?php include 'vectors/pricing/mobile-logo.svg'; ?>
            </div>

            <div class="bam-row-wrap">
              <div class="price-cell monthly">
                <span>$</span><p class="monthly"><?php the_sub_field('bam_monthly'); ?></p><span>/mo</span>
              </div>
            </div>

          </div>

          <div class="comp-rows-wrap">
            <?php
              $c = 1;
              if( have_rows('providers') ):
              while( have_rows('providers') ): the_row();
              $item = get_sub_field('name');
            ?>
            <div class="cost-row comp <?php if($c===1): echo 'is-active'; endif; ?>" data-comp="<?php echo $item; ?>">
              <div class="price-cell">
                  <?php if ($item==='life-alert'): ?>
                    <img class="non-hover"  src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert.png" alt="Image">
                    <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert-hover.png" alt="Image">
                  <?php else: ?>
                      <img class="non-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian.png" alt="Image">
                      <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian-hover.png" alt="Image">
                  <?php endif; ?>
                </div>
              <div class="price-cell monthly">
                <span>$</span><p class="monthly"><?php the_sub_field('monthly'); ?></p><span>/mo</span>
              </div>
            </div>
            <?php
              $c++; endwhile; endif;
            ?>

          </div>
        </div>

        <div class="box">
          <div class="header">
            <div class="price-cell">
              <h3><?php echo $header3; ?></h3>
            </div>
          </div>
          <div class="cost-row bam">
            <div class="price-cell">
              <?php include 'vectors/pricing/mobile-logo.svg'; ?>
            </div>

            <div class="bam-row-wrap">
              <div class="price-cell one">
                <span>$</span><p class="one"><?php the_sub_field('bam_one'); ?></p>
              </div>
            </div>

          </div>

          <div class="comp-rows-wrap">
            <?php
              $c = 1;
              if( have_rows('providers') ):
              while( have_rows('providers') ): the_row();
              $item = get_sub_field('name');
            ?>
            <div class="cost-row comp <?php if($c===1): echo 'is-active'; endif; ?>" data-comp="<?php echo $item; ?>">
              <div class="price-cell">
                  <?php if ($item==='life-alert'): ?>
                    <img class="non-hover"  src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert.png" alt="Image">
                    <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert-hover.png" alt="Image">
                  <?php else: ?>
                      <img class="non-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian.png" alt="Image">
                      <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian-hover.png" alt="Image">
                  <?php endif; ?>
                </div>
              <div class="price-cell one">
                <span>$</span><p class="one"><?php the_sub_field('one'); ?></p>
              </div>
            </div>
            <?php
              $c++; endwhile; endif;
            ?>
          </div>

          <div class="cost-row savings">
            <div class="price-cell">
              <p>Savings</p>
            </div>
            <div class="price-cell one">
              <div class="btn-cell">
                <span>$</span><p class="one"></p>
              </div>
            </div>
          </div>
        </div>

        <div class="box">
          <div class="header">
            <div class="price-cell">
              <h3><?php echo $header4; ?></h3>
            </div>
          </div>
          <div class="cost-row bam">
            <div class="price-cell">
              <?php include 'vectors/pricing/mobile-logo.svg'; ?>
            </div>

            <div class="bam-row-wrap">
              <div class="price-cell two">
                <span>$</span><p class="two"><?php the_sub_field('bam_two'); ?></p>
              </div>
            </div>
          </div>

          <div class="comp-rows-wrap">
            <?php
              $c = 1;
              if( have_rows('providers') ):
              while( have_rows('providers') ): the_row();
              $item = get_sub_field('name');
            ?>
            <div class="cost-row comp <?php if($c===1): echo 'is-active'; endif; ?>" data-comp="<?php echo $item; ?>">
              <div class="price-cell">
                  <?php if ($item==='life-alert'): ?>
                    <img class="non-hover"  src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert.png" alt="Image">
                    <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert-hover.png" alt="Image">
                  <?php else: ?>
                      <img class="non-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian.png" alt="Image">
                      <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian-hover.png" alt="Image">
                  <?php endif; ?>
                </div>
              <div class="price-cell two">
                <span>$</span><p class="two"><?php the_sub_field('two'); ?></p>
              </div>
            </div>
            <?php
              $c++; endwhile; endif;
            ?>

          </div>

          <div class="cost-row savings">
            <div class="price-cell">
              <p>Savings</p>
            </div>
            <div class="price-cell two">
              <div class="btn-cell">
                <span>$</span><p class="two"></p>
              </div>
            </div>
          </div>
        </div>

        <div class="box">
          <div class="header">
            <div class="price-cell">
              <h3><?php echo $header5; ?></h3>
            </div>
          </div>
          <div class="cost-row bam">
            <div class="price-cell">
              <?php include 'vectors/pricing/mobile-logo.svg'; ?>
            </div>

            <div class="bam-row-wrap">
              <div class="price-cell three">
                <span>$</span><p class="three"><?php the_sub_field('bam_three'); ?></p>
              </div>
            </div>
          </div>

          <div class="comp-rows-wrap">
            <?php
              $c = 1;
              if( have_rows('providers') ):
              while( have_rows('providers') ): the_row();
              $item = get_sub_field('name');
            ?>
            <div class="cost-row comp <?php if($c===1): echo 'is-active'; endif; ?>" data-comp="<?php echo $item; ?>">
              <div class="price-cell">
                  <?php if ($item==='life-alert'): ?>
                    <img class="non-hover"  src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert.png" alt="Image">
                    <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/life-alert-hover.png" alt="Image">
                  <?php else: ?>
                      <img class="non-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian.png" alt="Image">
                      <img class="on-hover" src="<?php echo GET_TEMP ?>/img/pricing-pla/medical-guardian-hover.png" alt="Image">
                  <?php endif; ?>
                </div>
              <div class="price-cell three">
                <span>$</span><p class="three"><?php the_sub_field('three'); ?></p>
              </div>
            </div>
            <?php
              $c++; endwhile; endif;
            ?>
          </div>

          <div class="cost-row savings">
            <div class="price-cell">
              <p>Savings</p>
            </div>
            <div class="price-cell three">
              <div class="btn-cell">
                <span>$</span><p class="three"></p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <?php
      	$q++; endwhile; endif;
      ?>


    </div>
  </div>
</section>
<?php endif; ?>
