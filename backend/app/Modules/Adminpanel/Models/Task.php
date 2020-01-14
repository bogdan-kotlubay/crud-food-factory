<?php

namespace App\Modules\Adminpanel\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name'];

    public function positions()
    {
        /*
    	return $this->belongsToMany(
    		Product::class,
    		'products_tags',
    		'product_id',
    		'tag_id'

    	);
        */
    }

    public static function add($fields)
    {
        $task = new static;
        $task->fill($fields);
        $task->save();

        return $task;
    }
}
