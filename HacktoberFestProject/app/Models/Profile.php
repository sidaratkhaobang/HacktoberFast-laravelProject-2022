<?php

namespace App\Models;

use App\Models\Traits\PrimaryUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory, PrimaryUuid;

    protected $table = 'profiles';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
    ];

    public function province()
    {
        return $this->hasOne(Province::class, 'id', 'province_id');
    }
}
