<?php 
/*
Template Name: Page "Main"
*/
?>
<?php get_header()?>
  <div id="mainPage" class="mrHyde">
    <!-- main block -->
    <main role="main" class="is-main">
      <div class="white-lines">
        <div class="white-line white-line__1"></div>
        <div class="white-line white-line__2"></div>
        <div class="white-line white-line__3"></div>
        <div class="white-line white-line__4"></div>
        <div class="white-line white-line__5"></div>
        <div class="white-line white-line__6"></div>
        <div class="white-line white-line__7"></div>
        <div class="white-line white-line__8"></div>
        <div class="white-line white-line__9"></div>
        <div class="white-line white-line__10"></div>
        <div class="white-line white-line__11"></div>
        <div class="white-line white-line__12"></div>
      </div>

      <div class="black-lines">
        <div class="black-line black-line__1"></div>
        <div class="black-line black-line__2"></div>
        <div class="black-line black-line__3"></div>
        <div class="black-line black-line__4"></div>
        <div class="black-line black-line__5"></div>
        <div class="black-line black-line__6"></div>
        <div class="black-line black-line__7"></div>
        <div class="black-line black-line__8"></div>
        <div class="black-line black-line__9"></div>
        <div class="black-line black-line__10"></div>
        <div class="black-line black-line__11"></div>
        <div class="black-line black-line__12"></div>
      </div>

      <div
        class="main-link is-main__white-link"
        id="homepageLinkFromDirector"
      >
        <i class="icon-arrow-left"></i>
      </div>

      <div class="is-main__dark">
        <div
          class="main-link is-main__dark-link"
          id="homepageLinkFromCreative"
        >
          <i class="icon-arrow-right"></i>
        </div>
      </div>
      <div class="main-link main-link__creative" id="creativeLink">
        <i class="icon-arrow-left"></i>
        <span>
          Creative
        </span>
      </div>

      <div class="main-link main-link__director" id="directorLink">
        <span>
          Director
        </span>

        <i class="icon-arrow-right"></i>
      </div>
    </main>

    <div class="is-mainpage__content">
      <div class="is-homepage__content">
      <?php if(!empty(get_field('blocks')) ):
          foreach(get_field('blocks') as $block ) : 
            switch($block['block_type']){
              case 'quoteBlock':
                my_template_part('main-blocks/quote','block', [
                  'quote' => $block['quote'],
                  'quote_author' => $block['quote_author'],
                  'reversed'=> $block['reversed'],
                  'cite' => $block['cite'],
                  'lines_growing'=>$block['lines_growing'],
                  'text_align'=>$block['text_align']
                ]);
              break;
              case 'fullPagePost':
                my_template_part('main-blocks/full', 'page', [
                  'post'=> $block['post']
                ]);
              break;
              case 'postsList':
                my_template_part('main-blocks/posts', 'list', [
                  'posts_list' => $block['posts_list']
                ]);
                break;
              }
          endforeach;
            else:
          endif;?>
          <div class="bottom-navigation">
            <div
              id="creativeLinkBottom"
              class="bottom-navigation__link"
            >
              <i class="icon-arrow-left"></i>
              <span>Creative</span>
            </div>
            <div
              id="directorLinkBottom"
              class="bottom-navigation__link bottom-navigation__director"
            >
              <span>
                Director
              </span>

              <i class="icon-arrow-right"></i>
            </div>
          </div>
        </div>

        <?=get_template_part('main','creative');?>
        <?=get_template_part('main','director');?>
      </div>

    </div>
    <footer role="contentinfo" class="is-footer" id="footer">
<?php get_footer() ?>