<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StoreProductImage
 * @package App
 */
class StoreProductImage extends Model
{
    protected $table = 'store_product_images';

    public $fillable = [
        'product_id', 'img_name', 'img_ext', 'st_href_download', 'st_title', 'st_file_name', 'st_size',
        'st_updated', 'st_mini_href_download', 'st_tiny_href_download'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
