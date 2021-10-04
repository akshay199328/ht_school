<?php

namespace App\Imports;

use App\Models\School;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SchoolImport implements 
ToModel, 
WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $get_state_data = School::get_state_data($row['school_state']);

        $state = json_decode(json_encode($get_state_data, true));

        // echo '<pre>';print_r($row['school_state']);exit;
        return new School([
            'school_name' => isset($row['school_name']) ? $row['school_name'] : '',
            'school_address' => isset($row['school_address']) ? $row['school_address'] : '',
            'school_district' => isset($row['school_district']) ? $row['school_district'] : '',
            'school_state' => isset($state[0]->state_id) ? $state[0]->state_id : 0,
            'school_email_id' => isset($row['school_email_id']) ? $row['school_email_id'] : '',
            'school_otp' => ''
        ]);
    }
}
