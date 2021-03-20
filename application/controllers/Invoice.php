<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
            return redirect(base_url('auth/'));
        }
	}

	public function add($id)
	{
		$data["title"] = "Invoice";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["pelanggan"] = $this->m_pelanggan->getPelangganById($id)->row();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();		
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
			$jInvoice = $this->m_invoice->getInvoiceByIdKaryawanAndPeriode($this->session->userdata('id_karyawan'))->result();
	        $add = count($jInvoice) + 1;
	        $division = $add / 100;
	        $data["jumlahInvoice"] = str_replace('.', '', $division);
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_add_invoice', $data);
		$this->load->view('template/footer', $data);		
	}

	public function add_action($id)
	{
		$this->form_validation->set_rules('invoice2', 'No. Invoice', 'trim|required|exact_length[2]',
			['required' => 'Nomor Invoice bagian tengah tidak boleh ada yang kosong.',
			 'exact_length' => 'Format untuk nomor invoice bagian tengah hanya dua angka.']);
		$this->form_validation->set_rules('invoice3', 'No. Invoice', 'trim|required|exact_length[3]',
			['required' => 'Nomor Invoice bagian akhir tidak boleh ada yang kosong.',
			 'exact_length' => 'Format untuk nomor invoice bagian akhir hanya tiga angka.']);
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required',
			['required' => 'Tanggal tidak boleh kosong.']);
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|exact_length[4]',
			['required' => 'Tahun tidak boleh kosong.',
			 'exact_length' => 'Tahun tidak boleh kurang atau lebih dari empat angka.']);
		$this->form_validation->set_rules('tagihan', 'Tagihan', 'trim|required',
			['required' => 'Tagihan tidak boleh kosong.']);		
		$this->form_validation->set_rules('bulan[]', 'Bulan', 'trim|required',
			['required' => 'Silahkan pilih satu atau beberapa bulan.']);		
		if ($this->form_validation->run() == FALSE) {
			$this->add($id);
		} else {
			$invoice1 = "M2N-GTO.".date('Y').".INV.";
			$invoice2 = $this->input->post("invoice2");
			$invoice3 = $this->input->post("invoice3");
			$id = $this->uri->segment(3);
			$nama = $this->input->post("namaPL");
			$alamat = $this->input->post("alamatPL");
			$tanggal = $this->input->post("tanggal");
			$thn = $this->input->post("tahun");
			$iuranOld = $this->input->post("iuranOld");
			// $tagihanOld = str_replace("Rp. ","",$this->input->post('tagihan'));
			$tagihan2 = str_replace(".","",$this->input->post('tagihan'));			
			$terbilang = $this->numbertotext->terbilang($tagihan2);
			$bu[] = $this->input->post("bulan");		
			$status = $this->input->post("radioPL");

			$date = date('n');
			if ($date == 1) {
				$date = 'Januari';
			} else if ($date == 2) {
				$date = 'Februari';
			} else if ($date == 3) {
				$date = 'Maret';
			} else if ($date == 4) {
				$date = 'April';
			} else if ($date == 5) {
				$date = 'Mei';
			} else if ($date == 6) {
				$date = 'Juni';
			} else if ($date == 7) {
				$date = 'Juli';
			} else if ($date == 8) {
				$date = 'Agustus';
			} else if ($date == 9) {
				$date = 'September';
			} else if ($date == 10) {
				$date = 'Oktober';
			} else if ($date == 11) {
				$date = 'November';
			} else if ($date == 12) {
				$date = 'Desember';
			}
			
			for ($i=0; $i < count($bu[0]); $i++) { 
				$getByBulanTahun = $this->m_invoice->getByPlDanBulanDanTahun($id,$bu[0][$i],$thn)->row();				
				if ($getByBulanTahun) {
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-warning callout-border-left mt-1 p-1">
			            <strong>Warning!</strong>
			            <p>Invoice bulan '.$bu[0][$i].' tahun '.$thn.' sudah pernah dibuat oleh '.$getByBulanTahun->nama_user.'</p>
			        </div>');       
					redirect('pelanggan');
				}else{
					$data["inv"] = array(
					'kode' => $invoice1.$invoice2."-".$invoice3,
					'nama' => $nama,
					'alamat' => $alamat,
					'tagih' => $tagihan2,
					'tanggal' => $tanggal,
					'bilang' => $terbilang,
					'periode' => $bu,
					'status' => $status
					);
					$data["setting"] = $this->db->get_where('t_pengaturan',["id_pengaturan" => '1'])->row();
					$data["user"] = $this->db->get_where('karyawan', ['id_user' => $this->session->userdata("id_user")])->row();
					$data["titleInvoice"] = $invoice1.$invoice2."-".$invoice3."_".$bu[0][$i]."_".$thn;
					$dompdf = new Dompdf();
					$html = $this->load->view('invoice', $data, TRUE);
					$dompdf->loadHtml($html);

					// (Optional) Setup the paper size and orientation
					$dompdf->setPaper('A4', 'portrait');

					// Render the HTML as PDF
					$dompdf->render();
					// $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
					// die;
					// $pdfroot  = dirname(dirname(__FILE__))."/assets";
					$pdfroot  = $_SERVER['DOCUMENT_ROOT'].'molindo/assets/pdf';
		        	$pdfroot .= '/'.$invoice1.$invoice2."-".$invoice3."_".$bu[0][$i]."_".$thn.".pdf";
					$pdf_string =   $dompdf->output();				
					$succ = file_put_contents($pdfroot, $pdf_string); 

					if ($succ) {						
						$kodeInvoice = $this->m_pelanggan->auto_increment('t_tagihan2','id_tagihan','INV');
						if ($status == 'transfer') {
							$buktiTransfer = $_FILES["buktiTF"];
							$config['upload_path'] = './assets/images/transfer/';
							$config['allowed_types'] = 'jpg|png|jpeg';
							$config['max_size']	= '10000';
							$this->load->library('upload', $config);
							if ($this->upload->do_upload('buktiTF')) {												
								$dataStore = array(
									'id_tagihan' => $kodeInvoice,
									'id_karyawan' => $data["user"]->id,
									'id_pelanggan' => $id,
									'kd_tagihan' => $invoice1.$invoice2."-".$invoice3,
									'tagihan' => $tagihan2,
									'iuran' => $iuranOld,
									'periode' => $bu[0][$i],
									'tgl_tagihan' => $tanggal,
									'bulan_tagihan' => $date,
									'tahun_tagihan' => $thn,
									'tahun_pembuatan' => date("Y"),
									'status_tagihan' => $status,
									'jumlah_cetak' => '1',
									'bukti_transfer' => $buktiTransfer["name"],
									'nama_invoice' => $invoice1.$invoice2."-".$invoice3."_".$bu[0][$i]."_".$thn.".pdf"			
								);								
							} else {
								$dataStore = array(
									'id_tagihan' => $kodeInvoice,
									'id_karyawan' => $data["user"]->id,
									'id_pelanggan' => $id,
									'kd_tagihan' => $invoice1.$invoice2."-".$invoice3,
									'tagihan' => $tagihan2,
									'iuran' => $iuranOld,
									'periode' => $bu[0][$i],
									'tgl_tagihan' => $tanggal,
									'bulan_tagihan' => $date,
									'tahun_tagihan' => $thn,
									'tahun_pembuatan' => date("Y"),
									'status_tagihan' => $status,
									'jumlah_cetak' => '1',
									'nama_invoice' => $invoice1.$invoice2."-".$invoice3."_".$bu[0][$i]."_".$thn.".pdf"			
								);
							}							
						} else {
							$dataStore = array(
								'id_tagihan' => $kodeInvoice,
								'id_karyawan' => $data["user"]->id,
								'id_pelanggan' => $id,
								'kd_tagihan' => $invoice1.$invoice2."-".$invoice3,
								'tagihan' => $tagihan2,
								'iuran' => $iuranOld,
								'periode' => $bu[0][$i],
								'tgl_tagihan' => $tanggal,
								'bulan_tagihan' => $date,
								'tahun_tagihan' => $thn,
								'tahun_pembuatan' => date("Y"),
								'status_tagihan' => $status,
								'jumlah_cetak' => '1',
								'nama_invoice' => $invoice1.$invoice2."-".$invoice3."_".$bu[0][$i]."_".$thn.".pdf"			
							);							
						}
						$this->m_invoice->tambahInvoice('t_tagihan2', $dataStore);					
					}
				}
				log_helper('Berhasil generate invoice '.$nama.' bulan '.$bu[0][$i].' tahun '.$thn);
			}
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
	            <strong>Success!</strong>
	            <p>Berhasil membuat invoice.</p>
	        </div>');       
			redirect('pelanggan');

			// Output the generated PDF to Browser
			// $dompdf->stream('Invoice'.'.pdf', array("Attachment" => FALSE));
		}		
	}

	public function add_bukti()
	{
		$id = $this->input->post("idInvoice");
		$idPL = $this->uri->segment(3);
		$invoice = $this->m_invoice->getInvoiceByIdInvoice($id)->row();
		$bukti = $_FILES["buktiTF"];
		if ($bukti) {
			$config['upload_path'] = './assets/images/transfer/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '10000';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('buktiTF')) {												
				$data = array(
					'bukti_transfer' => $this->upload->data('file_name')
				);				
				$this->m_invoice->updateBukti($id,$data);
				log_helper('Menambah bukti transfer invoice bulan '.$invoice->periode.' tahun '.$invoice->tahun_tagihan.' untuk pelanggan '.$invoice->nama_pelanggan);
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p>Berhasil menambah bukti transfer.</p>
		        </div>');       
		        redirect('pelanggan');
			} else {
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-warning callout-border-left mt-1 p-1">
		            <strong>Gagal!</strong>
		            <p>Gagal menambah bukti transfer.</p>
		        </div>');       
		        redirect('pelanggan');
			}								
		}
	}

	public function update_bukti()
	{
		$id = $this->input->post("idInvoiceUbah");
		$invoice = $this->m_invoice->getInvoiceByIdInvoice($id)->row();				
		$bukti = $_FILES["buktiTFubah"];				
		if ($bukti) {
			$config['upload_path'] = './assets/images/transfer/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '10000';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('buktiTFubah')) {
				$base = FCPATH . 'assets/images/transfer/'.$invoice->bukti_transfer;													
				$delete = unlink($base);
				if ($delete) {
					$data = array(
						'bukti_transfer' => $this->upload->data('file_name')
					);				
					$this->m_invoice->updateBukti($id,$data);
					log_helper('Mengubah bukti transfer invoice bulan '.$invoice->periode.' tahun '.$invoice->tahun_tagihan.' untuk pelanggan '.$invoice->nama_pelanggan);
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-success callout-border-left mt-1 p-1">
			            <strong>Success!</strong>
			            <p>Berhasil mengubah bukti transfer.</p>
			        </div>');       
			        redirect('pelanggan');					
				}
			} else {
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-warning callout-border-left mt-1 p-1">
		            <strong>Gagal!</strong>
		            <p>Gagal mengubah bukti transfer.</p>
		        </div>');       
		        redirect('pelanggan');
			}								
		}
	}

	public function invoiceById($id)
	{
		$data = $this->m_invoice->getInvoiceById($id)->result();
		$jumlahData = count($data);
		// echo $jumlahData;
		$nama = "";
		$periode = "";
		$tahun = "";		
		for ($i=0; $i < $jumlahData; $i++) { 
			$arrData = array(
				'id_tagihan' => $data[$i]->id_tagihan,
				'nama' => $data[$i]->nama_pelanggan,
				'periode' => $data[$i]->periode,
				'tahun' => $data[$i]->tahun_tagihan,
				'status' => $data[$i]->status_tagihan,
				'jumlah_cetak' => $data[$i]->jumlah_cetak,
				'nama_invoice' => $data[$i]->nama_invoice
			);
		}
		echo json_encode(array($arrData));
	}

	public function allById($id)
	{		
		$data["title"] = "Invoice";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["pelanggan"] = $this->m_pelanggan->getPelangganById($id)->row();
		$data["tahun"] = $this->m_invoice->getTahun()->result();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		$data["thn"] = $this->input->get('tahun');
		if ($this->session->userdata('role') == 'Direktur' || $this->session->userdata('role') == 'Komisaris') {
			if ($data["thn"] != '') {
				$data["invoice"] = $this->m_invoice->getInvoiceByTahun($id,$data["thn"])->result();			
			}else{
				$data["invoice"] = $this->m_invoice->getInvoiceById($id)->result();			
			}			
		} else {
			if ($data["thn"] != '') {
				$data["invoice"] = $this->m_invoice->getInvoiceByTahunAndIdKaryawan($id,$data["thn"],$this->session->userdata('id_karyawan'))->result();			
			} else {
				$data["invoice"] = $this->m_invoice->getInvoiceByIdAndIdKaryawan($id,$this->session->userdata('id_karyawan'))->result();			
			}
		}
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_all_invoice', $data);
		$this->load->view('template/footer', $data);			
	}	

	public function getPdf($id)
	{
		$data = $this->m_invoice->getInvoiceByIdTagihan($id)->row();
		$namaInvoice = $data->nama_invoice;
		echo json_encode($namaInvoice);
	}

	public function edit($id)
	{
		$data = $this->m_invoice->getInvoiceByIdTagihan($id)->row();
		echo json_encode($data);
	}

	public function update()
	{
		$id = $this->input->post("modalIdTagihan");
		$oldName = $this->input->post("modalOldName");
		$oldStatus = $this->input->post("modalOldStatus");
		$bulan = $this->input->post("modalBulan");
		$tahun = $this->input->post("modalTahun");		
		$status = $this->input->post("modalStatus");

		$statusSebelum = '';
		$statusSesudah = '';
		if ($oldStatus == 'paid') {
			$statusSebelum = 'Lunas';
		} else if ($oldStatus == 'pending') {
			$statusSebelum = 'Pending';
		} else {
			$statusSebelum = 'Lunas Transfer';			
		}

		if ($status == 'paid') {
			$statusSesudah = 'Lunas';
		} else if ($status == 'pending') {
			$statusSesudah = 'Pending';
		} else {
			$statusSesudah = 'Lunas Transfer';			
		}		

		if ($this->session->userdata('role') == 'Direktur') {
			$save = $this->m_invoice->updateStatusInvoice($id,$status);								
			if ($save) {
				log_helper('Mengubah status tagihan '.$oldName.' bulan '.$bulan.' tahun '.$tahun.' dari '.$statusSebelum.' menjadi '.$statusSesudah.'.');
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p>Berhasil mengubah status tagihan '.$oldName.' bulan '.$bulan.' tahun '.$tahun.' dari '.$statusSebelum.' menjadi '.$statusSesudah.'.</p>
		        </div>');       
		        echo json_encode(array("status" => true));			
			}else{
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-danger callout-border-left mt-1 p-1">
		            <strong>Gagal!</strong>
		            <p>Gagal mengubah status tagihan.</p>
		        </div>');       
		        echo json_encode(array("status" => true));			
			}
		} else {
			if ($oldStatus != 'pending') {
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-danger callout-border-left mt-1 p-1">
		            <strong>Gagal!</strong>
		            <p>Perlu konfirmasi dari Direktur.</p>
		        </div>');       
		        echo json_encode(array("status" => true));			
			}else{
				$save = $this->m_invoice->updateStatusInvoice($id,$status);
				if ($save) {
					log_helper('Mengubah status tagihan '.$oldName.' bulan '.$bulan.' tahun '.$tahun.' dari '.$statusSebelum.' menjadi '.$statusSesudah.'.');
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-success callout-border-left mt-1 p-1">
			            <strong>Success!</strong>
			            <p>Berhasil mengubah status tagihan '.$oldName.' bulan '.$bulan.' tahun '.$tahun.' dari '.$statusSebelum.' menjadi '.$statusSesudah.'.</p>
			        </div>');       
			        echo json_encode(array("status" => true));			
				}else{
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-danger callout-border-left mt-1 p-1">
			            <strong>Gagal!</strong>
			            <p>Gagal mengubah status tagihan.</p>
			        </div>');       
			        echo json_encode(array("status" => true));			
				}
			}
		}
		
	}

	public function hapus($id,$nama)
	{ 
		$getById = $this->m_invoice->getInvoiceByIdInvoice($id)->row();
		$base = FCPATH . 'assets/';									
		$baseInvoice = '';
		$baseBukti = '';		 		
	    $delete = $this->m_invoice->deleteByIdInvoice($id);	
		if ($delete) {
			$baseInvoice = $base.'pdf/'.$getById->nama_invoice;			
			if (file_exists($baseInvoice)) {
		    	unlink($baseInvoice);					
				if ($getById->bukti_transfer == '') {							
				}else{
					$baseBukti = $base.'images/transfer/'.$getById->bukti_transfer;
					unlink($baseBukti);											
				}	
				log_helper('Menghapus invoice '.$getById->nama_pelanggan.' bulan '.$getById->periode.' tahun '.$getById->tahun_tagihan.' dari data invoice.');		
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p>Berhasil menghapus data invoice.</p>
		        </div>');       
		        echo json_encode(array("status" => true));        
		    } else {
		    	log_helper('Menghapus invoice '.$getById->nama_pelanggan.' bulan '.$getById->periode.' tahun '.$getById->tahun_tagihan.' dari data invoice.');		
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p>Berhasil menghapus data invoice.</p>
		        </div>');       
		        echo json_encode(array("status" => true));        
		    }					
		}		
	}

	public function gabung()
	{
		$gambar_satu = base_url('assets/images/ttd/')."signature1.png";
		$gambar_dua  = base_url('assets/')."cap.png";
 
		$o_gambar_satu    = imagecreatefrompng( $gambar_satu );
		$o_gambar_dua     = imagecreatefrompng( $gambar_dua );
		 
		//ngambil ukuran gambar dua
		$o_gambar_duaX = imagesx( $o_gambar_dua );
		$o_gambar_duaY = imagesy( $o_gambar_dua );
		 
		//melakukan merging $filedekode1, $filedekode2, koordinat kiri, koordinat atas, jarak geser kiri, jarak geser kanan, koordinat kanan, koordinat bawah, persen transparansi
		 
		imagecopymerge( $o_gambar_satu, $o_gambar_dua, 50, 100, 0, 0, $o_gambar_duaX, $o_gambar_duaY, 100 );
		 
		 
		 
		//Output
		header( 'Content-type: image/png' );
		imagepng( $o_gambar_satu );
		imagedestroy( $o_gambar_satu );
	}
}

/* End of file invoice.php */
/* Location: ./application/controllers/invoice.php */