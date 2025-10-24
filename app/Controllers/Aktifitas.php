<?php

namespace App\Controllers;

//use CodeIgniter\RESTful\ResourceController;
use App\Models\AktifitasModel;
use App\Libraries\datatable;
use DB;
use Config\Database;

class Aktifitas extends MyResourceController
{

    public $table = "Hasil2";
    public $title = "Modul Pembelajaran";
    public $primaryKey = "hasil_id";
    public $fieldList = [
        
            ['guru_nama','Nama Guru'],
            ['unit_nama','Topik'],
            ['subunit_nama','Sub-Topik'],
            ['created_at','Tanggal']
        // ['Aktifitas_password','Password']
    ];

    public $selectList= [
            'Hasil2.*',
            'Unit.*',
            'Subunit.*'
           
    ];

     public $where = [
      'Hasil2.deleted_at' => null
    ];

    public $joinTable = [
        ['Unit','Unit.unit_id = Hasil2.topik','left'],
        ['Subunit','Subunit.subunit_id = Hasil2.subtopik','left']
        
        // ['Subjek','Subjek.subjek_id = Unit.subjek_id','left'],
        // ['Tipeaktifitas','Tipeaktifitas.tipeaktifitas_id = Hasil2.tipeaktifitas_id','left']

    ];

    public $toSearch = 
    [
        'Hasil2.*',
    ];


    public $field = [
        ['readonly','teacher_nama'],
        ['readonly','teacher_id'],
        ['select','tujuan_id'],
        ['select','tipeaktifitas_id'],
        ['text','aktifitas_nama'],
        ['date','aktifitas_date']
];

public $fieldName = [
        'Guru',
        'Guru_id',
        'Tujuan Pembelajaran',
        'Tipe Aktifitas',
        'Judul Kegiatan',
        'Tanggal'
        
    ];
 

   public $fieldOption = [
    ];

    public $dataToShow = [];
    public function __construct()
    {
        $this->model = new AktifitasModel();
        
        $this->dataToShow = $this->prepareDataToShow();
    }

    public function getClass(){
        $db = \Config\Database::connect();
        $builder = $db->table('Guru');
        $builder->select('Kelompok.*');
        $builder->join('Kelompok','Kelompok.guru_id = Guru.guru_id','left');
        $builder->where('Guru.guru_id',session()->get('nama'));

        $query = $builder->get();
        return $query->getResult();
    }

    public function getAgama($id = null){
        $db = \Config\Database::connect();
        $builder = $db->table('Tujuan');
        $builder->select('Tujuan.*');
        $builder->where('subjek_id',5);
        if ($id != null) {
            $builder->where('Tujuan.tujuan_id',$id);
        }
          $builder->where('deleted_at',null);
        
        $query = $builder->get();
        return $query->getResult();
    }

    public function getPetakonsep($id = null){
         $db = \Config\Database::connect();
        $builder = $db->table('Petakonsep');
        $builder->select('Petakonsep.*');
        if ($id != null) {
            $builder->where('petakonsep_id',$id);
        }
        
        $builder->where('deleted_at',null);
        
        $query = $builder->get();
        return $query->getResult();
    }

     public function getJati($id = null){
       $db = \Config\Database::connect();
        $builder = $db->table('Tujuan');
        $builder->select('Tujuan.*');
        $builder->whereIn('subjek_id', [4, 7]);

        if ($id !== null) {
            $builder->where('Tujuan.tujuan_id', $id);
        }

        $builder->where('deleted_at', null);

        $query = $builder->get();
        return $query->getResult();
    }
    public function getLiterasi($id = null){
        $db = \Config\Database::connect();
        $builder = $db->table('Tujuan');
        $builder->select('Tujuan.*');
        $builder->where('subjek_id',6);
         if ($id != null) {
            $builder->where('Tujuan.tujuan_id',$id);
        }
          $builder->where('deleted_at',null);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getUnit(){
        $db = \Config\Database::connect();
        $builder = $db->table('Unit');
        $builder->select('Unit.*');
          $builder->where('deleted_at',null);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getSubunit(){
        $db = \Config\Database::connect();
        $builder = $db->table('Subunit');
        $builder->select('Subunit.*');
        $builder->where('deleted_at',null);
        $query = $builder->get();
        return $query->getResult();
    }

     public function new()
    {
        // print_r($this->getAgama());
        $data['guru_nama'] = session()->get('nama');
        $data['guru_id'] = session()->get('guru_id');
        $data['tujuan'] = $this->getdata('Tujuan'); 
        $data['tipeaktifitas'] = $this->getdata('Tipeaktifitas'); 
        $data['kelompok'] = $this->getClass();

        $data['topik'] = $this->getUnit();
        $data['subtopik'] = $this->getSubunit();

        $data['agama'] = $this->getAgama();
        $data['jati'] = $this->getJati();
        $data['literasi'] = $this->getLiterasi();
         $data['petakonsep']    = $this->getPetakonsep();

        return view('/createmodulaba',['data' => $data]);
    }



      public function edit($id = null)
    {
        // 1️⃣ Connect to the database
        $db = \Config\Database::connect();
        $builder = $db->table('Hasil2');

        // 2️⃣ Get the record by ID
        $hasil = $builder->where('hasil_id', $id)->get()->getRow();

        // 3️⃣ Check if data exists
        if (!$hasil) {
            throw PageNotFoundException::forPageNotFound("Data dengan ID $id tidak ditemukan");
        }

        // 4️⃣ Get related dropdown / helper data
        $data['guru_nama']     = session()->get('nama');
        $data['guru_id']       = session()->get('guru_id');
        $data['tujuan']        = $this->getdata('Tujuan'); 
        $data['tipeaktifitas'] = $this->getdata('Tipeaktifitas'); 
        $data['kelompok']      = $this->getClass();
        $data['topik']         = $this->getUnit();
        $data['subtopik']      = $this->getSubunit();
        $data['agama']         = $this->getAgama();
        $data['jati']          = $this->getJati();
        $data['literasi']      = $this->getLiterasi();
        $data['petakonsep']    = $this->getPetakonsep();

        // 5️⃣ Store the main record (for edit form)
        $data['hasil']         = $hasil;

        // 6️⃣ Load the view and pass data
        return view('hasil/edit', ['data' => $data]);
    }

   public function store()
{
    $db = \Config\Database::connect();
    $builder = $db->table('Hasil2');

    

    // ambil semua post
    $data = [
        'guru_nama'      => $this->request->getPost('guru_nama'),
        'kelompok'       => $this->request->getPost('kelompok'),
        'peta_konsep'    => $this->request->getPost('petakonsep'),
        'nilai_agama_1'  => $this->request->getPost('nilai_agama_1'),
        'nilai_agama_2'  => $this->request->getPost('nilai_agama_2'),
        'jati_diri_1'    => $this->request->getPost('jati_diri_1'),
        'jati_diri_2'    => $this->request->getPost('jati_diri_2'),
        'literasi_1'     => $this->request->getPost('literasi_1'),
        'literasi_2'     => $this->request->getPost('literasi_2'),
        'alat_bahan'     => $this->request->getPost('alat_bahan'),
        'semester'       => $this->request->getPost('semester'),
        'topik'          => $this->request->getPost('topik'),
        'subtopik'       => $this->request->getPost('subtopik'),
        'pembiasaan'     => $this->request->getPost('pembiasaan'),
        'pembuka'        => $this->request->getPost('pembuka'),
        'senin'          => $this->request->getPost('senin'),
        'selasa'         => $this->request->getPost('selasa'),
        'rabu'           => $this->request->getPost('rabu'),
        'kamis'          => $this->request->getPost('kamis'),
        'jumat'          => $this->request->getPost('jumat'),
        'istirahat'      => $this->request->getPost('istirahat'),
        'penutup'        => $this->request->getPost('penutup'),
        'assessment'     => $this->request->getPost('assessment'),
    ];

    // insert ke database
    $builder->insert($data);

    return redirect()->to(site_url('Aktifitas'))->with('success', 'Data berhasil disimpan!');
}

public function update($id = null)
{
    $db = \Config\Database::connect();
    $builder = $db->table('Hasil2');

    $data = [
        'kelompok'        => $this->request->getPost('kelompok'),
        'peta_konsep'     => $this->request->getPost('petakonsep'),
        'nilai_agama_1'   => $this->request->getPost('nilai_agama_1'),
        'nilai_agama_2'   => $this->request->getPost('nilai_agama_2'),
        'jati_diri_1'     => $this->request->getPost('jati_diri_1'),
        'jati_diri_2'     => $this->request->getPost('jati_diri_2'),
        'literasi_1'      => $this->request->getPost('literasi_1'),
        'literasi_2'      => $this->request->getPost('literasi_2'),
        'alat_bahan'      => $this->request->getPost('alat_bahan'),
        'semester'        => $this->request->getPost('semester'),
        'topik'           => $this->request->getPost('topik'),
        'subtopik'        => $this->request->getPost('subtopik'),
        'pembiasaan'      => $this->request->getPost('pembiasaan'),
        'pembuka'         => $this->request->getPost('pembuka'),
        'senin'           => $this->request->getPost('senin'),
        'selasa'          => $this->request->getPost('selasa'),
        'rabu'            => $this->request->getPost('rabu'),
        'kamis'           => $this->request->getPost('kamis'),
        'jumat'           => $this->request->getPost('jumat'),
        'istirahat'       => $this->request->getPost('istirahat'),
        'penutup'         => $this->request->getPost('penutup'),
        'assessment'      => $this->request->getPost('assessment'),
        'updated_at'      => date('Y-m-d H:i:s'),
    ];

    // handle upload file peta_konsep kalau ada file baru
    $file = $this->request->getFile('peta_konsep');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move('uploads/', $newName);
        $data['peta_konsep'] = $newName;
    }

    $builder->where('hasil_id', $id)->update($data);

    return redirect()->to('/Aktifitas')->with('success', 'Data berhasil diperbarui');
}

public function print($id)
{
    $db = \Config\Database::connect();
    $builder = $db->table('Hasil2 a');
    $builder->select('a.*');
    // $builder->join('Guru g', 'g.guru_id = a.guru_id', 'left');
    $builder->where('a.hasil_id', $id);
    $hasil = $builder->get()->getRow();

    $data = [
        'hasil' => $hasil,
        'agama' => $this->getAgama($hasil->nilai_agama_1),
        'jati' => $this->getJati($hasil->jati_diri_1),
        'literasi' => $this->getLiterasi($hasil->literasi_1),
        'agama2' => $this->getAgama($hasil->nilai_agama_2),
        'jati2' => $this->getJati($hasil->jati_diri_2),
        'literasi2' => $this->getLiterasi($hasil->literasi_2),
        'unit' => $this->getUnit(),
        'subunit' => $this->getSubunit(),
        'petakonsep' => $this->getPetakonsep($hasil->peta_konsep),
    ];

    // print_r($data);
    // echo json_encode($data);
    return view('hasil/print', $data);
}

public function listpenilaian(){
    return view('hasil/listpenilaian');
}

public function newpenilaian($aktifitas_id){

    $db = \Config\Database::connect();
    $builder = $db->table('Murid');
    $builder->select('Murid.*');
    $builder->where('Murid.deleted_at',null);
    $builder->orderBy('Murid.murid_nama');
    $data = $builder->get()->getResult();

    $builder2 = $db->table('Aktifitas');
    $builder2->select('Aktifitas.*');
    $builder2->where('Aktifitas.aktifitas_id',$aktifitas_id);
    $builder2->where('Aktifitas.deleted_at',null);
    $data2 = $builder2->get()->getResult();

    return view('hasil/createpenilaian',['data' => $data, 'aktifitas' => $data2]);
}

public function edit_nilai($aktifitas_id)
{
    $db = \Config\Database::connect();

    // Get all students and their existing nilai for this activity
    $nilaiData = $db->table('Penilaian')
        ->select('Penilaian.*, Murid.murid_nama')
        ->join('Murid', 'Penilaian.murid_id = Murid.murid_id')
        ->where('Penilaian.aktifitas_id', $aktifitas_id)
        ->orderBy('Murid.murid_nama', 'ASC')
        ->get()
        ->getResult();

    // Check if there is data
    if (empty($nilaiData)) {
        return redirect()->back()->with('error', 'Data penilaian tidak ditemukan.');
    }

    // Get the related activity info
    $aktifitas = $db->table('Aktifitas')
        ->select('Aktifitas.*')
        ->where('Aktifitas.aktifitas_id', $aktifitas_id)
        ->where('Aktifitas.deleted_at', null)
        ->get()
        ->getResult();

    // Pass data to view
    return view('hasil/nilai_edit', [
        'data' => $nilaiData,   // <-- FIXED (use nilaiData)
        'aktifitas' => $aktifitas
    ]);
}


public function simpan_nilai()
{
     $db = \Config\Database::connect();
    // Get all POSTed values
    $nilai = $this->request->getPost('nilai');
    $aktifitas_id = $this->request->getPost('aktifitas_id');

    if ($nilai && is_array($nilai)) {
        foreach ($nilai as $murid_id => $grade) {
            // Example: save to database
            $db->table('Penilaian')
                     ->replace([
                         'murid_id'     => $murid_id,
                         'hasil_id'     => $grade,
                         'aktifitas_id' => $aktifitas_id
                     ]);
        }

        return redirect()->to(site_url('listpenilaian'))->with('success', 'Data berhasil disimpan!');
    }

    return redirect()->back()->with('msg', 'Tidak ada data untuk disimpan.');
}


public function penilaiandata(){

    $builder = Database::connect()->table('Aktifitas')
        ->select('Aktifitas.*, Penilaian.penilaian_id')
        ->join('Penilaian','Aktifitas.aktifitas_id = Penilaian.aktifitas_id','left')
        ->groupBy('aktifitas_id');

    // print_r($builder->get()->getResult());
    // exit();


    $datatable = new Datatable();

    return $datatable->generate($builder, 'Aktifitas.aktifitas_id',[
        'Aktifitas.aktifitas_nama'
    ]);
}

public function update_nilai()
{
    $db = \Config\Database::connect();
    $nilai = $this->request->getPost('nilai');
    $aktifitas_id = $this->request->getPost('aktifitas_id');

    if ($nilai && $aktifitas_id) {
        foreach ($nilai as $murid_id => $hasil_id) {
            // Check if record already exists
            $existing = $db->table('Penilaian')
                ->where('murid_id', $murid_id)
                ->where('aktifitas_id', $aktifitas_id)
                ->get()
                ->getRow();

            if ($existing) {
                // Update existing record
                $db->table('Penilaian')
                    ->where('murid_id', $murid_id)
                    ->where('aktifitas_id', $aktifitas_id)
                    ->update(['hasil_id' => $hasil_id]);
            } else {
                // Insert new record
                $db->table('Penilaian')->insert([
                    'murid_id'     => $murid_id,
                    'aktifitas_id' => $aktifitas_id,
                    'hasil_id'     => $hasil_id
                ]);
            }
        }

         return redirect()->to(site_url('listpenilaian'))->with('success', 'Data berhasil disimpan!');
    } else {
         return redirect()->back()->with('Error', 'Data Tidak berhasil disimpan!');
    }
}


public function print_nilai($aktifitas_id)
{
    $db = \Config\Database::connect();

    // Get student scores
    $nilaiData = $db->table('Penilaian')
        ->select('Penilaian.*, Murid.murid_nama')
        ->join('Murid', 'Penilaian.murid_id = Murid.murid_id')
        ->where('Penilaian.aktifitas_id', $aktifitas_id)
        ->orderBy('Murid.murid_nama', 'ASC')
        ->get()
        ->getResult();

    // Get the related activity info
    $aktifitas = $db->table('Aktifitas')
        ->where('aktifitas_id', $aktifitas_id)
        ->get()
        ->getRow();

    return view('hasil/nilai_print', [
        'data' => $nilaiData,
        'aktifitas' => $aktifitas
    ]);
}







}
