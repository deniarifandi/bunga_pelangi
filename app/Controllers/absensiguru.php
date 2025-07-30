<?php

namespace App\Controllers;

use Config\Database;
use \DateTime;

class absensiguru extends BaseController
{
    
    public function __construct()
    {
      
    
    }

    public function index(){
        $user =  session()->get('guru_id');

        $builder = Database::connect()->table('Guru');
        $builder->select('absensiguru.*, Guru.*');
        $builder->join('absensiguru','Guru.guru_id = absensiguru.guru_id');
        $builder->groupBy('tanggal');
        $builder->orderBy('tanggal','desc');


        // print_r($builder->get()->getResult());
        $data = $builder->get()->getResult();
        return view('mli/listAbsensiGuru',['data' => $data]);
    }

    public function frontGuru(){

      $today = new DateTime();

        // Get 21st of previous month
        $startDate = (clone $today)->setDate(
            $today->format('Y'),
            $today->format('m'),
            1
        );

        // Get 20th of *this* month
       $endDate = (clone $today)->modify('last day of this month');

        // Format for input date
        $startDateStr = $startDate->format('Y-m-d');
        $endDateStr = $endDate->format('Y-m-d');

        

        $this->db = \Config\Database::connect(); 
        $builder = $this->db->table('Divisi');
        $builder->select('Divisi.divisi_id, Divisi.divisi_nama');
        $result = $builder->get()->getResult();

        // print_r($result);
        return view('/presence/frontguru',['divisis' => $result,'start' => $startDateStr, 'end'=> $endDateStr]);
    }

    public function result(){
        // Get inputs
    $startDate = $this->request->getGet('start');
    $endDate = $this->request->getGet('end');
    $divisi_id = $this->request->getGet('division');

    // Format dates
    $startDateObj = new DateTime($startDate);
    $endDateObj = new DateTime($endDate);
    $startMonthName = $startDateObj->format('F');
    $endMonthName = $endDateObj->format('F');

    // Generate dynamic columns
    $dates = [];
    $columns = [];
    $period = new \DatePeriod(
        new \DateTime($startDate),
        new \DateInterval('P1D'),
        (new \DateTime($endDate))->modify('+1 day')
    );

    foreach ($period as $date) {
        $label = $date->format('M d');
        $dateString = $date->format('Y-m-d');
        $dates[] = $label;
        $columns[] = "
            MAX(
                CASE 
                    WHEN DATE(p.tanggal) = '$dateString' THEN p.status 
                    ELSE NULL 
                END
            ) AS `$label`";
    }

    // Build query
    $db = \Config\Database::connect();
    $sql = "
    SELECT 
        g.guru_nama,
        j.jabatan_nama,
        d.divisi_nama,
        " . implode(",\n", $columns) . "
    FROM Guru g
    JOIN Gurudivisi gd ON gd.guru_id = g.guru_id
    JOIN Divisi d ON d.divisi_id = gd.divisi_id
    LEFT JOIN Gurujabatan gj ON gj.guru_id = g.guru_id
    LEFT JOIN Jabatan j ON j.jabatan_id = gj.jabatan_id
    LEFT JOIN absensiguru p 
        ON p.guru_id = g.guru_id 
        AND DATE(p.tanggal) BETWEEN '$startDate' AND '$endDate'
    WHERE d.divisi_id = '$divisi_id'
    GROUP BY g.guru_id
    ORDER BY g.guru_nama
    ";

    $query = $db->query($sql);
    $results = $query->getResult();

    if (count($results) < 1) {
        return view('presence/reportguru'); // fallback
    }

    // print_r($results);
    return view('presence/reportguru', [
        'results' => $results,
        'dates' => $dates,
        'startMonth' => $startMonthName,
        'endMonth' => $endMonthName,
        'division' => $results[0]->divisi_nama,
    ]);
    }

    public function addAbsensi(){
        // $user =  session()->get('guru_id');
        $builder = Database::connect()->table('Guru');
        $builder->select('Guru.*');
        
        
        $data = $builder->get()->getResult();
        return view('mli/addAbsensiGuru',['data' => $data]);
    }

    public function editAbsensi($date)
    {
                $db = \Config\Database::connect();
        $builder = $db->table('absensiguru');
        
         $builder->select('absensiguru.*, Guru.*');
        $builder->join('Guru','Guru.guru_id = absensiguru.guru_id');
        $builder->where('tanggal', $date);
        // $builder->groupStart()

        $data['absensi'] = $builder->get()->getResult();
        $data['tanggal'] = $date;
        // print_r($data);
        // echo json_encode($data);
        return view('mli/editAbsensiGuru', ['data' => $data]);
    }

    public function delete($tanggal)
    {
        

            $db = \Config\Database::connect();

            // Step 1: Get murid_id under this teacher
            $muridBuilder = $db->table('Guru');
            $muridBuilder->select('Guru.guru_id');
           
            $muridIDs = $muridBuilder->get()->getResultArray();

            $muridIDList = array_column($muridIDs, 'guru_id');

            if (!empty($muridIDList)) {
                // Step 2: Delete from absensi where date and murid_id match
                $absenBuilder = $db->table('absensiguru');
                $absenBuilder->where('tanggal', $tanggal);
                $absenBuilder->whereIn('guru_id', $muridIDList);
                $absenBuilder->delete();

                session()->setFlashdata('success', 'Student attendance on ' . date('j-M-Y', strtotime($tanggal)) . ' deleted.');
            } else {
                session()->setFlashdata('error', 'No students found for this teacher.');
            }

            return redirect()->to(site_url('absensiguru'));
    }

  public function saveAbsensi()
{

    // echo $this->request->getPost('date');;
    $db = \Config\Database::connect();
    $builder = $db->table('absensiguru'); // your attendance table name

    $guru_ids = $this->request->getPost('guru_id');      // array of student IDs
    $attendances = $this->request->getPost('attendance');  // array of attendance statuses
    $keterangans = $this->request->getPost('keterangan');
    $date = $this->request->getPost('date'); // or get from form input if needed

    for ($i = 0; $i < count($guru_ids); $i++) {
        // Prepare data for each student
        $data = [
            'guru_id' => $guru_ids[$i],
            'status'   => $attendances[$i], // 1 = present, 2 = absent, 3 = sick
            'tanggal'  => $date,
            'absensi_keterangan' => $keterangans[$i]
        ];

        // Insert or update logic (optional: check if record exists for that date + murid)
        $existing = $builder
            ->where('guru_id', $guru_ids[$i])
            ->where('tanggal', $date)
            ->get()
            ->getRow();

        if ($existing) {
            // Update existing record
            $builder->where('absensi_id', $existing->absensi_id)->update($data);
        } else {
            // Insert new record
            $builder->insert($data);
        }
    }

     session()->setFlashdata('success', 'Student Attendance Filled');
    return redirect()->to(site_url('absensiguru'));
}

}
