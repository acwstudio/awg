<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @package App
 */
class Product extends Model
{
    protected $table = 'products';
    public $fillable = ['img_name', 'img_extension'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_images(){

        return $this->hasMany('App\ProductImage', 'product_id');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
