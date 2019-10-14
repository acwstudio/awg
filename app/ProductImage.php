<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductImage
 *
 * @package App
 */
class ProductImage extends Model
{
    protected $table = 'product_images';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){

        return $this->belongsTo('App\Product', 'product_id');

    }
}
