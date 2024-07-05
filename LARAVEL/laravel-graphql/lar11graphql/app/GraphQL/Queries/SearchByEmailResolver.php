<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\User;
use Illuminate\Support\Facades\Log;


final readonly class SearchByEmailResolver
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user = User::select('users.*')->searchByEmail($args['email'])->first();

        $comments = $user->comments;

        return $comments;
    }
}
