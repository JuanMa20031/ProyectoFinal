<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create';

    protected $description = 'Create an admin user';

    public function handle()
    {
        $name = 'Usuario administrador';
        $email = 'adminuser@test.com';
        $password = '123456789';

        $admin = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        $this->info('Usuario administrador creado exitosamente');
    }
}
