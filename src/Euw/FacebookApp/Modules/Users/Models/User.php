<?php namespace Euw\FacebookApp\Modules\Users\Models;

use Carbon\Carbon;

class User extends \Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $softDelete = false;

    protected $fillable = [
        'tenant_id',
        'fb_id',
        'first_name',
        'last_name',
        'email'
    ];

    public function answers()
    {
        return $this->hasMany('Euw\\Quiz\\Modules\\UserAnswer');
    }

    public function points()
    {
        $points = 0;

        foreach($this->answers as $userAnswer) {
            if ((int)$userAnswer->answer->is_correct) {
                $points += 3;
            } else {
                $points += 1;
            }
        }

        return $points;
    }


}