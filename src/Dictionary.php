<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Traits\RepositoryTrait;

class Dictionary extends Model
{
    use RepositoryTrait;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'dictionaries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'num_of_words', 'user_id'
    ];

    /**
     * get list of relations of dictionary (words, meanings, part_of_speech, english, japanese) by id (eager loading)
     *
     * @var int $dicId
     * @return \App\Model\Dictionary
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getListOfDefinitionsOfItsDic(int $dicId)
    {
        return static::with('words', 'words.meanings', 'words.meanings.part_of_speech', 'words.meanings.english', 'words.meanings.japanese')->findOrFail($dicId);
    }

    /**
     * get list of relations of dictionary (words) by id (eager loading)
     *
     * @var int $dicId
     * @return \App\Model\Dictionary
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findDictionaryWithItsWords(int $dicId)
    {
        return static::with('words')->findOrFail($dicId);
    }

    // relationship

    /**
     *  get user that owns the dictionary
     *
     *  @return belongsTo
     */
     public function user() {
       return $this->belongsTo('App\User');
     }

     /**
     *  many to many relationship with App\Model\Word
     *  @return belongsToMany
     */
     public function words() {
       return $this->belongsToMany('App\Model\Word')->withTimestamps()->using('App\Model\DictionaryWord');
     }
}
