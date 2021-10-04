<?php
namespace App\Imports;

use App\Models\School;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use DB;
use Throwable;
use Validator;

class SchoolImport implements 
ToModel, 
WithHeadingRow,
SkipsOnError,
WithValidation,
SkipsOnFailure
{
    use Importable , SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $get_state_data = School::get_state_data($row['school_state']);

        $statess        = json_decode(json_encode($get_state_data, true));

        $table          = DB::select("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'schools_ht' AND TABLE_NAME = 'school'");

        if (!empty($table)) 
        { 
            $ids = $table[0]->AUTO_INCREMENT; 
        }

        return new School([
            'school_id'         => isset($row['school_id']) ? $row['school_id'] : $ids,
            'school_name'       => isset($row['school_name']) ? $row['school_name'] : '',
            'school_address'    => isset($row['school_address']) ? $row['school_address'] : '',
            'school_district'   => isset($row['school_district']) ? $row['school_district'] : '',
            'school_state'      => isset($statess[0]->state_id) ? $statess[0]->state_id : '',
            'school_email_id'   => isset($row['school_email_id']) ? $row['school_email_id'] : '',
            'school_otp'        => '',
            'status'            => 1,
            'created_by'        => 1,
            'modified_by'       => 1,
            'created_date'      => date("Y-m-d H:i:s"),
            'modified_date'     => date("Y-m-d H:i:s"),
        ]);
    }

    public function rules(): array
    {
        return [
            '*.school_name' => 'unique:school,school_name',
        ];
    }

    public function onFailure(Failure ...$failure)
    {
    }
}
