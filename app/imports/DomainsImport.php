<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PharIo\Manifest\Email;

class DomainsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        //foreach($rows as $row){
            User::create([
                'name' => 'pqr',
                'Email' => 'pqr@example.com',
                'password' => 'pqr@123456',
            ]);    
        //}
 
        // if(count($rows)>0){
        //     foreach($rows as $row){
        //         dd($row[0]);
        //     }
        // }        
    }
}
