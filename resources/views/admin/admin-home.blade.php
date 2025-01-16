@extends('admin.layouts.master')

@section('content')
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Halaman Utama</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Halaman Utama</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Beranda</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-event' ></i>
					<span class="text">
						<h3>{{ DB::table('reports')->count() }}</h3>
						<p>Laporan</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>{{ DB::table('users')->count() }}</h3>
						<p>Pengguna</p>
					</span>
				</li>
			</ul>

            <style>
                #content main .table-data {
                    text-align: center;
                }
                #content main .table-data .order table th,td {
                    text-align: center;
                }
            </style>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

    @endsection
</body>
</html>
