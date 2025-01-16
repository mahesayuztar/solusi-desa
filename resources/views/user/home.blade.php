@extends('layouts.app')

@section('type', 'gaada')
@section('home_active', 'active')
@section('content')
      <!-- start slider section -->
      <div id="top_section" class=" banner_main">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="airmic">
                     <h1>Laporkan masalah anda! </h1>
                     <p>Selamat datang di "Solusi Desa"! Platform kami memudahkan warga desa untuk melaporkan masalah atau kebutuhan dengan cepat. Dengan antarmuka yang user-friendly, warga dapat menyampaikan laporan tentang infrastruktur, kebersihan, keamanan, dan lainnya.
                     </p>
                     {{-- <a class="read_more" href="Javascript:void(0)">Book Now </a> --}}
                  </div>
               </div> 
               <div class="col-md-6">
                  <div class="mic_img">
                     <figure><img src="images/right_side.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end slider section -->
      <div class="contact left_cross_right">
         <div class="container">
            @if(Auth::id()!=null)
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_left">
                     <h2>Formulir Laporan</h2>
                     <h3><ol>
                         <li>Isi sesuai fakta yang sebenar-benarnya</li>
                         <li>Mengisi ini berarti Anda patuh secara penuh terhadap <a href="">peraturan</a> yang ada</li>
                         <li>(*) : wajib diisi</li>
                     </ol></h3>
                  </div>
               </div>
               <div class="col-md-12">
                  <form id="request" class="main_form" method="POST" action="{{ url('save-report') }}" enctype="multipart/form-data">
                    @csrf
                     <div class="row">
                        <label class="col-md-12 label-kiri" for="nama"><h4>Nama Lengkap*</h4></label>
                        <div class="col-md-12 ">
                           <input class="contactus" type="type" name="name">
                        </div>
                        <label class="col-md-12 label-kiri" for="nik"><h4>NIK*</h4></label>
                        <div class="col-md-12 ">
                           <input class="contactus" type="type" name="nik">
                        </div>
                        <label class="col-md-6 label-kiri" for="nohp"><h4>Nomor Telepon*</h4></label>
                        <label class="col-md-6" for="tujuan"><h4>Tujuan Pengaduan*</h4></label>
                        <div class="col-md-6">
                            <input class="contactus" type="type" name="nohp">
                        </div>
                        <div class="col-md-6">

<select class="form-select" aria-label="Default select example" name="tujuan">
  <option selected>Tujuan Laporan</option>
  <option value="Pencurian">Pencurian</option>
  <option value="Inventaris Habis">Inventaris Habis</option>
  <option value="Gangguan">Gangguan</option>
  <option value="Lingkungan rusak">Lingkungan rusak</option>
  <option value="Saran kegiatan">Saran kegiatan</option>
</select>
                        </div>
                        <label class="col-md-12 label-kiri" for="desc_p"><h4>Deskripsi Perkara</h4></label>
                        <div class="col-md-12">
                           <textarea class="textarea" type="Message" name="deskripsi"></textarea>
                        </div>
                        
                        <label class="col-md-12 label-kiri" for="gambar"><h4>Lampiran Gambar</h4></label>
                        <div class="file-upload col-md-12">
                          <div class="file-select">
                            <div class="file-select-button" id="fileName">Pilih File</div>
                            <div class="file-select-name" id="noFile">Tidak ada lampiran gambar</div> 
                            <input type="file" name="gambar" id="chooseFile">
                          </div>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn" type="submit">Kirim</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            @else
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_left">
                     <h2>Formulir Laporan</h2>
                     <h3><ol>
                         <li>Isi sesuai fakta yang sebenar-benarnya</li>
                         <li>Mengisi ini berarti Anda patuh secara penuh terhadap <a href="">peraturan</a> yang ada</li>
                         <li>(*) : wajib diisi</li>
                         <li style="color: red;">Untuk mengisi formulir laporan, wajib login terlebih dahulu!</li>
                     </ol></h3>
                  </div>
               </div>
               <div class="col-md-12">
                  <form id="request" class="main_form" method="POST" action="{{ url('save-report') }}" enctype="multipart/form-data">
                    @csrf
                     <div class="row">
                        <label class="col-md-12 label-kiri" for="nama"><h4>Nama Lengkap*</h4></label>
                        <div class="col-md-12 ">
                           <input class="contactus" type="type" name="name" disabled>
                        </div>
                        <label class="col-md-12 label-kiri" for="nik"><h4>NIK*</h4></label>
                        <div class="col-md-12 ">
                           <input class="contactus" type="type" name="nik" disabled>
                        </div>
                        <label class="col-md-6 label-kiri" for="nohp"><h4>Nomor Telepon*</h4></label>
                        <label class="col-md-6" for="tujuan"><h4>Tujuan Pengaduan*</h4></label>
                        <div class="col-md-6">
                            <input class="contactus" type="type" name="nohp" disabled>
                        </div>
                        <div class="col-md-6">

<select class="form-select" aria-label="Default select example" name="tujuan" disabled>
  <option selected>Tujuan Laporan</option>
  <option value="Pencurian">Pencurian</option>
  <option value="Inventaris Habis">Inventaris Habis</option>
  <option value="Gangguan">Gangguan</option>
  <option value="Lingkungan rusak">Lingkungan rusak</option>
  <option value="Saran kegiatan">Saran kegiatan</option>
</select>
                        </div>
                        <label class="col-md-12 label-kiri" for="desc_p"><h4>Deskripsi Perkara</h4></label>
                        <div class="col-md-12">
                           <textarea class="textarea" type="Message" name="deskripsi" disabled></textarea>
                        </div>
                        
                        <label class="col-md-12 label-kiri" for="gambar"><h4>Lampiran Gambar</h4></label>
                        <div class="file-upload col-md-12">
                          <div class="file-select">
                            <div class="file-select-button" id="fileName">Pilih File</div>
                            <div class="file-select-name" id="noFile">Tidak ada lampiran gambar</div> 
                            <input type="file" name="gambar" id="chooseFile" disabled>
                          </div>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn" type="submit" disabled>Kirim</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            @endif
         </div>
      </div>
      <!-- end contact section -->



      <div class="our_mics mb-5">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="titlepage text_align_center">
                     <h2>Alur Pemrosesan Laporan</h2>
                     <p>Dalam bagian ini, dibahas alur pengolahan laporan yang telah Anda sampaikan melalui platform Solusi Desa ini. Dari tahap penerimaan laporan hingga penanganan oleh pihak berwenang.</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 col-sm-6">
                  <div id="ho_show" class="mics">
                     <figure><img class="img_responsive" src="images/alur1.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="ho_show" class="mics">
                     <figure><img class="img_responsive" src="images/alur2.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="ho_show" class="mics">
                     <figure><img class="img_responsive" src="images/alur3.jpg" alt="#"/></figure>
                  </div>
               </div>
                <div class="col-md-4 mb-5 service_text text_align_center">
                 <h3>Pengisian Formulir</h3>
                 <p>Anda akan mengisi formulir laporan yang mencakup detail permasalahan, lokasi kejadian, dan deskripsi kronologis peristiwa.</p>
              </div>
               <div class="col-md-4 mb-5 service_text text_align_center">
                 <h3>Verifikasi Data</h3>
                 <p>Sebelum mengirim laporan, sistem akan melakukan verifikasi data untuk memastikan kelengkapan dan keakuratan informasi yang dimasukkan Anda. Administrator akan memverifikasi dalam jangka waktu maksimal 48 jam.</p>
              </div>
               <div class="col-md-4 mb-5 service_text text_align_center">
                 <h3>Pengiriman Laporan</h3>
                 <p>Setelah verifikasi, Anda dapat mengirimkan laporan kepada pihak tujuan. Dalam fase ini, pengajuan masih mungkin dibatalkan dan laporan akan ditarik oleh Administrator.</p>
              </div>
               <div class="col-md-4 col-sm-6 margin_top40">
                  <div id="ho_show" class="mics">
                     <figure><img class="img_responsive" src="images/alur4.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 margin_top40">
                  <div id="ho_show" class="mics">
                     <figure><img class="img_responsive" src="images/alur5.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 margin_top40">
                  <div id="ho_show" class="mics">
                     <figure><img class="img_responsive" src="images/alur6.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-4 mb-5 service_text text_align_center">
                 <h3>Konfirmasi Penerimaan Laporan</h3>
                 <p>Administrator akan mengonfirmasi status penerimaan laporan Anda oleh pihak tujuan.</p>
              </div>
               <div class="col-md-4 mb-5 service_text text_align_center">
                 <h3>Penanganan Pihak Berwenang</h3>
                 <p>Laporan akan diteruskan ke pihak berwenang, seperti kelurahan atau instansi terkait, untuk ditindaklanjuti.</p>
              </div>
               <div class="col-md-4 mb-5 service_text text_align_center">
                 <h3>Pemberitahuan Hasil Penanganan</h3>
                 <p>Setelah penanganan selesai, Anda akan menerima pemberitahuan mengenai hasil dari laporan. Ini bisa berupa informasi perbaikan atau tindakan yang telah diambil.</p>
              </div>
            </div>
         </div>
      </div>
      <!-- end our_mics -->

{{--       <!-- services -->
      <div class="services">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_center">
                     <h2>Our Services</h2>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="service_img text_align_center">
                     <i><img src="images/service1.png" alt="#"/></i>
                  </div>
                  <div class="service_text text_align_center">
                     <h3>Mic line</h3>
                     <p>There are many variations of passages mmajority have suffered alteration in some form, by injected humour, or</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="service_img text_align_center">
                     <i><img src="images/service2.png" alt="#"/></i>
                  </div>
                  <div class="service_text text_align_center">
                     <h3>Mic Stand</h3>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or  </p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="service_img text_align_center">
                     <i><img src="images/service3.png" alt="#"/></i>
                  </div>
                  <div class="service_text text_align_center">
                     <h3>Head mic</h3>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end services -->
      <!-- about -->
      <div id="about" class="about">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="titlepage text_align_left">
                     <h2>About Us</h2>
                     <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscureContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure</p>
                     <a class="read_more" href="about.html">Read More</a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="about_img">
                     <figure><img class="img_responsive" src="images/about_img.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      <!-- our_mics -->

      <!-- testimonial -->
      <div class="testimonial">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="titlepage text_align_center">
                     <h2>Our Client Says</h2>
                     <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from </p>
                  </div>
               </div>
            </div>
            <div class="row d_flex">
               <div class="col-md-10 offset-md-1">
                  <div id="testimo" class="carousel slide our_testimonial" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#testimo" data-slide-to="0" class="active"></li>
                        <li data-target="#testimo" data-slide-to="1"></li>
                        <li data-target="#testimo" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container">
                              <div class="carousel-caption posi_in">
                                 <div class="testomoniam_text">
                                    <i class="text_align_left d-block"><img  src="images/icon.png" alt="#"/></i>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure</p>
                                    <i class="text_align_right d-block"><img  src="images/icon_right.png" alt="#"/></i>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption posi_in">
                                 <div class="testomoniam_text">
                                    <i class="text_align_left d-block"><img  src="images/icon.png" alt="#"/></i>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure</p>
                                    <i class="text_align_right d-block"><img  src="images/icon_right.png" alt="#"/></i>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption posi_in">
                                 <div class="testomoniam_text">
                                    <i class="text_align_left d-block"><img  src="images/icon.png" alt="#"/></i>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure</p>
                                    <i class="text_align_right d-block"><img  src="images/icon_right.png" alt="#"/></i>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#testimo" role="button" data-slide="prev">
                     <i class="fa fa-angle-left" aria-hidden="true"></i>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#testimo" role="button" data-slide="next">
                     <i class="fa fa-angle-right" aria-hidden="true"></i>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end testimonial -->
      <!-- contact section --> --}}

@endsection