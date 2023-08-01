<?php 
namespace Core\Interfaces;

interface DatabaseInterface {
    public static function getInstance();
    public function getConnection();
}