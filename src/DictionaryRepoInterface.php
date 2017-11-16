<?php
namespace App\Repositories\Dictionary;

interface DictionaryRepoInterface {

    /**
     * get all dictionaries
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * find dictionary by id
     *
     * @param int $id
     * @return App\Model\Dictionary
     */
    public function find($id);

    /**
     * delete dictionary by id
     *
     * @param int $id
     * @return bool|null
     */
    public function delete($id);

    /**
     * get dictionaries with its relations of words and meanings (eager loading)
     *
     * @param int $dicId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getListOfDefinitionsOfItsDic(int $dicId);

    /**
     * find dictionary with its relations of words (eager loading)
     *
     * @param int $dicId
     * @return \App\Model\Dictionary
     */
    public function findDictionaryWithItsWords(int $dicId);

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model\Dictionary
     */
    public function create(array $data);

    /**
     * Save a new dictionary with its words.
     *
     * @param  array  $data
     * @return bool
     */
    public function createWithWords(array $data);

    /**
     * update dictionary.
     *
     * @param  int  $id
     * @param  array  $data
     * @param  string  $attribute default 'id'
     * @return bool
     */
    public function update($id, array $data, $attribute = 'id');

    /**
     * delete dictionary by id
     *
     * @param  int $id
     * @return bool
     */
    public function destroy($id);


}
