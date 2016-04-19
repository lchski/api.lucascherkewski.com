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

        $linksWithItems = $this->with('links.items')->where('items.id', [$this->id])->get()[0]['links'];

        foreach ($linksWithItems as $linkWithItems) {
            foreach ($linkWithItems['items'] as $item) {
                if ($item->id != $this->id) {
                    $items[] = $item;
                }
            }
        }

        return $items;
    }
}
