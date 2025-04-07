<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class m_savings_target extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id_users',
        'target_amount',
        'target_date',
        'description',
        'title',
    ];

    public function user():HasOne{
        return $this->hasOne(User::class,'id','id_users');
    }
}
