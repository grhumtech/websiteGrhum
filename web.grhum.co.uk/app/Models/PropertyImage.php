<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class PropertyImage extends Model
{

    protected $table = 'property_image';

    protected $fillable = ['property_id', 'property_image', 'file_type', 'sort_order'];



    // ─────────────────────────────────────────────

    // Image का full URL automatically return करे

    // ─────────────────────────────────────────────

    public function getPropertyImageAttribute($value)
    {
        if (!$value)
            return null;

        // Already full URL — return as-is
        if (str_starts_with($value, 'http')) {
            return $value;
        }

        // ✅ New uploads: properties/filename.jpg → storage/properties/filename.jpg
        if (str_starts_with($value, 'properties/')) {
            return 'https://crm.grhum.co.uk/storage/' . $value;
        }


        // ✅ Old uploads: filename.jpg → old server path
        return 'https://crm.grhum.co.uk/storage/upload/property/' . $value;
    }

}