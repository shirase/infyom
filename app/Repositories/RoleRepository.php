<?php

namespace App\Repositories;

class RoleRepository
{
    private $data = [
        [
            'role' => 'administrator',
            'name' => 'administrator',
        ],
        [
            'role' => 'manager',
            'name' => 'manager',
        ],
        [
            'role' => 'user',
            'name' => 'user',
        ],
    ];

    public function index(): array
    {
        return $this->data;
    }
}
