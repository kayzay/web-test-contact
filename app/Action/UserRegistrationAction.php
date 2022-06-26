<?php
namespace App\Action;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserRegistrationAction
{
    /**
     * @param Model $user
     * @param $data
     * @return bool|Model
     */
    public function handle($user, $data)
    {
       $user->fill([
           'email' => $data['email'],
           'name' => $data['name'],
           'password' => Hash::make($data['password'])
       ]);

       return ($user->save()) ? $user : false;
    }

}
