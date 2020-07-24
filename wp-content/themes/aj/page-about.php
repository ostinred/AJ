<?php 
/*
Template Name: Page "About"
*/
get_header();
if (have_posts()) :
  while (have_posts()) :the_post()?>
<div class="is-about__page">
  <!-- main -->
  <main role="main">
    <!-- banner -->
    <div class="is-banner">
      <figure role="img">
        <img
          class="project-image"
          src="<?=get_field('main_image')['url']?>"
          alt=""
        />

        <figcaption>
          <div class="is-banner__copies">
            <h3><?=get_field('image_title')?></h3>
          </div>
        </figcaption>
      </figure>
    </div>
    <!-- end of banner -->

    <!-- expand text block -->
    <section class="is-block__expanded">
      <div class="is-container">
        <h2>
          A little backstory
        </h2>

        <div class="is-block__expanded-description">
          <?=get_field('backstory')?>
        </div>

        <button
          role="button"
          type="button"
          class="is-block__expanded-toggler"
        >
          read

          <span class="more">
            more
          </span>
          <span class="less">
            less
          </span>
          <i class="icon-arrow-bottom"></i>
        </button>
      </div>
    </section>
    <!-- end of expand text block -->

    <!-- principles -->
    <section class="about-principles">
      <div class="is-container">
        <div class="about-principles__heading wow">
          My work is driven
          <br />
          by 3 principles
        </div>

        <div class="about-principles__content wow">
          <div class="about-principle">
            <p>
              <span>
                Truths
              </span>
              inspire action.
            </p>
          </div>

          <div class="about-principle wow">
            <p>
              <span>
                Meaning
              </span>
              creates value.
            </p>
          </div>

          <div class="about-principle wow">
            <p>
              <span>
                Fast
              </span>
              is the new great.
            </p>
          </div>
        </div>

        <div class="about-principles__text wow">
          <?=get_field('principles_text')?>
        </div>
      </div>
    </section>
    <!-- end of principles -->

    <!-- companies -->
    <section class="about-companies">
      <div class="is-container">
        <div class="about-companies__title wow">
          Global experience
        </div>

        <div class="about-companies__images">
        <?php if (!empty(get_field('experience'))):
                foreach (get_field('experience') as $experience): ?>
                  <figure role="img" class="wow">
                    <img src="<?=$experience['svg_icon']['url']?>" alt="" />
                  </figure>
          <?php endforeach;
              endif ?>
        </div>
      </div>
    </section>
    <!-- end of companies -->

    <!-- history -->
    <section class="about-history">
      <div class="is-container">
        <div class="about-history__resume wow">
          <p>
            Established
            <br />
            in 2008
          </p>
          <a
            class="about-pdf"
            href="<?=get_field('resume_url')?>"
            role="link"
          >
            Resume
            <i class="icon-arrow-right"></i>
          </a>
        </div>

        <div class="about-history__projects">
        <?php if (!empty(get_field('employee_list'))):
                foreach (get_field('employee_list') as $employee): ?>
                  <div class="project-text wow">
                    <h3 class="project-heading">
                      <?=$employee['name']?>
                    </h3>
                    <p class="project-company"><?=$employee['position']?></p>
                  </div>
               <?php endforeach;
               endif?>
        </div>
      </div>
    </section>
    <!-- end of history -->

    <!-- zebra text -->
    <div class="is-zebra is-zebra__cite">
      <div class="is-zebra__lines">
        <div class="zebra-line zebra-l1"></div>
        <div class="zebra-line zebra-l2"></div>
        <div class="zebra-line zebra-l3"></div>
        <div class="zebra-line zebra-l4"></div>
        <div class="zebra-line zebra-l5"></div>
        <div class="zebra-line zebra-l6"></div>
        <div class="zebra-line zebra-l7"></div>
        <div class="zebra-line zebra-l8"></div>
      </div>
      <div class="is-zebra__wrapper">
        <div class="is-zebra__text">
          <h2 role="heading">
            <?=get_field('quote_text')?>
          </h2>
          <p class="project-company">
            <?=get_field('quote_author')?>
          </p>
        </div>
      </div>
    </div>
    <!-- end of zebra text -->
  </main>

  <section class="about-companies about-companies__black">
    <div class="is-container">
      <div class="about-companies__title wow">
        Select recognition
      </div>

      <div class="about-companies__images">
      <?php if (!empty(get_field('recognition'))):
                foreach (get_field('recognition') as $recognition): ?>
                  <figure role="img" class="wow">
                    <img src="<?=$recognition['svg_icon']['url']?>" alt="" />
                  </figure>
          <?php endforeach;
              endif ?>
      </div>
    </div>
  </section>
</div>
<?php endwhile;
        endif;?>
<footer role="contentinfo" class="is-footer is-footer__gold" id="footer">
<?php get_footer()?>


