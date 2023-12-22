<?php
$cek = $user->row();
$nama = $cek->nama_lengkap;
$username = $cek->username;

$level = $cek->level;
$foto = "img/user/user-default.jpg";

$menu = strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
$sub_menu3 = strtolower($this->uri->segment(3));
?>

<?php
$link1 = strtolower($this->uri->segment(1));
$link2 = strtolower($this->uri->segment(2));
$link3 = strtolower($this->uri->segment(3));
$link4 = strtolower($this->uri->segment(4));
$link5 = strtolower($this->uri->segment(5));

?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="dashboard.html">Dashboard</a></li>
        <li class="active"><?php echo $judul_web; ?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">
        <small><?php echo $judul_web; ?></small>
    </h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <?php
            echo $this->session->flashdata('msg');
            $level = $this->session->userdata('level');
            $link3 = strtolower($this->uri->segment(3));
            ?>
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-click="panel-expand"><i
                                    class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-click="panel-reload"><i
                                    class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-click="panel-collapse"><i
                                    class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-click="panel-remove"><i
                                    class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Hasil Harmonisasi <?= $cek_nama_panjang_zona->row()->nama_panjang?></h4>
                </div>
                <div class="panel-body">
                    <!--cara hidden akses tambah hasil harmonisasi bagi pemda-->
                    <?php if ($_SESSION['level'] != "perancang" && $_SESSION['level'] != "pemda") { ?>

                            <a href="<?php echo $link1; ?>/<?php echo $link2; ?>/zona/t.html"
                                <?php if ($_SESSION['nama_zona'] == 'superadmin') { ?>
                                    class="hidden btn btn-primary"
                                <?php } else if ($_SESSION['nama_zona'] == 'kasub_perancang') { ?>
                                    class="hidden btn btn-primary"
                                <?php } else { ?>
                                    class="hidden btn btn-primary"
                                <?php } ?> >
                                <i class="fa fa-plus-circle"> Tambah Dokumen</i>

                            </a>




                    <?php } ?>
                    <?php if ($_SESSION['level']!="perancang"){ ?>

                        <a  href="<?php echo $link1; ?>/<?php echo $link2; ?>/<?= $cek_nama_panjang_zona->row()->nama_zona ?>/t.html"
                            class="btn btn-primary"><i
                                    class="fa fa-plus-circle"></i> Tambah Dokumen Hasil  </a>


                    <?php } ?>


                    <hr>
                    <div class="row">
                        <div class="col-md-12"><b>Filter </b></div>
                        <div class="col-md-3">
                            <!--                            'belum_diproses','perbaikan','draft_sedang_dibuat','menunggu_koreksi','selesai'-->
                            <!--'belum_diproses','perbaikan','draft_sedang_dibuat','menunggu_koreksi','selesai'-->
                            <select class="form-control default-select2" id="stt"
                                    onchange="window.location.href='hasilharmonisasi/hasil/<?= $cek_nama_pendek_zona; ?>/id/'+this.value;">
                                <option value="semua" <?php if ('semua' == $link5) { ?> selected <?php } ?> >- Semua -
                                </option>
                                <option value="belum_diproses" <?php if ('belum_diproses' == $link5) {
                                    echo "selected";
                                } ?> >Belum diproses
                                </option>
                                <option value="sedang_diproses" <?php if ('sedang_diproses' == $link5) {
                                    echo "selected";
                                } ?> >Sedang Diproses
                                </option>

                                <option value="selesai" <?php if ('selesai' == $link5) {
                                    echo "selected";
                                } ?> >Selesai
                                </option>
                            </select>
                        </div>
                        <div class="col-md-1 hidden">
                            <button class="btn btn-default"
                                    onclick="window.location.href='harmonisasi/v2/pemprov_ntb/id/'+$('#stt').val();"><i
                                        class="fa fa-search"></i> Filter
                            </button>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-2">
                            <?php if ($level == 'pelaksana'): ?>
                                <a href="<?php echo strtolower($this->uri->segment(1)); ?>/<?php echo strtolower($this->uri->segment(2)); ?>/t.html"
                                   class="btn btn-primary" style="float:right;">Tambah Bahan Berita</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th width="25%">Judul</th>
                                <th>Status</th>
                                <th>Tgl Upload</th>
                                <th>Nama Perancang</th>
                                <th>Status Draft</th>
                                <th>Jenis</th>
                                <th width="15%" style="text-align: center">Aksi</th>
                                <!--                                <th width="" style="text-align: center">Hapus</th>-->
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $no = 1;
                            foreach ($query->result() as $baris):?>

                                <tr>
                                    <td><b><?php echo $no++; ?>.</b></td>
                                    <td><?php echo $baris->nama_kegiatan; ?></td>
                                    <td><?php echo $this->Mcrud->cek_status_berita($baris->status); ?></td>

                                    <!--disini melakukan explode untuk tanggal saja tanpa bawa timestamp-->
                                    <?php
                                    $explode_all = explode(' ', $this->Mcrud->tgl_id($baris->tgl_input));
                                    $explode_date_only = explode('-', $explode_all[0]);

                                    $tgl_indonesia = $explode_date_only[2] . "-" . $explode_date_only[1] . "-" . $explode_date_only[0];
                                    ?>
                                    <td><?php echo $tgl_indonesia; ?></td>

                                    <?php
                                    $nama_perancang_old = $this->db->get_where("tbl_draft",array("id_draft_permohonan"=>$baris->id_draft))->row()->nama_perancang;


                                    $nama_perancang = $this->db->get_where("tbl_user",array("id_user"=>$baris->id_perancang))->row()->nama_lengkap;
                                    ?>
                                    <td>
                                        <?php
                                        if($nama_perancang!=""){
                                            ?>
                                            <label for="label" class="label" style="background-color: purple">
                                                <?php echo $nama_perancang;?>
                                            </label>
                                            <?php
                                        } else if($nama_perancang==""){
                                            ?>
                                            <label for="label" class="label" style="background-color: red">
                                                Belum Ada Perancang
                                            </label>
                                            <?php
                                        }

                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        if($baris->id_draft!=0){
                                            ?>
                                            <label for="label" class="label" style="background-color: dodgerblue">
                                                Melalui Pengajuan Draft
                                            </label>
                                            <?php
                                        } else if($baris->id_draft==0 or $baris->id_draft=="" or $baris->id_draft==null){
                                            ?>
                                            <label for="label" class="label" style="background-color: #ff92c3">
                                                Upload Hasil Langsung
                                            </label>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $baris->jenis_dokumen; ?></td>

                                    <td align="center">
                                        <?php if ($baris->lamp_surat_undangan == "") { ?>
                                            <!--Cara disabled on click pada a href-->
                                            <a href="javascript:void(0)"
                                                <?php if ($baris->lamp_surat_undangan == "") { ?>
                                                    class="btn btn-info btn-xs" disabled <?php } else { ?> class="btn btn-info btn-xs"<?php } ?>
                                               title="Hasil Harmonisasi Belum Ada"
                                               download="">

                                                <i class="fa fa-download"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url($baris->lamp_surat_undangan); ?>"
                                                <?php if ($baris->lamp_surat_undangan == "") { ?>
                                                    class="btn btn-info btn-xs hidden" <?php } else { ?> class="btn btn-info btn-xs "<?php } ?>
                                               title="Download Hasil Harmonisasi"
                                               download="">

                                                <i class="fa fa-download"></i>
                                            </a>
                                        <?php } ?>

                                        <?php if ($_SESSION['level'] != "perancang" && $_SESSION['level'] != "pemda") { ?>
                                            <a href="<?php echo $link1; ?>/hasil/<?php echo hashids_encrypt($baris->id_berita); ?>/h/<?= $cek_nama_pendek_zona?>"
                                                <?php if ($_SESSION['nama_zona'] == 'superadmin') { ?>
                                                    class="btn btn-danger btn-xs"
                                                <?php } else if ($_SESSION['nama_zona'] == 'kasub_perancang') { ?>
                                                    class="btn btn-danger btn-xs"
                                                <?php } else { ?>
                                                    class="hidden btn btn-danger btn-xs"
                                                <?php } ?>

                                               title="Hapus Dokumen" onclick="return confirm('Anda yakin akan menghapus data?');">
                                                <i class="fa fa-trash-o"></i>
                                            </a>

                                            <a href="<?php echo $link1; ?>/hasil/<?php echo hashids_encrypt($baris->id_berita); ?>/e/<?= $cek_nama_pendek_zona?>"
                                                <?php if ($_SESSION['nama_zona'] == 'superadmin') { ?>
                                                    class="btn btn-success btn-xs"
                                                <?php } else if ($_SESSION['nama_zona'] == 'kasub_perancang') { ?>
                                                    class="btn btn-success btn-xs"
                                                <?php } else { ?>
                                                    class="hidden btn btn-success btn-xs"
                                                <?php } ?>
                                               title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        <?php } ?>
                                        <a
                                                href=""
                                                class="btn btn-info btn-xs"
                                                data-toggle="modal" title="Lihat Detail"
                                                data-target="#detail_hasil_harmonisasi<?php echo hashids_encrypt($baris->id_berita); ?>">
                                            <i class="fa fa-info-circle"></i>
                                        </a>


                                    </td>


                                    <!--                                    <td style="text-align: center">-->
                                    <!--                                        <a href="-->
                                    <?php //echo base_url($baris->lamp_surat_undangan);
                                    ?><!--"-->
                                    <!--                                           class="btn btn-info btn-xs" title="Detail"-->
                                    <!--                                           download="">-->
                                    <!---->
                                    <!--                                            <i class="fa fa-download"></i>-->
                                    <!--                                        </a>-->
                                    <!--                                    </td>-->


                                </tr>


                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->

<?php
//$this->load->view('users/berita/modal_konfirm');
?>
<!--berhasil load view-->
<?php
$this->load->view('users/harmonisasi/modaldialog/detail_hasil_harmonisasi');
?>



