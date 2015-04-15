<?php namespace App\Modules\Prices\Models;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Price extends Model
{
    protected $table = 'prices';

    protected $fillable = [
        'title',
        'description',
        'image',
        'tenant_id',
    ];

    public function getThumbnailAttribute() {
        $img = Image::make(public_path() . '/uploads/choices/' . $this->image);

        $img->fit( 300 );

        return $img->encode( 'data-url' );
    }

}