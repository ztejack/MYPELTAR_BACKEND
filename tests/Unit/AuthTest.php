<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AuthTest extends TestCase
{
    // use RefreshDatabase; // Optional: Resets the database after each test
    // protected function setUp(): void
    // {
    //     parent::setUp();
    //     $this->seed();
    //     // Call the UserSeeder to seed users before each test
    //     // Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);
    // }

    // /**
    //  * Test successful login.
    //  *
    //  * @return void
    //  */
    // public function test_user_can_login_and_get_bearer_token()
    // {
    //     // Arrange: Prepare request data
    //     $loginData = [
    //         'login' => 'superuser@example.com',
    //         'password' => '123456789',
    //     ];

    //     // Act: Send POST request to login endpoint
    //     $response = $this->postJson('api/v1/auth/login', $loginData);

    //     // Assert: Check for success and presence of token
    //     $response->assertStatus(200)
    //         ->assertJsonStructure([
    //             'status',
    //             'user' => [
    //                 'name',
    //                 'uuid',
    //                 'slug',
    //                 'email',
    //                 'username',
    //                 'role',
    //                 'subsatker',
    //                 'satker',
    //             ],
    //             'authorisation' => [
    //                 'token',
    //                 'type',
    //             ],
    //         ]);

    //     // Assert: Check if token exists in the response
    //     $this->assertNotEmpty($response->json('authorisation.token'), 'Token should not be empty');
    //     // Optionally, extract and save the token for further tests
    //     $token = $response->json('authorisation.token');
    //     return $token;
    // }

    // /**
    //  * Test login failure with invalid credentials.
    //  *
    //  * @return void
    //  */
    // public function test_login_fails_with_email_not_found()
    // {
    //     // Arrange: Non-existent email
    //     $loginData = [
    //         'login' => 'nonexistent@example.com',
    //         'password' => 'somepassword',
    //     ];

    //     // Act: Attempt login
    //     $response = $this->postJson('/api/v1/auth/login', $loginData);

    //     // Assert: Check for "Email not found" response
    //     $response->assertStatus(404)
    //         ->assertJson([
    //             'status' => 'fails',
    //             'message' => 'Email not found',
    //         ]);
    // }
    // /**
    //  * Test login fails with a username that does not exist.
    //  *
    //  * @return void
    //  */
    // public function test_login_fails_with_username_not_found()
    // {
    //     // Arrange: Non-existent username
    //     $loginData = [
    //         'login' => 'wrongusername',
    //         'password' => 'somepassword',
    //     ];

    //     // Act: Attempt login
    //     $response = $this->postJson('/api/v1/auth/login', $loginData);

    //     // Assert: Check for "Username not found" response
    //     $response->assertStatus(404)
    //         ->assertJson([
    //             'status' => 'fails',
    //             'message' => 'Username not found',
    //         ]);
    // }
    // /**
    //  * Test login fails with a correct email or username but wrong password.
    //  *
    //  * @return void
    //  */
    // public function test_login_fails_with_wrong_password()
    // {
    //     // Arrange: Correct email but wrong password
    //     $loginData = [
    //         'login' => 'superuser@example.com',
    //         'password' => 'wrongpassword',
    //     ];

    //     // Act: Attempt login
    //     $response = $this->postJson('/api/v1/auth/login', $loginData);

    //     // Assert: Check for "Wrong Password" response
    //     $response->assertStatus(422) // Assuming wrong password returns 403
    //         ->assertJson([
    //             'status' => 'fails',
    //             'message' => 'Wrong Password',
    //         ]);
    // }

    // // public function test_access_protected_endpoint_with_token()
    // // {
    // //     $token = $this->test_user_can_login_and_get_bearer_token();

    // //     $response = $this->withHeaders([
    // //         'Authorization' => "Bearer $token",
    // //     ])->getJson(route('protected.endpoint'));

    // //     $response->assertStatus(200);
    // }
}
