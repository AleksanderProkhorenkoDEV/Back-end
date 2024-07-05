<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Log;

final readonly class DeleteUser
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user = User::findOrFail($args["id"]);

        foreach($user->comments as $comment){
            Log::info($comment);
            $comment->delete();
        }

        foreach ($user->posts as $post) {
            foreach ($post->comments as $comment ) {
                $comment->delete();
            }
            $post->delete();
        }

        $user->delete();

        return $user;
    }
}
