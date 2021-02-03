<?php namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\ParticipantModel;

class ParticipantController extends BaseController
{   
    public function __construct() {
        $this->JadwalModel = new JadwalModel();
        $this->ParticipantModel = new ParticipantModel();
    }

    /* --DAFTAR-- */
    public function index()
	{   
        $data['AllJadwal'] = $this->JadwalModel->findAll();
        $data['KodeVerifikasi'] = uniqid();
        return view('participant/daftar', $data);
    }
    
    
    public function create_peserta()
	{
        $id_jadwal = $this->request->getVar('rute');
        $nama_peserta = $this->request->getVar('nama_peserta');
        $kode_verifikasi = $this->request->getVar('kode_verifikasi');
        $data = array(
            "id_jadwal" => $id_jadwal,
            "nama_peserta" => $nama_peserta,
            "kode_verifikasi" => $kode_verifikasi
        );

        $validasi = $this->ParticipantModel->validasi($data);
        
        if($validasi != 1) {
            return redirect()->to(base_url('/'));
        }

        $save = $this->ParticipantModel->save([
            "id_jadwal" => $id_jadwal,
            "nama_peserta" => $nama_peserta,
            "kode_verifikasi" => $kode_verifikasi,
            "terverifikasi" => 'n'
        ]);

        if($save) {
            echo "Horee, Data Sukses Tersimpan";
        } else {
            echo "Maaf, Data Gagal Tersimpan";
        }
    }
    /* --DAFTAR-- */

    /* --CEK STATUS-- */
    public function cek_status()
	{   
        return view('participant/cek_status');
    }

    public function status_verifikasi_peserta()
	{   
        $kode_verifikasi = $this->request->getVar('kode_verifikasi');
        $query = $this->ParticipantModel->where('kode_verifikasi', $kode_verifikasi)->findAll();
        if(count($query) < 1){
            echo 'Kode Verifikasi Salah';
        } else {
            if($query[0]['terverifikasi']=='y'){
                echo 'Selamat Anda Terverifikasi';
            } else {
                echo 'Maaf Anda Belum Terverifikasi';
            }
        }
    }
    /* --CEK STATUS-- */

    /* --API VERIFIKASI-- */
    public function api_verifikasi()
	{   
        

        if($this->request->getServer('PHP_AUTH_USER') != 'admin' || $this->request->getServer('PHP_AUTH_PW') != 'admin') {
            $return = [ 'Code' => '0', 'Message' => 'Wrong Credential' ];
            return json_encode($return);
        }

        $kode_verifikasi = json_decode(file_get_contents('php://input'),true); 

        if(!isset($kode_verifikasi) || empty($kode_verifikasi)) {
            $return = [ 'Code' => '0', 'Message' => 'Kode Verifikasi is Missing' ];
            return json_encode($return);
        }
        
        $query = $this->ParticipantModel->where('kode_verifikasi', $kode_verifikasi)->findAll();
        
        if(count($query) < 1){
            $return = [ 'Code' => '0', 'Message' => 'Wrong Kode Verifikasi' ];
            return json_encode($return);
        } else {
            if($query[0]['terverifikasi']=='y'){
                $return = [ 'Code' => '1', 'Message' => 'Verified' ];
                return json_encode($return);
            } else {
                $return = [ 'Code' => '0', 'Message' => 'Unverified' ];
                return json_encode($return);
            }
        }

        return json_encode($return);
       
    }
    /* --API VERIFIKASI-- */
}
