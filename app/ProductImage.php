<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductImage
 * @package App
 */
class ProductImage extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function store_image()
    {
        return $this->hasOne('App\StoreImage');
    }
}
