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
                                <h4 class="card-title">Data Permohonan</h4>
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
                                              <?php foreach ($permohonan as $u) { ?>
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
                                                <td><a class="btn btn-success terima" data-placement="button" data-toggle="modal" data-id="<?php echo $u->id_permohonan ?>" data-target="#show"><span class="fa fa-check text-white"></span></a> | <a class="btn btn-danger tolak" data-toogle="tooltip" data-placement="button" title="Tolak Permohonan!"><span class="fa fa-close text-white"></span></a> | <a class="btn btn-warning tunda" data-toogle="tooltip" data-placement="button" title="Tunda Permohonan!"><span class="fa fa-hourglass-half text-white"></span></a>
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
          </div>
          <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Data Pengambilan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            
                <div class="modal-body">                    
                    <div class="modal-data"></div>
                </div>
 
                
            </form>
            </div>
            </div>
        </div>
         <script type="text/javascript">
          $(document).ready(function(){
        $('#show').on('show.bs.modal', function (e) {
            var getDetail = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : '<?php echo base_url() ?>C_Permohonan/form_terima',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'getDetail='+ getDetail,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
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
        confirmButtonText: "Ya, Tunda Permohonan!",
        cancelButtonText: "Tidak, Batalkan!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?php echo base_url() ?>admin/permohonan/tunda/'+id,
             type: 'post',
             error: function() {
                alert('Something is wrong'+id);
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Permohonan Ditunda!", "Permohonan yang diajukan telah ditunda.", "success");
             }
          });
        } else {
          swal("Dibatalkan", "Penundaan permohonan dibatalkan :)", "error");
        }
      });
     
    });
    $(".tolak").click(function(){
        var id = $(this).parents("tr").attr("id");
    
       swal({
        title: "Apa anda yakin?",
        text: "Anda tidak bisa mengubah lagi data yang akan anda tolak!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, Tolak Permohonan!",
        cancelButtonText: "Tidak, Batalkan!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?php echo base_url() ?>admin/permohonan/tolak/'+id,
             type: 'post',
             error: function() {
                alert('Something is wrong'+id);
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Permohonan Ditolak!", "Permohonan yang diajukan telah ditolak.", "success");
             }
          });
        } else {
          swal("Dibatalkan", "Penolakan permohonan dibatalkan :)", "error");
        }
      });
     
    });
    
</script>

<?php 
  $this->load->view("Back/Parts/V_Footer");
 ?> 