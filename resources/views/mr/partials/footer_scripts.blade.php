<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="{{URL::asset('js/helpers/excanvas.min.js')}}"></script><![endif]-->

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="{{URL::asset('js/vendor/jquery-1.11.3.min.js')}}"></script>
<script src="{{URL::asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/plugins.js')}}"></script>
<script src="{{URL::asset('js/app.js')}}"></script>
@yield('custom_footer_scripts')