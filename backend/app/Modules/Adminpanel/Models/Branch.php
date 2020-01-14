<?php

namespace App\Modules\Adminpanel\Models;

use App\Category;
use Illuminate\Database\Eloquent\Model;


class Branch extends Model
{
    protected $fillable = ['name'];

    public static function add($fields)
    {
        $branch = new static;
        $branch->fill($fields);
        $branch->save();

        return $branch;
    }


    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function department()
    {
        return $this->hasMany(Department::class);
    }

}
