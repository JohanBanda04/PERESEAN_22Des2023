<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller
{

    public function index()
    {
        redirect('dashboard');
    }

    public function login()
    {
        $ceks = $this->session->userdata('username');
        if (isset($ceks)) {
            // $this->load->view('404_content');
            redirect('dashboard');
        } else {
            $data['judul_web'] = "Halaman Login - " . $this->Mcrud->judul_web();
            $this->load->view('web/log/header', $data);
            $this->load->view('web/log/login', $data);
            $this->load->view('web/log/footer', $data);

            if (isset($_POST['btnlogin'])) {
                //echo "cobayo";die;
                //var response
                $username = htmlentities(strip_tags($_POST['username']));
                $pass = htmlentities(strip_tags($_POST['password']));
                $tahun = htmlentities(strip_tags($_POST['tahun']));



                //echo $username."<br>";
                //echo $pass."<br>"; die;

                $query = $this->Mcrud->get_users_by_un($username);
                $cek = $query->result();
                $cekun = $cek[0]->username;
                $nama_lengkap = $cek[0]->nama_lengkap;
                $jumlah = $query->num_rows();

                if ($jumlah == 0) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
							  </button>
							  <strong>Username "' . $username . '"</strong> belum terdaftar.
						</div>'
                    );
                    redirect('web/login');
                } else {
                    $row = $query->row();
                    $cekpass = $row->password;
                    /*cuky*/
                    $user_pass_crypted = crypt($pass, "salt-coba");
                    if ($cekpass <> $user_pass_crypted) {
                        $this->session->set_flashdata('msg',
                            '<div class="alert alert-warning alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<strong>Username atau Password Salah!</strong>.
							</div>'
                        );

                        redirect('web/login');
                    } else if ($user_pass_crypted == $cekpass) {
                        $tbl_zona = $this->db->get_where("tbl_zona", array('id_zona' => $row->id_zona))->row();

                        $this->session->set_userdata('username', "$cekun");
                        $this->session->set_userdata('nama_lengkap', "$nama_lengkap");
                        $this->session->set_userdata('id_user', "$row->id_user");
                        $this->session->set_userdata('level', "$row->level");
                        $this->session->set_userdata('nid_zona', "$row->id_zona");
                        $this->session->set_userdata('nama_zona', $tbl_zona->nama_zona);
                        $this->session->set_userdata('jml_notif_bell', "0");
                        $this->session->set_userdata('tahun', $tahun);

                        $this->session->set_flashdata('msg',
                            '
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong>Sukses! </strong>  '.$nama_lengkap.' , Anda Berhasil Login.
					</div>
				<br>'
                        );

                        redirect('dashboard');
                    }
                }
            }
        }
    }


    public function logout()
    {
        if ($this->session->has_userdata('username') and $this->session->has_userdata('id_user')) {
            $this->session->sess_destroy();
        }

        redirect('web/login');
    }

    function error_not_found()
    {
        $this->load->view('404_content');
    }

    public function notif_bell($aksi = '')
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_user = $this->session->userdata('id_user');
        $level = $this->session->userdata('level');

        $this->db->order_by('id_notif', 'DESC');
        $data['query'] = $this->db->get_where('tbl_notif', array('penerima' => $id_user));
        $jml_notif_baru = 0;
        foreach ($data['query']->result() as $key => $value) {
            if (!preg_match("/$id_user/i", $value->hapus_notif)) {
                $jml_notif_baru++;
            }
        }

        foreach ($data['query']->result() as $key => $value) {
            if ((preg_match("/$id_user/i", $value->baca_notif)) && (!preg_match("/$id_user/i", $value->hapus_notif))) {
                $jml_notif_baru--;
            }
        }

        $data['jml_notif'] = $jml_notif_baru;
        if ($aksi == 'pesan_baru') {
            $jml_notif_bell = $this->session->userdata('jml_notif_bell');
            if ($jml_notif_bell >= $jml_notif_baru) {
                $stt = '0';
            } else {
                $stt = '1';
            }
            $this->session->set_userdata('jml_notif_bell', "$jml_notif_baru");
            if ($id_user == '') {
                echo '11';
            } else {
                echo $stt;
            }
        } elseif ($aksi == 'jml') {
            echo number_format($jml_notif_baru, 0, ",", ".");
        } else {
            $this->load->view('users/notif/bell', $data);
        }
    }

    public function notif($aksi = '', $id = '')
    {
        $id = hashids_decrypt($id);
        $ceks = $this->session->userdata('username');
        $id_user = $this->session->userdata('id_user');
        if (!isset($ceks)) {
            redirect('web/login');
        } else {
            $data['user'] = $this->Mcrud->get_users_by_un($ceks);
            $data['users'] = $this->Mcrud->get_users();
            $data['judul_web'] = "Notifikasi";

            $this->db->order_by('id_notif', 'DESC');
            $data['query'] = $this->db->get_where('tbl_notif', array('penerima' => $id_user));

            if ($aksi == 'h' or $aksi == 'h_all') {
                if ($aksi == 'h') {
                    $cek_data = $this->db->get_where("tbl_notif", array('id_notif' => "$id"));
                } else {
                    $cek_data = $this->db->get_where("tbl_notif", array('penerima' => "$id_user"));
                }
                if ($cek_data->num_rows() != 0) {
                    if ($aksi == 'h') {
                        $h_notif = $cek_data->row()->hapus_notif;
                        if (!preg_match("/$id_user/i", $h_notif)) {
                            $data = array('hapus_notif' => "$id_user, $h_notif");
                            $this->db->update('tbl_notif', $data, array('id_notif' => $id));
                        }
                    } else {
                        foreach ($cek_data->result() as $key => $value) {
                            $h_notif = $value->hapus_notif;
                            if (!preg_match("/$id_user/i", $h_notif)) {
                                $data = array('hapus_notif' => "$id_user, $h_notif");
                                $this->db->update('tbl_notif', $data, array('penerima' => $id_user));
                            }
                        }
                    }
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-success alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							 </button>
							 <strong>Sukses!</strong> Berhasil dihapus.
						</div>
						<br>'
                    );
                    redirect("web/notif");
                } else {
                    if ($aksi == 'h') {
                        redirect('404_content');
                    } else {
                        redirect("web/notif");
                    }
                }
            }

            $this->load->view('users/header', $data);
            $this->load->view('users/notif/index', $data);
            $this->load->view('users/footer');
        }
    }

}
