<?php $post = get_post(117); ?>
<div class="is-director__content">
  <?php if(!empty(get_field('blocks',$post->ID)) ):
    foreach(get_field('blocks',$post->ID) as $block ) : 
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

  <div class="bottom-navigation bottom-navigation__director">
    <div
      id="homepageLinkFromDirectorBottom"
      class="bottom-navigation__link"
    >
      <i class="icon-arrow-left"></i>
      <span>Creative Director</span>
    </div>
  </div>
</div>