<?php namespace Euw\FacebookApp\Modules\Invitations\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $table = 'invitations';

    protected $softDelete = false;

    protected $fillable = [
        'sender_id',
        'recipient_id',
        'accepted',
        'request_id',
        'tenant_id'
    ];

    public function sender()
    {
        return $this->belongsTo('Euw\\FacebookApp\\Modules\\Users\\Models\\User');
    }

}