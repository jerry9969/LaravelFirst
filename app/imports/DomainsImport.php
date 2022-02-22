<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\Domain;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PharIo\Manifest\Email;

class DomainsImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            //echo "<pre>";
            //echo ($row['mob_no']);
            $client_id = Client::where('mob_no',$row['mob_no'])->first();
            //echo $client_id;
            if($client_id){
                if(Domain::where('name',$row['domain_name'])->first()){
                    continue;
                }else{        
                    Domain::create([
                        'client_id' => $client_id->id,
                        'name' => $row['domain_name'],
                        'expiry_date' => $row['expiry_date'],
                    ]);    
                }
                //continue;
            }else{
                $client_id = Client::create([
                    'name' => $row['name'],
                    'mob_no' => $row['mob_no'],
                ]); 
                Domain::create([
                    'client_id' => $client_id->id,
                    'name' => $row['domain_name'],
                    'expiry_date' => $row['expiry_date'],
                ]);
                //echo ($row['mob_no']);
                            }
            // $client_id = Client::create([
            //      'name' => $row[0],
            //      'mob_no' => $row[1],
            // ]);
            
            // Domain::create([
            //     'client_id' => $client_id->id,
            //     'name' => $row[2],
            //     'expiry_date' => $row[3],
            // ]);
        }       
    }
}
