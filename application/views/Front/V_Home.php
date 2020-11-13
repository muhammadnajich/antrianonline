<?php $this->load->view('Front/Parts/V_Header') ?>
<?php $this->load->view('Front/Parts/V_Navigation') ?>
<?php if ($this->session->flashdata('message') == "berhasil") { ?>
  <script type="text/javascript">
  Swal.fire(
      'Permohonan Anda Berhasil di Ajukan!',
      'Silahkan cek email anda untuk melihat nomor antrian anda!',
      'success'
    );
  </script>
<?php }else if($this->session->flashdata('message') == "email"){ ?>
  <script type="text/javascript">
    Swal.fire(
      'Pesan anda sudah terkirim!',
      'Silahkan tunggu respon kami di email anda. Terimakasih!',
      'success'
    );
  </script>
<?php } ?>
<!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <h1>Nomor Antrian Online Kantor Kecamatan Pameungpeuk Kabupaten Bandung</h1>
                    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                      <?php if ($jumlah_permohonan <= $kuota) { ?>
                        <a href="#ajukanpermohonan" class="main-button-slider" title="Klick Disini">Ajukan Permohonan</a>
                      <?php }else{ ?>
                        <a href="#" class="main-button-slider" title="Klick Disini">Sudah Mencapai Batas Maksimal</a>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div><br /><br />


    <!-- ***** Welcome Area End ***** -->
    <!-- ***** Features Small Start ***** -->
    <section class="section home-feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- ***** Features Nomor Antrian Sekarang ***** -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                            <div class="features-small-item">
                                <h5 class="features-title">Nomor Antrian Permohonan Sekarang</h5>
                                <h1 style="font-size:100px; color:#8261ee;"><?php echo $nomor_antrian_permohonan ?></h1>
                                <?php
                  									date_default_timezone_set("Asia/Jakarta");
                  									$date = date("d-m-Y");
                  									echo "Hari ini : " . $date;
                                                  ?><br />
                                                  <?php
                  									date_default_timezone_set("Asia/Jakarta");
                  									$time = date("h:i");
                  									echo "Waktu : " . $time . " WIB";
                                ?>
                            </div>
                        </div>
                        <!-- ***** Features Nomor Antrian Sekarang ***** -->
                        <!-- ***** Features Nomor Antrian Sekarang ***** -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                            <div class="features-small-item">
                                <h5 class="features-title">Nomor Antrian Pengambilan Sekarang</h5>
                                <h1 style="font-size:100px; color:#8261ee;"><?php echo $nomor_antrian_pengambilan ?></h1>
                                <?php
                                    date_default_timezone_set("Asia/Jakarta");
                                    $date = date("d-m-Y");
                                    echo "Hari ini : " . $date;
                                ?><br />
                                <?php
                                    date_default_timezone_set("Asia/Jakarta");
                                    $time = date("h:i");
                                    echo "Waktu : " . $time . " WIB";
                                ?>
                            </div>
                        </div>
                        <!-- ***** Features Nomor Antrian Sekarang ***** -->
                        <!-- ***** Features Jumlah Antrian Sekarang ***** -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                            <div class="features-small-item">
                                <h5 class="features-title">Maksimal Antrian Hari ini</h5>
                                <?php foreach ($kuota as $k) { ?>
                                <h1 style="font-size:100px; color:#8261ee;"><?php echo $k->kuota ?></h1>
                                <?php
                                }
                                    date_default_timezone_set("Asia/Jakarta");
                                    $date = date("d-m-Y");
                                    echo "Hari ini : " . $date;
                                ?><br />
                                <?php
                                    date_default_timezone_set("Asia/Jakarta");
                                    $time = date("h:i");
                                    echo "Waktu : " . $time . " WIB";
                                ?>
                            </div>
                        </div>
                        <!-- ***** Features Jumlah Antrian Sekarang ***** -->
                        <!-- ***** Features Nomor Antrian Besok ***** -->
                        <!-- ***** Features Nomor Antrian Besok ***** -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="informasi">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Informasi</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Syarat - syrat yang harus diikut dalam mengajukan permohonan</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Testimonials Item Start ***** -->
                <?php foreach ($informasi as $i) { ?>
             
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <i><?php echo $i->judul_informasi ?></i>
                            <p><?php echo $i->isi ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- ***** Testimonials Item End ***** -->
                
                <!-- ***** Testimonials Item Start ***** -->
                
                <!-- ***** Testimonials Item End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Testimonials End ***** -->
    <!-- ***** Features Small End ***** -->
    <!-- ***** Ajukan Permohonan Start ***** -->
    <?php if ($jumlah_permohonan <= $kuota ) { ?>
    <section class="section colored" id="ajukanpermohonan">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Ajukan Permohonan Hari Ini</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p style="font-style: bold">Hanya untuk masyarakat yang berdomisili di wilayah Kecamatan Pameungpeuk, Kabupaten Bandung, Provinsi Jawa Barat</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End *****-->
                <!-- *****Form Daftar Start ***** -->
                <center><div class="col-lg-10 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="daftar" action="<?php echo base_url(). 'C_Permohonan/tambah_aksi' ?>" method="post">
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                            <p style="color: red; text-align: left; font-size: 12px">*NIK yang ada di KTP atau KK orang yang akan diuruskan dokumennya</p>
                              <fieldset>
                                <input name="nik" type="number" maxlength="16" class="form-control"placeholder="NIK" required="" title="Ketik Disini">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                            <p style="color: red; text-align: left; font-size: 12px">*Nama Lengkap orang yang akan diuruskan dokumennya</p>
                              <fieldset>
                                <input name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap" required="" title="Ketik Disini">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <p style="color: red; text-align: left; font-size: 12px">*Email yang bisa dihubungi</p>
                              <fieldset>
                                <input name="email" type="email"  class="form-control" placeholder="Email" title="Ketik Disini">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <p style="color: red; text-align: left; font-size: 12px">*Pilih Keterangan Yang Dimohon</p>
                              <fieldset>
                                <select name="keterangan_yang_dimohon" class="form-control">
                                  <option selected>Keterangan Yang Dimohon</option>
                                  <option value="KK">KK</option>
                                  <option value="KTP">KTP</option>
                                  <option value="KIA">KIA</option>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <p style="color: red; text-align: left; font-size: 12px">*Pilih Desa Domisili Pemohon Saat ini</p>
                              <fieldset>
                                <select id="desa" name="desa" class="form-control" title="Klick Disini">
                                  <?php foreach ($desa as $d) { ?>
                                    <option value="<?php echo $d->id_desa ?>"><?php echo $d->nama_desa ?></option>
                                  <?php } ?>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <p style="color: red; text-align: left; font-size: 12px">*Pilih Dusun Domisili Pemohon Saat ini</p>
                              <fieldset>
                                <select id="dusun" name="dusun" class="form-control" title="Klick Disini">
                                  <option value="">Pilih</option>
                                </select>

                                <div id="loading" style="margin-top: 15px;">
                                    <img src="<?php echo base_url() ?>assets/img/loading.gif" width="18"> <small>Loading...</small>
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <p style="color: red; text-align: left; font-size: 12px">*Pilih RT Domisili Pemohon Saat ini</p>
                              <fieldset>
                                <select id="rt" name="rt" class="form-control" title="Klick Disini">
                                  <option value="">Pilih</option>
                                </select>

                                <div id="loading2" style="margin-top: 15px;">
                                    <img src="<?php echo base_url() ?>assets/img/loading.gif" width="18"> <small>Loading...</small>
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <p style="color: red; text-align: left; font-size: 10px">*Nama Jalan dan Nomor Rumah Domisili Pemohon Saat ini, contoh : Jl. ABC, No.03</p>
                              <fieldset>
                                <input name="nama_jalan" type="text" class="form-control" id="nama_jalan" placeholder="Nama Jalan" required="" title="Ketik Disini">
                              </fieldset>
                            </div>
                            <!-- <div class="form-group">
                              <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                  <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                              <div class="help-block with-errors"></div>
                            </div> -->
                            <div class="col-lg-12">
                              <fieldset>
                                <input type="submit" id="form-submit" class="btn btn-success" value="Kirim" style="color: white;">
                              </fieldset><br />
                              <p style="text-align: left; font-size: 12px">Keterangan : jika nomor antrian anda terlewati silahkan ajukan permohonan kembali selama kuota maksimal antrian online masih tersedia.</p>
                            </div>
                          </div>

                        </form>
                          <!-- Central Modal Medium Success -->
                           <!-- Central Modal Medium Success-->
                    </div>
                </div></center>
                <!-- ***** Form Daftar End ***** -->
        </div>
    </section>
  <?php } ?>
  <section class="section colored" id="contact-us">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Kontak</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Silahkan Kontak kami dan berikan kritik dan saran anda</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Contact Text Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h5 class="margin-bottom-30">Kontak Kami</h5>
                    <div class="contact-text">
                        <p>Alamat Kantor
                        <br>Kantor</p>
                        <p>Deskripsi</p>
                    </div>
                </div>
                <!-- ***** Contact Text End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" action="<?php echo base_url() ?>C_Front/pesan" method="post">
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <fieldset>
                                <input name="nama" type="text" class="form-control" id="name" placeholder="Nama Lengkap" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <fieldset>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Alamat E-Mail " required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="pesan" rows="6" class="form-control" id="message" placeholder="Pesan Anda" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Kirim Pesan</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
<?php $this->load->view('Front/Parts/V_Footer') ?>
<script type="text/javascript">
  

  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    $("#loading2").hide();
    $("#desa").change(function(){ // Ketika user mengganti atau memilih data desa
      $("#dusun").hide(); // Sembunyikan dulu combobox dusun nya
      $("#loading").show(); // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("C_Front/listDusun"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_desa : $("#desa").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading").hide(); // Sembunyikan loadingnya
          // set isi dari combobox dusun
          // lalu munculkan kembali combobox kotanya
          $("#dusun").html(response.list_dusun).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
    $("#dusun").change(function(){ // Ketika user mengganti atau memilih data desa
      $("#rt").hide(); // Sembunyikan dulu combobox dusun nya
      $("#loading2").show(); // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("C_Front/listRt"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_dusun : $("#dusun").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading2").hide(); // Sembunyikan loadingnya
          // set isi dari combobox dusun
          // lalu munculkan kembali combobox kotanya
          $("#rt").html(response.list_rt).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });

</script>