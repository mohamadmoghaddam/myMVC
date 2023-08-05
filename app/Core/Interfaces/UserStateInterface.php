<?php
namespace Core\Interfaces;

use Base\Models\User;

interface UserStateInterface {
    public function signIn();
    public function signOut();
    public function signUp();
}