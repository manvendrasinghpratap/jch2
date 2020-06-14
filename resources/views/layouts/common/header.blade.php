<nav class="navbar top-navbar col-lg-12 col-12 p-0">
	  <div class="container">
		<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
		  <a class="navbar-brand brand-logo" href="{{url('/')}}">
			<img src="{{ asset('public/assets/images/logo.svg')}}" alt="logo" />
			<span class="font-12 d-block font-weight-light"><!--Responsive Dashboard--> </span>
		  </a>
		  <a class="navbar-brand brand-logo-mini" href="{{url('/')}}"><img src="{{ asset('public/assets/images/logo-mini.svg')}}" alt="logo" /></a>
		</div>
		<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
		  <ul class="navbar-nav mr-lg-2">
			<li class="nav-item nav-search d-none d-lg-block">
			  <div class="input-group">
				<div class="input-group-prepend hover-cursor" id="navbar-search-icon">
				  <span class="input-group-text" id="search">
					<i class="mdi mdi-magnify"></i>
				  </span>
				</div>
				<input type="text" class="form-control" id="navbar-search-input" placeholder="Search" aria-label="search" aria-describedby="search" />
			  </div>
			</li>
		  </ul>
		  <ul class="navbar-nav navbar-nav-right">
			<li class="nav-item nav-profile dropdown">
			  <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
				<div class="nav-profile-img"><?php $imageName = 'face1.jpg'; if(!empty(Session::get('picName'))) { $imageName = Session::get('picName'); }  ?>
				  <img src='{{ asset("public/upload/images/$imageName") }}' alt="image" />
				</div>
				<div class="nav-profile-text">
				  <p class="text-black font-weight-semibold m-0"> {{ Auth::user()->name }} </p>
				  <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
				</div>
			  </a>
			  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
				<a class="dropdown-item" href="{{route('profile')}}">
				  <i class="mdi mdi-face-profile mr-2 text-success"></i> Profile </a>
				</a>
				<a class="dropdown-item" href="{{route('change-password-form')}}">
				  <i class="mdi mdi-key-variant mr-2 text-success"></i> Change Password 
				</a>
				  
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				  <i class="mdi mdi-logout mr-2 text-primary"></i> {{ __('Logout') }} </a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
			  </div>
			</li>
		  </ul>
		  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
			<span class="mdi mdi-menu"></span>
		  </button>
		</div>
	  </div>
</nav>