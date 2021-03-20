<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use Dompdf\Dompdf;

class Api extends RestController {

    public function auth_post()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $getUser = $this->m_user->getByField('username',$username)->row();
        if ($getUser) {
            if ($getUser->password == md5($password)) {
                $karyawan = $this->m_user->getIdKaryawan($getUser->id_user)->row();
                $kd = str_replace("U0","",$getUser->id_user);
                if ($karyawan) {
                    $jInvoice = $this->m_invoice->getInvoiceByIdKaryawanAndPeriode($karyawan->id)->result();
                    $add = count($jInvoice) + 1;
                    $division = $add / 100;
                    $fix = str_replace('.', '', $division);
                    $data = array(
                        'id_user' => $getUser->id_user,
                        'id_role' => $getUser->id_role,
                        'id_foto_profil' => $getUser->id_foto_profil,
                        'id_karyawan' => $karyawan->id,
                        'kd_invoice' => $kd,
                        'nama_user' => $getUser->nama_user,
                        'username' => $getUser->username,
                        'role' => $getUser->role,
                        'status' => $getUser->status,
                        'jumlah_invoice' => $fix,
                        'foto_profil' => $getUser->foto_profil
                    );                    
                }else{
                    $data = array(
                        'id_user' => $getUser->id_user,
                        'id_role' => $getUser->id_role,
                        'id_foto_profil' => $getUser->id_foto_profil,
                        'kd_invoice' => $kd,
                        'nama_user' => $getUser->nama_user,
                        'username' => $getUser->username,
                        'role' => $getUser->role,
                        'status' => $getUser->status,
                        'foto_profil' => $getUser->foto_profil
                    );
                }
                if ($getUser->status == '1') {
                    $this->response( 
                                array('status' => true,
                                      'data' => $data), RestController::HTTP_OK);                                
                }else{
                    $this->response( 
                                array('status' => false,
                                      'data' => "Akun anda nonaktif."), RestController::HTTP_OK);                                
                }
            } else {
                $this->response( 
                                array('status' => false,
                                      'data' => "Password yang anda masukkan salah."), RestController::HTTP_OK);
            }
        } else {
            $this->response( 
                                array('status' => false,
                                      'data' => "Username yang anda masukkan salah."), RestController::HTTP_OK);                                
        }
    }

    public function pelanggan_get()
    {
        $pelanggan = $this->m_pelanggan->getPelangganByStatus('active')->result();
        if ($pelanggan) {
            $this->response( 
                    array('status' => true,
                          'data' => $pelanggan), RestController::HTTP_OK );
        }else{
            $this->response( 
                    array('status' => false,
                          'data' => 'Tidak ada data pelanggan.'), RestController::HTTP_OK);            
        }
    }    

    public function invoice_get()
    {
        $idPelanggan = $_GET["id_pelanggan"];        
        $role = $_GET["role"];
        if ($role == 'Direktur' || $role == 'Komisaris') {
            $invoice = $this->m_invoice->getInvoiceById($idPelanggan)->result();
        } else {            
            $idKaryawan = $_GET["id_karyawan"];
            // $status = $_GET["status"];                    
            $invoice = $this->m_invoice->getInvoiceByIdAndIdKaryawan($idPelanggan,$idKaryawan)->result();
        }   

        if ($invoice) {
            $this->response( 
                    array('status' => true,
                          'data' => $invoice), RestController::HTTP_OK );
        }else{
            $this->response( 
                    array('status' => false), RestController::HTTP_OK);            
        }
    }

    public function invoiceByStatus_get()
    {
        $idPelanggan = $_GET["id_pelanggan"];        
        $idKaryawan = $_GET["id_karyawan"];
        $status = $_GET["status"];                    
        $invoice = $this->m_invoice->getInvoiceByIdAndIdKaryawanAndStatus($idPelanggan,$idKaryawan,$status)->result();
        
        if ($invoice) {
            $this->response( 
                    array('status' => true,
                          'data' => $invoice), RestController::HTTP_OK );
        }else{
            $this->response( 
                    array('status' => false), RestController::HTTP_OK);            
        }
    }

    public function invoice_post()
    {
        $idUser = $_POST["id_user"];
        $invoice1 = "M2N-GTO.".date('Y').".INV.";
        $invoice2 = $_POST["invoice2"];
        $invoice3 = $_POST["invoice3"];
        $id = $_POST["id_pelanggan"];
        $nama = $_POST["namaPL"];
        $alamat = $_POST["alamatPL"];
        $tanggal= $_POST["tanggal"];
        $thn = $_POST["tahun"];
        $iuranOld = $_POST["iuranOld"];
        $tagihanFix = $_POST["tagihan"];
        $tagihan2 = str_replace(",","",$tagihanFix);
        $terbilang = $this->numbertotext->terbilang($tagihan2);
        $bu[] = $_POST["bulan"];
        $status = $_POST["radioPL"];      
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

        $arrBulanAda = array();
        $arrBulanBelumAda = array();
        for ($i=0; $i < count($bu[0]); $i++){ 
            $dataInvoice = $this->m_invoice->getInvoiceByIdPelanggan($id,$bu[0][$i],$thn)->result();
            if ($dataInvoice) {
                array_push($arrBulanAda, $bu[0][$i]);
            }else{
                array_push($arrBulanBelumAda, $bu[0][$i]);                
            }
        }
        $countBelumAda = count($arrBulanBelumAda);
        for ($i=0; $i < $countBelumAda; $i++) { 
            $data["inv"] = array(
                'kode' => $invoice1.$invoice2."-".$invoice3,
                'nama' => $nama,
                'alamat' => $alamat,
                'tagih' => $tagihan2,
                'tanggal' => $tanggal,
                'bilang' => $terbilang,
                'periode' => $arrBulanBelumAda,
                'status' => $status
            );

            $data["setting"] = $this->db->get_where('t_pengaturan',["id_pengaturan" => '1'])->row();
            $data["user"] = $this->db->get_where('karyawan', ['id_user' => $idUser])->row();
            $data["titleInvoice"] = $invoice1.$invoice2."-".$invoice3."_".$arrBulanBelumAda[$i]."_".$thn;
            $dompdf = new Dompdf();
            $html = $this->load->view('invoice_mobile', $data, TRUE);
            $dompdf->loadHtml($html);
            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();
            // $pdfroot  = dirname(dirname(__FILE__))."/assets";
            $pdfroot  = $_SERVER['DOCUMENT_ROOT'].'molindo/assets/pdf';
            $pdfroot .= '/'.$invoice1.$invoice2."-".$invoice3."_".$arrBulanBelumAda[$i]."_".date("Y", strtotime($tanggal)).'.pdf';
            $pdf_string =   $dompdf->output();
            $succ = file_put_contents($pdfroot, $pdf_string);                
            if ($succ) {
                $kodeInvoice = $this->m_user->auto_increment('t_tagihan2','id_tagihan','INV');
                if ($status == 'transfer') {
                    $buktiTF = $_POST["buktiTF"];
                    $path = 'assets/images/transfer/';
                    $path = $path."/"."Invoice-".time()."-".$id.".jpg";
                    file_put_contents($path, base64_decode($buktiTF));
                    $dataStore = array(
                        'id_tagihan' => $kodeInvoice,
                        'id_karyawan' => $data["user"]->id,
                        'id_pelanggan' => $id,
                        'kd_tagihan' => $invoice1.$invoice2."-".$invoice3,
                        'tagihan' => $tagihan2,
                        'iuran' => $iuranOld,
                        'periode' => $arrBulanBelumAda[$i],
                        'tgl_tagihan' => $tanggal,
                        'bulan_tagihan' => $date,
                        'tahun_tagihan' => $thn,
                        'tahun_pembuatan' => date("Y"),
                        'status_tagihan' => $status,
                        'jumlah_cetak' => '1',
                        'bukti_transfer' => "Invoice-".time()."-".$id.".jpg",
                        'nama_invoice' => $invoice1.$invoice2."-".$invoice3."_".$arrBulanBelumAda[$i]."_".$thn.".pdf"
                    );                    
                } else {
                    $dataStore = array(
                        'id_tagihan' => $kodeInvoice,
                        'id_karyawan' => $data["user"]->id,
                        'id_pelanggan' => $id,
                        'kd_tagihan' => $invoice1.$invoice2."-".$invoice3,
                        'tagihan' => $tagihan2,
                        'iuran' => $iuranOld,
                        'periode' => $arrBulanBelumAda[$i],
                        'tgl_tagihan' => $tanggal,
                        'bulan_tagihan' => $date,
                        'tahun_tagihan' => $thn,
                        'tahun_pembuatan' => date("Y"),
                        'status_tagihan' => $status,
                        'jumlah_cetak' => '1',
                        'nama_invoice' => $invoice1.$invoice2."-".$invoice3."_".$arrBulanBelumAda[$i]."_".$thn.".pdf"          
                    );                    
                }
                $this->m_invoice->tambahInvoice('t_tagihan2', $dataStore);
            }

        }
        $this->response( 
                array('status' => true,
                      'ada' => $arrBulanAda,
                      'belum' => $arrBulanBelumAda), RestController::HTTP_OK );
    }

    public function updateInvoice_post()
    {
        $id = $_POST["id_tagihan"];
        $statusOld = $_POST["statusOld"];
        $statusNew = $_POST["statusNew"];
        if ($statusOld == 'pending') {
            $updateStatus = $this->m_invoice->updateStatusInvoice($id,$statusNew);            
            if ($updateStatus) {
                $this->response( 
                        array('status' => true,
                              'data' => 'Berhasil mengubah status invoice.'), RestController::HTTP_OK );            
            }else{
                $this->response( 
                        array('status' => false,
                              'data' => 'Gagal mengubah status invoice.'), RestController::HTTP_OK );            
            }
        }else{
            $this->response( 
                        array('status' => false,
                              'data' => 'Gagal mengubah status invoice.'), RestController::HTTP_OK );
        }
    }

    public function updateInvoiceTransfer_post()
    {
        $id = $_POST["id_tagihan"];
        $statusOld = $_POST["statusOld"];
        $statusNew = "transfer";
        $bukti = $_POST["buktiTransfer"];

        $path = 'assets/images/transfer/';
        $path = $path."/"."Invoice-".time()."-".$id.".jpg";
        if ($statusOld == 'pending') {
            if (file_put_contents($path, base64_decode($bukti))) {                
                $updateStatus = $this->m_invoice->updateStatusInvoiceTransfer($id,$statusNew,"Invoice-".time()."-".$id.".jpg");            
                if ($updateStatus) {
                    $this->response( 
                            array('status' => true,
                                  'data' => 'Berhasil mengubah status invoice.'), RestController::HTTP_OK );            
                }else{
                    $this->response( 
                            array('status' => false,
                                  'data' => 'Gagal mengubah status invoice.'), RestController::HTTP_OK );            
                }
            }else{
                $this->response( 
                        array('status' => false,
                              'data' => 'Gagal mengubah status invoice.'), RestController::HTTP_OK );
            }            
        }else{
            $this->response( 
                        array('status' => false,
                              'data' => 'Gagal mengubah status invoice.'), RestController::HTTP_OK );
        }
    }

    public function transfer_get()
    {
        $bulan = $_GET["bulan"];
        $transfer = $this->m_invoice->getTransfer($bulan)->result();
        if ($transfer) {
            $this->response( 
                    array('status' => true,
                          'data' => $transfer), RestController::HTTP_OK );
        }else{
            $this->response( 
                    array('status' => false,
                          'data' => 'Tidak ada data transfer.'), RestController::HTTP_OK);            
        }
    }

    public function lunas_get()
    {
        $bulan = $_GET["bulan"];
        $lunas = $this->m_invoice->getLunas($bulan)->result();
        if ($lunas) {
            $this->response( 
                    array('status' => true,
                          'data' => $lunas), RestController::HTTP_OK );
        }else{
            $this->response( 
                    array('status' => false,
                          'data' => 'Tidak ada data lunas'), RestController::HTTP_OK);            
        }
    }

    public function pending_get()
    {
        $bulan = $_GET["bulan"];
        $pending = $this->m_invoice->getPending($bulan)->result();
        if ($pending) {
            $this->response( 
                    array('status' => true,
                          'data' => $pending), RestController::HTTP_OK );
        }else{
            $this->response( 
                    array('status' => false,
                          'data' => 'Tidak ada data pending'), RestController::HTTP_OK);            
        }
    }

    public function distinct_get()
    {
        $bulan = $_GET["bulan"];
        $distinct = $this->m_invoice->getDistinctInvoice($bulan)->result();
        if ($distinct) {
            $this->response( 
                    array('status' => true,
                          'data' => $distinct), RestController::HTTP_OK );
        }else{
            $this->response( 
                    array('status' => false,
                          'data' => 'Tidak ada data invoice.'), RestController::HTTP_OK);            
        }
    }

    public function jumlahInvoice_get()
    {
        $id = $_GET["id_karyawan"];
        $jInvoice = $this->m_invoice->getInvoiceByIdKaryawanAndPeriode($id)->result();
        $add = count($jInvoice) + 1;
        $division = $add / 100;
        $fix = str_replace('.', '', $division);
        if ($fix > 0) {
            $this->response( 
                    array('status' => true,
                          'data' => $fix), RestController::HTTP_OK );
        }else{
            $this->response( 
                    array('status' => false,
                          'data' => $fix), RestController::HTTP_OK);            
        }
    }
    
}