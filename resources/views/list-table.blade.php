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
            padding: 12px 15px;
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
      </style>
      <!-- Table -->
      <div class="justify-content-center container d-flex row">
        <div class="col-12 text-center">
         <h1 class="">
            Daftar Laporan
        </h1>
        </div>

        <table class="col-12">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>Nomor Telepon</th>
                <th>Tujuan Pengaduan</th>
                <th>Tanggal</th>
                <th>Deskripsi Perkara</th>
                <th>Lampiran Gambar</th>
                <th>Status Laporan</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i = 1;
            @endphp
            @forelse(DB::table('reports')->where('id_user', Auth::id())->get() as $report)
            @php
                $dc = $report->deskripsi;
                $st = $report->status;
                $color_st = 'alert-danger';  
                if($st == 'Disimpan'){
                  $color_st='alert-warning';
                }
                else if($st=='Terverifikasi'){
                  $color_st='alert-info';
                }
                else if($st=='Selesai'){
                  $color_st='alert-success';
                }
            @endphp
                <tr>
                    <td>{{ $report->id_user }}.</td>
                    <td>{{ $report->name }}</td>
                    <td>{{ $report->nik }}</td>
                    <td>{{ $report->nohp }}</td>
                    <td>{{ $report->tujuan }}</td>
                    <td>{{ $report->tanggal }}</td>
                    <td>{{ substr($dc, 0, 5000) }}</td>
                    <td><img src="{{url($report->gambar)}}" alt="" class=""></td>
                    <td><div class=" d-flex container mt-5">
                           <div class="alert {{$color_st}} d-flex">
                                {{$st}}
                           </div>
                        </div>
                     </td>
            </tr>
            @empty
               Anda belum pernah membuat laporan!
            @endforelse
            </tbody>
        </table>
    </div>
      <!-- end Table -->
<style type="text/css">
   footer{
      margin-top: 50rem;
   }
</style>
@endsection
