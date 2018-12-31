@if (has_post_thumbnail())
  @php
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
  @endphp

  <div class="thf__page-header parallax-window" data-parallax="scroll" data-speed="0.2" data-image-src="@php echo $thumb_url @endphp">
    <h1>{!! App::title() !!}</h1>
    @if (get_field('home_header_subtitle'))
      <p>@php the_field('home_header_subtitle') @endphp</p>
    @endif
  </div>
@else
  <div class="thf__page-header no-photo">
    <h1>{!! App::title() !!}</h1>
  </div>
@endif
