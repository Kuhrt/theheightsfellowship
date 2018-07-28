@extends('layouts.app')


@section('content')
  <section class="thf-home__connect">
    <div class="thf-home-connect__text">
      @php the_field('home_connect_section') @endphp
    </div>
    <div class="thf-home-connect__pages">
      @php
        $args = array(
          'post_type' => 'connect',
          'posts_per_page' => 4
        );
        $the_query = new WP_Query( $args );
      @endphp

      @while($the_query->have_posts()) @php $the_query->the_post() @endphp
        @php
          $thumb_id = get_post_thumbnail_id();
          $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
          $thumb_url = $thumb_url_array[0];
        @endphp
        <div class="thf-home-connect-pages__page">
          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
          <a href="<?php the_permalink(); ?>" class="thf-home-connect-pages-page__image" style="background-image:url('@php echo $thumb_url @endphp');"></a>
        </div>
      @endwhile
      @php wp_reset_query() @endphp
    </div>
  </section>
  <section class="thf-home__services" data-parallax="scroll" data-speed="0.9" data-image-src="@asset('images/sunrise.jpg')">
    @php the_field('home_service_times') @endphp
  </section>
  @while(have_posts()) @php the_post() @endphp
    <section class="thf-home__content">
      @include('partials.content-page')
    </section>
  @endwhile
@endsection
