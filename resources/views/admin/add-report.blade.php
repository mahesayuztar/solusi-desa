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
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
            <a class="active" href="{{ url('/add-report') }}">Tambah Data Laporan</a>
            </li>
        </ul>
        </div>
    </div>

    <style>
        :root {
            --main-hue: 208;

            --text-color: #001920;
            --input-bg: hsla(var(--main-hue), 50%, 50%, 6.5%);
            --input-bg-hover: hsla(var(--main-hue), 50%, 50%, 14%);
        }
        .input-wrap {
            position: relative;
        }
        .input-wrap label {
            position: absolute;
            left: calc(1.35rem + 2px);
            transform: translateY(-80%);
            color: var(--text-color);
            pointer-events: none;
            transition: .25s;
            margin-top: 1.5rem;
        }
        .form-control {
            width: 100%;
            background-color: var(--input-bg);
            padding: 1.5rem 1.35rem calc(0.75rem - 2px) 1.35rem;
            border: none;
            outline: none;
            font-family: inherit;
            border-radius: 20px;
            color: var(--text-color);
            font-weight: 500;
            font-size: 0.95rem;
            border: 2px solid transparent;
            box-shadow: 0 0 0 0px hsla(var(--main-hue), 92%, 54%, 0.169);
            transition: 0.3s;
            margin-bottom: 20px;
        }
        .form-control:hover {
            background-color: var(--input-bg-hover);
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
            border: none;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .btn:hover {
            background-color: #6CA6CD;
            color: #fff;
            text-decoration: none;
        }
        .btn-back {
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
        .btn-back:hover {
            background-color: #d9534f;
            color: #fff;
            text-decoration: none;
        }
        .btn:focus,
        .btn.focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .form-control:invalid {
            border-color: #d9534f;
        }
        .text-danger {
            color: #d9534f;
        }
    </style>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h2>Tambah Data Laporan</h2>
            </div>
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <form method="POST" action="{{ url('save-report') }}" class="rent-form" enctype="multipart/form-data">
                @csrf
                <div class="input-wrap">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">
                            <i class="bx bx-error-circle error-icon"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="input-wrap">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" value="{{ old('nik') }}">
                    @error('nik')
                        <div class="text-danger">
                            <i class="bx bx-error-circle error-icon"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="input-wrap">
                    <label for="nohp">Nomor Telepon</label>
                    <input type="text" class="form-control" name="nohp" placeholder="Masukkan Nomor Telepon" value="{{ old('nohp') }}">
                    @error('nohp')
                        <div class="text-danger">
                            <i class="bx bx-error-circle error-icon"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="input-wrap">
                    <label for="tujuan">Tujuan Pengaduan</label>
                    <select class="form-control" aria-label="Default select example" name="tujuan">
                        <option selected></option>
                        <option value="Kepala Desa - Pak Sukirman">Kepala Desa - Pak Sukirman</option>
                        <option value="Sekretaris - Bagus Mulyanto S.Pd.">Sekretaris - Bagus Mulyanto S.Pd.</option>
                        <option value="Karang Taruna - Mas Ludi">Karang Taruna - Mas Ludi</option>
                    </select>
                    @error('tujuan')
                        <div class="text-danger">
                            <i class="bx bx-error-circle error-icon"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="input-wrap">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="text-danger">
                            <i class="bx bx-error-circle error-icon"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="input-wrap">
                    <label for="deskripsi">Deskripsi Perkara</label>
                    <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi Perkara" value="{{ old('deskripsi') }}">
                    @error('deskripsi')
                        <div class="text-danger">
                            <i class="bx bx-error-circle error-icon"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <div class="input-wrap">
                    <label for="kronologi">Kronologi Kejadian</label>
                    <input type="text" class="form-control" name="kronologi" placeholder="Masukkan Kronologi Kejadian" value="{{ old('kronologi') }}">
                    @error('kronologi')
                        <div class="text-danger">
                            <i class="bx bx-error-circle error-icon"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br>
                <a href="{{ url('report-list') }}" class="btn-back">Kembali</a>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
</main>

<script>
    let form = document.querySelector('form');
    let inputs = form.querySelectorAll('.form-control');

    form.addEventListener('submit', (event) => {
    let errors = false;

    for (let i = 0; i < inputs.length; i++) {
        let input = inputs[i];
        if (!input.checkValidity()) {
        input.classList.add('is-invalid');
        errors = true;
        } else {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
        }
    }

    if (errors) {
        event.preventDefault();
    }
    });
</script>

@endsection
