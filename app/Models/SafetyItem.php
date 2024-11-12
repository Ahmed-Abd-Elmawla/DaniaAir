<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SafetyItem extends Model
{
    use HasFactory, HasTranslations,
        HasUuid;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected array $translatable = ['item_desc'];

    public function category()
    {
        return $this->belongsTo(SafetyCategory::class, 'category_id');
    }

    public function reports()
    {
        return $this->belongsToMany(SafetyReport::class, 'report_item')
                    ->withPivot('status', 'comment');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
