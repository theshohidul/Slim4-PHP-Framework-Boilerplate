<?php


namespace App\Application\Controller\User;


use App\Application\Service\User\UserListService;
use Psr\Http\Message\ResponseInterface;

/**
 * Class UserController
 * @package App\Application\Controller\User
 */
class UserController
{
    /**
     * @param $request
     * @param $response
     * @param $args
     * @return mixed
     */
    public static function getAllUser($request, $response, $args){
        $users = UserListService::getAllUser();

        $resp = [
            'status' => 'success',
            'data' => $users,
        ];

        $resp = json_encode($resp, JSON_PRETTY_PRINT);
        $response->getBody()->write($resp);

        return $response;
    }

    /**
     * @param $request
     * @param $response
     * @param $args
     * @return mixed
     */
    public static function getSingleUser( $request, $response, $args ){
        $user_id = $args['id'];

        $user = UserListService::getSingleUser($user_id);

        $resp = [
            'status' => 'success',
            'data' => $user,
        ];

        $resp = json_encode($resp, JSON_PRETTY_PRINT);
        $response->getBody()->write($resp);

        return $response;
    }
}