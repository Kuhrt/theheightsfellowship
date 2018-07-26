@extends('layouts.app')

@while(have_posts()) @php the_post() @endphp
  @include('partials.page-header')
  @section('content')
    @php
      $loop = new WP_Query( array( 'post_type' => 'staff', 'posts_per_page' => -1, 'order' => 'ASC' ) );
    @endphp
    <section class="thf__staff">
      @while($loop->have_posts()) @php $loop->the_post() @endphp
        <div class="thf-staff__member">
          <img src="<?php the_field('staff_photo'); ?>" alt="<?php the_title(); ?>" />
          <h3><a href="mailto:<?php the_field('staff_email'); ?>"><?php the_title(); ?></a></h3>
          <p><?php the_field('staff_position'); ?></p>
        </div>
      @endwhile
    </section>
    @php wp_reset_query() @endphp
  @endsection
@endwhile
