<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;

final readonly class DeleteUser
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user = User::findOrFail($args["id"]);

        foreach ($user->posts as $post) {
            $post->comments()->delete();
            $post->delete();
        }

        $user->delete();

        return $user;
    }
}
