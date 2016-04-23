<?php

namespace Lchski;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

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

    public function linksWithItems()
    {
        $cleanedLinksWithItems = [];

        $linksWithItems = $this->with('links.items')->where('items.id', [$this->id])->get()[0]['links'];

        foreach ($linksWithItems as $linkWithItems) {
            $cleanedLinksWithItems[] = $linkWithItems->items->reject(function ($item) {
               return $item->id == $this->id;
            })->values();
        }

        return $cleanedLinksWithItems;
    }
}
