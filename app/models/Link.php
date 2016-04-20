<?php

namespace Lchski;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title'];

    public function items()
    {
        return $this->belongsToMany('\Lchski\Item');
    }
}
