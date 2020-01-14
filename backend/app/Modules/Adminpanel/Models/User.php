<?php

namespace App\Modules\Adminpanel\Models;
use Positon;
use Task;
use Department;
use Branch;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login', 'role','password', 'position_id', 'department_id', 'branch_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function position()
    {
        return $this->belongsTo('App\Modules\Adminpanel\Models\Position');
    }


    public function department()
    {
        return $this->belongsTo('App\Modules\Adminpanel\Models\Department');
    }


    public function branch()
    {
        return $this->belongsTo('App\Modules\Adminpanel\Models\Branch');
    }

}
