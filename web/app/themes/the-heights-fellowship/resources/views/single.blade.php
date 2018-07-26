@extends('layouts.app')

@while(have_posts()) @php the_post() @endphp
  @include('partials.page-header')
  @section('content')
    @include('partials.content-single-'.get_post_type())
  @endsection
@endwhile
