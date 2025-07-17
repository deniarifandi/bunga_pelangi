<?php

namespace App\Controllers;

//use CodeIgniter\RESTful\ResourceController;
use App\Models\DivisiModel;
use App\Libraries\datatable;
use Config\Database;

class Divisi extends MyResourceController
{

    public $table = "Divisi";
    public $title = "Divisi";
    public $primaryKey = "divisi_id";
    public $fieldList = [
        ['divisi_nama','Nama Divisi/Cabang']
    ];

    public $selectList= [
            'Divisi.divisi_id',
            'Divisi.divisi_nama'
    ];

    public $joinTable = [
    ];

    public $toSearch = 
    [
        // 'Divisi.*',
    ];

    public $where = [
       
    ];



    public $field = [
        ['text','divisi_nama']
];

public $fieldName = [
        'Nama Divisi/Cabang'
        
    ];

public $fieldOption = [
        ['noOption'],
        ['noOption'],
        ['noOption'],
        ['noOption'],

];

// public $orderBy = ['Subjek.subjek_nama' => 'ASC'];
public $groupBy = 'Divisi.divisi_nama';

    public $dataToShow = [];


    public function __construct()
    {
        $this->model = new DivisiModel();
        $this->dataToShow = $this->prepareDataToShow();
    }

    

}
