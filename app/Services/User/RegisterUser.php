<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\BaseServices;

class RegisterUser extends BaseServices
{
    public function rules (): array
    {
        return [
            'name' => 'required',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8',
            'is_premium'=> 'required',
            'is_admin'=>'required',
        ];
    }
    public function execute(array $data): User
    {
        $this->validate($data, $this->rules());
        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'is_premium' => $data['is_premium'],
            'is_admin'=>$data['is_admin']
        ]);
        return $user;
    }
}
