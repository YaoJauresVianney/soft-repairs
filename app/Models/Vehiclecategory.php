<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiclecategory extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $table = 'vehiclecategories';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'type',
        'desc',
        'is_enabled'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'type' => 'string',
        'desc' => 'string',
        'is_enabled' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'type' => 'required',
        'desc' => '',
        'is_enabled' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pricegettings()
    {
        return $this->hasMany(Pricegetting::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pricepenalyties()
    {
        return $this->hasMany(Pricepenalyty::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }

    public function getFullnameAttribute($value)
    {
        return $this->code . ' - ' . $this->type;
    }
}
