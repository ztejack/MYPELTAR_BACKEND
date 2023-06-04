<?php

namespace Database\Seeders;

use App\Models\APIKey;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApiKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mengambil semua user
        $users = User::all();

        foreach ($users as $user) {
            // Generate API key
            $apiKey = Str::random(32);

            // Menentukan expiration date (misalnya 30 hari dari sekarang)
            $expirationDate = Carbon::now()->addDays(30);

            // Membuat record API key untuk user
            APIKey::create([
                'user_id' => $user->id,
                'api_key' => $apiKey,
                'expiration_date' => $expirationDate,
            ]);
        }
    }
}
