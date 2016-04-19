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

    public function items()
    {
        $items = $this->with('links.items')->where('items.id', [$this->id])->get();

        return $items;
    }
}
