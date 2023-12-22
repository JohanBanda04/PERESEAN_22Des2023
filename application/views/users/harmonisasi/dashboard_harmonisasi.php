<?php
$cek = $user->row();
$level = $cek->level;


?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <?php
    $nama_user = explode('_', $_SESSION['username']);
    if (count($nama_user) == 3) {
        $nama_user_fix = $nama_user[0] . " " . $nama_user[1] . " " . $nama_user[2];
    } else if (count($nama_user) == 2) {
        $nama_user_fix = $nama_user[0] . " " . $nama_user[1];
    } else if (count($nama_user) == 1) {
        $nama_user_fix = $nama_user[0];
    }
    ?>
    <h1 class="page-header" style="font-size: 25px">Dashboard
        <small> <?php echo strtoupper($nama_user_fix); ?></small>
    </h1>
    <h3 class="page-header" style="font-size: 18px">Selamat Datang di PERESEAN</h3>
    <!-- end page-header -->
    <!-- begin row -->


    <!-- DASHBOARD superADMIN -->

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-body">
                <div style="margin-left: 3px" class="row hidden">
                    <h5>Unggah Dokumen Hasil Harmonisasi</h5>
                    <br>
                    <a href="harmonisasi/v/t.html" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah
                        Dokumen </a>

                </div>

                <!--                <hr>-->
                <h5>sLihat Dokumen Harmonisasi</h5>
                <div class="row">

                    <?php
                    $get_all_zona = $this->db->get("tbl_zona")->result();

                    foreach ($get_all_zona as $i => $data) {
                        if ($data->nama_zona != "superadmin" and $data->nama_zona != "kasub_perancang" and $data->nama_zona != "perancang") {
                            ?>
                            <div class="col-md-3">
                                <a href="hasilharmonisasi/hasil/<?= $data->nama_zona ?>" style="text-decoration: none">
                                    <div class="widget widget-stats <?= $data->warna_background ?>">
                                        <div class="stats-icon stats-icon-lg stats-icon-square">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        </div>
                                        <div class="stats-desc"><?= $data->nama_panjang; ?></div>
                                        <div class="stats-number" style="color: white">
                                            <?php

                                            $get_jumlah_dokumen_harmonisasi = $this->db->query("select * from tbl_berita 
                                            where left(tgl_input,4)=" . $this->session->userdata('tahun') . " 
                                            and zona_dokumen='$data->nama_zona' order by id_berita DESC");

                                            echo $get_jumlah_dokumen_harmonisasi->num_rows();
                                            //echo number_format($this->db->get_where('tbl_berita', array('zona_dokumen'=>'pemprov_ntb'))->num_rows(),0,",",".");
                                            ?>
                                        </div>
                                        <div class="stats-progress progress">
                                            <div class="progress-bar" style="width: 70.1%;"></div>
                                        </div>
                                        <!--ASLIII-->
                                        <div class="stats-desc">Total Dokumen Harmonisasiii</div>
                                    </div>
                                </a>
                            </div>

                            <?php
                        }
                    }
                    ?>


                    <!--SEBAGAI PEGANGAN SAJA KALO LUPA-->
                    <div class="hidden">
                        <div <?php if ($_SESSION['nama_zona'] == 'pemkot_bima') { ?> class="col-md-6" <?php } else if ($_SESSION['nama_zona'] == 'superadmin') { ?> class="col-md-3"<?php } else if ($_SESSION['nama_zona'] == 'kasub_perancang') { ?> class="col-md-3 " <?php } else { ?> class="col-md-3 hidden" <?php } ?> >
                            <a href="harmonisasi/v/pemkot_bima.html" style="text-decoration: none">
                                <div class="widget widget-stats bg-gradient-dark-blue-light text-inverse">
                                    <div class="stats-icon stats-icon-lg stats-icon-square">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    </div>
                                    <div class="stats-desc">Pemkot Bima</div>
                                    <div class="stats-number">
                                        <?php
                                        if ($level == 'pelaksana') {
                                            $this->db->where('id_user', $cek->id_user);
                                        }
                                        echo number_format($this->db->get_where('tbl_berita', array('zona_dokumen' => 'pemkot_bima'))->num_rows(), 0, ",", "."); ?>
                                    </div>
                                    <div class="stats-progress progress">
                                        <div class="progress-bar" style="width: 70.1%;"></div>
                                    </div>
                                    <div class="stats-desc">Total Dokumen Harmonisasi</div>
                                </div>
                            </a>
                        </div>

                        <div <?php if ($_SESSION['nama_zona'] == 'pemkot_bima') { ?> class="col-md-6" <?php } else if ($_SESSION['nama_zona'] == 'superadmin') { ?> class="col-md-3 hidden"<?php } else { ?> class="col-md-3 hidden" <?php } ?> >
                            <a href="pemda/draft/pemkot_bima.html" style="text-decoration: none">
                                <div class="widget widget-stats bg-gradient-red-orange text-inverse">
                                    <div class="stats-icon stats-icon-lg stats-icon-square">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    </div>
                                    <div class="stats-desc">Pemkot Bima</div>
                                    <div class="stats-number">
                                        <?php
                                        if ($level == 'pelaksana') {
                                            $this->db->where('id_user', $cek->id_user);
                                        }
                                        echo number_format($this->db->get_where('tbl_draft', array('zona_dokumen' => 'pemkot_bima'))->num_rows(), 0, ",", "."); ?>
                                    </div>
                                    <div class="stats-progress progress">
                                        <div class="progress-bar" style="width: 70.1%;"></div>
                                    </div>
                                    <div class="stats-desc">Total Dokumen Draft Raperda</div>
                                </div>
                            </a>

                        </div>
                    </div>


                </div>


            </div>

        </div>

    </div>


</div>
<!-- end #content -->
