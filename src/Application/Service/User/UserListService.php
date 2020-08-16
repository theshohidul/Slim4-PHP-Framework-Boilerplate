<?php


namespace App\Application\Service\User;


use App\Application\Repository\User\UserRepository;

class UserListService
{
    /**
     * @return \string[][]
     */
    public static function getAllUser(){
        $users = UserRepository::getAll();

        return $users;
    }

    /**
     * @param int $id
     * @return array|string[]
     */
    public static function getSingleUser($id = 0){
        $users = UserRepository::getSingle($id);

        return $users;
    }
}