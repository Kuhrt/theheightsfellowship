{{--
  Template Name: LIFEGroups Template
--}}

@extends('layouts.app')

@while(have_posts()) @php the_post() @endphp
  @section('content')
    @php
      $loop = new WP_Query( array( 'post_type' => 'lifegroup', 'posts_per_page' => -1 ) );
    @endphp
    <section class="thf-life-groups__content">
      @include('partials.content-page')
    </section>
    <section class="thf__life-groups">
      @while($loop->have_posts()) @php $loop->the_post() @endphp
        <a class="thf-life-groups__group" href="<?php the_permalink(); ?>">
          <div class="thf-life-groups-group__image">
            @if (has_post_thumbnail())
              @php
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
                $thumb_url = $thumb_url_array[0];
              @endphp
              <div class="thf-life-groups-group-image__bg" style="background-image:url('@php echo $thumb_url @endphp');"></div>
            @else
              <div class="thf-life-groups-group-image__bg"></div>
            @endif
          </div>
          <div class="thf-life-groups-group__title">
            <h3><?php the_title(); ?></h3>
            <ul>
              <li><span>Leaders:</span> @php the_field('lifegroup_leaders') @endphp</li>
              <li><span>Age Range:</span> @php the_field('lifegroup_age_range') @endphp</li>
              <li><span>Time:</span> @php the_field('lifegroup_time') @endphp</li>
            </ul>
          </div>
        </a>
      @endwhile
    </section>
    @php wp_reset_query() @endphp
  @endsection
@endwhile
