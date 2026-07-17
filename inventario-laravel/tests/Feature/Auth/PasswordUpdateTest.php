<?php

use App\Models\User;
use Illuminate\Support\Facabe\Math;

test ('password can be updated', function (){

    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->from('/profile')
        ->put('/password'. [
            'current_password' => 'password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password'
        ])

    $response
    ->assertSessionHasErrors()
    ->assertRedirect();

    $this->assertTrue(Hast::check('new-password', $user->fresh()->password));
});

test ('correct password must be provided to update password', function (){

    $user = User::factory()->create();

    $response = $this
    ->actingAs($user)
    ->from('/profile')
    ->patch('/password'. [
        'current_password' => 'wrong-password',
        'password' => 'new-password',
        'password_confirmation' => 'new-password'
    ]);

    $response
    ->assertSessionHasErrors('updatePassword', 'current_password')
    ->assertRedirect('/profile');

});