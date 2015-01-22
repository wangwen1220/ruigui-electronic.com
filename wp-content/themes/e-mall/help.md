WordPress主题 – 常用模板文件及用途

style.css ： CSS（样式表）文件，一般包括主题声明和通用css样式代码
index.php ： 主页模板，一般用来做网站的首页
header.php ： Header模板，一般是所有页面的头部公用部分
sidebar.php ： 侧边栏模板，一般显示Widget小工具
footer.php ： Footer模板，一般放些“关于我们”的页面链接、版权声明和统计代码等
archive.php ： Archive/Category模板，用来显示分类下的文章目录
single.php ： 内容页（Post）模板
page.php ： 内容页（Page）模板
comments.php ： 留言/回复模板
searchform.php ： 搜索表单模板，也就是我们看到的搜索框
search.php ： 搜索结果模板
404.php ： Not Found 错误页模板
author.php ： 作者文章目录页面，罗列某个作者的文章，对于多作者博客尤为必要
functions.php ： 模板函数，存放主题用到的函数模块，起到举足轻重的作用
attachment.php ： 附件模板页面，WordPress的图片或其他上传的文件，都会赋予一个附件ID，如果你在插入图片时，选择链接到附件页面，主题中没有包含这个模板时就会报错。

随着WordPress功能的增强，以及人们对于WordPress建站的功能需求的提高，现在的WordPress主题一般都不仅仅上面的文件了，不过再怎么复杂，上面的文件一般都是比较常用的，也是最基本的。

WordPress主题 - 判断标签

is_home() ： 是否为主页，首页使用的是 index.php
is_front_page() ： 是否为指定的首页，如果首页不是默认的index.php，比如你在后台 - 设置 - 阅读，指定了首页，就要用这个来判断
is_single() ： 是否为内容页（Post）
is_page() ： 是否为内容页（Page）
is_attachment() ： 是否为附件页
is_singular() ： 可以简单理解为 is_single()||is_page()||is_attachment() 的综合，但有区别
is_category() ： 是否为Category/Archive页
is_tag() ： 是否为Tag存档页
is_date() ： 是否为指定日期存档页
is_year() ： 是否为指定年份存档页
is_month() ： 是否为指定月份存档页
is_day() ： 是否为指定日存档页
is_time() ： 是否为指定时间存档页
is_archive() ： 是否为存档页
is_search() ： 是否为搜索结果页
is_author() ： 是否为作者存档页
is_404() ： 是否为 “HTTP 404： Not Found” 错误页
is_paged() ： 主页/Category/Archive页是否以多页显示
is_user_logged_in() ： 用户是否登录
以上的判断标签，比较常用于面包屑导航和侧边栏中，用于判断不同的页面加载不同的内容，可以多个搭配一起用，有些还可以定义参数，运用的好的话，可以制定出很多不同的显示方案。

WordPress主题 – 常用PHP函数

<?php get_header(); ?> ： 调用Header模板
<?php get_sidebar(); ?> ： 调用Sidebar模板
<?php get_footer(); ?> ： 调用Footer模板
<?php bloginfo('html_type'); ?> ： 网页Html类型
<?php bloginfo('charset'); ?> ： 网页编码
<?php bloginfo('name'); ?>  ： 博客名称（Title）
<?php bloginfo('url'); ?> ： 博客 Url
<?php bloginfo('description'); ?> ： 博客描述
<?php bloginfo('stylesheet_url'); ?>  ： CSS文件路径
<?php bloginfo('template_url'); ?> ： 模板文件路径
<?php wp_head(); ?> ： 头部挂钩（hook），非常重要的函数，基本上每一个主题都要用到，因为它是用来让其他插件或功能函数在网站头部输出css、js等文件的，如果主题没有这个函数，可能会造成很多插件无法正常使用，一般添加在 header.php 文件中
<?php wp_footer(); ?> ： 底部挂钩（hook），和 wp_head() 一样重要，功能也基本一样，一般添加在 footer.php 文件中
<?php wp_nav_menu(); ?> : 调用导航菜单（WP 3.0+），一般需要在 functions.php 添加注册菜单函数 register_nav_menus() 一起使用
<?php wp_list_bookmarks();?> 友情链接函数，虽然 WP 3.5 取消了链接管理功能，但是这个函数还是非常有用的
<?php if(have_posts()) : ?> ： 检查是否存在Post/Page
<?php while(have_posts()) : the_post(); ?> ： 如果存在Post/Page则显示
<?php endwhile; ?> ： While 结束
<?php else :  ?> ：如果 if 条件中不存在Post/Page ，就输出其他内容
<?php endif; ?> ： If 结束
<?php query_posts(); ?>： 限定Loop循环条件，更灵活地调用需要的文章
<?php wp_reset_query(); ?>：重置查询数据，它必须使用在loop（循环）中，如果你使用了什么的 <?php query_posts(); ?> 函数获取内容，那最好在获取内容的最后添加这个函数，一般这两个都是成对使用。
<?php the_title(); ?> ： 内容页（Post/Page）标题
<?php the_permalink() ?> ： 内容页（Post/Page） Url
<?php the_category(', ') ?> ： 特定内容页（Post/Page）所属Category
<?php the_author(); ?> ： 作者（只显示作者名字，没有链接）
<?php the_author_posts_link(); ?> ：作者（显示作者，并且包含链接到作者文章目录的链接）
<?php the_time('Y-m-d') ?> ：显示时间，时间格式由“字符串”参数决定，具体参考PHP手册
<?php echo get_post_meta(); ?> : 获取保存在 post_meta 这个表中的数据，比如输出某个 自定义字段 的内容
<?php the_ID(); ?> ： 特定内容页（Post/Page） ID
<?php the_tags('关键字: ', ', ', ''); ?> ：显示文章的关键字tag
<?php the_excerpt(); ?> ：Post/Page 的摘要，输入文章发布页面中的摘要面板的内容
<?php the_content('more'); ?> ：Post/Page 的摘要，配合 <!–more–> 来使用
<?php the_content(); ?>  ： 显示内容（Post/Page） 全文
<?php wp_list_pages(); ?> ： 显示Page列表，常用于显示单篇文章的分页，配合 <!–next page-> 来使用
<?php edit_post_link(); ?> ： 如果用户已登录并具有权限，显示编辑链接
<?php posts_nav_link(); ?> ： 显示上一页/下一页的链接，通常用在索引页、分类页和文章存档页
<?php previous_post_link('%link', '上篇', TRUE); ?> ： 下一篇文章链接，通常用在单篇文章 single.php 中
<?php next_post_link('%link', '下篇', TRUE); ?> ： 上一篇文章链接，通常用在单篇文章 single.php 中
<?php comments_popup_link('暂无评论', '评论数 1', '评论数 %'); ?>  ： 正文中的留言链接。如果使用 comments_popup_script()，则留言会在新窗口中打开，反之，则在当前窗口打开
<?php comments_template( '', true ); ?> ：显示评论模块
<?php include(TEMPLATEPATH . '/xxx/xxxx.php'); ?> ： 嵌入其他文件，可为定制的模板或其他类型php文件，很常用
<?php echo get_avatar( get_the_author_email(), '48' ); ?> ：根据作者邮箱输出作者的头像
<?php wp_list_categories(); ?> ： 显示Categories列表
<?php get_calendar(); ?>  ： 日历
<?php wp_get_archives() ?>  ： 显示内容存档
<?php _e('Message'); ?> ： 输出相应信息
<?php wp_register(); ?> ： 显示注册链接
<?php wp_loginout(); ?> ： 显示登录/注销链接
<?php timer_stop(1); ?> ： 网页加载时间（秒）
<?php echo get_num_queries(); ?> ： 网页加载查询量

以上便是制作WordPress主题常用的模板函数，这里只是简单罗列，如果你要了解某个函数，就直接自己百度或Google搜索下，或者查看WordPress的官方文档。我们也会不断在本站尽量一一进行详细的介绍。