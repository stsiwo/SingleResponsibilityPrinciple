<?php

namespace App\Repositories\User;

use App\Repositories\User\UserRepoInterface;
use App\User;

class UserRepository implements UserRepoInterface
{
    /**
     * instance of App\Model\user
     *
     * @var App\Model\User
     */
    public $user;

    /**
     * constructor
     *
     * @param App\Model\User
     */
    function __construct(User $user) {
	     $this->user = $user;
    }

    /**
     * get all users
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->user->getAll();
    }

    /**
     * find user by id
     *
     * @param int $id
     * @return App\Model\User
     */
    public function find($id)
    {
        return $this->user->findUser($id);
    }

    /**
     * delete user by id
     *
     * @param int $id
     * @return bool|null
     */
    public function delete($id)
    {
        return $this->user->deleteUser($id);
    }

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model\User
     */
    public function create(array $data) {
        return $this->user->create($data);
    }

    /**
     * update user.
     *
     * @param  int  $id
     * @param  array  $data
     * @param  string  $attribute default 'id'
     * @return bool
     */
    public function update($id, array $data, $attribute = 'id') {
        return $this->user->where($attribute, '=', $id)->update($data);
    }

    /**
     * destroy user by id
     *
     * @param  int $id
     * @return bool
     */
    public function destroy($id) {
      return $this->user->destroy($id);
    }
}
