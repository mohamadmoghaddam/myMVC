<?php
namespace Core\Interfaces;

interface UserInterface {
    public function fetch();
    public function fetchById();
    public function update();
    public function delete();
}