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
        $linksWithItems = $this->with('links.items')->where('items.id', [$this->id])->get()[0]['links'];

        error_log('Links with items:');
        error_log(print_r($linksWithItems, 1));

        foreach ($linksWithItems as $linkWithItems) {
            for ($index = 0, $size = $linkWithItems['items']->count(); $index < $size; $index++) {
                if ($linkWithItems['items'][$index]->id == $this->id) {
                    unset($linkWithItems['items'][$index]);
                }
            }

            $linkWithItems['items'] = $linkWithItems['items']->values();
        }

        return $linksWithItems;
    }
}
