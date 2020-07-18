<?php get_header()?>

<div class="is-project__page">
<?php
if (have_posts()):
    while (have_posts()): the_post();?>
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
		                  <?php the_title()?>
		                </h1>
		              </div>
		            </div>
		          </div>
		        </div>
		        <!-- end of parallax banner -->

		        <!-- expand text block -->
		        <section class="is-block__expanded">
		          <div class="is-container">
		            <h2>
		              <?=get_field('subhead')?>
		            </h2>

		            <div class="is-block__expanded-description">
                  <?=get_field('first_text_block')?>
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
		      </main>

		      <!-- post -->
		      <div class="is-block">
		        <div class="is-container">
		          <div class="is-block__row">
		          <?=get_field('second_text_block')?>
		          </div>
		        </div>
		        <div class="is-container">
		          <div class="is-block__row">
		            <figure class="is-block__image wow">
		              <img src="<?=get_field('image')['url']?>" alt="" />
		            </figure>
		          </div>
		        </div>
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
                            <?php endforeach;?>
                          <?php endif?>
                      </div>
                    <?php endforeach;?>
                </div>
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
      <!-- end of post -->
      <?php if(!empty(get_field('credits')) ):?>
      <div class="is-credit">
        <div class="is-container">
          <button
            role="button"
            type="button"
            class="is-credit__toggler"
          >
            credits

            <i class="icon-arrow-bottom"></i>
          </button>
          <div class="is-credit__content">
            <div class="is-credit__wrapper">
              <?php foreach(get_field('credits') as $credit):?>
                <div class="column">
                  <?php foreach($credit['blocks'] as $block):?>
                    <p class="is-credit__title"><?=$block['title']?></p>
                    <?=$block['content']?>
                  <?php endforeach;?>
                </div>
              <?php endforeach;?>
            </div>
          </div>
        </div>
      </div>
      <?php endif?>
      <?php if(!empty(get_field('related_posts')) ):?>
        <div class="relative__block">
          <div class="is-container">
            <div class="relative__title wow">
              Related content
            </div>

            <div class="relative_content">
              <?php
                
                  foreach(get_field('related_posts') as $post ) : ?>
                    <div class="is-project is-catalog__project wow">
                      <a
                        class="is-project-media with-video-bg"
                        role="link"
                        href="<?=get_post_permalink($post['post']->ID)?>"
                      >
                        <img
                          class="project-image"
                          src="<?=get_field('sliding_image', $post['post']->ID)['url']?>"
                        />
      
                        <video
                          class="project-video"
                          loop
                          preload="metadata"
                          muted>
                          <source src="<?=get_video_preview($post['post'])?>" type="video/mp4" />
                        </video>
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
    <?endwhile;
  endif;
  ?>

    </div>
    <footer role="contentinfo" class="is-footer" id="footer">
      <?php get_footer()?>