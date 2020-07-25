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
                <p class="project-company wow"><?=get_field('company')?></p>
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
          <?php if (!empty(get_field('blocks'))):
                foreach (get_field('blocks') as $block): ?>
			            <?php if ($block['type'] === 'parallaxBackground'): ?>
			              <div class="is-parallax-wrapper">
			                <div
			                  class="is-parallax-image"
			                  data-parallax="scroll"
			                  data-image-src="<?=$block['parallax_background']['url']?>"
                        data-speed="0.1">
                      </div>
			              </div>
                  <?php elseif ($block['type'] === 'contentRows'):?>
                    <div class="is-container">
                      <h3>
                        <?=$block['title']?>
                      </h3>
                      <?php foreach ($block['rows'] as $row): ?>
                          <div class="is-block__row">
                            <?php if (!empty($row['elements'])): ?>
                                <?php foreach ($row['elements'] as $element): ?>
                                    <?php if ($element['type'] === 'text'): ?>
                                      <p><?=$element['text']?>
                                    <?php elseif ($element['type'] === 'image'): ?>
                                    <figure class="is-block__image wow">
                                      <img src="<?=$element['image']['url']?>" alt="" />
                                    </figure>
                                  <?php elseif ($element['type'] === 'vimeo'):?>
                                  <figure class="is-block__video">
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
                            <?php endforeach;?>
                          <?php endif?>
                      </div>
                    <?php endforeach;?>
                </div>
              <?php elseif ($block['type'] === 'threeImages'):?>
                <div class="is-container">

                  <div class="post-columns <?=$block['direction']==='descent'?'descent':''?> <?=count($block['three_images'])===3?'three-columns':''?>">
                    <?php foreach ($block['three_images'] as $three_images): ?>
                        <figure class="is-block__image wow animated" style="visibility: visible; animation-name: fadeInUp;">
                          <img src="<?=$three_images['image']['url']?>" alt="">
                        </figure>
                    <?php endforeach ?>
                  </div>
                </div>
              <?php elseif ($block['type'] === 'contentColumns'):?>
                <div class="is-container">
                  <div class="content-columns <?=$block['direction']==='descent'?'descent':''?>">
                    <?php foreach ($block['columns'] as $columns): ?>
                        
                        <div>
                          <?php foreach($columns['column'] as $column): ?>
                            <?php if($column['type']==='image'):?>
                              <img src="<?=$column['image']['url']?>" alt="" />
                            <?php elseif($column['type']==='text'):?>
                              <p>
                                <?=$column['text']?>
                              </p>
                            <?php elseif($column['type']==='title'):?>
                              <h3><?=$column['title']?></h3>
                            <?php endif ?>
                          <?php endforeach?>
                        </div>
                    <?php endforeach ?>
                  </div>
                </div
              <?php elseif ($block['type'] === 'imageCarousel'): ?>
                <div class="is-container">
                  <div class="is-slider__wrapper">
                    <button class="slider-nav slider-prev" type="button">
                      <i class="icon-arrow-left"></i>
                    </button>

                    <button class="slider-nav slider-next" type="button">
                      <i class="icon-arrow-right"></i>
                    </button>
                    <div class="is-slider">
                    <?php foreach ($block['image_carousel'] as $image): ?>
                      <div
                        class="is-slide"
                        style="
                          background-image: url(<?=$image['image']['url']?>);
                        "
                      >
                        <h2><?=$image['title']?></h2>
                      </div>
                      <?php endforeach?>
                    </div>
                  </div>
                </div>
              <?php elseif ($block['type'] === 'image'): ?>
                <div class="is-black">
                  <div class="is-container">
                    <figure class="is-block__image wow">
                      <img src="<?=$block['dedicated_image']['url']?>" alt="" />
                    </figure>
                  </div>
                </div>
              <?php elseif ($block['type'] === 'quote'): ?>
                  <?php
                    my_template_part('main-blocks/quote','block', [
                      'quote' => $block['quote'],
                      'quote_author' => $block['quote_author'],
                      'reversed'=> $block['reversed'],
                      'cite' => $block['cite'],
                      'lines_growing'=>$block['lines_growing'],
                      'text_align'=>$block['text_align']
                    ]);
                  ?>
                <?php endif;?>
              
              <?php endforeach;
              endif;?>
        </div>
      </section>
      <!-- end of post -->
      
      <?php if(!empty(get_field('related_posts') && is_array(get_field('related_posts'))) ):?>
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
                    <p class="project-company"><?=get_the_date('d M Y',$post['post']) ?></p>
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