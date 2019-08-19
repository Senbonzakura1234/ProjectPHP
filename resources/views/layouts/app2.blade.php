<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Woobly</title>

	<!-- Custom fonts for this template-->
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">


	<link href="{{asset('/fonts/fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
			integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js"
			integrity="sha256-91c9XEM8yFH2Mn9fn8yQaNRvJsEruL7Hctr6JiIY7Uw=" crossorigin="anonymous"></script>

	{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"--}}
	{{--          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
	<link rel="stylesheet" href="{{asset("/vendor/bootstrap-4.3.1/dist/css/bootstrap.css")}}">


	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
			integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
			crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
			integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
			crossorigin="anonymous"></script>

	{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">--}}
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/js/bootstrap-select.min.js"></script>

	{{--    <script src="https://kit.fontawesome.com/f4bb5974c6.js"></script>--}}
	<script src="{{asset('/fonts/fontawesome/js/all.js')}}"></script>
	<link rel="icon" href="https://res.cloudinary.com/senbonzakura/image/upload/v1566057715/fav-icon-admin_gtqrop.png"
		  type="image/png">


	<!-- Custom styles for this template-->
	<link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/css/dashboard.css')}}">


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

	<!-- Sidebar -->
	@if(Auth::check())
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{asset("/")}}">
			<div class="sidebar-brand-icon">
				<img src="https://res.cloudinary.com/senbonzakura/image/upload/v1566057715/fav-icon-admin_gtqrop.png"
					 style="width: 3em; height: 3em" alt="Woobly">
			</div>
			<div class="sidebar-brand-text mt-3 mr-3" style="position: relative; left: -10px"
				>oobly</div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<!-- Nav Item - Dashboard -->

			<li class="nav-item">
				<a class="nav-link" href="{{asset('/admin')}}">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>

				<a href="{{route('category.index')}}" class="nav-link">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Category</span>
				</a>

				<a href="{{route('tag.index')}}" class="nav-link">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Tag</span>
				</a>

				<a href="{{route('post.index')}}" class="nav-link">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Post</span>
				</a>

				<a href="{{asset('/admin/dlc')}}" class="nav-link">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>DLC</span>
				</a>

				<a class="nav-link" href="{{asset('/admin/comment')}}">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Comment</span>
				</a>
			</li>

		<!-- Heading -->


		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->

			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

	</ul>
	@endif

	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="contentx">

			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

				<!-- Sidebar Toggle (Topbar) -->
				<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
					<i class="fa fa-bars"></i>
				</button>

				<!-- Topbar Search -->
				@if(Auth::check())
					<form action="{{asset('/admin')}}"
						  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
								   aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary py-0" type="button"
										onClick="document.forms['search-top-form'].submit();">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>
			@endif

			<!-- @if(Auth::check())
				<form action="{{asset('/admin')}}" name="search-top-form" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                  <span class="icon fa fa-search"
                        onClick="document.forms['search-top-form'].submit();"></span>
                  <input type="text" id="s" placeholder="Search">
                  <label style="display: none" for="s"></label>
              </form>
          @endif -->

				<!-- Topbar Navbar -->
				<ul class="navbar-nav ml-auto">

					<!-- Nav Item - Search Dropdown (Visible Only XS) -->
					<li class="nav-item dropdown no-arrow d-sm-none">
						<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-search fa-fw"></i>
						</a>
						<!-- Dropdown - Messages -->
						<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
							 aria-labelledby="searchDropdown">
							@if(Auth::check())
								<form action="{{asset('/admin')}}"
									  class="d-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small"
											   placeholder="Search for..." aria-label="Search"
											   aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary py-0" type="button"
													onClick="document.forms['search-top-form'].submit();">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							@endif
						</div>
					</li>


					@guest
						<li class="nav-item ml-md-auto">
							<a class="nav-link" href="{{ route('login') }}">
								{{ __('Login') }} &nbsp;<span class="fas fa-sign-in-alt"></span>
							</a>
						</li>
						@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ route('register') }}">
									{{ __('Register') }}
								</a>
							</li>
						@endif
					@else
						<li class="nav-item ml-md-auto">
							<a class="nav-link message-relative" href="{{route('message.index')}}">
								<span>Message </span> &nbsp;
								<i class="fas fa-bell"></i>
								@if(count($lsMessage) > 0)
									<span class="badge badge-pill badge-danger badge-message">
                                        {{count($lsMessage)}}
                                    </span>
								@endif
							</a>
						</li>
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								@if(strlen(Auth::user()->name) > 8)
									{{substr(Auth::user()->name, 0, 8)}} ...
								@else
									{{Auth::user()->name}}
								@endif <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
									{{ __('Logout') }} &nbsp;<span class="fas fa-sign-out-alt"></span>
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST"
									  style="display: none;">
									@csrf
								</form>
							</div>
						</li>
					@endguest

				</ul>

			</nav>
			<!-- End of Topbar -->

			<!-- Begin Page Content -->
			<div class="container-fluid">
				@yield('content')

			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

		<!-- Footer -->
		<footer class="sticky-footer bg-white">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>Copyright &copy; Phạm Anh Dũng @Senbonzakura97
							anhdunngpham090@gmail.com</span>
				</div>
			</div>
		</footer>
		<!-- End of Footer -->

	</div>
	<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->


<!-- Logout Modal-->
@yield("modal")
<div class="loading text-center">
	<i class="fas fa-dharmachakra fa-spin"></i>
</div>
<!-- Bootstrap core JavaScript-->
<!-- <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 Core plugin JavaScript-->
<!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

<!-- Custom scripts for all pages-->
<script src="{{asset('/js/dashboard.js')}}"></script>
<script src="{{asset('/js/sb-admin-2.js')}}"></script>
<!-- <script src="js/dashboard.js"></script> -->


</body>

</html>
