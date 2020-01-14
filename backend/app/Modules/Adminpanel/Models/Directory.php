<?php

namespace App\Modules\Adminpanel\Models;

use Illuminate\Database\Eloquent\Model;


class Directory extends Model
{
    protected $fillable = ['name', 'count', 'summa', 'nds','summa2'];

    public static function add($fields)
    {
        $directoryproduct = new static;
        $directoryproduct->fill($fields);
        $directoryproduct->save();

        return $directoryproduct;
    }

}
