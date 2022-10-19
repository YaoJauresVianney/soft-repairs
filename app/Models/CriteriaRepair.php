<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CriteriaRepair extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $table = 'criteria_repairs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'criteria_id',
        'repair_id',
        'yes',
        'number',
        'comments'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'criteria_id' => 'integer',
        'repair_id' => 'integer',
        'yes' => 'boolean',
        'number' => 'integer',
        'comments' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function repair()
    {
        return $this->belongsTo(Repair::class);
    }
}
