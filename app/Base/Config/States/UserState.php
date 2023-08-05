<?php
namespace Base\Config\States;

use Base\Config\States\State\SignOut;
use \Core\Interfaces\UserStateInterface;

class UserState {
    private $state;
    
    private function setState(UserStateInterface $state)
    {
        $this->state = $state;
    }

    public function __construct()
    {
        $this->setState(new SignOut());
    }

    public function signIn()
    {
        $this->setState($this->state->signIn());
    }

    public function signOut()
    {
        $this->setState($this->state->signOut());
    }

    public function signUp()
    {
        $this->setState($this->state->signUp());
    }
}