<?php $this->load->view('Back/Parts/V_Header') ?>
<?php $this->load->view('Back/Parts/V_Navigation') ?>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <?php $tanggal = date('y-M-d') ?>
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Jumlah Pelayanan</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $jumlah_pelayanan ?></h2>
                                    <p class="text-white mb-0"><?php echo $tanggal ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Jumlah Kuota Pelayanan Hari Ini</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $kuota ?></h2>
                                    <p class="text-white mb-0"><?php echo $tanggal ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-file"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Jumlah Permohonan</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $jumlah_permohonan ?></h2>
                                    <p class="text-white mb-0"><?php echo $tanggal ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Jumlah Pengambilan</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $jumlah_pengambilan ?></h2>
                                    <p class="text-white mb-0"><?php echo $tanggal ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Pelayanan</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $total_pelayanan ?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-bar-chart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Permohonan KTP</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $total_ktp ?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-bar-chart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Permohonan KIA</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $total_kia ?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-bar-chart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Permohonan KK</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $total_kk ?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-bar-chart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                

                

 
                
               </div> 
            <!-- #/ container -->
        </div>
<?php $this->load->view('Back/Parts/V_Footer') ?>