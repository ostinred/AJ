<?php get_header()?>

<div class="is-default__page">
      <main class="is-container" role="main">
        <h2 class="page-title" role="heading">
          Catalog
        </h2>

        <div class="is-catalog__grid">
          <?php 
          if (have_posts()) :
            while (have_posts()) :the_post()?>
              <div class="is-project is-catalog__project wow">
                <a
                  class="is-project-media <?=get_video_preview(get_post())?'with-video-bg':''?>"
                  role="link"
                  href="<?=get_post_permalink()?>"
                >
                  <img
                    class="project-image"
                    src="<?=get_field('sliding_image')['url']?>"
                  />
                  <?php if(get_video_preview(get_post())):?>
                    <video
                      class="project-video"
                      loop
                      preload="metadata"
                      muted
                    >
                      <source src="<?=get_video_preview(get_post())?>" type="video/mp4" />
                    </video>
                  <?php endif;?>
                </a>

                <div class="project-text">
                  <h3 class="project-heading">
                    <?=get_the_title()?>
                  </h3>
                  <p class="project-company">
                    <?=get_field('company')?>
                  </p>
                </div>
              </div>
            <?php endwhile;
          endif;
          ?>
        </div>
      </main>
    </div>
    <footer role="contentinfo" class="is-footer" id="footer">
  <?php get_footer()?>
