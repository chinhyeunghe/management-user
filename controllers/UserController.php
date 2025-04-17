<?php

class UserController {

    public function index() {
        
        return view('user/index');
    }

    public function createUser() {

        return view('user/create');
    }
}