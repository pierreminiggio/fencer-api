<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Exception\RepositoryException;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    /**
     * @throws RepositoryException
     */
    public function create(string $login, string $email, string $password): User
    {
        $user = new User();
        $user->login = $login;
        $user->email = $email;
        $user->password = Hash::make($password);

        if (! $user->save()) {
            throw new RepositoryException('user creation failed');
        }

        return $user;
    }
}
