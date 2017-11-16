<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    /**
     * get all users
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return static::all();
    }

    /**
     * find user by id
     *
     * @param int $id
     * @return App\Model\User
     */
    public function findUser($id)
    {
        return static::find($id);
    }

    /**
     * delete user by id
     *
     * @param int $id
     * @return bool|null
     */
    public function deleteUser($id)
    {
        return static::find($id)->delete();
    }

    /**
     * get guest user acccount
     *
     * @param int $id
     * @return bool|null
     */
    public static function getGuestUserModel()
    {
        return static::where('name','guest')->first();
    }

    /**
    *  one to many relationship with App\Model\Dictionary
    *  @return hasMany instance
    */
     public function dictionaries() {
       return $this->hasMany('App\Model\Dictionary');
     }

     /**
     *  many to many relationship with App\Model\User
     *  @return belongsToMany instance
     */
     public function words() {
       return $this
               ->belongsToMany('App\Model\Word')
               ->withTimestamps()
               ->using('App\Model\UserWord');
     }
}
