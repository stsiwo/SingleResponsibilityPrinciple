<?php

namespace App\Repositories\Dictionary;

use App\Repositories\Dictionary\DictionaryRepoInterface;
use App\Model\Dictionary;

class DictionaryRepository implements DictionaryRepoInterface
{
    /**
     * instance of App\Model\Dictionary
     *
     * @var App\Model\Dictionary
     */
    public $dictionary;

    /**
     * constructor
     *
     * @param App\Model\Dictionary
     */
    function __construct(Dictionary $dictionary) {
	     $this->dictionary = $dictionary;
    }

    /**
     * get all dictionaries
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->dictionary->getAll();
    }

    /**
     * find dictionary by id
     *
     * @param int $id
     * @return App\Model\Dictionary
     */
    public function find($id)
    {
        return $this->dictionary->findOne($id);
    }

    /**
     * delete dictionary by id
     *
     * @param int $id
     * @return bool|null
     */
    public function delete($id)
    {
        return $this->dictionary->deleteOne($id);
    }

    /**
     * get dictionaries with its relations of words and meanings (eager loading)
     *
     * @param int $dicId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getListOfDefinitionsOfItsDic(int $dicId)
    {
        return $this->dictionary->getListOfDefinitionsOfItsDic($dicId);
    }

    /**
     * find dictionary with its relations of words (eager loading)
     *
     * @param int $dicId
     * @return \App\Model\Dictionary
     */
    public function findDictionaryWithItsWords(int $dicId)
    {
        return $this->dictionary->findDictionaryWithItsWords($dicId);
    }

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $data
     * @return bool
     */
    public function create(array $data) {
        return $this->dictionary->create($data);
    }

    /**
     * Save a new dictionary with its words.
     *
     * @param  array  $data
     * @return bool
     */
    public function createWithWords(array $data) {
        return $this->dictionary->createWithWords($data);
    }

    /**
     * update dictionary.
     *
     * @param  int  $id
     * @param  array  $data
     * @param  string  $attribute default 'id'
     * @return bool
     */
    public function update($id, array $data, $attribute = 'id') {
        return $this->dictionary->where($attribute, '=', $id)->update($data);
    }

    /**
     * delete dictionary by id
     *
     * @param  int $id
     * @return bool
     */
    public function destroy($id) {
      return $this->dictionary->destroy($id);
    }
}
