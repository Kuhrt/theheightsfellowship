@extends('layouts.app')


@section('content')
  @while(have_posts()) @php the_post() @endphp
    <section class="thf-home__content">
      @include('partials.content-page')
    </section>
  @endwhile
@endsection
