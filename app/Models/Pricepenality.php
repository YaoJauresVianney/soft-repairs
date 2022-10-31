<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Pricepenality extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'pricepenalyties';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'vehiclecategory_id',
        'peopletype_id',
        'code',
        'per_kg',
        'penality_per_day'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'vehiclecategory_id' => 'integer',
        'peopletype_id' => 'integer',
        'code' => 'string',
        'per_kg'=>'boolean',
        'penality_per_day' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'vehiclecategory_id' => 'required|exists:vehiclecategories,id',
        'peopletype_id' => 'required|exists:peopletypes,id',
        'code' => 'nullable',
        'per_kg' => 'nullable|boolean',
        'penality_per_day' => 'numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function peopletype()
    {
        return $this->belongsTo(Peopletype::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vehiclecategory()
    {
        return $this->belongsTo(Vehiclecategory::class);
    }
}
