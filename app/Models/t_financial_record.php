<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class t_financial_record extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id_users',
        'amount',
        'category',
        'description',
        'id_m_source',
    ];
    public function user():HasOne{
        return $this->hasOne(User::class,'id','id_users');
    }
    public function source(): HasOne{
        return $this->hasOne(m_source::class,'id','id_m_source');
    }
}
