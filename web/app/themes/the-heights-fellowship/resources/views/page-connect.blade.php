@extends('layouts.app')

@while(have_posts()) @php the_post() @endphp
  @section('content')
    @php
      $loop = new WP_Query( array( 'post_type' => 'connect', 'posts_per_page' => -1 ) );
    @endphp
    <section class="thf__connect">
      @while($loop->have_posts()) @php $loop->the_post() @endphp
        @php
          $thumb_id = get_post_thumbnail_id();
          $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
          $thumb_url = $thumb_url_array[0];
        @endphp
        <a class="thf-connect__page" href="<?php the_permalink(); ?>">
          <div class="thf-connect-page__image">
            <div class="thf-connect-page-image__bg" style="background-image:url('@php echo $thumb_url @endphp');"></div>
          </div>
          <div class="thf-connect-page__title">
            <h3><?php the_title(); ?></h3>
          </div>
        </a>
      @endwhile
    </section>
    @php wp_reset_query() @endphp
  @endsection
@endwhile
