<?php

namespace App\Controllers;

use App\Models\MuridModel;

class Murid extends MyResourceController
{

    public $table = "Murid";
    public $title = "Murid";
    public $primaryKey = "murid_id";

    //List Parameter
    public $fieldList = [
        ['murid_nama','Nama Murid'], 
        ['murid_jk', 'Gender'],
        ['murid_agama','Agama'],
        ['nis','NIS'],
        ['kelompok_nama','Kelompok'],
        ['guru_nama','Guru Kelas'],
        ['deskripsi','Deskripsi']
    ];

      public $selectList= [
            'Murid.*',
            'Kelompok.*',
            'Guru.*'
        ];

    public $toSearch = 
    [
        'Kelompok.kelompok_nama',
        'Murid.murid_nama',
        'Guru.guru_nama',
        'Murid.nis',
        'Murid.murid_agama'
    ];

     public $where = [
      
    ];

    public $joinTable = [
        ['Kelompok', 'Murid.kelompok_id = Kelompok.kelompok_id','left'],
        ['Guru', 'Guru.guru_id = Kelompok.guru_id','left']
    ];

    //Insert & Update Parameter

    public $field = [
        ['text','murid_nama'], 
        ['select','kelompok_id'],
        ['text','nis']
    ];

    public $fieldName = [
        'Nama Murid', 
        'Kelas',
        'NIS'
    ];

    public $fieldOption = [
      ['noOption'], 
      ['noOption']
  ];

  public $dataToShow = [];

  public function __construct()
  {
    $this->fieldOption[1] = $this->getdata('Kelompok'); 
    $this->model = new MuridModel();
    $this->dataToShow = $this->prepareDataToShow();
}



}
