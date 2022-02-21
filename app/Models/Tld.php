<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class tld
 * @package App\Models
 * @version February 18, 2022, 10:04 am UTC
 *
 * @property string $name
 * @property number $price
 */
class Tld extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tlds';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'price' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'price' => 'required'
    ];

    
}
