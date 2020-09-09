<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Exception\RepositoryException;
use Exception;
use Illuminate\Support\Facades\DB;
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

        try {
            $user->saveOrFail();
        } catch (Exception $e) {
            throw new RepositoryException('User creation failed : ' . $e->getMessage());
        }
        
        return $user;
    }

    public function findForLoginOrEmail(string $login): ?User
    {
        $res = DB::select(
            DB::raw('
                SELECT u.* FROM ' . (new User())->getTable() . ' as u
                WHERE (
                    u.login = :login
                    OR u.email = :login2
                )
                AND deleted_at IS NULL
            '),
            ['login' => $login, 'login2' => $login]
        );

        if (count($res) !== 1) {
            return null;
        }

        return User::hydrate($res)[0];
    }
}
