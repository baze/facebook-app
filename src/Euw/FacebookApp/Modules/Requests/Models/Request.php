<?php namespace Euw\FacebookApp\Modules\Requests\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'requests';

    protected $fillable = [
        'request_id',
        'tenant_id'
    ];

    public function tenant()
    {
        return $this->belongsTo('Euw\MultiTenancy\Modules\Tenants\Models\Tenant');
    }

    public function invitations()
    {
        return $this->hasMany('Euw\\FacebookApp\\Modules\\Invitations\\Models\\Invitation');
    }

}