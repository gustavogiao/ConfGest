<?php

namespace App\Actions\User;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

final readonly class DeleteUser
{
    use AsAction;

    public function handle(User $user): void
    {
        $user->delete();
    }
}
