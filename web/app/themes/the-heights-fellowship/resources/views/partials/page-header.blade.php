@php
  $thumb_id = get_post_thumbnail_id();
  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
  $thumb_url = $thumb_url_array[0];
@endphp
<div class="thf__page-header" style="background-image:url('@php echo $thumb_url @endphp');">
  <h1>{!! App::title() !!}</h1>
</div>
