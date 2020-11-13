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
                                <h4 class="card-title">Data Pengambilan</h4>
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
                                                <th>Nomor Antrian</th>
                                                <th>Tanggal</th>
                                                <th>Hari</th>
                                                <th>Waktu</th>
                                                <th>Tahun</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php foreach ($pengambilan as $u) { ?>
                                            <tr id="<?php echo $u->id_permohonan ?>">
                                                <td><?php echo $u->nik ?></td>
                                                <td><?php echo $u->nama_lengkap ?></td>
                                                <td><?php echo $u->email ?></td>
                                                <td><?php echo $u->keterangan_yang_dimohon ?></td>
                                                <td><?php echo $u->desa." ".$u->dusun." ".$u->rt." ".$u->nama_jalan ?></td>
                                                <td><?php echo $u->nomor_antrian_permohonan ?></td>
                                                <td><?php echo $u->tanggal ?></td>
                                                <td><?php echo $u->hari ?></td>
                                                <td><?php echo $u->waktu ?></td>
                                                <td><?php echo $u->tahun ?></td>
                                                <td> <a class="btn btn-success terima" data-toogle="tooltip" data-placement="button" title="Konfirmasi Pengambilan!"><span class="fa fa-check text-white"></span></a> | <a class="btn btn-warning tunda" data-toogle="tooltip" data-placement="button" title="Tunda Pengambilan!"><span class="fa fa-hourglass-half text-white"></span></a>
                                                </td>
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
                                                <th>Nomor Antrian</th>
                                                <th>Tanggal</th>
                                                <th>Hari</th>
                                                <th>Waktu</th>
                                                <th>Tahun</th>
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
         <script type="text/javascript">
        $(".terima").click(function(){
        var id = $(this).parents("tr").attr("id");
    
       swal({
        title: "Apa anda yakin?",
        text: "Anda tidak bisa mengubah lagi data yang akan anda terima!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, Konfirmasi Pengambilan!",
        cancelButtonText: "Tidak, Batalkan!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?php echo base_url() ?>admin/pengambilan/terima/'+id,
             type: 'post',
             error: function() {
                alert('Something is wrong'+id);
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Pengambilan Dikonfirmasi!", "Pengambilan dokumen telah dikonfirmasi.", "success");
             }
          });
        } else {
          swal("Dibatalkan", "Penundaan pengambilan dibatalkan :)", "error");
        }
      });
     
    });
    $(".tunda").click(function(){
        var id = $(this).parents("tr").attr("id");
    
       swal({
        title: "Apa anda yakin?",
        text: "Anda tidak bisa mengubah lagi data yang akan anda tunda!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, Tunda Pengambilan!",
        cancelButtonText: "Tidak, Batalkan!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?php echo base_url() ?>admin/pengambilan/tunda/'+id,
             type: 'post',
             error: function() {
                alert('Something is wrong'+id);
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Pengambilan Ditunda!", "Pengambilan dokumen telah ditunda.", "success");
             }
          });
        } else {
          swal("Dibatalkan", "Penundaan pengambilan dibatalkan :)", "error");
        }
      });
     
    });
    
</script>

<?php 
  $this->load->view("Back/Parts/V_Footer");
 ?> 