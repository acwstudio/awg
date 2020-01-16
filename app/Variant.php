<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Variant
 * @package App
 */
class Variant extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function characteristics()
    {
        return $this->belongsToMany('App\Characteristic', 'characteristic_variant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
