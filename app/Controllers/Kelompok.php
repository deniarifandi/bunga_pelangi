<?php

namespace App\Controllers;

use App\Models\KelompokModel;

class Kelompok extends MyResourceController
{

    public $table = "Kelompok";
    public $title = "Kelompok";
    public $primaryKey = "kelompok_id";
    
    public $fieldList = [
         ['kelompok_nama', 'Kelompok'],
         // ['guru_id','Guru'],
         ['tingkat_nama','Tingkat'],
         ['guru_nama','Guru Kelas'],
         // ['assguru_nama','Ast. Guru'],
         
    ];


    public $selectList= [
            'Kelompok.*',
            'Guru.guru_nama',
            // 'Guru.guru_nama',
            'Tingkat.*'
        ];

    public $toSearch = 
    [
        'Kelompok.kelompok_nama',
        'Guru.guru_nama'
    ];

     public $where = [
        
    ];

    public $joinTable = [
        ['Guru', 'Guru.guru_id = Kelompok.guru_id','left'],
        ['Tingkat','Kelompok.tingkat_id = Tingkat.tingkat_id','left']
    ];

   public $field = [
        ['text','kelompok_nama'], 
        ['select','guru_id'],
        ['select','assguru_id'],
        ['text','deskripsi'],
        ['select','tingkat_id']
    ];

    public $fieldName = [
        'Nama Kelas', 
        'Guru Kelas',
        'Ast. Guru Kelas',
        'Deskripsi',
        'Tingkat'
    ];

    public $fieldOption = [
        ['noOption'], 
        ['noOption'],
        ['noOption'],
        ['noOption'],
        ['noOption']

    ];

    public $dataToShow = [];

    public function __construct()
    {
        $this->fieldOption[1] = $this->getdata('Guru'); 
        $this->fieldOption[2] = $this->getdata('Guru'); 
        $this->fieldOption[3] = $this->getdata('Tingkat'); 
        $this->model = new KelompokModel();
        $this->dataToShow = $this->prepareDataToShow();
    }

    public function print(){
        
        $db = \Config\Database::connect();
        $builder = $db->table('Kelompok');
        $builder->select('*');
        $builder->join('Guru','Kelompok.guru_id = Guru.guru_id','left');
        $builder->join('Tingkat','Tingkat.tingkat_id = Kelompok.tingkat_id','left');
        $builder->where('Kelompok.deleted_at', null);
        $builder->orderBy('Kelompok.tingkat_id');
        $query = $builder->get();

        return view('/report/kelompok_print',['data' => $query->getResult()]);

    }

}
