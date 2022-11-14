<?php

namespace App\Repositories;

class RoleRepository
{
    public const ADMINISTRATOR = 'administrator';
    public const MANAGER = 'manager';
    public const USER = 'user';

    private $data = [
        [
            'role' => self::ADMINISTRATOR,
            'name' => 'administrator',
        ],
        [
            'role' => self::MANAGER,
            'name' => 'manager',
        ],
        [
            'role' => self::USER,
            'name' => 'user',
        ],
    ];

    public function index(): array
    {
        return $this->data;
    }
}
