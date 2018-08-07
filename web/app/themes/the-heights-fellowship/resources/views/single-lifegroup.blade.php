@extends('layouts.app')

@while(have_posts()) @php the_post() @endphp
  @section('content')
    <section class="thf-life-group__content">
      @include('partials.content-page')
      <ul>
        <li><span>Leaders:</span> @php the_field('lifegroup_leaders') @endphp</li>
        <li><span>Age Range:</span> @php the_field('lifegroup_age_range') @endphp</li>
        <li><span>Time:</span> @php the_field('lifegroup_time') @endphp</li>
        <li><span>Location:</span> @php the_field('lifegroup_meeting_locations') @endphp</li>
      </ul>
    </section>
  @endsection
@endwhile
