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
                                <h4 class="card-title">Report Pelayanan</h4>
                                </div>
                                <div style="float: right;">                               
                                <a href="<?php echo base_url() ?>C_Pelayanan/buat_laporan" class="btn btn-success"><span class="fa fa-file text-white" style="float: right;"> Buat Laporan</span></a>
                                <a href="<?php echo base_url() ?>C_Pelayanan/cetak_laporan" class="btn btn-primary"><span class="fa fa-download" style="float: right;"> Download File</span></a>
                                </div>
                             </div>
                                <div class="table-responsive">
                                    <table border="1" class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Jumlah Permohonan</th>
                                                <th>Jumlah Pengambilan</th>
                                                <th>Jumlah Jenis Permohonan KK</th>
                                                <th>Jumlah Jenis Permohonan KTP</th>
                                                <th>Jumlah Jenis Permohonan KIA</th>
                                                <th>Hari</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php foreach ($laporan as $u) { ?>
                                            <tr id="<?php echo $u->id_laporan ?>">
                                                <td><?php echo $u->jumlah_permohonan ?></td>
                                                <td><?php echo $u->jumlah_pengambilan?></td>
                                                <td><?php echo $u->jumlah_kk ?></td>
                                                <td><?php echo $u->jumlah_ktp ?></td>
                                                <td><?php echo $u->jumlah_kia ?></td>
                                                <td><?php echo $u->hari ?></td>
                                                <td><?php echo $u->tanggal ?></td>
                                                <td><a class="btn btn-danger remove" data-toogle="tooltip" data-placement="button" title="Hapus Data!"><span class="fa fa-trash text-white"></span></a></td>
                                            </tr>
                                              <?php } ?>
                                        </tbody>
                                        
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
         <script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
    
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?php echo base_url() ?>admin/laporan/hapus/'+id,
             type: 'delete',
             error: function() {
                alert('Something is wrong'+id);
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Deleted!", "Your imaginary file has been deleted.", "success");
             }
          });
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
     
    });
    
</script>

<?php 
  $this->load->view("Back/Parts/V_Footer");
 ?> 