<?php

namespace App\DesignPatterns\Creational\LazyInitialization;

use App\Models\User;

class LazyInitialization
{
    /**
     * @var User|null
     */
    private $user = null;

    /**
     * LazyInitialization constructor.
     */
    public function __construct() {
//        $this->user = User::first();
    }

    /**
     * @return User
     */
    public function getUser()
    {
//        return $this->user ?? ($this->user = User::first());

        if (is_null($this->user)) {
            $this->user = User::first();
            \Debugbar::info('Init User');
        }

        return $this->user;
    }

    public function getData1()
    {
        //
    }

    public function getAction1()
    {
        //
    }
}
