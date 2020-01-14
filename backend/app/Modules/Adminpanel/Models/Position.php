<?php

namespace App\Modules\Adminpanel\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
   protected $fillable = ['name', 'department_id' ];

    
    public function department()
    {
        return $this->belongsTo('App\Modules\Adminpanel\Models\Department');
    }

    

    public static function add($fields)
    {
        $position = new static;
        $position->fill($fields);
        $position->save();

        return $position;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
