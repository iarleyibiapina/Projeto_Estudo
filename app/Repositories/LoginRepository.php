<?php 

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class LoginRepository implements UserRepositoryInterface{
    public function allUsers(){

        return User::latest()->paginate(10);
    }
    public function storeUser($data){
        return User::create($data);
    }
    public function findUser($id){
        return User::find($id);
    }
    public function loginWhere(array $data = []){
        $user = User::where($data)->first();
        return $user;
    }
        public function updateUser($data, $id){
        $user = User::where('id', $id)->first();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
    }
    public function destroyUser($id){
        $user = User::find($id);
        $user->delete();
    }
}