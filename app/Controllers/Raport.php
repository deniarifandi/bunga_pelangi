<?php

namespace App\Controllers;

use App\Libraries\datatable;
use DB;
use Config\Database;

class Raport extends BaseController
{

   
   public function index(){

    return view('raport/list');

   }

    public function data(){

    $builder = Database::connect()->table('Raport')
        ->select('Raport.*, Murid.murid_nama')
        ->join('Murid','Murid.murid_id = Raport.raport_murid_id')
        ->join('Kelompok','Kelompok.kelompok_id = Murid.kelompok_id')
        ->where('Kelompok.kelompok_id',session()->get('kelompok_id'))
        ->orderBy('raport_id','desc')
        ->groupBy('raport_id');

    // print_r($builder->get()->getResult());
    // exit();


    $datatable = new Datatable();

    return $datatable->generate($builder, 'Raport.raport_id',[
        'Raport.raport_id'
    ]);
    }

    public function new(){

        $db = \Config\Database::connect();
        $muridList = $db->table('Murid')
            ->select('murid_id, murid_nama')
            ->where('deleted_at',null)
            ->where('kelompok_id',session()->get('kelompok_id'))
            ->orderBy('murid_nama')
            ->get()->getResult();

        return view('raport/new', [
            'muridList' => $muridList
        ]);
    }

    public function getPerkembangan()
    {
        $muridId = $this->request->getGet('id');
        $db = \Config\Database::connect();
        $query = $db->table('Murid')
                    ->select("
                        Murid.murid_nama, 
                        Murid.murid_id, 
                        Tipeaktifitas.tipeaktifitas_nama,
                        Penilaian.hasil_id,
                        CASE Penilaian.hasil_id
                            WHEN 'MB' THEN 'Mulai Berkembang'
                            WHEN 'B' THEN 'Berkembang'
                            WHEN 'BSH' THEN 'Berkembang Sesuai Harapan'
                            WHEN 'SB' THEN 'Sangat Berkembang'
                            ELSE 'Tidak Diketahui'
                        END AS hasil_text
                    ")
                    ->join('Penilaian','Penilaian.murid_id = Murid.murid_id')
                    ->join('Tipeaktifitas','Tipeaktifitas.tipeaktifitas_id = Penilaian.aktifitas_id')
                    ->where('Murid.murid_id', $muridId)
                    ->get()
                    ->getResult();

        if ($query) {
            return $this->response->setJSON(['success' => true, 'data' => $query]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function getKetJati()
    {
        $muridId = $this->request->getGet('id');
        $db = \Config\Database::connect();
        $query = $db->table('Murid')
                    ->select("
                        Murid.murid_nama, 
                        Murid.murid_id, 
                        Aktifitas.aktifitas_nama,
                        Penilaian.hasil_id,
                        CASE Penilaian.hasil_id
                            WHEN 'MB' THEN 'Mulai Berkembang'
                            WHEN 'B' THEN 'Berkembang'
                            WHEN 'BSH' THEN 'Berkembang Sesuai Harapan'
                            WHEN 'SB' THEN 'Sangat Berkembang'
                            ELSE 'Tidak Diketahui'
                        END AS hasil_text
                    ")
                    ->join('Penilaian','Penilaian.murid_id = Murid.murid_id')
                    ->join('Aktifitas','Aktifitas.aktifitas_id = Penilaian.aktifitas_id')
                    ->where('Murid.murid_id', $muridId)
                    ->get()
                    ->getResult();

        if ($query) {
            return $this->response->setJSON(['success' => true, 'data' => $query]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }


    public function create()
{
    $db = \Config\Database::connect();
    $builder = $db->table('Raport');

    $data = $this->request->getPost();

    // handle uploaded images
    for ($i = 1; $i <= 9; $i++) {
        $file = $this->request->getFile("img$i");
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads/raport/';
            
            // Make sure the folder exists
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $newName);
            $data["img$i"] = $newName;
        }
    }

    $builder->insert($data);

    return redirect()->to('/Raport')->with('success', 'Raport successfully created!');
}

    
    public function delete($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Raport');

        // Optional: delete uploaded images
        $raport = $builder->where('raport_id', $id)->get()->getRow();
        if ($raport) {
            for ($i = 1; $i <= 9; $i++) {
                $imgField = "img$i";
                if (!empty($raport->$imgField) && file_exists("uploads/raport/" . $raport->$imgField)) {
                    unlink("uploads/raport/" . $raport->$imgField);
                }
            }
        }

        // Delete record
        $builder->where('raport_id', $id)->delete();

        return $this->response->setJSON(['status' => 'success']);
    }

    public function editraport($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('Raport');
    $data['raport'] = $builder->where('raport_id', $id)->get()->getRow();

        $muridList = $db->table('Murid')
            ->select('murid_id, murid_nama')
            ->where('deleted_at',null)
            ->orderBy('murid_nama')
            ->get()->getResult();

            $data['muridList'] = $muridList;

    if (!$data['raport']) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Raport not found');
    }

    return view('raport/edit', $data);
}

public function update($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('Raport');

    $data = $this->request->getPost();

    // handle uploaded images
    for ($i = 1; $i <= 9; $i++) {
        $file = $this->request->getFile("img$i");
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/raport/', $newName);
            $data["img$i"] = $newName;

            // delete old image if exists
            $old = $builder->select("img$i")->where('raport_id', $id)->get()->getRow();
            if ($old && !empty($old->{"img$i"}) && file_exists("uploads/raport/" . $old->{"img$i"})) {
                unlink("uploads/raport/" . $old->{"img$i"});
            }
        }
    }

    $builder->where('raport_id', $id)->update($data);

    return redirect()->to('/Raport')->with('success', 'Raport successfully updated!');
}


  public function printraport($raportId)
    {
        $db = \Config\Database::connect();

        // Get raport data
        $raport = $db->table('Raport')
                     ->where('raport_id', $raportId)
                     ->get()
                     ->getRow();

        if (!$raport) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Raport with ID $raportId not found");
        }

        // Get student (murid) data
        $murid = $db->table('Murid')
                    ->where('murid_id', $raport->raport_murid_id)
                    ->get()
                    ->getRow();

        if (!$murid) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Murid not found for this raport");
        }

        $data = [
            'raport' => $raport,
            'murid'  => $murid
        ];

        // Load the print view
        return view('raport/print', $data);
    }



}
