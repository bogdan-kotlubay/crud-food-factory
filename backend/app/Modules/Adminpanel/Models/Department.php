<?php

namespace App\Modules\Adminpanel\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
   protected $fillable = ['name','position_id', 'branch_id','priority'];

    
    public function positions()
    {
        return $this->hasMany(Position::class);
    }


    public static function add($fields)
    {
        $department = new static;
        $department->fill($fields);
        $department->save();

        return $department;
    }


    

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function branch()
    {
        return $this->belongsTo('App\Modules\Adminpanel\Models\Branch');
    }

    
}
