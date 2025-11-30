<?php

namespace App\Controllers;

//use CodeIgniter\RESTful\ResourceController;
use App\Models\TipeaktifitasModel;
use App\Libraries\datatable;
use Config\Database;

class Tipeaktifitas extends MyResourceController
{

    public $table = "Tipeaktifitas";
    public $title = "Jenis Aktifitas Harian";
    public $primaryKey = "tipeaktifitas_id";
    public $fieldList = [
        ['tipeaktifitas_nama','Activity Name'],
        ['tingkat_nama','Level']
        // ['Aktifitas_password','Password']
    ];

    public $selectList= [
            'Tipeaktifitas.*',
            'Tingkat.tingkat_nama'
    ];

    public $toSearch = 
    [
        'Tipeaktifitas.*',
    ];

    
    public $joinTable = [
        ['Tingkat', 'Tingkat.tingkat_id = Tipeaktifitas.tingkat_id','left'],
        // ['Unit','Unit.unit_id = Subunit.unit_id','left']
    ];


    public $field = [
        ['text','tipeaktifitas_nama'],
        ['select','tingkat_id']
];

public $fieldName = [
        'Aktifitas Harian',
        'Level'
    ];

public $fieldOption = [
        [''],
        ['noOption'],
        ['noOption']
];

    public $dataToShow = [];


    public function __construct()
    {
        $tingkat_id = session()->get('tingkat_id');
    
        $this->where = [
          "Tipeaktifitas.tingkat_id" => $tingkat_id,
        ];
        $this->model = new TipeaktifitasModel();
        $this->fieldOption[1] = $this->getdata('Tingkat');
        $this->dataToShow = $this->prepareDataToShow();
    }

}
