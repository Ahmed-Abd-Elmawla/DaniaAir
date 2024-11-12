<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SafetyCategory extends Model
{
    use HasFactory, HasTranslations, HasUuid;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected array $translatable = ['name'];

    public function items()
    {
        return $this->hasMany(SafetyItem::class, 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
