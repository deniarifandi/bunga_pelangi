<?php

namespace App\Controllers;

//use CodeIgniter\RESTful\ResourceController;
use App\Models\TujuanModel;
use App\Libraries\datatable;
use Config\Database;

class Tujuan extends MyResourceController
{

    public $table = "Tujuan";
    public $title = "Tujuan Pembelajaran";
    public $primaryKey = "tujuan_id";
    public $fieldList = [
        ['tujuan_nama','Tujuan Pembelajaran'],
    // ['tujuan_date','Date'],
        // ['subunit_nama','Sub-Topik'],
        ['subjek_nama','Capaian']

    ];

    public $selectList= [
            'Tujuan.*',
            // 'Tingkat.tingkat_nama',
            // 'Unit.*',
            'Subjek.*'
        ];

 public $where = [
      
    ];

    public $toSearch = 
    [
        // 'Tingkat.tingkat_nama',
        // 'Unit.unit_nama'

    ];

    public $joinTable = [
        // ['Tingkat', 'Tingkat.tingkat_id = Tujuan.tingkat_id','left'],

        ['Subjek','Subjek.subjek_id = Tujuan.subjek_id','left'],
        // ['Unit','Unit.unit_id = Subunit.unit_id','left']
    ];



    public $field = [
        ['select','subjek_id'],
        // ['date','tujuan_date'],
        ['text','tujuan_nama'],

];

public $fieldName = [
        'Capaian Pembelajaran',
        'Tujuan Pembelajaran',
        // 'Date'
    ];

public $fieldOption = [
    ['noOption'],
    ['noOption'],
    ['noOption'], 
    ['noOption'],
    ['noOption'],
    ['noOption'], 
    ['noOption'],
    ['noOption'],
    ['noOption'], 
    ['noOption'],
    ['noOption'],
    ['noOption']
];

    public $dataToShow = [];


    public function __construct()
    {
        $this->fieldOption[0] = $this->getdata('Subjek'); 
        $this->model = new TujuanModel();
        $this->dataToShow = $this->prepareDataToShow();
       
    }


     

}
