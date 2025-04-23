<?php

abstract class Resource
{

    abstract public function index();
    abstract public function create();
    abstract public function update();
    abstract public function delete();
}
