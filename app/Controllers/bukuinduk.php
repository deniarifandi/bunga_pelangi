<?php

namespace App\Controllers;

class bukuinduk extends BaseController
{

    
    public function __construct()
    {

    }

    public function index(){

        // print_r($results);
        // print_r($this->data());
        // print_r($this->data());
        echo view('bukuinduk/index');

    }

    public function data(){

       $db = \Config\Database::connect();
        $builder = $db->table('Murid');
        $builder->join('Kelompok','Murid.kelompok_id = Kelompok.kelompok_id');
        $builder->orderBy('Murid.kelompok_id');
        $builder->orderBy('Murid.murid_nama');

        $query = $builder->get();
        $data = $query->getResultArray();

        return $this->response->setJSON(['data' => $data]);
    }

    public function edit($murid_id){

        $db = \Config\Database::connect();
        $builder = $db->table('Murid');
        $builder->where('murid_id',$murid_id);
        $query = $builder->get();
    
        $data = $query->getResultArray();

        $exist = $db->table('Identitasanak')->where('murid_id', $murid_id)->get()->getRowArray();

        // print_r($exist);
        return view('bukuinduk/edit',['data'=>$data,'exist' => $exist]);
    }

   public function save()
{
    $db = \Config\Database::connect();
    $builder = $db->table('Identitasanak');

    $id = $this->request->getPost('anak_id'); // used for checking existence

    // Build data array
    $data = [
        'anak_id'               => $this->request->getPost('anak_id'),
        'anak_nis'               => $this->request->getPost('anak_nis'),
        'anak_nama'              => $this->request->getPost('anak_nama'),
        'anak_panggilan'         => $this->request->getPost('anak_panggilan'),
        'anak_jk'                => $this->request->getPost('anak_jk'),
        'anak_tempat'                => $this->request->getPost('anak_tempat'),
        'anak_ttl'               => $this->request->getPost('anak_ttl'),
        'anak_agama'             => $this->request->getPost('anak_agama'),
        'anak_kewarganegaraan'   => $this->request->getPost('anak_kewarganegaraan'),
        'anak_ke'                => $this->request->getPost('anak_ke'),
        'anak_status'            => $this->request->getPost('anak_status'),
        'anak_bahasa'            => $this->request->getPost('anak_bahasa'),
        'anak_alamat'            => $this->request->getPost('anak_alamat'),
        'anak_ayahnama'          => $this->request->getPost('anak_ayahnama'),
        'anak_ayahsekolah'       => $this->request->getPost('anak_ayahsekolah'),
        'anak_ayahkerja'         => $this->request->getPost('anak_ayahkerja'),
        'anak_ibunama'           => $this->request->getPost('anak_ibunama'),
        'anak_ibusekolah'        => $this->request->getPost('anak_ibusekolah'),
        'anak_ibukerja'          => $this->request->getPost('anak_ibukerja'),
        'anak_wali'              => $this->request->getPost('anak_wali'),
        'anak_hubungan'          => $this->request->getPost('anak_hubungan'),
        'anak_alamatortu'        => $this->request->getPost('anak_alamatortu'),
        'anak_hportu'            => $this->request->getPost('anak_hportu'),
        'anak_darah'             => $this->request->getPost('anak_darah'),
        'anak_berat'             => $this->request->getPost('anak_berat'),
        'anak_tinggi'             => $this->request->getPost('anak_tinggi'),
        'anak_rawayat'           => $this->request->getPost('anak_rawayat'),
        'anak_imunisasi'         => $this->request->getPost('anak_imunisasi'),
        'anak_bicara'            => $this->request->getPost('anak_bicara'),
        'anak_kondisi'           => $this->request->getPost('anak_kondisi'),
        'anak_tanggalmasuk'      => $this->request->getPost('anak_tanggalmasuk'),
        'anak_usiamasuk'         => $this->request->getPost('anak_usiamasuk'),
        'anak_kelompok'          => $this->request->getPost('anak_kelompok'),
        'anak_tanggalkeluar'     => $this->request->getPost('anak_tanggalkeluar'),
        'anak_alasan'            => $this->request->getPost('anak_alasan'),
        'anak_melanjutkan'       => $this->request->getPost('anak_melanjutkan'),
        'anak_prestasi'          => $this->request->getPost('anak_prestasi'),
        'anak_perkembangan'      => $this->request->getPost('anak_perkembangan'),
        'anak_catatan'           => $this->request->getPost('anak_catatan'),
    ];

      $foto = $this->request->getFile('anak_foto');

    // Handle image upload
       // Only process upload if a file was submitted
    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $newName = $foto->getRandomName();
        $foto->move('uploads/foto', $newName);
        $data['anak_foto'] = $newName;

        // Optional: delete old photo
        // $old = $this->db->table('bukuinduk')->getWhere(['anak_id' => $id])->getRowArray();
        if (!empty($old['anak_foto']) && file_exists('uploads/foto/' . $old['anak_foto'])) {
            unlink('uploads/foto/' . $old['anak_foto']);
        }
    }

    // Check if record exists
    $exists = $builder->where('anak_id', $id)->get()->getRowArray();

    if ($exists) {
        $success = $builder->where('anak_id', $id)->update($data);
        $message = $success ? 'Data updated successfully!' : 'Failed to update data.';
    } else {
        $success = $builder->insert($data);
        $message = $success ? 'Data saved successfully!' : 'Failed to save data.';
    }

    session()->setFlashdata('message', $message);
    return redirect()->to('/bukuinduk');
}

public function print($id)
{

        $db1 = \Config\Database::connect();
        $builder1 = $db1->table('Murid');
        $builder1->where('murid_id',$id);
        $query1 = $builder1->get();
    
        $data1 = $query1->getResultArray();

    $db = \Config\Database::connect();
    $builder = $db->table('Identitasanak');
    $data['Identitasanak'] = $builder->where('murid_id', $id)->get()->getRow();

   if (empty($data['Identitasanak'])) {
    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data anak tidak ditemukan.");
}
    // print_r($data);

    return view('bukuinduk/print', ['anak' => $data['Identitasanak'], 'data' => $data1]);
}


}
