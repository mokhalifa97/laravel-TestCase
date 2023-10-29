<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;


class UsersImport implements ToModel
{
    
    public function model(array $row)
    {
        return new User([
            // 'id'=> $row[0],
            'full_name'=> $row[1],
            'phone_number'=> $row[2],
            'email'=> $row[3], 
            
        ]);
    }

    
}
