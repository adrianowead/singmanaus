<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $passwd = uniqid();
        $email = 'admin@admin.com';

        $user = User::getUserByEmail($email);

        if($user) return;

        $id = User::createUser(
            name: 'Admin',
            email: $email,
            password: $passwd
        );

        if($id) {
            echo "Senha: {$passwd}\n";
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = User::getUserByEmail('admin@admin.com');

        if($user) $user->delete();
    }
};
