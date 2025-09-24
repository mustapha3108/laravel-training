<?php
namespace App\Models;

use Illuminate\Support\Arr;

class items {

    private static $items = [
    ['id'=>1, 'first'=>'hello','second'=>'there'],
    ['id'=>2, 'first'=>'good','second'=>'by']
    ];

    public static function show(){
        return static::$items;
    }

    public static function find($id){
        $item = Arr::first(static::$items, fn($item)=>$item['id'] == $id);
        return $item;
    }
}
