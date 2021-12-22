@include('frontend.partials.header')
@yield('content')


        <!-- footer begin -->
        @include('frontend.partials.footer')
        <!-- footer close -->
    </div>
</div>

<!-- Javascript Files -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/jpreLoader.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/fontawesome/js/all.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('frontend/js/easing.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.scrollto.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('frontend/js/classie.js') }}"></script>
<script src="{{ asset('frontend/js/video.resize.js') }}"></script>
<script src="{{ asset('frontend/js/validation.js') }}"></script>
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('frontend/js/enquire.min.js') }}"></script>
<script src="{{ asset('frontend/js/cookit.js') }}"></script>
<script src="{{ asset('frontend/js/designesia.js') }}"></script>

<!-- SLIDER REVOLUTION SCRIPTS  -->
<script src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
<script src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
{{--<script src="{{ mix('js/fr_app.js') }}"></script>--}}
</body>
</html>
