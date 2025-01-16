@extends('layouts.app')
@section('title', 'Daftar Laporan')
@section('laporan_active', 'active')
@section('content')
      <style>
        .container {
            width: 80%;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 40px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-image: linear-gradient(180deg, rgba(167, 19, 49, 1) 20%, rgba(138, 21, 171, 1) 96%);
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
        .send_btn {
            font-size: 17px;
             transition: ease-in all 0.5s;
             background-color: #0c0909;
             color: #fff;
             height: 60px;
             line-height: 60px;
             max-width: 216px;
             width: 100%;
             display: block;
             margin-top: 10px !important;
             font-weight: 500;
             margin: 0 auto;
        }

        .send_btn:hover {
        background-color: #7f16ca;
        transition: ease-in all 0.5s;
        color: #fff;
        }
      </style>
      <!-- Table -->
      <div class="justify-content-center container d-flex row">
        <div class="col-12 text-center">
         <h1 class="p-3">
            Profil User
        </h1>
        </div>

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

        <table class="col-12">
            @php
                use App\Models\User;
                $data_user= User::where('id', Auth::id())->get()->first();
            @endphp
            <tbody>
                <tr>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">NIK:</strong> {{$data_user->nik}}</td>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">Nama:</strong> {{$data_user->name}}</td>
                </tr>
                <tr>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">TTL:</strong> {{$data_user->ttl}}</td>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">Alamat:</strong> {{$data_user->alamat}}</td>
                </tr>
                <tr>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">Agama:</strong> {{$data_user->agama}}</td>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">Pekerjaan:</strong> {{$data_user->pekerjaan}}</td>
                </tr>
                <tr>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">Email:</strong> {{$data_user->email}}</td>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">Password:</strong> *********</td>

                </tr>
            </tbody>
        </table>
        <div class="col-md-12 d-flex justify-content-left m-5">
           <button onclick="redirectToEditProfile()" class="send_btn">Edit</button>
        </div>
    </div>
      <!-- end Table -->
<style type="text/css">
   footer{
      margin-top: 15rem;
   }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        function redirectToEditProfile() {
            // Redirect to the edit-profile route
            window.location.href = "{{ route('gui-edit-profil') }}";
        }
        // Fungsi untuk menyembunyikan div saat tanda silang diklik
        function sembunyikanDiv() {
          var divHijau = document.getElementById("divHijau");
          divHijau.style.visibility = "hidden";
        }
</script>
<script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/custom.js"></script>
@endsection
