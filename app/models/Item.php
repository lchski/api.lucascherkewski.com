<?php

namespace Lchski;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title'];

    public function links()
    {
        return $this->belongsToMany('\Lchski\Link');
    }
}
