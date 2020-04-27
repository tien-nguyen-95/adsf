<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer1 = new Customer();
        $customer1->name = 'Tien';
        $customer1->gender = true;
        $customer1->email = 'tiennd@cg.com';
        $customer1->address = 'vũ trụ 7';
        $customer1->phone = '12345678';
        $customer1->note = 'đã lĩnh hội bản năng vô cực';
        $customer1->save();
    }
}
