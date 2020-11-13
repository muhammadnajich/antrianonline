<?php $this->load->view('Front/Parts/V_Header') ?>
<?php $this->load->view('Front/Parts/V_Navigation2') ?>
    <div class="welcome-area" id="welcome">
        <div class="header-text">
            <div class="container">
                <div class="row" >
                    <h1>Daftar Antrian Pengambilan</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="section" id="informasi">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Nomor Antrian Pengambilan</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Berikut data nomor antrian yang akan di panggil hari ini</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Testimonials Item Start ***** -->
               <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Nomor Antrian</th>
                                                <th>Nama Lengkap</th>
                                                <th>Keterangan Yang di Mohon</th>
                                                <th>Tanggal</th>
                                                <th>Hari</th>
                                                <th>Waktu</th>
                                                <th>Tahun</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php foreach ($pengambilan as $u) { ?>
                                            <tr id="<?php echo $u->id_permohonan ?>">
                                                <td><?php echo $u->nomor_antrian_permohonan ?></td>
                                                <td><?php echo $u->nama_lengkap ?></td>
                                                <td><?php echo $u->keterangan_yang_dimohon ?></td>
                                                <!--<td><?php //echo $u->desa." ".$u->dusun." ".$u->rt." ".$u->nama_jalan ?></td>-->
                                                <td><?php echo $u->tanggal ?></td>
                                                <td><?php echo $u->hari ?></td>
                                                <td><?php echo $u->waktu ?></td>
                                                <td><?php echo $u->tahun ?></td>
                                                
                                            </tr>
                                              <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nomor Antrian</th>
                                                <th>Nama Lengkap</th>
                                                <th>Keterangan Yang di Mohon</th>
                                                <th>Tanggal</th>
                                                <th>Hari</th>
                                                <th>Waktu</th>
                                                <th>Tahun</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                <!-- ***** Testimonials Item End ***** -->
                
                <!-- ***** Testimonials Item Start ***** -->
                
                <!-- ***** Testimonials Item End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Testimonials End ***** -->
    <!-- ***** Features Small End ***** -->
    <!-- ***** Ajukan Permohonan Start ***** -->
  
<?php $this->load->view('Front/Parts/V_Footer') ?>