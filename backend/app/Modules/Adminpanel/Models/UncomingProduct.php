<?php

namespace App\Modules\Adminpanel\Models;

use Illuminate\Database\Eloquent\Model;

class UncomingProduct extends Model
{
   protected $fillable = ['name', 'hour','department','exdepartment','status','type'];


    public static function add($fields)
    {
        $uncomingproduct = new static;
        $uncomingproduct->fill($fields);
        $uncomingproduct->save();

        return $uncomingproduct;
    }
}
