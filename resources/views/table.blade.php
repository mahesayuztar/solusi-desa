<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Div Hijau dengan Tanda Silang</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .div-ini {
            width: 80%;
            margin: auto;
            align-items: center;
        }

        .peringatan {
            padding: auto;
        }

        .btn-primary:hover,.btn-primary:focus,.btn-primary:active, 
        .btn-primary:active:focus:not(:disabled):not(.disabled),
        .btn:focus, .btn:active, .btn:hover{
            box-shadow: none!important;
            outline: 0;
        }

        .notifikasi {
            z-index: 2;
        }

        /* Menambahkan gaya CSS untuk tanda silang */
    </style>
    <link rel="stylesheet" href="{{url('/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{url('/style.css')}}">
      <!-- responsive-->
      <link rel="stylesheet" href="{{url('/responsive.css')}}">
      <!-- awesome fontfamily -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
<body>

    <!-- Elemen div dengan kelas "div-hijau" -->
    <div class=" d-flex justify-content-center notifikasi">
        <div class="d-flex row alert alert-success div-ini" id="divHijau">
            <div class="col-11 peringatan">
                <p class="">Ini adalah sebuah div berwarna hijau.</p>
            </div>
            <div class="col-1 d-flex justify-content-end">
                <button class="text-success btn bg-transparent" onclick="sembunyikanDiv()">X</button>
            </div>
            <!-- Konten lainnya dapat ditambahkan di sini -->
        </div>
    </div>

    <div class="border d-flex justify-content-center">
        <p>Ini hanya dummy</p>
    </div>
        

    <script>
        // Fungsi untuk menyembunyikan div saat tanda silang diklik
        function sembunyikanDiv() {
            var divHijau = document.getElementById("divHijau");
            divHijau.style.visibility = "hidden";
        }
    </script>

</body>
</html>
