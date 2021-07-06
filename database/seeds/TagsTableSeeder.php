<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {                                      
        $tags = ['scienza', 'salute', 'sport', 'alimentazione', 'politica', 'newa', 'estero' ,'eventi',
                  'concerti', 'mostre', 'storia', 'arte', 'pop', 'app', 'social media'];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag);
            $newTag->save();
        }
    }
}