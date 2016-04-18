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
        $items = [];

        foreach ($this->links as $link) {
            $items[] = $link->items()->whereNotIn('items.id', [$this->id])->get();
        }

        return $items;
    }
}
