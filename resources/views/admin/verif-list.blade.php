@extends('admin.layouts.master')

@section('content')
<!-- MAIN -->
<main>
  <div class="head-title">
    <div class="left">
      <h1>Pengguna</h1>
      <ul class="breadcrumb">
        <li>
          <a href="#">Pengguna</a>
        </li>
        <li><i class='bx bx-chevron-right'></i></li>
        <li>
          <a class="active" href="{{ url('/user-list') }}">Daftar Data Pengguna</a>
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
            <h3>Daftar Data Pengguna</h3>
            <a href="{{ url('add-user') }}" class="btn">Tambah Pengguna</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php
            $i = 1;
            @endphp
            @foreach($data as $user)
            @if($user['is_verified']==1)
                <tr>
                    <td>{{ $i++ }}.</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->nik }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ substr($user->password, 0, 10)."..." }}</td>
                    <td>
                        <center>
                            {{-- <a href="{{ url('edit-user/'.$user->id) }}" class="btn">Edit</a> --}}
                            <a href="{{ url('verif-user/'.$user->id) }}" class="btn m-2">Verifikasi</a><br><br>
                            <a href="{{ url('delete-user/'.$user->id) }}" class="btn-del m-2">Hapus</a>
                        </center>
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</main>


@endsection
