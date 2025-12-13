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

    public function getAktifitas($id = null){
        $db = \Config\Database::connect();
        $builder = $db->table('Aktifitas');
        $builder->select('Aktifitas.*');
        
        $query = $builder->get();
        return $query->getResult();
    }

    public function getPetakonsep($id = null)
{
    $db = \Config\Database::connect();
    $builder = $db->table('Petakonsep');
    $builder->select('Petakonsep.*');

    if ($id !== null) {
        $builder->where('petakonsep_id', $id);
    }

    $builder->where('deleted_at', null);
    $query = $builder->get();
    $result = $query->getResult();

    // Ensure it always returns an array (even if empty)
    if (empty($result)) {
        return []; // empty array = safe for view check
    }

    return $result;
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
        // print_r($data['tipeaktifitas']);
        // exit();
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

        // print_r($hasil);
        // exit();

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
    $builder->select('a.*, 
        b.tipeaktifitas_nama as senin, 
        c.tipeaktifitas_nama as selasa,
        d.tipeaktifitas_nama as rabu,
        e.tipeaktifitas_nama as kamis,
        f.tipeaktifitas_nama as jumat,
        u.unit_nama,
        s.subunit_nama
        ');
    $builder->join('Tipeaktifitas b', 'b.tipeaktifitas_id = a.senin','left');
    $builder->join('Tipeaktifitas c', 'c.tipeaktifitas_id = a.selasa','left');
    $builder->join('Tipeaktifitas d', 'd.tipeaktifitas_id = a.rabu','left');
    $builder->join('Tipeaktifitas e', 'e.tipeaktifitas_id = a.kamis','left');
    $builder->join('Tipeaktifitas f', 'f.tipeaktifitas_id = a.jumat','left');
    $builder->join('Unit u','u.unit_id = a.topik');
    $builder->join('Subunit s','s.subunit_id = a.subtopik');
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
        'petakonsep' => $this->getPetakonsep($hasil->peta_konsep),
    ];

    // print_r($data);
   
    return view('hasil/print', $data);
}

public function listpenilaian(){
    return view('hasil/listpenilaian');
}

 public function newPenilaian(int $tipeaktifitas_id)
    {


        $guruId    = session()->get('guru_id');
        $assGuruId = session()->get('assguru_id') ?? $guruId;

        $db = \Config\Database::connect();

        // Murid list
        $muridBuilder = $db->table('Murid')
            ->select('Murid.*, Kelompok.kelompok_nama')
            ->join('Kelompok', 'Kelompok.kelompok_id = Murid.kelompok_id','left')
            ->where('Murid.deleted_at', null)
            ->groupStart();
            // ->get()->getResult();

        // print_r($muridBuilder);
        // exit();

        if ($guruId == 3 || $guruId == 4) {
            $muridBuilder->where('Kelompok.kelompok_id >', 2);
        }

        $muridBuilder
            ->orWhere('Kelompok.assguru_id', $assGuruId)
            ->groupEnd()
            ->orderBy('Murid.murid_nama', 'ASC');

        $muridList = $muridBuilder->get()->getResult();

        // Aktivitas
        $aktifitas = $db->table('Tipeaktifitas')
            ->where('tipeaktifitas_id', $tipeaktifitas_id)
            ->where('deleted_at', null)
            ->get()
            ->getRow();

        if (!$aktifitas) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('hasil/createpenilaian', [
            'data'      => $muridList,
            'aktifitas' => $aktifitas
        ]);
    }

public function edit_nilai(int $tipeaktifitas_id)
{
    $guruId    = session()->get('guru_id');
    $assGuruId = session()->get('assguru_id') ?? $guruId;

    if (!$guruId) {
        return redirect()->to('/login');
    }

    $db = \Config\Database::connect();

    /*
     * =========================
     * Murid + existing nilai
     * =========================
     */
    $builder = $db->table('Murid');
    $builder
        ->select('
            Murid.murid_id,
            Murid.murid_nama,
            Kelompok.kelompok_nama,
            Penilaian.hasil_id
        ')
        ->join('Kelompok', 'Kelompok.kelompok_id = Murid.kelompok_id', 'left')
        ->join(
            'Penilaian',
            'Penilaian.murid_id = Murid.murid_id 
             AND Penilaian.aktifitas_id = ' . (int) $tipeaktifitas_id,
            'left'
        )
        ->groupBy('murid_id')
        ->where('Murid.deleted_at', null)
        ->groupStart();

    // Same rule as newPenilaian()
    if ($guruId == 3 || $guruId == 4) {
        $builder->where('Kelompok.kelompok_id >', 2);
    }

    $builder
        ->orWhere('Kelompok.assguru_id', $assGuruId)
        ->groupEnd()
        ->orderBy('Murid.murid_nama', 'ASC');

    $nilaiList = $builder->get()->getResult();

    if (empty($nilaiList)) {
        return redirect()->back()
            ->with('error', 'Data penilaian tidak ditemukan.');
    }

    /*
     * =========================
     * Aktivitas
     * =========================
     */
    $aktifitas = $db->table('Tipeaktifitas')
        ->where('tipeaktifitas_id', $tipeaktifitas_id)
        ->where('deleted_at', null)
        ->get()
        ->getRow();

    if (!$aktifitas) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    /*
     * =========================
     * View
     * =========================
     */
    return view('hasil/nilai_edit', [
        'data'      => $nilaiList,
        'aktifitas' => $aktifitas
    ]);
}



public function simpan_nilai()
{
    $db = \Config\Database::connect();

    $nilaiData   = $this->request->getPost('nilai');
    $aktifitasId = $this->request->getPost('tipeaktifitas_id');
    $guruId      = session()->get('guru_id');

    if (!$guruId || !$aktifitasId || empty($nilaiData)) {
        return redirect()->back()->with('error', 'Data tidak valid');
    }

    foreach ($nilaiData as $muridId => $nilai) {

        if (!in_array($nilai, ['MB', 'B', 'BSH', 'SB'], true)) {
            continue;
        }

        // Check existing
        $exists = $db->table('Penilaian')
            ->where('murid_id', $muridId)
            ->where('aktifitas_id', $aktifitasId) // 🔴 IMPORTANT
            ->countAllResults();

        if ($exists > 0) {
            // UPDATE
            $db->table('Penilaian')
                ->where('murid_id', $muridId)
                ->where('aktifitas_id', $aktifitasId)
                ->update([
                    'hasil_id' => $nilai
                ]);
        } else {
            // INSERT
            $db->table('Penilaian')->insert([
                'murid_id'     => $muridId,
                'aktifitas_id' => $aktifitasId,
                'hasil_id'        => $nilai
            ]);
        }
    }

    return redirect()->to(site_url('listpenilaian'))
        ->with('success', 'Penilaian berhasil disimpan');
}





public function penilaiandata(){

    $kelompok_id = session()->get('kelompok_id');

    $builder = Database::connect()->table('Tipeaktifitas')
        ->select('Tipeaktifitas.*, Penilaian.penilaian_id')
        ->join('Penilaian','Tipeaktifitas.tipeaktifitas_id = Penilaian.aktifitas_id','left')
        ->join('Tingkat','Tingkat.tingkat_id = Tipeaktifitas.tingkat_id')
        ->join('Kelompok','Kelompok.tingkat_id = Tingkat.tingkat_id')
        ->where('kelompok_id',$kelompok_id)
        ->groupBy('tipeaktifitas_id');

    // print_r($builder->get()->getResult());
    // exit();


    $datatable = new Datatable();

    return $datatable->generate($builder, 'Tipeaktifitas.tipeaktifitas_id',[
        'Tipeaktifitas.tipeaktifitas_nama'
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
    $subquery = $db->table('Penilaian')
    ->select('MAX(penilaian_id) as latest_id')
    ->where('aktifitas_id', $aktifitas_id)
    ->groupBy('murid_id');

$nilaiData = $db->table('Penilaian')
    ->select('Penilaian.*, Murid.murid_nama')
    ->join('Murid', 'Penilaian.murid_id = Murid.murid_id')
    ->join("({$subquery->getCompiledSelect()}) as latest", 'Penilaian.penilaian_id = latest.latest_id')
    ->orderBy('Murid.murid_nama', 'ASC')
    ->get()
    ->getResult();

    // Get the related activity info
    $aktifitas = $db->table('Tipeaktifitas')
        ->where('tipeaktifitas_id', $aktifitas_id)
        ->get()
        ->getRow();

    return view('hasil/nilai_print', [
        'data' => $nilaiData,
        'aktifitas' => $aktifitas
    ]);
}







}
