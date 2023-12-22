<!DOCTYPE html>
<?php
$cek    = $user->row();
$nama   = $cek->nama_lengkap;
$username   = $cek->username;

$level  = $cek->level;
$foto = "img/user/user-default.jpg";

$menu 		= strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
$sub_menu3 = strtolower($this->uri->segment(3));

$link1 = strtolower($this->uri->segment(1));
$link2 = strtolower($this->uri->segment(2));
$link3 = strtolower($this->uri->segment(3));
$link4 = strtolower($this->uri->segment(4));
$link5 = strtolower($this->uri->segment(5));

?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?= $judul_web; ?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="<?php echo $this->Mcrud->judul_web(); ?>" name="description" />
    <meta name="keywords" content="<?php echo $this->Mcrud->judul_web(); ?>">
    <base href="<?php echo base_url();?>"/>
    <link rel="shortcut icon" href="assets/logo-2.png" type="image/x-icon" />
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="assets/panel/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="assets/panel/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/panel/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/panel/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
    <link href="assets/panel/css/animate.min.css" rel="stylesheet" />
    <link href="assets/panel/css/style.min.css" rel="stylesheet" />
    <link href="assets/panel/css/style-responsive.min.css" rel="stylesheet" />
    <link href="assets/panel/css/theme/default.css" rel="stylesheet" id="theme" />
    <link href="assets/panel/css/style-gue.css" rel="stylesheet">
    <link href="assets/panel/css/custom.css" rel="stylesheet">
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    <link href="assets/panel/plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
    <link href="assets/panel/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
    <link href="assets/panel/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="assets/panel/plugins/morris/morris.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="assets/panel/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="assets/panel/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
    <link href="assets/panel/plugins/parsley/src/parsley.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="assets/panel/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="assets/panel/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
    <link href="assets/panel/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />
    <link href="assets/panel/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
    <link href="assets/panel/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
    <link href="assets/panel/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="assets/panel/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
    <link href="assets/panel/plugins/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
    <link href="assets/panel/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/panel/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/panel/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
    <link href="assets/panel/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="assets/panel/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="assets/panel/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="assets/panel/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
    <link href="assets/panel/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
    <link href="assets/panel/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
    <link href="assets/panel/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/panel/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
    <link rel="stylesheet" type="text/css" href="assets/fancybox/jquery.fancybox.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/fancybox/jquery.fancybox.js"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<body>

<style type="text/css"></style>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed in"> <!--page-sidebar-minified-->
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="navbar-header">
                <a href="" class="navbar-brand" style="width: 500px">
                        <span class="navbar-logo">
                            <i class="fa fa-vcard"></i>
                            <?php
                            $nama_user = explode('_',$_SESSION['username']);
                            if(count($nama_user)==3){
                                $nama_user_fix = $nama_user[0]." ".$nama_user[1]." ".$nama_user[2];
                            } else if (count($nama_user)==2){
                                $nama_user_fix = $nama_user[0]." ".$nama_user[1];
                            } else if (count($nama_user)==1){
                                $nama_user_fix = $nama_user[0];
                            }
                            ?>
                        </span> &nbsp;<b>Panel</b> <?php echo strtoupper($nama_user_fix);?>
                </a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end mobile sidebar expand / collapse button -->

            <!-- begin header navigation right -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown hidden">
                    <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle icon" aria-expanded="false">
                        <i class="ion-ios-bell"></i>
                        <span class="label" id="jml_notif_bell"><span class="badge badge-danger pull-right">0</span>
                    </a>
                    <ul class="dropdown-menu media-list pull-right animated fadeInDown" id="notif_bell"></ul>
                </li>
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<span class="user-image online">
								<img src="<?php echo $foto;?>" alt="" />
							</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        <li <?php if($menu=='profile'){echo " class='active'";}?> >
                            <!-- <a href="profile.html">Ganti Password</a>-->
                            <a href="users/profile/e/<?= hashids_encrypt($_SESSION['id_user']); ?>">Ganti Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="web/logout.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->

    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <ul class="nav">
                <li class="nav-profile">
                    <div class="image">
                        <a href="profile"><img src="<?php echo $foto;?>" alt="" /></a>
                    </div>
                    <div class="info">

                        <?php echo ucwords($nama_panjang_admin); ?>
                        <small>@<?php echo $this->session->userdata('username'); ?></small>
                    </div>
                </li>
            </ul>
            <!-- end sidebar user -->
            <!-- begin sidebar nav -->
            <ul class="nav">
                <!-- MENU AMERTA  -->
                <li class="nav-header"><big ">Menu Navigasi</big></li>
                <li class="has-sub<?php if($menu=='users' AND $sub_menu=='' or $menu=='dashboard'){echo " active";} ?>">
                    <a href="dashboard.html">
                        <i class="ion-ios-pulse-strong"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php if ($level=='superadmin'): ?>
                    <li class=" has-sub<?php if($menu=='datapengguna' AND $sub_menu=='' or $menu=='datapengguna'){echo " active";} ?>">
                        <a href="datapengguna/v.html">
                            <i class="fa fa-user bg-gray"></i>
                            <span>Data Pengguna</span>
                        </a>
                    </li>
                <?php endif ?>
                <li class="hidden has-sub<?php if($menu=='berita' AND $sub_menu=='' and $sub_menu3='' or $menu=='berita'){echo " active";} ?>">
                    <a href="berita/v.html">
                        <i class="fa fa-newspaper-o bg-gray"></i>
                        <span>Bahan Berita</span>
                    </a>
                </li>
                <!--aktifkan yg dibawah ini JIKA MAU TETAP TER-EXPAND "HASIL HARMONISASI" -->
                <li class="has-sub <?php if(($menu=='harmonisasi' AND $sub_menu=='v' AND $sub_menu3=='harmonisasi')
                    OR($menu=='harmonisasi' AND $sub_menu=='v' AND $sub_menu3=='pemprov_ntb')
                    OR($menu=='harmonisasi' AND $sub_menu=='v' AND $sub_menu3=='pemkot_mataram')
                    OR($menu=='harmonisasi' AND $sub_menu=='v' AND $sub_menu3=='pemkot_bima')
                    OR($menu=='harmonisasi' AND $sub_menu=='v' AND $sub_menu3=='pemkab_sumbawa_barat')
                    OR($menu=='harmonisasi' AND $sub_menu=='v' AND $sub_menu3=='pemkab_sumbawa')
                    OR($menu=='harmonisasi' AND $sub_menu=='v' AND $sub_menu3=='pemkab_lombok_utara')
                    OR($menu=='harmonisasi' AND $sub_menu=='v' AND $sub_menu3=='pemkab_lombok_timur')
                    OR($menu=='harmonisasi' AND $sub_menu=='v' AND $sub_menu3=='pemkab_lombok_tengah')
                    OR($menu=='harmonisasi' AND $sub_menu=='v' AND $sub_menu3=='pemkab_lombok_barat')
                    OR($menu=='harmonisasi' AND $sub_menu=='v' AND $sub_menu3=='pemkab_dompu')
                    OR($menu=='harmonisasi' AND $sub_menu=='v' AND $sub_menu3=='pemkab_bima') ){echo " active";} ?>">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-file-pdf-o bg-gray"></i>
                        <!--sidebar ato navbar -->
                        <span>Hasil Harmoniasi</span>
                    </a>
                    <!--ini dia sidebar menu-->
                    <ul class="sub-menu">
                        <!--LANJUTKAN DISINI BRO JO-->
                        <!--coba dengan data kota / pemkab dari tbl_zona dari database, mulai dari sini-->

                        <!--sampai sini-->
                        <li <?php if(($menu=='harmonisasi' and $sub_menu=='v' and $sub_menu3=='pemprov_ntb') or ($menu=='harmonisasi' and $sub_menu=='v2' and $sub_menu3=='pemprov_ntb')){ echo " class='active'"; } ?>

                            <?php if($_SESSION['nama_zona']=='pemprov_ntb'){?> class="" <?php } else if($_SESSION['nama_zona']=='superadmin'){ ?> class=""<?php } else if($_SESSION['nama_zona']=='kasub_perancang') {?> class="" <?php } else { ?> class="hidden" <?php } ?> >
                            <a href="harmonisasi/v/pemprov_ntb.html">
                                <i class="fa fa-file-text"></i> <span>Pemprov NTB</span>
                            </a>
                        </li>


                        <li <?php if(($menu=='harmonisasi' AND $sub_menu=='v' and $sub_menu3=='pemkot_mataram') or ($menu=='harmonisasi' AND $sub_menu=='v2' and $sub_menu3=='pemkot_mataram')){echo " class='active'";} ?>
                            <?php if($_SESSION['nama_zona']=='pemkot_mataram'){?> class="" <?php } else if($_SESSION['nama_zona']=='superadmin'){ ?> class=""<?php } else if($_SESSION['nama_zona']=='kasub_perancang') { ?> class="" <?php } else { ?> class="hidden" <?php } ?> >
                            <a href="harmonisasi/v/pemkot_mataram.html">
                                <i class="fa fa-file-text"></i> <span>Pemkot Mataram</span>
                            </a>
                        </li>
                        <li <?php if(($menu=='harmonisasi' AND $sub_menu=='v' and $sub_menu3=='pemkot_bima') or ($menu=='harmonisasi' AND $sub_menu=='v2' and $sub_menu3=='pemkot_bima')){echo " class='active'";} ?>

                            <?php if($_SESSION['nama_zona']=='pemkot_bima'){?> class="" <?php } else if($_SESSION['nama_zona']=='superadmin'){ ?> class=""<?php } else if($_SESSION['nama_zona']=='kasub_perancang') { ?> class="" <?php } else { ?> class="hidden" <?php } ?> >
                            <a href="harmonisasi/v/pemkot_bima.html">
                                <i class="fa fa-file-text"></i> <span>Pemkot Bima</span>
                            </a>
                        </li>
                        <!--sinicuy-->
                        <li <?php if(($menu=='harmonisasi' AND $sub_menu=='v' and $sub_menu3=='pemkab_sumbawa_barat') or ($menu=='harmonisasi' AND $sub_menu=='v2' and $sub_menu3=='pemkab_sumbawa_barat')){echo " class='active'";} ?>

                            <?php if($_SESSION['nama_zona']=='pemkab_sumbawa_barat'){?> class="" <?php } else if($_SESSION['nama_zona']=='superadmin'){ ?> class=""<?php } else if($_SESSION['nama_zona']=='kasub_perancang') { ?> class="" <?php } else { ?> class="hidden" <?php } ?> >
                            <a href="harmonisasi/v/pemkab_sumbawa_barat.html">
                                <i class="fa fa-file-text"></i> <span>Pemkab Sumbawa Barat</span>
                            </a>
                        </li>
                        <li <?php if(($menu=='harmonisasi' and $sub_menu=='v' and $sub_menu3=='pemkab_sumbawa') or ($menu=='harmonisasi' and $sub_menu=='v2' and $sub_menu3=='pemkab_sumbawa')){echo " class='active'";} ?>
                            <?php if($_SESSION['nama_zona']=='pemkab_sumbawa'){?> class="" <?php } else if($_SESSION['nama_zona']=='superadmin'){ ?> class=""<?php } else if($_SESSION['nama_zona']=='kasub_perancang') { ?> class="" <?php } else { ?> class="hidden" <?php } ?> >
                            <a href="harmonisasi/v/pemkab_sumbawa.html">
                                <i class="fa fa-file-text"></i> <span>Pemkab Sumbawa</span>
                            </a>
                        </li>


                        <li <?php if(($menu=='harmonisasi' AND $sub_menu=='v' and $sub_menu3=='pemkab_lombok_utara') or ($menu=='harmonisasi' AND $sub_menu=='v2' and $sub_menu3=='pemkab_lombok_utara')){echo " class='active'";} ?>
                            <?php if($_SESSION['nama_zona']=='pemkab_lombok_utara'){?> class="" <?php } else if($_SESSION['nama_zona']=='superadmin'){ ?> class=""<?php } else if($_SESSION['nama_zona']=='kasub_perancang') { ?> class="" <?php } else { ?> class="hidden" <?php } ?> >
                            <a href="harmonisasi/v/pemkab_lombok_utara.html">
                                <i class="fa fa-file-text"></i> <span>Pemkab Lombok Utara</span>
                            </a>
                        </li>
                        <li <?php if(($menu=='harmonisasi' AND $sub_menu=='v' and $sub_menu3=='pemkab_lombok_timur') or ($menu=='harmonisasi' AND $sub_menu=='v2' and $sub_menu3=='pemkab_lombok_timur')){echo " class='active'";} ?>
                            <?php if($_SESSION['nama_zona']=='pemkab_lombok_timur'){?> class="" <?php } else if($_SESSION['nama_zona']=='superadmin'){ ?> class=""<?php } else if($_SESSION['nama_zona']=='kasub_perancang') { ?> class="" <?php } else { ?> class="hidden" <?php } ?> >
                            <a href="harmonisasi/v/pemkab_lombok_timur.html">
                                <i class="fa fa-file-text"></i> <span>Pemkab Lombok Timur</span>
                            </a>
                        </li>
                        <li <?php if(($menu=='harmonisasi' AND $sub_menu=='v' and $sub_menu3=='pemkab_lombok_tengah') or ($menu=='harmonisasi' AND $sub_menu=='v2' and $sub_menu3=='pemkab_lombok_tengah')){echo " class='active'";} ?>
                            <?php if($_SESSION['nama_zona']=='pemkab_lombok_tengah'){?> class="" <?php } else if($_SESSION['nama_zona']=='superadmin'){ ?> class=""<?php } else if($_SESSION['nama_zona']=='kasub_perancang') { ?> class="" <?php } else { ?> class="hidden" <?php } ?> >
                            <a href="harmonisasi/v/pemkab_lombok_tengah.html">
                                <i class="fa fa-file-text"></i> <span>Pemkab Lombok Tengah</span>
                            </a>
                        </li>
                        <li <?php if(($menu=='harmonisasi' and $sub_menu=='v' and $sub_menu3=='pemkab_lombok_barat') or ($menu=='harmonisasi' and $sub_menu=='v2' and $sub_menu3=='pemkab_lombok_barat')){echo " class='active'";} ?>
                            <?php if($_SESSION['nama_zona']=='pemkab_lombok_barat'){?> class="" <?php } else if($_SESSION['nama_zona']=='superadmin'){ ?> class=""<?php } else if($_SESSION['nama_zona']=='kasub_perancang') { ?> class="" <?php } else { ?> class="hidden" <?php } ?> >
                            <a href="harmonisasi/v/pemkab_lombok_barat.html">
                                <i class="fa fa-file-text"></i> <span>Pemkab Lombok Barat</span>
                            </a>
                        </li>


                        <li <?php if(($menu=='harmonisasi' AND $sub_menu=='v' and $sub_menu3=='pemkab_dompu') or ($menu=='harmonisasi' AND $sub_menu=='v2' and $sub_menu3=='pemkab_dompu')){echo " class='active'";} ?>
                            <?php if($_SESSION['nama_zona']=='pemkab_dompu'){?> class="" <?php } else if($_SESSION['nama_zona']=='superadmin'){ ?> class=""<?php } else if($_SESSION['nama_zona']=='kasub_perancang') { ?> class="" <?php } else { ?> class="hidden" <?php } ?> >
                            <a href="harmonisasi/v/pemkab_dompu.html">
                                <i class="fa fa-file-text"></i> <span>Pemkab Dompu</span>
                            </a>
                        </li>
                        <li <?php if(($menu=='harmonisasi' AND $sub_menu=='v' and $sub_menu3=='pemkab_bima') or($menu=='harmonisasi' AND $sub_menu=='v2' and $sub_menu3=='pemkab_bima')){echo " class='active'";} ?>
                            <?php if($_SESSION['nama_zona']=='pemkab_bima'){?> class="" <?php } else if($_SESSION['nama_zona']=='superadmin'){ ?> class=""<?php } else if($_SESSION['nama_zona']=='kasub_perancang') { ?> class="" <?php } else { ?> class="hidden" <?php } ?> >
                            <a href="harmonisasi/v/pemkab_bima.html">
                                <i class="fa fa-file-text"></i> <span>Pemkab Bima</span>
                            </a>
                        </li>

                    </ul>
                </li>


                <!--menu untuk pemda-->
                <?php
                $dt_tbl_zona = $this->db->get("tbl_zona");
                ?>
                <li class="has-sub <?php foreach ($dt_tbl_zona->result() as $id=>$val) {
                    if($menu=='pemda' AND $sub_menu=='draft' AND $sub_menu3==$val->nama_zona){
                        echo "active";
                    }
                } ?> <?php if($menu=='harmonisasi' AND $sub_menu='v' and $sub_menu3=='draft_pemda'){
                    echo "active";
                }?> ">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-language bg-gray"></i>
                        <span>Draft Raperdaa</span>
                    </a>
                    <!--ini dia sidebar menu-->
                    <ul class="sub-menu">
                        <!--dihidden, abaikan dari sini-->
                        <li hidden <?php if(($menu=='pemda' and $sub_menu=='v' and $sub_menu3=='draft_pemprov_ntb') or ($menu=='pemda' and $sub_menu=='v2' and $sub_menu3=='draft_pemprov_ntb')){ echo " class='active'"; } ?>>
                            <a href="pemda/v/draft_pemprov_ntb.html">
                                <i class="fa fa-file-text"></i> <span>Draft Pemprov NTB</span>
                            </a>
                        </li>
                        <!--sampai sini-->

                        <?php
                        $dt_tbl_zona = $this->db->get("tbl_zona");
                        foreach ($dt_tbl_zona->result() as $id=>$val){ ?>
                            <li <?php if ($val->nama_zona=="superadmin"){?> hidden <?php } else if($val->nama_zona=="kasub_perancang"){?> hidden <?php } else if($val->nama_zona=="perancang"){ ?> hidden <?php } ?>
                                <?php if(($menu=='pemda' and $sub_menu=='draft' and $sub_menu3==$val->nama_zona) or ($menu=='pemda' and $sub_menu=='draft' and $sub_menu3==$val->nama_zona)){ echo " class='active'"; } ?>
                                <?php if($_SESSION['nama_zona']==$val->nama_zona){?> class="" <?php } else if ($_SESSION['nama_zona']=='superadmin') { ?> class=""<?php } else if($_SESSION['nama_zona']=='kasub_perancang') { ?> class="" <?php } else { ?> class="hidden" <?php } ?> >
                                <a href="pemda/draft/<?= $val->nama_zona; ?>" >
                                    <i class="fa fa-file-text"></i> <span><?= $val->nama_panjang;?></span>
                                </a>

                            </li>
                        <?php }
                        ?>



                    </ul>
                </li>
                <!--dihidden, abaikan dari sini-->
                <li class="hidden has-sub<?php if($menu=='harmonisasi' and $sub_menu=='v' and $sub_menu3=='t'){ echo " active"; } ?>">
                    <a href="harmonisasi/v/t.html">
                        <i class="fa fa-plus-square bg-gray"></i>
                        <span>Tambah Dokumen</span>
                    </a>
                </li>

                <li class="hidden has-sub<?php if($menu=='pemda' and $sub_menu=='v' and $sub_menu3=='t'){ echo " active"; } ?>">
                    <a href="pemda/v/t.html">
                        <i class="fa fa-plus-square bg-gray"></i>
                        <span>Tambah Draft Raperda</span>
                    </a>
                </li>
                <!--sampai sini-->





                <!-- MENU UMUM DARI SINI -->
                <!-- <li class="nav-header"><big ">Menu Navigasi</big></li>
					<li class="has-sub<?php if($menu=='users' AND $sub_menu=='' or $menu=='dashboard'){echo " active";} ?>">
						<a href="dashboard.html">
						    <i class="ion-ios-pulse-strong"></i>
						    <span>Dashboard</span>
					   </a>
					</li> -->
                <!-- MENU UMUM SAMPAI SINI -->

                <!-- MENU SUPER ADMIN -->
                <!-- <?php if ($level=='superadmin'): ?>
						<li class="has-sub <?php if($menu=='pengaduan'){echo " active";} ?>">
							<a href="javascript:;">
								<b class="caret pull-right"></b>
								<i class="fa fa-users bg-gray"></i>
								<span>Masyarakat</span>
							</a>
							<ul class="sub-menu">
								<li <?php if($menu=='pengaduan' AND $sub_menu=='v'){echo " class='active'";} ?>>
									<a href="pengaduan/v.html">
										<i class="fa fa-comments"></i> <span>Pengaduan Masyarakat</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="has-sub <?php if($menu=='obh' OR ($menu=='laporan' AND $sub_menu=='v') OR $menu=='tambahobh' OR ($menu=='laporan_semester' AND $sub_menu=='v')){echo " active";} ?>">
							<a href="javascript:;">
								<b class="caret pull-right"></b>
								<i class="fa fa-user bg-gray"></i>
								<span>OBH</span>
							</a>
							<ul class="sub-menu">
								<li <?php if($menu=='obh'){echo " class='active'";} ?>>
									<a href="obh/v.html">
										<i class="fa fa-user-circle"></i> <span>Data OBH</span>
									</a>
								</li>
								<li <?php if($menu=='tambahobh'){echo " class='active'";} ?>>
									<a href="tambahobh/v.html">
										<i class="fa fa-user-plus"></i> <span>Registrasi OBH</span>
									</a>
								</li>
								<li <?php if($menu=='laporan' AND $sub_menu=='v'){echo " class='active'";} ?>>
									<a href="laporan/v.html">
										<i class="fa fa-file-text"></i> <span>Laporan Kegiatan OBH</span>
									</a>
								</li>
								<li <?php if($menu=='laporan_semester' AND $sub_menu=='v'){echo " class='active'";} ?>>
									<a href="laporan_semester/v.html">
										<i class="fa fa-calendar-check-o"></i> <span>Laporan Semester OBH</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="has-sub <?php if($menu=='file_manager'){echo " active";} ?>">
							<a href="javascript:;">
								<b class="caret pull-right"></b>
								<i class="fa fa-newspaper-o bg-gray"></i>
								<span>Info Publik</span>
							</a>
							<ul class="sub-menu">
								<li <?php if($menu=='file_manager'){echo " class='active'";} ?>>
									<a href="file_manager/v.html">
										<i class="fa fa-folder-open"></i> <span>File Manager</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="has-sub <?php if($menu=='kategori_lap'){echo " active";} ?>">
							<a href="javascript:;">
								<b class="caret pull-right"></b>
								<i class="fa fa-cogs bg-gray"></i>
								<span>Kategori Laporan</span>
							</a>
							<ul class="sub-menu">
								<li<?php if($menu=='kategori_lap' AND $sub_menu='v'){echo " class='active'";} ?>><a href="kategori_lap/v.html">Kategori Laporan</a></li>
								<li<?php if($menu=='kategori_lap' AND $sub_menu='sub'){echo " class='active'";} ?>><a href="kategori_lap/sub.html">Sub Kategori</a></li>
							</ul>
						</li>
					<?php endif; ?> -->
                <!-- akhir sesi super admin -->

                <!-- MENU OBH -->
                <!-- <?php if ($level=='obh'): ?>
						<li <?php if($menu=='laporan' AND $sub_menu=='v'){echo " class='active'";} ?>>
							<a href="laporan/v.html">
								<div class="icon-img"><i class="fa fa-file-text"></i></div>
							  <span>Laporan Kegiatan</span>
							</a>
						</li>
						<li <?php if($menu=='laporan_semester' AND $sub_menu=='v'){echo " class='active'";} ?>>
							<a href="laporan_semester/v.html">
								<div class="icon-img"><i class="fa fa-calendar-check-o"></i></div>
							  <span>Laporan Semester</span>
							</a>
						</li>
						<li <?php if($menu=='permohonan_bankum' AND $sub_menu=='v'){echo " class='active'";} ?>>
							<a href="permohonan_bankum/v.html">
								<div class="icon-img"><i class="fa fa-envelope"></i></div>
							  <span>Permohonan Bantuan</span>
							</a>
						</li>
					<?php endif; ?> -->

                <!-- AKHIR MENU NOTARIS-->
                <li class="nav-header"></li>
                <li>
                    <a href="web/logout.html">
                        <div class="icon-img">
                            <i class="fa fa-sign-out bg-red"></i>
                        </div>
                        <span>Logout</span>
                    </a>
                </li>
                <!-- begin sidebar minify button -->
                <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ion-ios-arrow-left"></i> <span></span></a></li>
                <!-- end sidebar minify button -->
            </ul>
            <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->
