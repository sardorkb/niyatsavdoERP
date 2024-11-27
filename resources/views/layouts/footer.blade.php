<footer class="footer position-absolute">
    <div class="row g-0 justify-content-between align-items-center h-100">
      <div class="col-12 col-sm-auto text-center">
        <p class="mb-0 mt-2 mt-sm-0 text-900">
          Niyat Savdo<span class="d-none d-sm-inline-block"></span><span
            class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2024 &copy;<a class="mx-1"
            href="https://fssolutions.uz">FS Solutions</a>
        </p>
      </div>
      <div class="col-12 col-sm-auto text-center">
        <p class="mb-0 text-600">v0.0.1</p>
      </div>
    </div>
  </footer>

  <script>
    var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
    var navbarTop = document.querySelector('.navbar-top');
    if (navbarTopStyle === 'darker') {
      navbarTop.classList.add('navbar-darker');
    }

    var navbarVerticalStyle =
      window.config.config.phoenixNavbarVerticalStyle;
    var navbarVertical = document.querySelector('.navbar-vertical');
    if (navbarVertical && navbarVerticalStyle === 'darker') {
      navbarVertical.classList.add('navbar-darker');
    }
  </script>

  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
  <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
  <script src="{{ asset('vendors/is/is.min.js') }}"></script>
  <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
  <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
  <script src="{{ asset('vendors/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('vendors/dayjs/dayjs.min.js') }}"></script>
  <script src="{{ asset('js/phoenix.js') }}"></script>
  <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('vendors/leaflet/leaflet.js') }}"></script>
  <script src="{{ asset('vendors/leaflet.markercluster/leaflet.markercluster.js') }}"></script>
  <script src="{{ asset('vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js') }}"></script>
  <script src="{{ asset('js/ecommerce-dashboard.js') }}"></script>