<?php

namespace Icg\User\Traits;

use Icg\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * Set the modifier for model
 */
trait SetUser {

    protected $user;

    public function setUser(User $user) {
        $this->user = $user;
        return $this;
    }

    /**
     * Set authenticated user
     */
    public function setUserFromAuth() {
        return $this->setUser(Auth::user());
    }

    public function getUser(User $user = null) {
        return $user ?: $this->user;
    }

    public function save(User $user = null) {
        $this->getUser($user)->save();
        return $this;
    }
}
