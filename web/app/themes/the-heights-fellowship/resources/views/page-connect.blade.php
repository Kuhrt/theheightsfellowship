@extends('layouts.app')

@while(have_posts()) @php the_post() @endphp
  @include('partials.page-header')
  @section('content')
    @php
      $loop = new WP_Query( array( 'post_type' => 'connect', 'posts_per_page' => -1 ) );
    @endphp
    <section class="thf__connect">
      @while($loop->have_posts()) @php $loop->the_post() @endphp
        <div class="thf-connect__page">
        </div>
      @endwhile
    </section>
    @php wp_reset_query() @endphp
  @endsection
@endwhile
