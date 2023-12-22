<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
	    //echo "szz" ; die;
		$ceks = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
            $tbl_zona = $this->db->get_where('tbl_zona',array('id_zona'=>$_SESSION['id_zona']));
            $tbl_user = $this->db->get_where('tbl_user',array('id_zona'=>$_SESSION['id_zona']));

            /*cara get semua record database pada tbl_zona*/
            $data_zonaAll = $this->db->get("tbl_zona")->result();

            //$pemda_id
            $data_harmonisasi = $this->db->get("tbl_berita")->result();

            //echo '<pre>'; print_r($tbl_user->result()[0]);die;
            //echo '<pre>'; print_r($data_harmonisasi);die;
           // echo '<pre>'; print_r($data_zonaAll);die;


            $array_daerah = array();
            $counter = 0;
            $total = 0;
            $total_dokumen = 0;
            foreach ($data_zonaAll as $key=>$val){
                if($val->nama_zona!="kasub_perancang" && $val->nama_zona!="superadmin" && $val->nama_zona!="perancang") {

//                    $tbl_berita_by_zona_old = $this->db->get_where('tbl_berita',array(
//                        'zona_dokumen'=>$val->nama_zona
//                    ));

                    $tbl_berita_by_zona = $this->db->query("select * from tbl_berita 
where left(tgl_input,4)=".$this->session->userdata('tahun')." 
and zona_dokumen='$val->nama_zona' order by id_berita DESC");

//                    $tbl_berita_by_zona_selesai_only_old = $this->db->get_where('tbl_berita',array(
//                        'zona_dokumen'=>$val->nama_zona,
//                        'status'=>"selesai"
//                    ));

                    $selesai = "selesai";
                    $tbl_berita_by_zona_selesai_only = $this->db->query("select * from tbl_berita 
where left(tgl_input,4)=".$this->session->userdata('tahun')." 
and zona_dokumen='$val->nama_zona' and status='$selesai'  order by id_berita DESC");


//                    $tbl_berita_by_zona_belum_selesai_only_old = $this->db->get_where('tbl_berita',array(
//                        'zona_dokumen'=>$val->nama_zona,
//                        'status !='=>"selesai"
//                    ));


                    $tbl_berita_by_zona_belum_selesai_only = $this->db->query("select * from tbl_berita 
where left(tgl_input,4)=".$this->session->userdata('tahun')." 
and zona_dokumen='$val->nama_zona' and status <>'$selesai'  order by id_berita DESC");
                   //echo $val->nama_zona." : ".$tbl_berita_by_zona->num_rows()."<br>";

                    $zona_id[$counter] = $tbl_berita_by_zona->num_rows();
                    $selesai_only[$counter] = $tbl_berita_by_zona_selesai_only->num_rows();
                    $belum_selesai_only[$counter] = $tbl_berita_by_zona_belum_selesai_only->num_rows();
                    //$zona_id_pemda[$val->id_zona] = $tbl_berita_by_zona->num_rows();
                    $pemda_id[$counter] = $val->id_zona;
                    $nama_zona[$counter] = $val->nama_panjang;


                    $total += $tbl_berita_by_zona->num_rows();
                    $total_dokumen += $tbl_berita_by_zona->num_rows();

                    $counter++;

                    array_push($array_daerah, (object)[
                        "id_zona" => $val->id_zona,
                        "nama_zona" => $val->nama_zona,
                        "nama_panjang" => $val->nama_panjang,
                        "status" => $val->status,
                        "jumlah_dokumen_harmonisasi" => $tbl_berita_by_zona->num_rows(),
                    ]);
                }
                //echo '<pre>'; print_r($data_zonaAll[$key]->nama_zona);
                //echo $val->nama_zona."<br>";

            }
            //echo $total_dokumen; die;

           // echo "<pre>"; print_r($tbl_berita_by_zona->result()); die;

           //echo "<pre>";  print_r($nama_zona); die;
            //echo "<pre>"; print_r($zona_id);

            //echo $total; die;
            //die;

            $data['realisasi_harmonisasi_total'] = $zona_id;
            $data['selesai_only'] = $selesai_only;
            $data['belum_selesai_only'] = $belum_selesai_only;
            //echo "<pre>"; print_r($zona_id); die;
            //echo "<pre>"; print_r($selesai_only); die;
            //echo "<pre>"; print_r($belum_selesai_only); die;
            $data['pemda_id'] = $pemda_id;
            $data['total'] = $total;
            //echo "<pre>"; print_r($zona_id); die;


            $data['user']   	 = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  	 = $this->Mcrud->get_users();
			$data['nama_panjang_admin']  	 = $tbl_zona->row()->nama_panjang;
			$data['nama_lengkap']  	 = $tbl_user->row()->nama_lengkap;
			$data['zona_pemda']  	 = $tbl_zona->row()->nama_zona;

            $data['zona_daerah_list'] = $data_zonaAll;
            $data['zona_daerah_list_ii'] = $nama_zona;
            $data['array_daerah'] = $array_daerah;

            //echo "<pre>"; print_r($array_daerah); die;


            //echo "<pre>"; print_r($data_zonaAll); die;



//			foreach ($tbl_user->result() as $idx=>$val){
//			    if ($_SESSION['username']==$tbl_zona->row()->nama_zona){
//
//                }
//            }

			$data['judul_web'] = "Dashboard";

			$this->load->view('users/header', $data);
			$this->load->view('users/dashboard', $data);
			$this->load->view('users/footer');
		}
	}

	//lanjutkan utk beri parameter aksi dan id pada function profile ini, yg dipanggil melalui header (dlm folder user)
	public function profile($aksi='', $id='')
	{
	    //echo hashids_decrypt($id);die;
	    //echo $id;die;
	    //echo $aksi."<br>";
	    //echo $id; die;
	    //echo $_SESSION['id_user'];die;
		$ceks = $this->session->userdata('username');
		$id_user = $this->session->userdata('id_user');
		$level = $this->session->userdata('level');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
		    if ($aksi=="se"){
		        //echo "simpan edit";die;
                $input_old_password  = htmlentities(strip_tags($this->input->post('old_password')));
                $new_password_1 	 = htmlentities(strip_tags($this->input->post('new_password_1')));
                $new_password_2 	 = htmlentities(strip_tags($this->input->post('new_password_2')));
                //ini juga kunci kesuksesan get data dari database
                //$data_lama = $this->db->get_where("tbl_user", array('id_user'=>$_SESSION['id_user']))->row();
                $data_lama = $this->db->get_where("tbl_user", array('id_user'=>$_SESSION['id_user']));
                $data_password_lama = $data_lama->result()[0]->password;

                //echo $old_password."<br>".$new_password_1."<br>".$new_password_2; die;

                $id_user = $_SESSION['id_user'];
                $nama_lengkap = $data_lama->result()[0]->nama_lengkap;
                $username = $data_lama->result()[0]->username;
                $password = $data_lama->result()[0]->password;
                $level = $data_lama->result()[0]->level;
                $id_zona = $data_lama->result()[0]->id_zona;

                $pesan = "Data Belum Berhasil Disimpan!";

                //echo $data_password_lama."<br>".$input_old_password;die;

                if($data_password_lama==crypt($input_old_password,'salt-coba')){
                    //echo "inputan pass old oleh user SAMA DENGAN old pass di DB";die;
                    if($new_password_1=='' && $new_password_2==''){
                        //echo "pass 1 dan 2 tidak di isi"; die;
                        $simpan = "y";
                        $password_to_save = $data_lama->result()[0]->password;
                    } else if($new_password_1 !='' || $new_password_2 !='') {

                        if($new_password_1 == $new_password_2){
                            //echo "password 1 dan 2 sama";die;
                            $simpan = "y";
                            $password_to_save = $new_password_1;
                        } else if ($new_password_1!=$new_password_2){
                            //echo "password 1 dan 2 tidak sama";die;
                            $simpan = "n";
                            $password_to_save = $data_lama->result()[0]->password;
                        }
                    }

                    if($simpan=="y"){
                        $data = array(
                            'id_user'=>$id_user,
                            'nama_lengkap'=>$nama_lengkap,
                            'username'=>$username,
                            'password'=>crypt($password_to_save, "salt-coba"),
                            'level'=>$level,
                            'id_zona'=>$id_zona,
                            'tgl_update'=>date('Y-m-d H:i:s'),
                        );
                        $this->db->update("tbl_user",$data,array(
                            'id_user'=>$id_user,
                        ));

                        $this->session->set_flashdata('msg',
                            '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;</span>
								 </button>
								 <strong>Sukses5 brohs!</strong> Berhasil disimpan.
							</div>
						  <br>'
                        );

                    } else if($simpan=="n"){
                        $this->session->set_flashdata('msg',
                            '
											<div class="alert alert-warning alert-dismissible" role="alert">
												 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													 <span aria-hidden="true">&times;</span>
												 </button>
												 <strong>Gagal!</strong> '.$pesan.'.
											</div>
										 <br>'
                        );

                    }
                } else {
                    //echo "inputan pass old oleh user TIDAK SAMA DENGAN old pass di DB";die;
                    $this->session->set_flashdata('msg',
                        '
											<div class="alert alert-warning alert-dismissible" role="alert">
												 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													 <span aria-hidden="true">&times;</span>
												 </button>
												 <strong>Gagal!</strong> '.$pesan.'.
											</div>
										 <br>'
                    );

                }
                redirect("users/profile/e/".$id);
            }
			$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
			$data['level_users']  = $this->Mcrud->get_level_users();
			$get_password = $this->db->get_where("tbl_user",array('id_user'=>$_SESSION['id_user']));
			//ini adalah kunci kesuksesan mendapat data dari database
            //echo $get_password->result()[0]->password; die;

            //$data['password_lama'] = $get_password->result()[0]->password;
			$data['judul_web'] 		= "Ganti Password Pengguna";

			$this->load->view('users/header', $data);
			$this->load->view('users/profile', $data);
			$this->load->view('users/footer');
		}
	}

    public function update_pass()
    {
        //echo "update pass route tes"; die;
        //echo $_SESSION['id_user'];die;
        $ceks = $this->session->userdata('username');
        $id_user = $this->session->userdata('id_user');
        $level = $this->session->userdata('level');
        if(!isset($ceks)) {
            redirect('web/login');
        }else{
            $new_password_1 	 = htmlentities(strip_tags($this->input->post('new_password_1')));
            $new_password_2 	 = htmlentities(strip_tags($this->input->post('new_password_2')));
            //ini juga kunci kesuksesan get data dari database
            //$data_lama = $this->db->get_where("tbl_user", array('id_user'=>$_SESSION['id_user']))->row();
            $data_lama = $this->db->get_where("tbl_user", array('id_user'=>$_SESSION['id_user']));
            //echo $data_lama->password; die;
            //echo $new_password_1."<br>".$new_password_2; die;
            //echo $new_password_1."<br>".$new_password_2; die;

            //echo $data_lama->num_rows();die;
            //echo $data_lama->result()[0]->password;die;

            $id_user = $_SESSION['id_user'];
            $nama_lengkap = $data_lama->result()[0]->nama_lengkap;
            $username = $data_lama->result()[0]->username;
            $password = $data_lama->result()[0]->password;
            $level = $data_lama->result()[0]->level;
            $id_zona = $data_lama->result()[0]->id_zona;

            $pesan = "Data Belum Berhasil Disimpan!";
            if($new_password_1=='' && $new_password_2==''){
                //echo "pass 1 dan 2 tidak di isi"; die;
                $simpan = "y";
                $password = $data_lama->result()[0]->password;
            } else if($new_password_1 !='' || $new_password_2 !='') {
                //echo "salah 1 pass 1 dan 2 telah di isi"; die;
                if($new_password_1==$new_password_2){
                    //echo "password 1 dan 2 sama";die;
                    $simpan = "y";
                    $password = $new_password_1;
                } else if ($new_password_1!=$new_password_2){
                    //echo "password 1 dan 2 tidak sama";die;
                    $simpan = "n";
                    $password = $data_lama->result()[0]->password;
                }
            }

            if($simpan=="y"){
                $data = array(
                    'id_user'=>$id_user,
                    'nama_lengkap'=>$nama_lengkap,
                    'username'=>$username,
                    'password'=>$password,
                    'level'=>$level,
                    'id_zona'=>$id_zona,
                );
                $this->db->update("tbl_user",$data,array(
                    'id_user'=>$id_user,
                ));

                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;</span>
								 </button>
								 <strong>Sukses5 broh!</strong> Berhasil disimpan.
							</div>
						  <br>'
                );

            } else if($simpan=="n"){
                $this->session->set_flashdata('msg',
                    '
											<div class="alert alert-warning alert-dismissible" role="alert">
												 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													 <span aria-hidden="true">&times;</span>
												 </button>
												 <strong>Gagal!</strong> '.$pesan.'.
											</div>
										 <br>'
                );
            }

            $data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
            $data['level_users']  = $this->Mcrud->get_level_users();
            $get_password = $this->db->get_where("tbl_user",array(
                'id_user'=>$_SESSION['id_user'],
            ));
            //ini adalah kunci kesuksesan mendapat data dari database
            //echo $get_password->result()[0]->password; die;

            $data['password_lama'] = $get_password->result()[0]->password;
            $data['judul_web'] 	    = "Profile";

            $this->load->view('users/header', $data);
            $this->load->view('users/profile', $data);
            $this->load->view('users/footer');
        }
    }

}
