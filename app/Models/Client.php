<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'clients';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'fullname',
        'cni',
        'passport',
        'num_license',
        'attachment',
        'phone1',
        'phone2'
    ];

    protected $casts = [
        'id' => 'integer',
        'fullname' => 'string',
        'cni' => 'string',
        'passport' => 'string',
        'num_license' => 'string',
        'attachment' => 'string',
        'phone1' => 'string',
        'phone2' => 'string'
    ];

    public function complaints() {
        return $this->hasMany(Complaint::class);
    }

    public function repairs() {
        return $this->hasMany(Repair::class);
    }

    public function getFullnamePhoneAttribute($value) {
        return $this->fullname . ' - ' . $this->phone1 . ' - ' . $this->phone2;
    }
}
