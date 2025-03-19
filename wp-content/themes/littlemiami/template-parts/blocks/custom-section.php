<?php
$section_title = get_field('section_title');
$section_class = get_field('section_class');
$column_class = get_field('column_class');
$background_color = get_field('background_color');
$columns = get_field('column');
?>

<?php if ($columns): ?>
<section class="custom-section <?= esc_attr($section_class ?: ''); ?>" style="background-color: <?= esc_attr($background_color); ?>">
    <div class="container">
        <?php if ($section_title): ?>
            <h2 class="mb-4 pb-2 fw-bold"><?= esc_html($section_title); ?></h2>
        <?php endif; ?>

        <?php if ( get_field('enable_google_reviews') ) : ?>
            <?php echo do_shortcode( '[grw id=161]' ); ?>
        <?php endif; ?>

        <div class="row g-2 justify-content-center">
            <?php foreach ($columns as $col): 
                $bg_image = $col['background_image'];
                $image_link = $col['image_link'];
                $overlay_text = $col['overlay_text'];
                $overlay_icon = $col['overlay_icon_class'];
                $video = $col['video'];
                $full_copy = $col['full_copy'];
            ?>
                <div class="px-2 <?= esc_attr($column_class ?: 'col-md-4'); ?>">
                    <?php if ($video): ?>
                        <div class="ratio ratio-16x9 mb-lg-5">
                            <?= $video; ?>
                        </div>
                    <?php elseif ($bg_image): ?>
                        <a href="<?= esc_url($image_link); ?>" class="d-block text-decoration-none">
                            <div class="position-relative" style="background-image: url('<?= esc_url($bg_image['url']); ?>'); background-size: cover; background-position: center; height: 368px;">
                                <?php if ($overlay_text || $overlay_icon): ?>
                                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center text-center p-3 bg-gradient bg-opacity-50 text-white">
                                        <?php if ($overlay_icon): ?>
                                            <i class="fa <?= esc_attr($overlay_icon); ?> fs-2 mb-2"></i>
                                        <?php endif; ?>
                                        <?php if ($overlay_text): ?>
                                            <h3><?= esc_html($overlay_text); ?></h3>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endif; ?>

                    <?php if ($full_copy): ?>
                        <div class="copy-content">
                            <?= $full_copy; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
