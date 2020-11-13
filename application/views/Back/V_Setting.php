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
                                <h4 class="card-title">Setting Kuota Antrian</h4>
                                </div>
                                <div style="float: right;">                               
                                <!-- <a href="<?php echo base_url() ?>admin/akun/add" class="btn btn-primary"><span class="fa fa-user-plus" style="float: right;">Tambah Akun</span></a> -->
                                </div>
                             </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Kuota</th>
                                                <th>Jumlah Permohonan</th>
                                                <th>Jumlah Pengambilan</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php foreach ($kuota as $u) { ?>
                                            <tr id="<?php echo $u->id_kuotaantrian ?>">
                                                <td><?php echo $u->kuota ?></td>
                                                <td><?php echo $u->jumlah_permohonan ?></td>
                                                <td><?php echo $u->jumlah_pengambilan ?></td>
                                                <td><?php echo $u->tanggal ?></td>
                                                <td><a href="<?php echo base_url('admin/kuota/edit/'.$u->id_kuotaantrian) ?>" data-toogle="tooltip" data-placement="button" title="Hapus Data!" class="btn btn-warning text-white"><span class="fa fa-gear"></span></a>
                                                </td>
                                            </tr>
                                              <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Kuota</th>
                                                <th>Jumlah Permohonan</th>
                                                <th>Jumlah Pengambilan</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
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
          </div>

<?php 
  $this->load->view("Back/Parts/V_Footer");
 ?> 