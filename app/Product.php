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
//    protected $table = 'products';
//
//    public $fillable = [
//        'category_id', 'unit_id', 'st_href', 'st_type', 'st_id', 'st_account_id', 'st_owner_href',
//        'st_shared', 'st_version', 'st_updated', 'st_name', 'st_description', 'st_code', 'st_ext_code', 'st_archived',
//        'st_path_name', 'st_category_id', 'st_uom_id', 'st_min_price', 'st_sale_price', 'st_buy_price',
//        'st_supplier_href', 'st_article', 'st_weight', 'st_volume', 'st_barcodes', 'st_stock', 'st_reserve',
//        'st_inTransit', 'st_quantity', 'st_modification_count'
//        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_images()
    {
        return $this->hasMany('App\ProductImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variants()
    {
        return $this->hasMany('App\Variant');
    }

}
