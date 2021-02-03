<?php namespace App\Controllers;

use App\Models\TransportasiModel;
use App\Models\DestinasiModel;
use App\Models\JadwalModel;
use App\Models\ParticipantModel;

class DashboardController extends BaseController
{   

    public function __construct() {
        $this->TransportasiModel = new TransportasiModel();
        $this->DestinasiModel = new DestinasiModel();
        $this->JadwalModel = new JadwalModel();
        $this->ParticipantModel = new ParticipantModel();
    }

    public function index()
	{   
        $data['Current'] = 'index';
		return view('dashboard/monitoring_all', $data);
	}
    
    public function validate_user() {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $validate = false;

        if(isset($username) && isset($password)) {
            if($this->username != $username || $this->password != $password) {
                session()->setFlashdata('_error1', 'Username / Password Salah');
            } else {
                $validate = true;
            }
        } else {
            session()->setFlashdata('_error2', 'Username / Password Kosong');
        }

        if ($validate) {
            return redirect()->to(base_url('admin-panel/dasboard'));
        } else {
            return redirect()->to(base_url('admin-panel'));
        }
    }

    /* --TRANSPORTASI-- */
    public function master_transportasi()
	{
        $data['Current'] = 'transportasi';
        $data['Number'] = 1;
        $data['AllTransportation'] = $this->TransportasiModel->findAll();
		return view('dashboard/master_transportasi', $data);
    }

    public function create_transportasi()
	{
        $nama_transportasi = $this->request->getVar('nama_transportasi');

        if(!isset($nama_transportasi) || empty($nama_transportasi)) {
            return redirect()->to(base_url('/'));
        }

        $save = $this->TransportasiModel->save([
            "nama_transportasi" => $nama_transportasi
        ]);

        if($save) {
            echo "Horee, Data Sukses Tersimpan";
        } else {
            echo "Maaf, Data Gagal Tersimpan";
        }
    }
    /* --TRANSPORTASI-- */
    
    /* --DESTINASI-- */
    public function master_destinasi()
	{
        $data['Current'] = 'destinasi';
        $data['Number'] = 1;
        $data['AllDestination'] = $this->DestinasiModel->findAll();
		return view('dashboard/master_destinasi', $data);
    }

    public function create_destinasi()
	{
        $nama_destinasi = $this->request->getVar('nama_destinasi');

        if(!isset($nama_destinasi) || empty($nama_destinasi)) {
            return redirect()->to(base_url('/'));
        }

        $save = $this->DestinasiModel->save([
            "nama_destinasi" => $nama_destinasi
        ]);

        if($save) {
            echo "Horee, Data Sukses Tersimpan";
        } else {
            echo "Maaf, Data Gagal Tersimpan";
        }
    }
    /* --DESTINASI-- */
    
    /* --JADWAL-- */
    public function master_jadwal()
	{
        $data['Current'] = 'jadwal';
        $data['Number'] = 1;
        $data['AllTransportation'] = $this->TransportasiModel->findAll();
        $data['AllDestination'] = $this->DestinasiModel->findAll();
        $data['AllJadwal'] = $this->JadwalModel->findAll();
		return view('dashboard/master_jadwal', $data);
    }

    public function create_jadwal()
	{
        $transportasi = $this->request->getVar('transportasi');
        $asal = $this->request->getVar('asal');
        $tujuan = $this->request->getVar('tujuan');
        $jadwal_keberangkatan = $this->request->getVar('jadwal_keberangkatan');
        $slot = $this->request->getVar('slot');
        $data = array(
            "transportasi" => $transportasi,
            "asal" => $asal,
            "tujuan" => $tujuan,
            "jadwal_keberangkatan" => strtotime($jadwal_keberangkatan),
            "slot" => $slot
        );

        $validasi = $this->JadwalModel->validasi($data);
        
        if($validasi != 1) {
            return redirect()->to(base_url('/'));
        }

        $save = $this->JadwalModel->save([
            "transportasi" => $transportasi,
            "asal" => $asal,
            "tujuan" => $tujuan,
            "jadwal_keberangkatan" => strtotime($jadwal_keberangkatan),
            "slot" => $slot,
            "remaining_slot" => $slot
            
        ]);

        if($save) {
            echo "Horee, Data Sukses Tersimpan";
        } else {
            echo "Maaf, Data Gagal Tersimpan";
        }
    }
    /* --JADWAL-- */
    
    /* --VERIFIKASI-- */
    public function master_verifikasi()
	{
        $data['Current'] = 'verifikasi';
        $data['Number'] = 1;
        $data['AllParticipant'] = $this->ParticipantModel->findAll();
		return view('dashboard/master_verifikasi', $data);
    }

    public function update_verifikasi($id)
	{
        if(!isset($id) || empty($id)) {
            return redirect()->to(base_url('/'));
        }

        $update = $this->ParticipantModel->save([
            "id" => $id,
            "terverifikasi" => 'y'
        ]);

        if($update) {
            return redirect()->to(base_url('admin-panel/verifikasi'));
        } else {
            echo "Maaf, Data Gagal Di Update";
        }
    }
    /* --VERIFIKASI-- */
    
    public function logout() {
        return redirect()->to(base_url('/'));
	}

}
