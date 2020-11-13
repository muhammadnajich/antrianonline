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
                                    <form class="form-valide" action="<?php echo base_url('C_Akun/update') ?>" method="post">
                                    <?php foreach ($akun as $a ) { ?>
                                        <div class="form-group row">
                                            <input type="hidden" name="id_user" value="<?php echo $a->id_user ?>">
                                            <label class="col-lg-4 col-form-label" for="val-username">Nama Akun <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="username" placeholder="Enter a username.." value="<?php echo $a->username ?>" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" id="val-email" name="email" placeholder="Your valid email.." value="<?php echo $a->email ?>" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">katasandi <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="hidden" name="password_lama" value="<?php echo $a->password ?>">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Choose a safe one.." required="" value="<?php echo $a->password ?>">
                                                <span class="text-warning"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Akses Sebagai <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="role" required="">
                                                    <option value="<?php echo $a->role ?>"><?php echo $a->role ?></option>
                                                    <option value="admin">Admin</option>
                                                    <option value="Pelayanan">Pelayanan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <a href="<?php echo base_url() ?>admin/akun"><button type="button" class="btn btn-danger">
                                                  Batal
                                                </button></a>
                                                <button type="submit" id="btnSubmit" class="btn btn-warning">Kirim</button>
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