<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTests extends TestCase
{
    protected string $token = '';
    /**
     * Test successful login.
     *
     * @return void
     */
    public function test_user_can_login_and_get_bearer_token()
    {
        // Arrange: Prepare request data
        $loginData = [
            'login' => 'superuser',
            'password' => '123456789',
        ];

        // Act: Send POST request to login endpoint
        $response = $this->postJson('api/v1/auth/login', $loginData);

        // Assert: Check for success and presence of token
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'user' => [
                    'name',
                    'uuid',
                    'slug',
                    'email',
                    'username',
                    'role',
                    'divisi',
                    'satker',
                ],
                'authorisation' => [
                    'token',
                    'type',
                ],
            ]);

        // Assert: Check if token exists in the response
        // $this->assertNotEmpty($response->json('authorisation.token'), 'Token should not be empty');
        // Optionally, extract and save the token for further tests
        // $token = $response->json('authorisation.token');
        // return $token;
        // Store token for future use
        $this->token = $response->json('authorisation.token');
        $this->assertNotEmpty($this->token, 'Token should not be empty');
    }

    /**
     * Test user can logout.
     */
    public function test_user_can_logout()
    {
        // Ensure a user is logged in and has a token
        $this->test_user_can_login_and_get_bearer_token();

        // Act: Send POST request to logout endpoint with token
        $response = $this->postJson('/api/v1/auth/logout', [], [
            'Authorization' => 'Bearer ' . $this->token
        ]);

        // Assert: Successful logout
        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'message' => 'Successfully logged out',
            ]);
    }

    /**
     * Test user can refresh token.
     */
    public function test_user_can_refresh_token()
    {
        // Ensure a user is logged in and has a token
        $this->test_user_can_login_and_get_bearer_token();

        // Act: Send POST request to refresh token endpoint
        $response = $this->postJson('/api/v1/auth/refresh', [], [
            'Authorization' => 'Bearer ' . $this->token
        ]);

        // Assert: Token is refreshed
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'authorisation' => [
                    'token',
                    'type',
                ],
            ]);

        // Ensure new token is received
        $newToken = $response->json('authorisation.token');
        $this->assertNotEmpty($newToken, 'New token should not be empty');
        $this->assertNotEquals($this->token, $newToken, 'Token should be refreshed');
    }

    /**
     * Test login failure with invalid credentials.
     *
     * @return void
     */
    public function test_login_fails_with_email_not_found()
    {
        // Arrange: Non-existent email
        $loginData = [
            'login' => 'nonexistent@example.com',
            'password' => 'somepassword',
        ];

        // Act: Attempt login
        $response = $this->postJson('/api/v1/auth/login', $loginData);

        // Assert: Check for "Email not found" response
        $response->assertStatus(404)
            ->assertJson([
                'status' => 'fails',
                'message' => 'Email not found',
            ]);
    }
    /**
     * Test login fails with a username that does not exist.
     *
     * @return void
     */
    public function test_login_fails_with_username_not_found()
    {
        // Arrange: Non-existent username
        $loginData = [
            'login' => 'wrongusername',
            'password' => 'somepassword',
        ];

        // Act: Attempt login
        $response = $this->postJson('/api/v1/auth/login', $loginData);

        // Assert: Check for "Username not found" response
        $response->assertStatus(404)
            ->assertJson([
                'status' => 'fails',
                'message' => 'Username not found',
            ]);
    }
    /**
     * Test login fails with a correct email or username but wrong password.
     *
     * @return void
     */
    public function test_login_fails_with_wrong_password()
    {
        // Arrange: Correct email but wrong password
        $loginData = [
            'login' => 'superuser@example.com',
            'password' => 'wrongpassword',
        ];

        // Act: Attempt login
        $response = $this->postJson('/api/v1/auth/login', $loginData);

        // Assert: Check for "Wrong Password" response
        $response->assertStatus(422) // Assuming wrong password returns 403
            ->assertJson([
                'status' => 'fails',
                'message' => 'Wrong Password',
            ]);
    }
}
