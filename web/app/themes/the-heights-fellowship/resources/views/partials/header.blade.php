<header class="banner">
  <a class="brand" href="{{ home_url('/') }}">
    <img src="@asset('images/thflogosmallblue.svg')" alt="THF Logo">
    <img src="@asset('images/logo-words-blue.svg')" alt="The Heights Fellowship">
  </a>
  <nav class="nav-primary">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @endif
  </nav>
</header>
