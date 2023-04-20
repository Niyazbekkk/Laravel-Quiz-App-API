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
            'email' => 'nullable|unique:users,phone',
            'password' => 'required|min:8',
        ];
    }
    public function execute(array $data): array
    {
        $this->validate($data, $this->rules());
        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => $data['password'],
            'is_premium' => false,
            'is_admin'=> false,
        ]);
        $token = $user->createToken('user model', ['user'])->plainTextToken;
        return [$user, $token];
    }
}
