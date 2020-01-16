<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Characteristic
 * @package App
 */
class Characteristic extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function variants()
    {
        return $this->belongsToMany('App\Variant', 'characteristic_variant');
    }
}
