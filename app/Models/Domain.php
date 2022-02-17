<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Domain
 * @package App\Models
 * @version February 15, 2022, 2:44 pm UTC
 *
 * @property unsignedBigInteger $client_id
 * @property string $name
 * @property string $expiry_date
 */
class Domain extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'domains';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'client_id',
        'name',
        'expiry_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'expiry_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_id' => 'required',
        'name' => 'required|unique:domains',
        'expiry_date' => 'required|date'
    ];

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }
}
