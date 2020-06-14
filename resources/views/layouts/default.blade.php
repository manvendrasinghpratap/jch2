<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ config('app.name', 'JCH') }} : {{@$pageTitle}}</title>
      @include('layouts.common.style')   	
      @jquery
      @toastr_js
      @toastr_css
      @toastr_render	
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_horizontal-navbar.html -->
      <div class="horizontal-menu">
        @include('layouts.common.header')
		    @include('layouts.common.navigation')	
		</div>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper pb-0">
			@include('layouts.common.breadcrum')
			@include('layouts.common.toastr')
			@yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
			     @include('layouts.common.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
	@include('layouts.common.js')
	@yield('js')
    <!-- End custom js for this page -->
  </body>
</html>