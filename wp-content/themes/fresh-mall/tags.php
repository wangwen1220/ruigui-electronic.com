<?php
/*
Template Name:tags
*/
get_header(); ?>
<div class="pagebox mb15">
<div class="pagebox_hd"></div>
<div class="pagebox_bd">
<div class="place"><a href="/">首页</a> > <span>所有标签</span></div>
</div>            
<div class="pagebox_ft"></div>
</div>

<div class="pagebox mb15">
<div class="pagebox_hd"></div>
<div class="pagebox_bd">
<div class="all_tags">
<?php while ( have_posts() ) : the_post(); ?>

				<?php
				$html='<ul>';
				foreach(get_tags(array('number'=>150,'orderby'=>'count','order'=>'DESC',
				'hide_empty'=>false))as $tag){
				$color=dechex(rand(0,425));
				$tag_link=get_tag_link($tag->term_id);
				$html.="<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}' style='color:#{$color}'>";
				$html.="{$tag->name}({$tag->count})</a></li>";
				}
				$html .= '</ul>';
				echo $html;
				?>

			<?php endwhile; // end of the loop. ?>
</div>
</div>            
<div class="pagebox_ft"></div>
</div>

<?php get_footer(); ?>
