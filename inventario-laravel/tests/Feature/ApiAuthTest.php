<?php
use APP\Models\User;
use Illuminate\Support\Facades\Hash;

it('allows users to login and acces a protect route', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('password'),
    ]);

    $loginresponse = $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'password123',
    ]);

    $loginresponse->assertStatus(200)
        ->assertJsonStructure(['token', 'token_type', 'expires_in', 'user'])
        ->assertJsonStructure(['user.email', $user->email]);

    $token = $loginresponse->json('token');

    $this->withHeader('Authorization', 'Bearer ' . $token)
        ->getJson('/api/me')
        ->assertStatus(200)
        ->assertJsonPath('email', $user->email);


});