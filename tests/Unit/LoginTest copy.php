<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;


class LoginTestss extends TestCase
{
    use RefreshDatabase;
    /**
     * Test successful login.
     *
     * @return void
     */
    public function testSuccessfulLogin()
    {
        // Membuat pengguna dummy
        $user = User::factory()->create();

        // Membuat request dengan data yang valid
        // $request = [
        //     'username' => 'testuser',
        //     'password' => 'password123',
        // ];

        // Memanggil fungsi login dengan request yang diberikan
        $response = $this->login($user);

        // Memverifikasi responsenya
        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
            ])
            ->assertJsonStructure([
                'status',
                'user',
                'authorisation' => [
                    'token',
                    'type',
                ],
                'api-key',
            ]);
    }

    // /**
    //  * Test login with wrong username.
    //  *
    //  * @return void
    //  */
    // public function testLoginWithWrongUsername()
    // {
    //     // Membuat request dengan username yang salah
    //     $request = [
    //         'username' => 'wrongusername',
    //         'password' => 'password123',
    //     ];

    //     // Memanggil fungsi login dengan request yang diberikan
    //     $response = $this->login($request);

    //     // Memverifikasi responsenya
    //     $response->assertStatus(422)
    //         ->assertJson([
    //             'status' => 'fails',
    //             'message' => 'Wrong Username',
    //         ]);
    // }

    // /**
    //  * Test login with wrong password.
    //  *
    //  * @return void
    //  */
    // public function testLoginWithWrongPassword()
    // {
    //     // Membuat pengguna dummy
    //     $user = User::factory()->create([
    //         'username' => 'testuser',
    //         'password' => bcrypt('password123'),
    //     ]);

    //     // Membuat request dengan password yang salah
    //     $request = [
    //         'username' => 'testuser',
    //         'password' => 'wrongpassword',
    //     ];

    //     // Memanggil fungsi login dengan request yang diberikan
    //     $response = $this->login($request);

    //     // Memverifikasi responsenya
    //     $response->assertStatus(422)
    //         ->assertJson([
    //             'status' => 'fails',
    //             'message' => 'Wrong Password',
    //         ]);
    // }

    // /**
    //  * Simulate login.
    //  *
    //  * @param array $request
    //  * @return \Illuminate\Foundation\Testing\TestResponse
    //  */
    private function login($request)
    {
        // Memanggil fungsi login dengan request yang diberikan
        return $this->postJson('/v1/auth/login', $request);
    }
}
