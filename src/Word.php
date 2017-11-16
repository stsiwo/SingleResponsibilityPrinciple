<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Traits\RepositoryTrait;

class Word extends Model
{
    use RepositoryTrait;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'words';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     *  create word with name field
     *
     * @param  string $name
     * @return App\Model\Word
     */
    public static function createWithAttrsOf(string $name) {
       return static::create(['name' => $name]);
    }

    /**
     * find word by its fields
     *
     * @param array $data
     * @return App\Model\Word|null
     */
    public static function findWords(array $ids) {
        return static::findMany($ids);
    }

    /**
     * get list of words with its relations (meanings, part_of_speech, english, japanese) by user (eager loading)
     *
     * @param \App\User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getListOfWordsWithRelationsByUser(\App\User $user) {
       $user = $user->load('words', 'words.meanings', 'words.meanings.part_of_speech', 'words.meanings.english', 'words.meanings.japanese');
       return $user->words;
    }

    /**
     * get list of words with its relations (meanings, part_of_speech, english, japanese) by word id (eager loading)
     *
     * @param int $word_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getListOfWordsWithRelationsByWordId(int $word_id)
    {
        return static::with('meanings', 'meanings.part_of_speech', 'meanings.english', 'meanings.japanese')->findOrFail($word_id);
    }

    /**
     * get list of words with its relations (dictionary) by word id (eager loading)
     *
     * @param int $word_id
     * @return \App\Model\Word
     */
    public static function getWordWithItsDictionary(int $word_id)
    {
        return static::with('dictionaries')->findOrFail($word_id);
    }

    /**
     * one to many relation with App\Model\Meaning
     *
     * @return hasMany instance
     */
    public function meanings()
    {
        return $this->hasMany('App\Model\Meaning', 'word_id', 'id');
    }

    /**
    *  many to many relationship (inverse) with App\Model\Dictionary
    *  @return belongsToMany
    */
    public function dictionaries() {
      return $this
              ->belongsToMany('App\Model\Dictionary')
              ->withTimestamps()
              ->using('App\Model\DictionaryWord');
    }

    /**
    *  many to many relationship with App\Model\User
    *
    *  @return belongsToMany
    */
    public function users() {
      return $this
              ->belongsToMany('App\User')
              ->withTimestamps()
              ->using('App\Model\UserWord');
    }

    /**
    *  many to many relationship with App\Model\Word
    *
    *  @return belongsToMany
    */
    public function antonyms() {
      return $this
              ->belongsToMany('App\Model\Word', 'antonyms', 'word_id', 'antonym_id')
              ->withTimestamps()
              ->using('App\Model\Antonym');
    }

    /**
    *  many to many relationship with App\Model\Word
    *
    *  @return belongsToMany
    */
    public function words_of_antonym() {
      return $this
              ->belongsToMany('App\Model\Word', 'antonyms', 'antonym_id', 'word_id')
              ->withTimestamps()
              ->using('App\Model\Antonym');
    }

    /**
    *  many to many relationship with App\Model\Word
    *
    *  @return belongsToMany
    */
    public function synonyms() {
      return $this
              ->belongsToMany('App\Model\Word', 'synonyms', 'word_id', 'synonym_id')
              ->withTimestamps()
              ->using('App\Model\Synonym');
    }

    /**
    *  many to many relationship with App\Model\Word
    *
    *  @return belongsToMany
    */
    public function words_of_synonym() {
      return $this
              ->belongsToMany('App\Model\Word', 'synonyms', 'synonym_id', 'word_id')
              ->withTimestamps()
              ->using('App\Model\Synonym');
    }
}
