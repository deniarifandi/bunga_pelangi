<?php

namespace App\Controllers;
use App\Models\GuruModel;
use App\Models\DivisiModel;
use Config\Database;


class Home extends BaseController
{   
    public $session;

    public function __construct()
    {   
       $this->session = session();
    }

    public function index()
    {   
        
        $model = new GuruModel();

        $username = $this->session->get('username');
        $guru_nama = $this->session->get('nama');
        $guru_id = $this->session->get('guru_id');
        // echo $guru_id;

        $builder = Database::connect()->table('Guru');
        $builder->select('Guru.*, Kelompok.*');
        $builder->join('Kelompok','Kelompok.guru_id = Guru.guru_id','left');
        $builder->where('guru_username',$username);

        $presence = $this->cekPresensi();

        $data = $builder->get()->getResult();
        // echo $presence;
        return view('dashboard.php',[
            'data' => $data[0], 
            'presence' => $presence,
            'nama' => $guru_nama
        ]);
    }
    
    public function blank()
    {   
        return view('blank.php');
    }

    public function login(){ 
       
        $builder = Database::connect()->table('Divisi');
        $builder->select('*');
        $builder->where('divisi_id', env('app.divisi'));
        $query = $builder->get();
        $resultsPresensi = $query->getResult();
        
         //print_r($resultsPresensi[0]->divisi_nama);
        return view('login.php',['data' => $resultsPresensi]);
    }

    public function loginAuth()
    {
        
        $model = new GuruModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

         $user = $model->select('
            Guru.*,
            Gurudivisi.*,
            Divisi.*
        ')
        ->join('Gurudivisi', 'Gurudivisi.guru_id = Guru.guru_id')
        ->join('Divisi', 'Divisi.divisi_id = Gurudivisi.divisi_id')
        ->where('Guru.guru_username', $username)
        ->first();

         print_r($user);


        if (!$user) {
            return redirect()->back()->with('error', 'User not Found or Division not registered');
        } else {
            
        }



        $builder = Database::connect()->table('Kelompok');
        $builder->select('Kelompok.kelompok_nama, Kelompok.kelompok_id, Tingkat.*');
        $builder->join('Tingkat','Tingkat.tingkat_id = Kelompok.tingkat_id');
        $builder->where('guru_id', $user['guru_id']);
        $builder->orwhere('assguru_id', $user['guru_id']);

        $query = $builder->get();
        $kelompok = $query->getResult();
        
        print_r($kelompok);
        
        // exit();



        if ($user && password_verify($password, $user['guru_password'])) {
            if (!$kelompok) {
                $this->session->set([
                'guru_id' => $user['guru_id'], 
                'nama' => $user['guru_nama'], 
                'username' => $user['guru_username'], 
                'guru_role'=> $user['guru_role'],
                'logged_in' => true]);
                return redirect()->to('/');
            }

            $this->session->set([
                'guru_id' => $user['guru_id'], 
                'nama' => $user['guru_nama'], 
                'kelompok_id' => $kelompok[0]->kelompok_id,
                'tingkat_id' => $kelompok[0]->tingkat_id,
                'username' => $user['guru_username'], 
                'divisi_id' => $user['divisi_id'],
                'divisi_nama' => $user['divisi_nama'],
                'divisi_logo'=> $user['divisi_logo'],
                'guru_role'=> $user['guru_role'],
                'logged_in' => true]);
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

     public function cekPresensi(){
        $db = \Config\Database::connect(); 
        $session = session();
        $guru_id = session()->get('guru_id');
        // echo $guru_id;
        $builder = $db->table('Presensidata');
        $builder->select('Presensidata.*');
        $builder->where('guru_id', $guru_id);
        $builder->where('presensidata_tanggal', date("Y-m-d"));

        $query = $builder->get();
        $resultsPresensi = $query->getResult();
        // print_r($resultsPresensi);
        return count($resultsPresensi);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
