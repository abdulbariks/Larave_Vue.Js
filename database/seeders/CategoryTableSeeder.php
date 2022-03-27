<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,5) as $index){
            $category = $faker->unique()->name;
            Category::create([
                "name"       => $category,
                "slug"       => $this->slugify($category),
                "status"     => rand(0,1),

            ]);
        }
    }

    public function slugify($text)
    {
     // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate divider
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}
}
