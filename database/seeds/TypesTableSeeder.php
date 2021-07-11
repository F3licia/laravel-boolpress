<?php
use App\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Admin', 'User'];

foreach ($types as $type) {
  $newTag = new Type();
  $newTag->status = $type;
  $newTag->save();
}
    }
}
