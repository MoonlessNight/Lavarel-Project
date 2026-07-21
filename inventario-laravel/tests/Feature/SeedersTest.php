<?php
use Database\Seeders\DatabaseSeeder;

it('creates the default admin and user accounts', function () {
    $this->artisan('db:seed', ['--class' => DatabaseSeeder::class]);

    $this->assertDatabaseHas('users', [
        'email' => 'admin@example.com',
        'role' => 'admin',
    ]);

    $this->assertDatabaseHas('users', [
        'email' => 'coordinador@example.com',
        'role' => 'coordinador',
    ]);
});