<?php

namespace Lchski;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['title'];

    public function items()
    {
        return $this->belongsToMany('\Lchski\Item');
    }
}
