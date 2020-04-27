<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = new Tag();
        $tag1->name = 'Bánh mì';
        $tag1->save();

        $tag2 = new Tag();
        $tag2->name = 'Đồ Uống';
        $tag2->save();

        $tag3 = new Tag();
        $tag3->name = 'Khuyến mãi';
        $tag3->save();
    }
}
