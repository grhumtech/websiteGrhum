<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    protected $fillable = [
        'property_type_id',
        'supplier_id',
        'title',
        'refrence_number',
        'area',
        'pincode',
        'address',
        'country',
        'latitude',
        'longitude',
        'occupancy',
        'description',
        'other_link',
        'folderpath',
        'status',
        'is_deleted',
    ];


    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id', 'id');
    }
    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id');
    }

    public function details()
    {
        return $this->hasOne(PropertyDetail::class);

        
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class)->orderBy('sort_order');
    }

    public function compliance()
    {
        return $this->hasMany(PropertyCompliance::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'property_amenities');
    }

    public function neighborhoods()
    {
        return $this->belongsToMany(Neighborhood::class, 'property_neighborhoods');
    }

    public function scopeActive($query)
    {
        return $query->where('is_deleted', 0);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where(function ($q) use ($keyword) {
            $q->where('title', 'like', "%{$keyword}%")
                ->orWhere('reference_number', 'like', "%{$keyword}%")
                ->orWhere('area', 'like', "%{$keyword}%")
                ->orWhere('address', 'like', "%{$keyword}%");
        });
    }
}