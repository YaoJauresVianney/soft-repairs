<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTime;

class Wrecker extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $table = 'wreckers';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'car_imm',
        'label',
        'is_enabled',
        'gray_card',
        'technical_visit',
        'parking_card',
        'transport_card',
        'towing_authorization',
        'tax',
        'insurance'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'car_imm' => 'string',
        'label' => 'string',
        'is_enabled' => 'boolean',
        'gray_card' => 'boolean',
        'technical_visit' => 'date',
        'parking_card' => 'date',
        'transport_card' => 'date',
        'towing_authorization' => 'date',
        'tax' => 'date',
        'insurance' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'car_imm' => 'required',
        'label' => '',
        'is_enabled' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }

    public function getFullnameAttribute($value)
    {
        return $this->code . ' - ' . $this->car_imm;
    }

    public function afterOrBefore($date) {

        $now = new DateTime("now");
        $d = new DateTime($date);
        if($now < $d) {
            return [
                'class' => 'btn btn-success'
            ];
        } else if ($now == $d) {
            return [
                'class' => 'alert alert-warning'
            ];
        } else if ($now > $d){
            return [
                'class' => 'alert alert-danger'
            ];
        } else {
            return [
                'class' => 'alert alert-info'
            ];
        }
    }

    public function differenceBetween() {
        $now = new DateTime("now");

        $dateTechVisit = new DateTime($this->technical_visit);
        $dateTowing = new DateTime($this->towing_authorization);
        $dateParking = new DateTime($this->parking_card);
        $dateTransport = new DateTime($this->transport_card);
        $dateInsurance = new DateTime($this->insurance);
        $dateTax = new DateTime($this->tax);

        $intervalTechVisit = $dateTechVisit->diff($now);
        $intervalTowing = $dateTowing->diff($now);
        $intervalParking = $dateParking->diff($now);
        $intervalTransport = $dateTransport->diff($now);
        $intervalInsurance = $dateInsurance->diff($now);
        $intervalTax = $dateTax->diff($now);

        return [
            'technical_visit' => [
                'year' => $intervalTechVisit->y,
                'month' => $intervalTechVisit->m,
                'day' => $intervalTechVisit->d,
            ],
            'towing_authorization' => [
                'year' => $intervalTowing->y,
                'month' => $intervalTowing->m,
                'day' => $intervalTowing->d,
            ],
            'parking_card' => [
                'year' => $intervalParking->y,
                'month' => $intervalParking->m,
                'day' => $intervalParking->d,
            ],
            'transport_card' => [
                'year' => $intervalTransport->y,
                'month' => $intervalTransport->m,
                'day' => $intervalTransport->d,
            ],
            'insurance' => [
                'year' => $intervalInsurance->y,
                'month' => $intervalInsurance->m,
                'day' => $intervalInsurance->d,
            ],
            'tax' => [
                'year' => $intervalTax->y,
                'month' => $intervalTax->m,
                'day' => $intervalTax->d,
            ]
        ];
    }
}
