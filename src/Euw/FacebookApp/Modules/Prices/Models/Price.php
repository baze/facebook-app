<?php namespace Euw\FacebookApp\Modules\Prices\Models;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Price extends Model {
	protected $table = 'prices';

	protected $fillable = [
		'title',
		'description',
		'image',
		'tenant_id',
	];

	public function tenant() {
		return $this->belongsTo( 'Euw\MultiTenancy\Modules\Tenants\Models\Tenant' );
	}

	public function getThumbnailAttribute() {
		return $this->thumbnail();
	}

	public function thumbnail( $width = 300 ) {
		$img = Image::make( public_path() . '/img/' . $this->tenant->fb_page_id . '/prices/' . $this->image );

		$img->fit( $width );

		return $img->encode( 'data-url' );
	}

}