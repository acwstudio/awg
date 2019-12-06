<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unit
 * @package App
 */
class Unit extends Model
{
    protected $table = 'units';

    public $fillable = [
        'st_href', 'st_type', 'st_id', 'st_owner_href', 'st_version', 'st_updated', 'st_name',
        'st_description', 'st_code', 'st_ext_code'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
