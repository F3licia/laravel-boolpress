
<?php
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $categories = ['Attualità', 'Cultura', 'Musica', 'Cibo', 'Tecnologia'];

        foreach ($categories as $category) {
            $new_category_object = new Category();
            $new_category_object->name = $category;
            $new_category_object->slug = Str::slug($category); //sarà unica perchè le categorie sono statiche
            $new_category_object->save();
        }
    }
}
