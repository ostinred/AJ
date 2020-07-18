<a class="is-banner with-video-bg" href="<?=get_post_permalink($post->ID)?>">
  <img
    class="project-image"
    src="<?=get_field('sliding_image',$post->ID)['url']?>"
    alt=""
  />
  <video
    class="project-video"
    loop
    preload="metadata"
    muted
  >
    <source src="<?=get_field('video_preview', $post->ID)['url']?>" type="video/mp4" />
  </video>

  <div class="is-banner__copies">
    <img
      class="is-logo__icon"
      src="<?=get_stylesheet_directory_uri()?>/img/logo/logo-icon.svg"
      alt="AJ Rivvers logo icon"
    />
    <div class="is-banner__line"></div>
    <div class="project-text">
      <h3 class="project-heading">
        <?=$post->post_title?>
      </h3>
      <p class="project-company"><?=get_field('company', $post->ID)?></p>
    </div>
  </div>
</a>