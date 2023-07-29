<?php
namespace Core\Interfaces;

interface UserInterface {
    public function fetch();
    public function fetchById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}