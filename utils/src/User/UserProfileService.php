<?php

namespace Icg\User;

use Icg\Models\User;
use Icg\User\Traits\SetUser;

class UserProfileService {

    use SetUser;

   /**
    * Set password of given user.
    */
    public function setPassword($password, User $user = null) {
        $user = $this->getUser($user);
        $user->password = $password;
        return $this;
    }

   /**
    * Set profile of the given user.
   */
    public function setProfile($profile, User $user = null) {
        $this->getUser($user)->fill($profile);
        return $this;
    }

    public function updateWithAuthUser(User $user = null) {
        $this->getUser($user)->updateWithAuthUser();
        return $this;
    }

    public function saveWithModifier(User $modifier, User $user = null) {
        $this->getUser($user)->updateWithModifier($modifier);
        return $this;
    }

    public function isPasswordMatch($password, User $user = null) {
        $user = $this->getUser($user);
        return \Hash::check($password, $user->password);
    }
}
