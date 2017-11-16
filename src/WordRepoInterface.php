<?php
namespace App\Repositories\Word;

interface WordRepoInterface {

    /**
     * get all words
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * find word by id
     *
     * @param int $id
     * @return App\Model\Word
     */
    public function find($id);

    /**
     * find word by its fields
     *
     * @param array $data
     * @return App\Model\Word
     */
    public function findWords(array $data);

    /**
     * delete word by id
     *
     * @param int $id
     * @return bool|null
     */
    public function delete($id);

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model\Word
     */
    public function create(array $data);

    /**
     * update word.
     *
     * @param  int  $id
     * @param  array  $data
     * @param  string  $attribute default 'id'
     * @return bool
     */
    public function update($id, array $data, $attribute = 'id');

    /**
     * destroy dictionary by id
     *
     * @param  int $id
     * @return bool
     */
    public function destroy($id);

    /**
     *  create word with name field
     *
     * @param  string $name
     * @return App\Model\Word
     */
    public function createWithAttrsOf(string $name);
}
