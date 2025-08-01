<?php

namespace App\Controllers;

//use CodeIgniter\RESTful\ResourceController;
use App\Models\SubjekModel;
use App\Libraries\datatable;
use Config\Database;

class Subjek extends MyResourceController
{

    public $table = "Subjek";
    public $title = "Capaian Pembelajaran";
    public $primaryKey = "subjek_id";

    public $fieldList = [
        ['subjek_nama','Capaian Pembelajaran']
    ];


    public $selectList= [
            'Subjek.*'
        ];

    public $toSearch = 
    [
        'Guru.guru_nama'
    ];

     public $where = [
      
    ];


    public $field = [
        ['text','subjek_nama'],
        // ['select','kelompok_id']
];

public $fieldName = [
        'Subjek',
        'Tingkat'
    ];

public $fieldOption = [
  ['noOption'],
  ['noOption']
];

    public $dataToShow = [];


    public function __construct()
    {
        $this->fieldOption[1] = $this->getdata('Tingkat'); 
        $this->model = new SubjekModel();
        $this->dataToShow = $this->prepareDataToShow();
    }

}
