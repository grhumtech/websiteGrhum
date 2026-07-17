<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PropertyType extends Model
{
    protected $table      = 'property_type';
    protected $primaryKey = 'property_type_id';
    protected $fillable   = ['name', 'is_deleted'];
    protected $casts      = ['is_deleted' => 'boolean'];

    // ✅ Route Model Binding के लिए
    public function getRouteKeyName(): string
    {
        return 'property_type_id';
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_deleted', 0);
    }
}