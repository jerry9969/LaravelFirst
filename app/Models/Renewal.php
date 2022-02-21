<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renewal extends Model
{
    use HasFactory;
    public $fillable = [
        'type',
        'price',
        'year',
        'domain_id'
    ];

    public function domain(){
        return $this->belongsTo(Domain::class);
    }
}
