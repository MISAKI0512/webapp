<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $param=[
            'id'=>'1',
            'tag_id'=>'1',
            'title'=>'家事'
        ];
        Tag::create($param);

        $param=[
            'id'=>'2',
            'tag_id'=>'2',
            'title'=>'勉強'
        ];
        Tag::create($param);

        $param=[
            'id'=>'3',
            'tag_id'=>'3',
            'title'=>'運動'
        ];
        Tag::create($param);

        $param=[
            'id'=>'4',
            'tag_id'=>'4',
            'title'=>'食事'
        ];
        Tag::create($param);
        
        $param=[
            'id'=>'5',
            'tag_id'=>'5',
            'title'=>'移動'
        ];
        Tag::create($param);    
    }
}
