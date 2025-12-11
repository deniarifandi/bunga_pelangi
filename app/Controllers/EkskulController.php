<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EkskulController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    /* ============================
       LIST MURID + STATUS EKSKUL
    ============================ */
    public function listMurid()
    {
        $muridList = $this->db->table('Murid')->get()->getResultArray();

        // Cek apakah setiap murid sudah punya nilai ekskul
        foreach ($muridList as &$m) {
            $m['ekskul'] = $this->db->table('ekskul')
                ->where('murid_id', $m['murid_id'])
                ->get()
                ->getRowArray(); // null = belum ada
        }

        return view('ekskul/murid_list', [
            'muridList' => $muridList
        ]);
    }

    /* ============================
         HALAMAN LIST EKSKUL
    ============================ */
    public function index()
    {
        $data['ekskul'] = $this->db->table('ekskul')
            ->join('Murid', 'murid.murid_id = ekskul.murid_id') // FIX: table name lowercase
            ->select('ekskul.*, murid.murid_nama')
            ->get()
            ->getResultArray();

        return view('ekskul/index', $data);
    }

    /* ============================
         FORM TAMBAH
    ============================ */
    public function create()
    {
        $muridId = $this->request->getGet('murid');

        $data['data'] = $this->db->table('Murid')
            ->where('murid_id', $muridId)
            ->get()
            ->getResult();

        return view('ekskul/form', $data);
    }

    /* ============================
         SIMPAN DATA BARU
    ============================ */
    public function store()
    {
        $this->db->table('ekskul')->insert([
            'murid_id'   => $this->request->getPost('murid_id'),
            'ekskul1'    => $this->request->getPost('ekskul1'),
            'nilai1'     => $this->request->getPost('nilai1'),
            'deskripsi1' => $this->request->getPost('deskripsi1'),
            'ekskul2'    => $this->request->getPost('ekskul2'),
            'nilai2'     => $this->request->getPost('nilai2'),
            'deskripsi2' => $this->request->getPost('deskripsi2'),
        ]);

        return redirect()->to('/ekskul/murid');
    }

    /* ============================
         FORM EDIT
    ============================ */
    public function edit($id)
    {
        $data['ekskul'] = $this->db->table('ekskul')
            ->where('murid_id', $id)
            ->get()
            ->getRowArray();
        // print_r($data);
        // exit();

        $data['data'] = $this->db->table('Murid')
            ->where('murid_id', $data['ekskul']['murid_id'])
            ->get()
            ->getResult();

        return view('ekskul/form', $data);
    }

    /* ============================
         UPDATE DATA
    ============================ */
    public function update($id)
    {
        $this->db->table('ekskul')->where('id', $id)->update([
            'murid_id'   => $this->request->getPost('murid_id'),
            'ekskul1'    => $this->request->getPost('ekskul1'),
            'nilai1'     => $this->request->getPost('nilai1'),
            'deskripsi1' => $this->request->getPost('deskripsi1'),
            'ekskul2'    => $this->request->getPost('ekskul2'),
            'nilai2'     => $this->request->getPost('nilai2'),
            'deskripsi2' => $this->request->getPost('deskripsi2'),
        ]);

        return redirect()->to('/ekskul/murid');
    }

    /* ============================
         DELETE
    ============================ */
    public function delete($id)
    {
        $this->db->table('ekskul')->delete(['id' => $id]);
        return redirect()->to('/ekskul');
    }
}
