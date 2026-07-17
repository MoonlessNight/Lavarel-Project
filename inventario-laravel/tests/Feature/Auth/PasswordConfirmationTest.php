<?php
use App\Models\User;

test('comfirm password screen can be renderred', function (){

    $user = User::factory()->create();

    $response = $this->actiongAs($user)->get('/confirm-password',[
        'password' => 'password'
    ]);

    $response->assertStatus(200);
});

test('password can be confirmed', function (){

    $user = User::factory()->create();

    $response = $this->actiongAs($user)->get('/confirm-password',[
        'password' => 'password'
    ]);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('password is not confirmed with invalid password', function (){

    $user = User::factory()->create();

    $response = $this->actiongAs($user)->get('/confirm-password',[
        'password' => 'wrong-password'
    ]);

    $response->assertSessionHasErrors();
});

