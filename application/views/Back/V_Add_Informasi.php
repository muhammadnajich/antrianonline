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
                                    <form class="form-valide" action="<?php echo base_url('C_Informasi/tambah_aksi') ?>" method="post">
                                        <div class="form-group row">
                                            <input type="hidden" name="id_informasi" value="<?php echo $kode ?>">
                                            <label class="col-lg-4 col-form-label" for="val-username">Judul Informasi <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-judul-informasi" name="judul_informasi" placeholder="Masukkan Judul Informasi" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Isi Informasi <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea id="summernote" class="summernote" name="isi" required="" placeholder="Masukkan Isi Informasi"></textarea>
                                            </div>
                                        </div>
                                        
                                    
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <a href="<?php echo base_url() ?>admin/informasi"><button type="button" class="btn btn-danger">
                                                  Batal
                                                </button></a>
                                                <button type="submit" id="btnSubmit" class="btn btn-primary">Kirim</button>
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