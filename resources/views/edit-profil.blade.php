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
            Edit Profil User
        </h1>
        </div>
<form id="request" class="main_form" method="POST" action="{{ url('edit-profil') }}" enctype="multipart/form-data">
                    @csrf
        <table class="col-12" style="width: 1000px;">
            @php
                use App\Models\User;
                $data_user= User::where('id', Auth::id())->get()->first();
            @endphp
            <tbody>
                
                    <tr>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">NIK:</strong> <input type="text" name="nik"></td>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">Nama:</strong> <input type="text" name="name"></td>
                </tr>
                <tr>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">TTL:</strong> <input type="text" name="ttl"> </td>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">Alamat:</strong> <input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">Agama:</strong> <input type="text" name="agama"></td>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">Pekerjaan:</strong> <input type="text" name="pekerjaan"></td>
                </tr>
                <tr>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">Email:</strong> <input type="text" name="email"></td>
                    <td><strong style="font-family: PoppinsSemiBold;" class="pr-1">Password:</strong> <input type="password" name="password"></td>

                </tr>

                                
            </tbody>
        </table>
        <div class="col-md-12 d-flex mt-5">
                   <button class="send_btn" type="submit">Submit</button>
                </div>  
    </div>
</form>
      <!-- end Table -->
<style type="text/css">
   footer{
      margin-top: 15rem;
   }
</style>
@endsection
