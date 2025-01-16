@extends('admin.layouts.master')

@section('content')
<!-- MAIN -->
<main>
  <div class="head-title">
    <div class="left">
      <h1>Laporan</h1>
      <ul class="breadcrumb">
        <li>
          <a href="#">Laporan</a>
        </li>
        <li><i class='bx bx-chevron-right'></i></li>
        <li>
          <a class="active" href="{{ url('/report-list') }}">Daftar Data Laporan</a>
        </li>
      </ul>
    </div>
  </div>

  <style>
    #content main .table-data {
        text-align: center;
    }

    #content main .table-data .order table th {
        text-align: center;
    }
    .btn {
        display: inline-block;
        padding: 5px 15px;
        background-color: #00345b;
        color: #fff;
        font-size: 12px;
        line-height: 1.5;
        text-align: center;
        text-decoration: none;
        border-radius: 20px;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn:hover {
        background-color: #6CA6CD;
        color: #fff;
        text-decoration: none;
    }

    .btn-del {
        display: inline-block;
        padding: 5px 15px;
        background-color: #c9302c;
        color: #fff;
        font-size: 12px;
        line-height: 1.5;
        text-align: center;
        text-decoration: none;
        border-radius: 20px;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn-del:hover {
        background-color: #d9534f;
        color: #fff;
        text-decoration: none;
    }

    .btn:focus,
    .btn.focus {
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
  </style>

  <div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Daftar Data Laporan</h3>
            <a href="{{ url('add-report') }}" class="btn">Tambah Laporan</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>Nomor Telepon</th>
                    <th>Tujuan Pengaduan</th>
                    <th>Deskripsi Perkara</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php
            $i = 1;
            @endphp
            @foreach($data as $report)
            @php
                $dc = $report->deskripsi;
            @endphp
                <tr>
                    <td>{{ $i++ }}.</td>
                    <td>{{ $report->name }}</td>
                    <td>{{ substr($report->nik, 0, 16) }}</td>
                    <td>{{ substr( $report->nohp, 0, 13) }}</td>
                    <td>{{ $report->tujuan }}</td>
                    <td>{{ substr($dc, 0, 50) }}</td>
                    <td><img src="{{url($report->gambar)}}" alt="" class=""></td>
                    <td>{{ $report->status }}</td>
                    <td>
                       <center>
                            <a href="{{ url('edit-report/'.$report->id) }}" class="btn">Edit</a><br><br>
                            <a href="{{ url('konfirmasi-report/'.$report->id) }}" class="btn">Lanjutkan</a><br><br>
                            <a href="{{ url('delete-report/'.$report->id) }}" class="btn-del">Hapus</a>
                        </center>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</main>


@endsection
