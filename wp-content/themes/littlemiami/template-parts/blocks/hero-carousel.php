<?php if( have_rows('carousel') ): ?>
<div id="mixedCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
  
    <?php $is_first = true; ?>
    <?php while( have_rows('carousel') ): the_row(); 
      $heading   = get_sub_field('heading');
      $cta_text  = get_sub_field('cta_text');
      $cta_link  = get_sub_field('cta_link');
      $image     = get_sub_field('image');
      $video_oembed = get_sub_field('video'); // oEmbed iframe embed
    ?>

      <div class="carousel-item <?php if($is_first) { echo 'active'; $is_first = false; } ?>">

        <?php if( $video_oembed ): ?>
          <div class="video-wrapper">
            <div class="iframe-bg">
              <?php 
                // Extract the src URL from the iframe
                preg_match('/src="(.+?)"/', $video_oembed, $matches);
                $iframe_src = $matches[1];

                // Add autoplay, mute, loop params for YouTube or Vimeo
                if (strpos($iframe_src, 'youtube.com') !== false) {
                    $iframe_src .= (strpos($iframe_src, '?') === false ? '?' : '&') . 'autoplay=1&mute=1&loop=1&playlist=' . basename(parse_url($iframe_src, PHP_URL_PATH));
                } elseif (strpos($iframe_src, 'vimeo.com') !== false) {
                    $iframe_src .= (strpos($iframe_src, '?') === false ? '?' : '&') . 'autoplay=1&muted=1&background=1&loop=1';
                }

                // Output iframe with modified src
                $iframe_tag = preg_replace('/src="(.+?)"/', 'src="' . esc_url($iframe_src) . '"', $video_oembed);

                // Add extra attributes for fullscreen
                $iframe_tag = str_replace('></iframe>', ' frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>', $iframe_tag);

                echo $iframe_tag;
              ?>
            </div>
        <?php elseif( $image ): ?>
          <div class="carousel-bg" style="background-image: url('<?php echo esc_url($image['url']); ?>');">
        <?php endif; ?>
            <div class="overlay-content text-white">
                <div class="container">
                    <?php if( $heading ): ?>
                    <h2><?php echo esc_html($heading); ?></h2>
                    <?php endif; ?>
                    <?php if( $cta_text && $cta_link ): ?>
                    <a href="<?php echo esc_url($cta_link); ?>" class="btn btn-primary mt-2 p-3"><?php echo esc_html($cta_text); ?></a>
                    <?php endif; ?>
                </div>
            </div>
          </div>
      </div>

    <?php endwhile; ?>
  </div>

  <!-- Carousel Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#mixedCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mixedCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

  <!-- Carousel Indicators (Dots) -->
  <div class="carousel-indicators bottom-center">
    <?php 
    $index = 0;
    while ( have_rows('carousel') ): the_row(); ?>
      <button type="button" data-bs-target="#mixedCarousel" data-bs-slide-to="<?php echo $index; ?>" <?php if($index == 0) echo 'class="active" aria-current="true"'; ?> aria-label="Slide <?php echo $index + 1; ?>"></button>
    <?php $index++; endwhile; ?>
  </div>
</div>
<?php endif; ?>
