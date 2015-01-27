<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Steven
 *
 */
?>

<div id="footer">
  <div class="wrapper">
    <nav>
      <?php get_wp_menu('footer'); ?>
    </nav>
    <p class="copyright">
      Copyright &copy;2015 <a href="http://ruigui-electronic.com/">Shenzhen Ruigui Electronic Co., Ltd.</a> All rights reserved.<br>
      <?php echo get_option('zh_cn_l10n_icp_num'); ?>
      <!-- <?php echo get_option('beian_textarea'); ?> -->
    </p>
  </div>

  <?php wp_footer(); ?>
</div>


<div id="shangxia"><div id="shang" title="返回顶部"></div><div id="xia" title="页面底部"></div></div>

<!-- 统计脚本 -->
<div class="js-hide"><?php echo get_option('tongji_textarea'); ?></div>
</body>
</html>