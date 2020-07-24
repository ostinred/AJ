<div class="is-container-fluid">
  <?php foreach ($posts_list as $key => $post): ?>
    <?php
      $size = "";
      switch ($post['size']) {
        case 'small':
          $size = "is-project__small";
          break;
        case 'normal':
          break;
        case 'large':
          $size = "is-project__large";
        break;
      }
      $position = "";

      switch ($post['position']) {
        case 'left':
          break;
        case 'right':
          $position = "right-aligned";
          break;
      }
    ?>
      <div class="is-project wow <?=$size?> <?=$position?>">
        <a class="is-project-media <?=get_video_preview($post['post'])?'with-video-bg':''?>"
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
              muted
            >
              <source src="<?=get_video_preview($post['post'])?>" type="video/mp4" />
            </video>
          <?php endif;?>
        </a>

    <div class="project-text">
      <h3 class="project-heading">
        <?=$post['post']->post_title?>
      </h3>
      <p class="project-company">
        <?php if(!!$is_creativish):?>
          <?=get_the_date('d M Y',$post['post']) ?>
        <?php else:?>
          <?=get_field('company', $post['post']->ID)?>
        <?php endif;?>
      </p>
    </div>
  </div>
  <?php endforeach;?>
</div>