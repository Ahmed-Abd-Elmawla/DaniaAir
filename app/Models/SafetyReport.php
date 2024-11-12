<?php

namespace App\Models;

use App\Traits\HasUuid;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SafetyReport extends Model
{
    use HasApiTokens,
        HasFactory,
        HasUuid;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function items()
    {
        return $this->belongsToMany(SafetyItem::class, 'report_item')
                    ->withPivot('status', 'comment');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
