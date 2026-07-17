<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class PropertyDetail extends Model

{

    protected $table = 'property_details';

    protected $fillable = [

        'property_id',

        'bedroom',

        'bathroom',

        'bed_configuration',

        'floor_level',

        'garage',

        'parking_type',

        'parking_option',

        'parking_type_user',

        'pet_friendly',

        'lift_access',
        'bathroom_type'

    ];



    public function property()

    {

        return $this->belongsTo(Property::class);

    }

}