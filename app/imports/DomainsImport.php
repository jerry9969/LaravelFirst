<?php
use illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


Class DomainsImport implements ToCollection{
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            
        }
    }
}