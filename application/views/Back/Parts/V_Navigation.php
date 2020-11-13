    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo" style="background-color: white; ">
                <a href="<?php echo base_url() ?>dashboard/admin">
                    <b class="logo-abbr"><img src="<?php echo base_url() ?>assets/img/pameungpek.png" alt="" width="50"> </b>
                    <span class="logo-compact"><img src="<?php echo base_url() ?>assets/admin/images/logo-compact.png" alt=""></span>
                    <span class="brand-title" style="color: black;">
                        <img src="<?php echo base_url() ?>assets/img/pameungpek.png" alt="" width="40"> Antrian Online
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="<?php echo base_url() ?>assets/admin/images/user/form-user.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon-user"></i> <span><?php echo $this->session->userdata('username') ?> </span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li><a href="<?php echo base_url() ?>logout" onclick="return confirm('Apakah anda yakin ingin keluar ?')"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label"><?php echo $this->session->userdata('role') ?></li>
                    <?php if ($this->session->userdata('role') == "admin") { ?>
                    <li>
                        <a href="<?php echo base_url() ?>dashboard/admin" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/kelolamining" aria-expanded="false">
                            <i class="fa fa-hourglass-half"></i> <span class="nav-text">Kelola Data Mining</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/lihatpohonkeputusan" aria-expanded="false">
                            <i class="fa fa-eye"></i> <span class="nav-text">Lihat Pohon Keputusan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/akun" aria-expanded="false">
                            <i class="fa fa-user"></i> <span class="nav-text">Akun</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/informasi" aria-expanded="false">
                            <i class="fa fa-info-circle"></i> <span class="nav-text">Informasi</span>
                        </a>
                    </li>    
                    <?php }else{ ?>
                    <li>
                        <a href="<?php echo base_url() ?>admin/kuota" aria-expanded="false">
                            <i class="fa fa-gear"></i> <span class="nav-text">Atur Kuota Antrian</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/permohonan" aria-expanded="false">
                            <i class="fa fa-file"></i> <span class="nav-text">Permohonan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/data_permohonan" aria-expanded="false">
                            <i class="fa fa-hand-paper-o"></i> <span class="nav-text">Data Permohonan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/pengambilan" aria-expanded="false">
                            <i class="fa fa-file"></i> <span class="nav-text">Pengambilan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/data_pengambilan" aria-expanded="false">
                            <i class="fa fa-handshake-o"></i> <span class="nav-text">Data Pengambilan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/pelayanan" aria-expanded="false">
                            <i class="fa fa-history"></i> <span class="nav-text">Data Pelayanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/laporan_pelayanan" aria-expanded="false">
                            <i class="fa fa-bar-chart"></i> <span class="nav-text">Laporan Data Pelayanan</span>
                        </a>
                    </li>
                    
                    
                    <li>
                        <a href="<?php echo base_url() ?>admin/pesan" aria-expanded="false">
                            <i class="fa fa-envelope"></i> <span class="nav-text">Pesan</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>