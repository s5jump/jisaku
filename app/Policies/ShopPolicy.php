<?php

namespace App\Policies;

use App\Models\User;
use App\shop;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any shops.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the shop.
     *
     * @param  \App\Models\User  $user
     * @param  \App\shop  $shop
     * @return mixed
     */
    public function view(User $user, shop $shop)
    {
        return $user->id === $shop->user_id;
    }

    /**
     * Determine whether the user can create shops.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the shop.
     *
     * @param  \App\Models\User  $user
     * @param  \App\shop  $shop
     * @return mixed
     */
    public function update(User $user, shop $shop)
    {
        //
    }

    /**
     * Determine whether the user can delete the shop.
     *
     * @param  \App\Models\User  $user
     * @param  \App\shop  $shop
     * @return mixed
     */
    public function delete(User $user, shop $shop)
    {
        //
    }

    /**
     * Determine whether the user can restore the shop.
     *
     * @param  \App\Models\User  $user
     * @param  \App\shop  $shop
     * @return mixed
     */
    public function restore(User $user, shop $shop)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the shop.
     *
     * @param  \App\Models\User  $user
     * @param  \App\shop  $shop
     * @return mixed
     */
    public function forceDelete(User $user, shop $shop)
    {
        //
    }
}
