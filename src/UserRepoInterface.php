<?php
namespace App\Repositories\User;

interface UserRepoInterface {

    /**
     * get all users
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * find user by id
     *
     * @param int $id
     * @return App\Model\User
     */
    public function find($id);

    /**
     * delete user by id
     *
     * @param int $id
     * @return bool|null
     */
    public function delete($id);

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model\User
     */
    public function create(array $data);

    /**
     * update user.
     *
     * @param  int  $id
     * @param  array  $data
     * @param  string  $attribute default 'id'
     * @return bool
     */
    public function update($id, array $data, $attribute = 'id');
    /**
     * destroy user by id
     *
     * @param  int $id
     * @return bool
     */
    public function destroy($id);
}
