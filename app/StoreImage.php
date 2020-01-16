<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StoreImage
 * @package App
 */
class StoreImage extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_image()
    {
        return $this->belongsTo('App\ProductImage');
    }
}
