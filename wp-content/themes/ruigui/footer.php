<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id="main-core".
 *
 * @package Ruigui
 */
?>

    </div><!-- /#main-core -->
    </div><!-- /#main -->
    <?php /* Sidebar */ thinkup_sidebar_html(); ?>
  </div>
  </div><!-- /#content -->

  <footer>
    <?php thinkup_input_footerlayout(); ?>
    <div id="sub-footer">
    <div id="sub-footer-core">

      <nav>
        <?php if ( has_nav_menu( 'sub_footer_menu' ) ) : ?>
        <?php wp_nav_menu( array( 'depth' => 1, 'container_class' => 'sub-footer-links', 'container_id' => 'footer-menu', 'theme_location' => 'sub_footer_menu' ) ); ?>
        <?php endif; ?>
      </nav>

      <p class="copyright">
        Copyright &copy;2015 <a href="http://ruigui-electronic.com/">Shenzhen Ruigui Electronic Co., Ltd.</a> All rights reserved.<br>
        <?php echo get_option('zh_cn_l10n_icp_num'); ?>
      </p>
    </div>
    </div>
  </footer><!-- /footer -->

</div><!-- /#body-core -->

<?php wp_footer(); ?>

</body>
</html>