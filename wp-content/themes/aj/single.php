<?php get_header() ?>
<div class="is-post__page">
      <!-- main -->
      <main role="main">
        <!-- parallax banner -->
        <div class="is-parallax-wrapper">
          <div
            class="is-parallax-image"
            data-parallax="scroll"
            data-image-src="<?=get_field('sliding_image')['url']?>"
            data-speed="0.1"
          >
            <div class="is-banner__copies">
              <div>
                <p class="project-company wow">2 May 2020</p>
                <h1 class="project-heading wow">
                  <?php the_title() ?>
                </h1>
              </div>
            </div>
          </div>
        </div>
        <!-- end of parallax banner -->
      </main>

      <!-- post -->
      <section class="is-block">
        <div class="is-container">
          <h2 class="is-block__title"><?=get_field('subhead')?></h2>
          <?php           
          if(!empty(get_field('rows')) ):
            foreach(get_field('rows') as $row ) : ?>
              <div class="is-block__row">
                <?php if(!empty($row['elements'])):?>
                    <?php foreach($row['elements'] as $element):?>
                        <?php if($element['type']==='text'):?>
                          <p><?=$element['text']?>
                        <?php elseif($element['type']==='image'):?>
                          <figure class="is-block__image wow">
                            <img src="<?=$element['image']['url']?>" alt="" />
                          </figure>
                        <?php elseif($element['type']==='vimeo'):
                          ?>
                          <figure class="is-block__video wow">
                          <img src="<?=$element['image']['url']?>" alt="" />
                            <div class="is-block__video-overlay">
                              <button class="close-modal-btn" type="button"></button>
                              <iframe
                                src="<?=get_vimeo_url($element['vimeo_url'])?>"
                                width="640"
                                height="360"
                                frameborder="0"
                                allow="autoplay; fullscreen"
                                allowfullscreen
                              ></iframe>
                            </div>
                          </figure>
                        <?php endif?>
                    <?php endforeach; ?>
                  <?php endif?>
              </div>
            <?php endforeach;
          endif;?>
        </div>
      </section>
      <!-- end of post -->
      <?php if(!empty(get_field('related_posts')) ):?>
      <!-- related content -->
        <div class="relative__block">
          <div class="is-container">
            <div class="relative__title wow">
              Related posts
            </div>

            <div class="relative_content">
            <?php foreach(get_field('related_posts') as $post ) : ?>
                <div class="is-project is-catalog__project wow">
                  <a
                    class="is-project-media <?=get_video_preview($post['post'])?'with-video-bg':''?>"
                    role="link"
                    href="<?=get_post_permalink($post['post']->ID)?>"
                  >
                    <img
                      class="project-image"
                      src="<?=get_field('sliding_image', $post['post']->ID)['url']?>"
                    />
                    <?php if(get_video_preview($post['post'])):?>

                      <video
                        class="project-video"
                        loop
                        preload="metadata"
                        muted>
                        <source src="<?=get_video_preview($post['post'])?>" type="video/mp4" />
                      </video>
                    <?php endif;?>

                  </a>

                  <div class="project-text">
                    <h3 class="project-heading">
                    <?=$post['post']->post_title?>
                    </h3>
                    <p class="project-company">1 May 2020</p>
                  </div>
                </div>
              <?php endforeach;?>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <!-- end of related content -->
    </div>
    <footer role="contentinfo" class="is-footer" id="footer">

    <?php get_footer()?>