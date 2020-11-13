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
                                <div style="float: left;">
                                    <h4 class="card-title">Kelola Data Mining</h4>
                                </div><br />
                                <form method="post" id="import_form" enctype="multipart/form-data" action="<?php echo base_url('admin/excel_import/import') ?>">
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <p><label>Unggah File Excel</label>
                                            <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
                                        </div><br />
                                        <a href=""><button type="submit" value="submit" name="import" class="btn btn-success" style="float: left;"/><span class="fa fa-upload" style="float: left;"> Unggah Data</span></button></a>
                                    </div>
                                </form>
                                    <div style="float: left; margin-left: 115px;">                               
                                        <a href="<?php echo base_url() ?>admin/prosesmining" class="btn btn-primary" type="submit" name="import"  value="import"><span class="fa fa-hourglass-half" style="float: left;"> Proses Mining</span></a>
                                    </div>
                                <div class="table-responsive"><br />
                                    <h4 style="text-align: center;">Jumlah Data : <?php echo $total_dataset ?></h4>
                                    <?php
                                    if ($this->session->flashdata('result_insert')) {
                                        ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>
                                            <?php echo $this->session->flashdata('result_insert'); ?></strong>
                                        </div>
                                    <?php } ?>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Kuartal</th>
                                                <th>Hari</th>
                                                <th>Waktu</th>
                                                <th>Jenis Permohonan</th>
                                                <th>Tingkat Kepadatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php foreach ($excel as $u) { ?>
                                            <tr id="<?php echo $u->id ?>">
                                                <td><?php echo $u->kuartal ?></td>
                                                <td><?php echo $u->hari ?></td>
                                                <td><?php echo $u->waktu ?></td>
                                                <td><?php echo $u->jenis_permohonan ?></td>
                                                <td><?php echo $u->tingkat_kepadatan ?></td>
                                            </tr>
                                              <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Kuartal</th>
                                                <th>Hari</th>
                                                <th>Waktu</th>
                                                <th>Jenis Permohonan</th>
                                                <th>Tingkat Kepadatan</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
    </div>
    <!--<script>
    $(document).ready(function(){

        load_data();

        function load_data()
        {
            $.ajax({
                url:"<?php //echo base_url(); ?>admin/excel_import/fetch",
                method:"POST",
                success:function(data){
                    $('#dataset').html(data);
                }
            })
        }
 
        $('#import_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"<?php //echo base_url() ?>admin/excel_import/import",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    $('#file').val('');
                    load_data();
                    alert(data);
                }
            })
        });

    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#import_form').on('submit',function(e) { 
      $.ajax({  
          url:'<?php //echo base_url() ?>Excel_import/import', 
          data:$(this).serialize(),
          type:'POST',
          success:function(data){
            console.log(data);
         swal("Berhasil!", "Data Berhasil Diunggah!", "success");
          },
          error:function(data){
         swal("Oops...", "Data Gagal Diunggah :(", "error");
          }
        });
        e.preventDefault();
      });
    });
    </script>-->

<?php 
  $this->load->view("Back/Parts/V_Footer");
 ?> 