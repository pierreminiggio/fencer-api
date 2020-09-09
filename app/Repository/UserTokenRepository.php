<?php

namespace App\Repository;

use App\Models\UserToken;
use App\Repository\Exception\RepositoryException;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTokenRepository
{

    /**
     * @throws RepositoryException
     */
    public function createForUser(int $userId): UserToken
    {
        $token = new UserToken();
        DB::statement('
            UPDATE ' . $token->getTable() . ' as ut
            SET ut.archived_at = NOW()
            WHERE ut.user_id = ' . (int) $userId . ';
        ');
        $token->user_id = $userId;
        $token->token = Str::random(30);
        try {
            $token->saveOrFail();
        } catch (Exception $e) {
            throw new RepositoryException('Token creation failed : ' . $e->getMessage());
        }

        return $token;
    }
}