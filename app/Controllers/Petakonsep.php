<?php

namespace App\Controllers;

//use CodeIgniter\RESTful\ResourceController;
use App\Models\PetakonsepModel;
use App\Libraries\datatable;
use Config\Database;

class Petakonsep extends MyResourceController
{

    public $table = "Petakonsep";
    public $title = "Petakonsep";
    public $primaryKey = "petakonsep_id";
    public $fieldList = [
        ['judul','Judul Petakonsep'], 
        ['url','URL']        
    ];

     public $where = [
      
    ];


    public $selectList= [
            'Petakonsep.*',
        ];

    public $toSearch = 
    [
        'guru.guru_nama'
    ];


    public $field = [
        ['text','judul'], 
        ['file','url'],
];

public $fieldName = [
        'judul', 
        'url'
    ];

public $fieldOption = [
];

    public $dataToShow = [];


    public function __construct()
    {
        $this->model = new PetakonsepModel();
        $this->dataToShow = $this->prepareDataToShow();
    }

    // public function data(){
    //     $builder = Database::connect()->table($this->table)
    //     ->select('petakonsep.*')
    //     ->where('petakonsep.deleted_at',NULL);

    //     $datatable = new Datatable();

    //     return $datatable->generate($builder, 'petakonsep.petakonsep_id',[
    //         'petakonsep.judul'
    //     ]);
    // }

     public function delete($id = null)
    {

        echo "test";
        // $model = new Hasil2Model();

        // if (! $model->find($id)) {
        //     return $this->failNotFound("Record with ID $id not found.");
        // }

        // if ($model->delete($id)) {
        //     return $this->respondDeleted([
        //         'status'  => true,
        //         'message' => "Record with ID $id deleted successfully."
        //     ]);
        // }

        // return $this->fail("Failed to delete record with ID $id.");
    }

}
