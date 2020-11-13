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
                                <h4 class="card-title">Data Pesan</h4>
                                </div>
                             </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Dari</th>
                                                <th>Email</th>
                                                <th>Pesan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php foreach ($pesan as $u) { ?>
                                            <tr id="<?php echo $u->id_pesan ?>">
                                                <td><?php echo $u->nama ?></td>
                                                <td><?php echo $u->email ?></td>
                                                <td><?php echo $u->pesan ?></td>
                                                <td><a class="btn btn-info terima" data-placement="button" data-toggle="modal" data-id="<?php echo $u->id_pesan ?>" data-target="#show"><span class="fa fa-reply text-white"></span></a>
                                                </td>
                                            </tr>
                                              <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Dari</th>
                                                <th>Email</th>
                                                <th>Pesan</th>
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
                <h3 class="modal-title" id="myModalLabel">Balas Pesan</h3>
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
                      url : '<?php echo base_url() ?>C_Pesan/form_balas',
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
      
          </script>

<?php 
  $this->load->view("Back/Parts/V_Footer");
 ?> 