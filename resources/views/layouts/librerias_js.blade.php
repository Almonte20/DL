<!-- Required JavaScript Libraries -->
<script src="{{ asset('lib/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('lib/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{ asset('lib/superfish/hoverIntent.js')}}"></script>
<script src="{{ asset('lib/superfish/superfish.min.js')}}"></script>
<script src="{{ asset('lib/tether/js/tether.min.js')}}"></script>
<script src="{{ asset('lib/stellar/stellar.min.js')}}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('lib/counterup/counterup.min.js')}}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{ asset('lib/easing/easing.js')}}"></script>
<script src="{{ asset('lib/stickyjs/sticky.js')}}"></script>
<script src="{{ asset('lib/parallax/parallax.js')}}"></script>
<script src="{{ asset('lib/lockfixed/lockfixed.min.js')}}"></script>
<script src="{{ asset('lib/wow/wow.min.js')}}"></script>
<!-- <script src="js/bg.js'"></script> -->
<!-- Template Specisifc Custom Javascript File -->
<script src="{{ asset('js/custom.js')}}"></script>
<script src="{{ asset('lib/contactform/contactform.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<!-- REVOLUTION JS FILES -->
<script src="{{asset('lib/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('lib/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('lib/rs-plugin/js/revolution.addon.paintbrush.min.js')}}"></script>
<script src="{{asset('lib/rs-plugin/js/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('lib/rs-plugin/js/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('lib/rs-plugin/js/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('lib/rs-plugin/js/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('lib/rs-plugin/js/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('lib/rs-plugin/js/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('lib/rs-plugin/js/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('lib/rs-plugin/js/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('lib/rs-plugin/js/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('lib/pnotify/pnotify.custom.min.js')}}"></script>

{{-- <script src="{{asset('lib/sweetalert/dist/sweetalert2.min.js')}}"></script> --}}
<!-- Carousel -->
<script src="{{asset('lib/swiper/js/swiper.min.js')}}"></script>
<script src="{{ asset('js/plugins.js')}}"></script>
<script src="{{ asset('js/functions.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<!-- Social Feed -->
{{-- <script src="{{ asset('lib/social-feed/bower_components/codebird-js/codebird.js')}}"></script>
<script src="{{ asset('lib/social-feed/bower_components/doT/doT.min.js')}}"></script>
<script src="{{ asset('lib/social-feed/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('lib/social-feed/bower_components/moment/locale/es.js')}}"></script>
<script src="{{ asset('lib/social-feed/js/jquery.socialfeed.js')}}"></script> --}}
<!-- Matomo -->
{{-- <script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//fiscaliamichoacan.gob.mx/matomo/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '2']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    {{-- g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s); --}}
  {{-- })();

  function reload(){
    window.location.href = 'http://fiscaliamichoacan.gob.mx/portal';
  }
</script> --}} 
<!-- End Matomo Code -->

<!-- Matomo -->
<script type="text/javascript">
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//analytics.fiscaliamichoacan.gob.mx/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '3']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    // g.type='text/javascript'; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

