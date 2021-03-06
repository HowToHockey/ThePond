<?php

$bannertype = get_field('hide_banner');
$image = get_field('background_image_item');

if(get_field('hide_banner') == '1') {  ?>

<section class="memberDashWelc">
	<div class="row">
		<div class="large-8 medium-7 columns">
			<h1><?php if(get_field('banner_title_overwrite')){echo the_field('banner_title_overwrite');} else{echo the_title();} ?></h1>
			<?php if(get_field('banner_subtitle')); { ?>
				<p><?php echo the_field('banner_subtitle'); ?></p>
			<?php } ?>
			<?php if(get_field('button_required') == '1') {  ?>
				<a href="<?php echo the_field('button_link'); ?>" class="BTN dashBTN">
				<?php echo the_field('button_text'); ?></a>
			<?php } ?>
		</div>
		<div class="large-4 medium-5 columns">
            <?php  if ( get_field('button_link')): ?>
			<a href="<?php echo the_field('button_link'); ?>" class="BTN dashBTN"><?php echo the_field('button_text'); ?></a>
            <?php endif; ?>
		</div>
	</div>
</section>

<?php } elseif(get_field('hide_banner') == '2') { ?>

<section class="Banner" style="background-image: url('<?php echo $image['url'] ?>');">
	<div class="row">
		<div class="medium-8 columns <?php if(get_field('centre_content') == 1){echo "small-centered"; } else { echo "small-left"; } ?>">
			<h1><?php echo the_field('banner_title'); ?></h1>
			<?php if(get_field('banner_subtitle')); { ?>
				<h2><? echo the_field('banner_subtitle'); ?></h2>
			<?php } ?>
			<?php if(get_field('button_required') == '1') {  ?>
				<a href="<?php echo the_field('button_link'); ?>" class="BTN dashBTN">
				<?php echo the_field('button_text'); ?></a>
			<?php } ?>
		</div>
	</div>
</section>

<?php } ?>
