<?php
$this->load->view("Back/Parts/V_Header");
$this->load->view("Back/Parts/V_Navigation");
?>

    <div class="content-body">
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="<?php echo base_url('C_Kuota/update') ?>" method="post">
                                        <?php foreach ($kuota as $i) { ?>
                                        <div class="form-group row">
                                            <input type="hidden" name="id_kuotaantrian" value="<?php echo $i->id_kuotaantrian ?>">
                                            <label class="col-lg-4 col-form-label" for="val-username">Kuota Antrian<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="val-judul-informasi" name="kuota" placeholder="Kuota Antrian" required="" value="<?php echo $i->kuota ?>">
                                                <?php $tanggal = date('y-m-d') ?>
                                                <input type="hidden" name="tanggal" value="<?php echo $tanggal ?>">
                                            </div>
                                        </div>
                                        <?php } ?>
                                    
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <a href="<?php echo base_url() ?>admin/kuota"><button type="button" class="btn btn-danger">
                                                  Cancel
                                                </button></a>
                                                <button type="submit" id="btnSubmit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
<?php 
  $this->load->view("Back/Parts/V_Footer");
 ?>