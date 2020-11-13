<?php
$this->load->view("Back/Parts/V_Header");
$this->load->view("Back/Parts/V_Navigation");
?>

    <div class="content-body">
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              <div>
                                <div style="float: left;">
                                <h4 class="card-title">Data Pelayanan</h4>
                                </div>
                                <div style="float: right;">                               
                                <!-- <a href="<?php echo base_url() ?>admin/akun/add" class="btn btn-primary"><span class="fa fa-user-plus" style="float: right;">Tambah Akun</span></a> -->
                                </div>
                             </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Keterangan Yang di Mohon</th>
                                                <th>Alamat</th>
                                                <th>Tanggal</th>
                                                <th>Hari</th>
                                                <th>Waktu</th>
                                                <th>Tahun</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php foreach ($pelayanan as $u) { ?>
                                            <tr id="<?php echo $u->id_pelayanan ?>">
                                                <td><?php echo $u->nik ?></td>
                                                <td><?php echo $u->nama_lengkap ?></td>
                                                <td><?php echo $u->email ?></td>
                                                <td><?php echo $u->keterangan_yang_dimohon ?></td>
                                                <td><?php echo $u->desa." ".$u->dusun." ".$u->rt." ".$u->nama_jalan ?></td>
                                                <td><?php echo $u->tanggal ?></td>
                                                <td><?php echo $u->hari ?></td>
                                                <td><?php echo $u->waktu ?></td>
                                                <td><?php echo $u->tahun ?></td>
                                            </tr>
                                              <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Keterangan Yang di Mohon</th>
                                                <th>Alamat</th>
                                                <th>Tanggal</th>
                                                <th>Hari</th>
                                                <th>Waktu</th>
                                                <th>Tahun</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>

<?php 
  $this->load->view("Back/Parts/V_Footer");
 ?> 