<?php

namespace App\Modules\Adminpanel\Models;

use Illuminate\Database\Eloquent\Model;

class ComingProduct extends Model
{
   protected $fillable = ['name','date','hour','department','exdepartment','status','type'];


    public static function add($fields)
    {
        $comingproduct = new static;
        $comingproduct->fill($fields);
        $comingproduct->save();

        return $comingproduct;
    }
}
