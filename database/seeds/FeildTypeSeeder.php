<?php

use Illuminate\Database\Seeder;
use App\FeildType;

class FeildTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        ['type' => 'text'] ,
        ['type' => 'email'] ,
        ['type' => 'date'] ,
        ['type' => 'gender'] ,
        ['type' => 'country'] ,
        ['type' => 'image'],
        ['type' => 'YesOrNo'],
        ];

        FeildType::insert($data);
    }
}
