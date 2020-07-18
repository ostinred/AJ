<div class="is-container-fluid">
  <?php foreach ($posts_list as $key => $post): ?>
    <?php
      $classes = "";
      switch ($post['position']) {
        case 'left':
          break;
        case 'smallLeft':
          $classes = 'is-project__small';
          break;
        case 'smallRight':
          $classes = "is-project__small right-aligned";
          break;
        case 'right':
          $classes = 'right-aligned';
          break;
        case 'center':
          $classes = 'is-project__large';
          break;
      }

?>
      <div class="is-project wow <?=$classes?>">
    <a class="is-project-media with-video-bg "
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
        muted
      >
        <source src="<?=get_video_preview($post['post'])?>" type="video/mp4" />
      </video>
    </a>

    <div class="project-text">
      <h3 class="project-heading">
        <?=$post['post']->post_title?>
      </h3>
      <p class="project-company">
        <?=get_field('company', $post['post']->ID)?>
      </p>
    </div>
  </div>
  <?php endforeach;?>
</div>