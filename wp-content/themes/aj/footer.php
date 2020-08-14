
      <div class="is-footer__container">
          <div class="is-footer__logo">
            <a href="index.html" role="link">
              <img src="<?=get_stylesheet_directory_uri()?>/img/logo/logo-footer.svg" alt="AJ logo" />
            </a>
          </div>

          <div class="is-footer__info">
            <div class="is-footer__text">
              <h3 class="is-footer__info-title">AJ Rivvers</h3>
              <p>
                <?=get_field('description_in_footer','option')?>
              </p>
              <?php if(!is_about_page() && !empty(get_field('read_more','options'))):?>
                <a
                  class="is-footer__info-link"
                  href="<?=get_post_permalink(get_field('read_more','option')->ID)?>"
                  role="link"
                >
                  Read more

                  <i class="icon-arrow-right"></i>
                </a>
              <?php else: ?>
                <a
                  class="is-footer__info-link"
                  href="/catalog"
                  role="link"
                >
                  See the work
                  <i class="icon-arrow-right"></i>
                </a>
              <?php endif; ?>
            </div>

            <div class="is-footer__text">
              <h3 class="is-footer__info-title">Contact</h3>
              <p>
                <a
                  href="mailto:<?=get_field('contact_email','option');?>?subject=I couldn’t agree more.&body=Truths do inspire action. Meaning does create value. And fast is the new great. Can we set up time to talk more about the intersection of entertainment and technology?"
                  role="link"
                >
                  <?=get_field('contact_email','option');?>
                </a>
              </p>
            </div>
          </div>
        </div>

        <div class="is-copyright">
          ©
          <span><?=date('Y')?></span>
          AJ Rivvers
        </div>
      </footer>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"
    ></script>
    <!-- <script src="<?=get_stylesheet_directory_uri()?>/markup/dest/js/mobile-detect.js"></script> -->
    <script src="<?=get_stylesheet_directory_uri()?>/markup/dest/js/slick.min.js"></script>
    <script src="<?=get_stylesheet_directory_uri()?>/markup/dest/js/parallax.min.js"></script>
    <script src="<?=get_stylesheet_directory_uri()?>/markup/dest/js/wow.min.js"></script>
    <script src="<?=get_stylesheet_directory_uri()?>/markup/dest/js/touch.min.js"></script>
    <script src="<?=get_stylesheet_directory_uri()?>/markup/dest/js/main.js"></script>
    <?php wp_footer();?>
  </body>
</html>
