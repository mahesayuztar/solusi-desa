<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>@yield('title', 'Home') | Solusi Desa</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{url('/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{url('/style.css')}}">
      <!-- responsive-->
      <link rel="stylesheet" href="{{url('/responsive.css')}}">
      <!-- awesome fontfamily -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

 

   </head>
   <!-- body -->
   <body class="main-layout @yield('type', 'inner_page')">
    <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a class="@yield('home_active')" href="{{ url('/') }}">Beranda</a>
        <a class="@yield('laporan_active')" href="{{ url('table') }}">Laporan</a>
        @guest
        <a href="{{ url('login') }}">Login</a>
        @endguest
        @auth
            <form action="{{ url('logout') }}" method="post" id="logout-form">
                @csrf
                <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()">Logout</a>
            </form>
        @endauth
      </div>
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="head-top">
            <div class="container-fluid">
               <div class="row d_flex">
                  <div class="col-sm-5 ">
                     <div class=" m-0 d-flex justify-content-end row">
                        <img src="{{url('/images/logo_putih.png')}}" alt="" class="w-75 col-2">
                        <h1 class="text-white text-bold text-start col-10 m-auto pl-0">Solusi Desa</h1>
                     </div>
                  </div>
                  <div class="col-sm-7">
                     <ul class="email text_align_right">
                        @guest
                            <li class="d_none">
                                <a href="{{ url('login') }}">
                                    <i class="fa fa-user" aria-hidden="true"></i> Login
                                </a>
                            </li>
                            <li>
                                <button class="openbtn" onclick="openNav()">
                                    <img src="images/menu_btn.png">
                                </button>
                            </li>
                        @else
                            <li>
                                <a href="{{url('profil')}}">
                                    <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li>
                                <button class="openbtn" onclick="openNav()">
                                    <img src="images/menu_btn.png">
                                </button>
                            </li>
                        @endguest
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header -->

        

@yield('content')

         @if(session('success'))
         <div class="d-flex row alert alert-success div-ini justify-content-center notifikasi" id="divHijau">
            <div class="col-10 peringatan">
                <p class="">{{session('success')}}</p>
            </div>
            <div class="col-2 d-flex justify-content-end align-bottom">
                <button class="text-success bg-transparent h4" onclick="sembunyikanDiv()">×</button>
            </div>
            <!-- Konten lainnya dapat ditambahkan di sini -->
        </div>
        @elseif(session('warning'))
         <div class="d-flex row alert alert-danger div-ini justify-content-center notifikasi" id="divHijau">
            <div class="col-10 peringatan">
                <p class="">{{session('warning')}}</p>
            </div>
            <div class="col-2 d-flex justify-content-end align-bottom">
                <button class="text-danger bg-transparent h4" onclick="sembunyikanDiv()">×</button>
            </div>
            <!-- Konten lainnya dapat ditambahkan di sini -->
        </div>
        @endif

      <!-- footer -->
      <footer>
         <div class="footer mt-5 mb-3">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="logo row" style="width: 400px;">
                        <img src="{{url('/images/logo_putih.png')}}" alt="" class="col-2" style="width: 10px;">
                        <h1 class="text-white text-bold col-10 " style="margin-left: -20px;">Solusi Desa</h1>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="Informa conta text-white" style="font-family: 'PoppinsLight';">
                        Segera laporkan masalah anda! <br>
                        Sistem online, keluhan jadi <br>
                        lebih mudah diterima negeri <br>
                        kita!

                        <br><br><br>
                     </div>
                     <div class="Informa helpful">
                        <ul>
                           <li><a href="{{url('/')}}">Beranda</a></li>
                           <li><a href="{{url('/')}}">Tentang</a></li>
                           <li><a href="{{url('table')}}">Laporan</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-7">
                     <div class="Informa conta">
                        <h3>Hubungi kami</h3>
                        <ul>
                           <li> <a href="Javascript:void(0)"> Nomor HP: 081359991293
                              </a>
                           </li>
                           <li> <a href="Javascript:void(0)">  Email: solusidesa@um.ac.id
                              </a>
                           </li>
                        </ul>
                     </div>
                     <ul class="social_icon text_align_center">
                        <li> <a href="Javascript:void(0)"><i class="fa fa-facebook-f"></i></a></li>
                        <li> <a href="Javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                        <li> <a href="Javascript:void(0)"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            {{-- <div class="copyright text_align_center">
               <div class="container">
                  <div class="row">
                     <div class="col-md-10 offset-md-1">
                        <p>© 2023 All Rights Reserved. </a></p>
                     </div>
                  </div>
               </div>
            </div> --}}
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>
