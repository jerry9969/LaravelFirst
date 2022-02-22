<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\Domain;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
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
            $validator = Validator::make($row->toArray(), [
                'mob_no' => 'digits:10',
                'name' => 'required',
                'domain_name' => 'required',
                'expiry_date' => 'required',
            ]);

            if($validator->fails()){
                //dd($validator->errors());
                continue;
            }

            //echo "<pre>";
            //echo ($row['mob_no']);
            $client_id = Client::where('mob_no',$row['mob_no'])->first();
            //echo $client_id;
            if(! $client_id){
                $client_id = Client::create([
                    'name' => $row['name'],
                    'mob_no' => $row['mob_no'],
                ]);
            }

            $domain = Domain::where('name',$row['domain_name'])->first();
            if(! $domain){
                $domain = Domain::create([
                    'client_id' => $client_id->id,
                    'name' => $row['domain_name'],
                    'expiry_date' => Carbon::createFromFormat('d/m/Y', $row['expiry_date']),
                ]);
            }

            $domain->expiry_date = Carbon::createFromFormat('d/m/Y', $row['expiry_date']);
            $domain->client_id = $client_id->id;
            $domain->save();
        }       
    }
}
