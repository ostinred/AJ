<div class="is-zebra
  <?=$lines_growing === 'fromRight' ? "is-zebra__lines-reversed" : ""?>
  <?=$cite ? 'is-zebra__cite' : ""?>
  <?=$reversed ? "is-zebra__bg-black" : ""?>
  <?=$text_align === 'left' ? 'is-zebra__text-left' : ""?>">
  <div class="is-zebra__lines">
    <div class="zebra-line zebra-l1"></div>
    <div class="zebra-line zebra-l2"></div>
    <div class="zebra-line zebra-l3"></div>
    <div class="zebra-line zebra-l4"></div>
    <div class="zebra-line zebra-l5"></div>
    <div class="zebra-line zebra-l6"></div>
    <div class="zebra-line zebra-l7"></div>
    <div class="zebra-line zebra-l8"></div>
  </div>
  <div class="is-zebra__wrapper">
    <div class="is-zebra__text">
      <h2 role="heading">
        <?=$quote?>
      </h2>
      <?php if ($cite): ?>
        <p class="project-company">
          <?=$quote_author?>
        </p>
      <?php endif;?>
    </div>
  </div>
</div>