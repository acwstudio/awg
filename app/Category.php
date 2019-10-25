<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @package App
 */
class Category extends Model
{
    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories(){

        return $this->hasMany('App\Category', 'category_id');

    }
}
