<header class="banner">
  <a class="brand" href="{{ home_url('/') }}">
    <img src="@asset('images/thflogosmallblue.svg')" class="logo" alt="THF Logo">
    <img src="@asset('images/logo-words-blue.svg')" class="logo-words" alt="The Heights Fellowship">
  </a>
  <nav class="nav-primary">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @endif
  </nav>
  <div class="banner__hamburger">
    <span></span>
    <span></span>
    <span></span>
  </div>
</header>
