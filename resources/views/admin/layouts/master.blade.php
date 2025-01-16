<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
	<title>Halaman Admin</title>
    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}" type="image/x-icon">
</head>
<body>

 
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="{{url('/images/logo_biru.png')}}" alt="" class="" style="width: 50px; margin-left: 8px; margin-top: 50px;">
			<span class="text" style="margin-left: 5px;margin-top: 45px;">Admin<br>Dashboard</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="{{ url('admin') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Halaman Utama</span>
				</a>
			</li>
			<li>
				<a href="{{ url('report-list') }}">
					<i class='bx bxs-calendar-event' ></i>
					<span class="text">Laporan</span>
				</a>
			</li>
			<li>
				<a href="{{ url('user-list') }}">
					<i class='bx bxs-user' ></i>
					<span class="text">Pengguna Request</span>
				</a>
			</li>
			<li>
				<a href="{{ url('verif-list') }}">
					<i class='bx bxs-user' ></i>
					<span class="text">Pengguna Terverifikasi</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu" style="margin-top: 15px;">
			<li>
				<a href="{{ url('logout') }}" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Keluar</span>
				</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			{{-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> --}}
			<a href="#" class="profile" style="margin-right: 30px; margin-left: 770px;">
                <i class='bx bxs-user' style="margin-right: 5px;"></i>
				<span class="text">{{ Auth::user()->name ?? '' }}</span>
			</a>
		</nav>

        <script>
            // get all li elements inside ul with class "side-menu"
            var lis = document.querySelectorAll(".side-menu li");

            // loop through all li elements
            for (var i = 0; i < lis.length; i++) {
              // add click event listener to each li element
              lis[i].addEventListener("click", function() {
                // remove "active" class from all li elements
                for (var j = 0; j < lis.length; j++) {
                  lis[j].classList.remove("active");
                }
                // add "active" class to clicked li element
                this.classList.add("active");
              });
            }

            // set active class for current page
            var currentUrl = window.location.href;
            var menuLinks = document.querySelectorAll(".side-menu li a");
            for (var i = 0; i < menuLinks.length; i++) {
              if (menuLinks[i].href === currentUrl) {
                menuLinks[i].parentNode.classList.add("active");
              }
            }
        </script>

		<!-- NAVBAR -->

        @yield('content')

        <script src="{{ url('/js/admin.js') }}"></script>
