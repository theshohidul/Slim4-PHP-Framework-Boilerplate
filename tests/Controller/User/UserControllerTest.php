<?php

namespace App\Test\Controller\User;

use App\Application\Repository\User\UserRepository;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * Test
     */
    public function testSingleUser(): void
    {
        $user = UserRepository::getSingle(1);
        self::assertTrue(is_array($user));
    }

    /**
     * Test
     */
    public function testAllUser(): void
    {
        $users = UserRepository::getAll();
        self::assertTrue(is_array($users));
    }
}
