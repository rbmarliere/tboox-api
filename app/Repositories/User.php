<?php

namespace App\Repositories;

use App\Models\User as M_User;
use App\Models\Review;

class User extends BaseRepository
{
    public function __construct(M_User $model)
    {
        $this->model = $model;
    }

    public function timeline(string $uuid) : Collection
    {
        return Review
            ::leftJoin('collections', 'reviews.collection_id', '=', 'collections.id')
            ->leftJoin('users', 'collections.id', '=', 'users.id')
            ->where('users.uuid', $uuid)
            ->get();
    }

    public function subscriptions(string $uuid) : Collection
    {
        $u = $this->show($uuid);
        $u->load(['subscribed_users' => function($q) {
            $q->orderBy('rating', 'DESC');
        }]);

        return $u;
    }

    public function subscribe(string $user_uuid, string $subs_user_uuid)
    {
        $user = $this->show($user_uuid);
        $subs_user = $this->show($subs_user_uuid);

        $user->subscribed_users()->attach($subs_user->id);
    }

    public function unsubscribe(string $user_uuid, string $subs_user_uuid)
    {
        $user = $this->show($user_uuid);
        $subs_user = $this->show($subs_user_uuid);

        $user->subscribed_users()->dettach($subs_user->id);
    }
}

