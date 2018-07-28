@extends('layouts.app')

@while(have_posts()) @php the_post() @endphp
  @section('content')
    @include('partials.content-page')
  @endsection
@endwhile
