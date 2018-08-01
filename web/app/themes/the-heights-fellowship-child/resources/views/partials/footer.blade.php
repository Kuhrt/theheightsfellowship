<footer class="content-info">
  <a href="/" class="footer__logo">
    <img src="@asset('images/thflogosquarewhite.svg')" alt="The Heights Fellowship logo white">
  </a>
  @php dynamic_sidebar('sidebar-footer') @endphp
  <div class="footer__social">
    <a href="http://www.facebook.com/theheightsfellowship" class="footer-social__icon facebook"></a>
    <a href="http://www.twitter.com/thflubbock" class="footer-social__icon twitter"></a>
    <a href="http://instagram.com/thflubbock" class="footer-social__icon instagram"></a>
    <a href="http://www.youtube.com/user/TheHeightsFellowship" class="footer-social__icon youtube"></a>
    <a href="https://itunes.apple.com/us/app/heights-fellowship-lubbock/id424692506?mt=8" class="footer-social__icon itunes"></a>
  </div>
  <p class="copyright">&copy; The Heights Fellowship @php echo date('Y') @endphp</p>
</footer>
