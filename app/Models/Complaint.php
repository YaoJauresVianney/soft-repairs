<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'complaints';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'client_id',
        'user_id',
        'vehicle_rights',
        'brand',
        'car_imm',
        'date_getting',
        'place_getting',
        'reasons',
        'goals'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'user_id' => 'integer',
        'vehicle_rights' => 'string',
        'brand' => 'string',
        'car_imm' => 'string',
        'date_getting' => 'string',
        'place_getting' => 'string',
        'reasons' => 'string',
        'goals' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_id' => 'required|exists:clients,id',
        'user_id' => 'required|exists:users,id',
        'vehicle_rights' => 'required',
        'brand' => 'required',
        'car_imm' => 'required',
        'date_getting' => 'required',
        'place_getting' => 'required',
        'reasons' => 'required',
        'goals' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
