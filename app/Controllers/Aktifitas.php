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

    public function getAgama(){
        $db = \Config\Database::connect();
        $builder = $db->table('Tujuan');
        $builder->select('Tujuan.*');
        $builder->where('subjek_id',5);
        $query = $builder->get();
        return $query->getResult();
    }

     public function getJati(){
        $db = \Config\Database::connect();
        $builder = $db->table('Tujuan');
        $builder->select('Tujuan.*');
        $builder->where('subjek_id',4);
        $query = $builder->get();
        return $query->getResult();
    }
    public function getLiterasi(){
        $db = \Config\Database::connect();
        $builder = $db->table('Tujuan');
        $builder->select('Tujuan.*');
        $builder->where('subjek_id',6);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getUnit(){
        $db = \Config\Database::connect();
        $builder = $db->table('Unit');
        $builder->select('Unit.*');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getSubunit(){
        $db = \Config\Database::connect();
        $builder = $db->table('Subunit');
        $builder->select('Subunit.*');
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
        return view('/createmodulaba',['data' => $data]);
    }

      public function edit($id = null)
{
    $db = \Config\Database::connect();
    $builder = $db->table('Hasil2');
    $hasil = $builder->where('hasil_id', $id)->get()->getRow();

    if (!$hasil) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data dengan ID $id tidak ditemukan");
    }

    $data['guru_nama']   = session()->get('nama');
    $data['guru_id']     = session()->get('guru_id');
    $data['tujuan']      = $this->getdata('Tujuan'); 
    $data['tipeaktifitas'] = $this->getdata('Tipeaktifitas'); 
    $data['kelompok']    = $this->getClass();

    $data['topik']       = $this->getUnit();
    $data['subtopik']    = $this->getSubunit();

    $data['agama']       = $this->getAgama();
    $data['jati']        = $this->getJati();
    $data['literasi']    = $this->getLiterasi();

    $data['hasil']       = $hasil; // data lama untuk form edit

    return view('/hasil/edit', $data);
}

   public function store()
{
    $db = \Config\Database::connect();
    $builder = $db->table('Hasil2');

    // handle upload peta_konsep
    $petaKonsepFile = $this->request->getFile('peta_konsep');
    $petaKonsepName = null;
    if ($petaKonsepFile && $petaKonsepFile->isValid() && !$petaKonsepFile->hasMoved()) {
        $petaKonsepName = $petaKonsepFile->getRandomName();
        $petaKonsepFile->move(FCPATH . 'uploads', $petaKonsepName);
    }

    // ambil semua post
    $data = [
        'guru_nama'      => $this->request->getPost('guru_nama'),
        'kelompok'       => $this->request->getPost('kelompok'),
        'peta_konsep'    => $petaKonsepName,
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
        'peta_konsep'     => $this->request->getFile('peta_konsep')->getName(),
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
        'agama' => $this->getAgama(),
        'jati' => $this->getJati(),
        'literasi' => $this->getLiterasi(),
        'unit' => $this->getUnit(),
        'subunit' => $this->getSubunit(),
    ];

    // print_r($data);
    // echo json_encode($data);
    return view('hasil/print', $data);
}





}
