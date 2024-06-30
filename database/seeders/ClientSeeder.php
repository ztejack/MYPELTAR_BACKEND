<?php

namespace Database\Seeders;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create(
            ['name' => 'mypeltar_test']
        );
        Client::create(
            ['name' => 'mypeltar_web']
        );
        Client::create(
            ['name' => 'mypeltar_android']
        );
    }
}
