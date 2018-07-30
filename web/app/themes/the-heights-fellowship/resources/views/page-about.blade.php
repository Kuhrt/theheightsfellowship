@extends('layouts.app')

@while(have_posts()) @php the_post() @endphp
  @section('content')
    <section class="thf-about__content">
      @include('partials.content-page')
    </section>

    <section class="thf-about__map">
      <div class="thf-about-map__container"></div>
    </section>

    <section class="thf-about__member">
      @php the_field('about_member') @endphp
    </section>
  @endsection
@endwhile
