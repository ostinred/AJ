<?php 
/*
Template Name: Page "Creativeish"
*/
?>
<?php get_header()?>
<div class="is-default__page is-blog__page">
      <!-- main -->
      <main role="main">
        <div class="is-container">
          <h2 class="page-title wow" role="heading">
            Creativeish
          </h2>
        </div>
        <?php if(!empty(get_field('blocks')) ):
            foreach(get_field('blocks') as $block ) : 
              switch($block['block_type']){
                case 'quoteBlock':
                  my_template_part('main-blocks/quote','block', [
                    'quote' => $block['quote'],
                    'quote_author' => $block['quote_author'],
                    'reversed'=> $block['reversed'],
                    'cite' => $block['cite'],
                    'lines_growing' => $block['lines_growing'],
                    'text_align' => $block['text_align']
                  ]);
                break;
                case 'fullPagePost':
                  my_template_part('main-blocks/full', 'page', [
                    'post'=> $block['post']
                  ]);
                break;
                case 'postsList':
                  my_template_part('main-blocks/posts', 'list', [
                    'posts_list' => $block['posts_list'],
                    'is_creativish' => true,
                  ]);
                  break;
                }
            endforeach;
            else:
            endif;?>
      </main>
      <!-- end of main -->
    </div>
    <footer role="contentinfo" class="is-footer" id="footer">
    <?php get_footer()?>
