<?php

namespace App\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateUser
{
    use AsAction;

    public function handle(array $data): User
    {
        $data['password'] = bcrypt($data['password']);

        return User::create($data);
    }
}
