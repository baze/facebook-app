<?php namespace Euw\FacebookApp\Modules\Users\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;

class UserObserver {

    public function creating( $model ) {
        $context = app()->make( 'Euw\MultiTenancy\Contexts\Context' );
        $tenant  = $context->getOrThrowException();

        $model->tenant_id = $tenant->id;
    }

}

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;
    use SyncableGraphNodeTrait;

    protected static $graph_node_field_aliases = [
        'id' => 'fb_id',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fb_id',
        'first_name',
        'last_name',
        'name',
        'email',
        'password',
        'tenant_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'password', 'remember_token', 'access_token' ];

    public static function boot() {
        parent::boot();

        static::observe( new UserObserver );
    }


}