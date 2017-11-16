<?php

namespace App\Repositories\Word;

use App\Repositories\Word\WordRepoInterface;
use App\Model\Word;

class WordRepository implements WordRepoInterface
{
   /**
    * instance of App\Model\Word
    *
    * @var App\Model\Word
    */
    public $word;

    /**
     * constructor
     *
     * @param App\Model\Word
     */
    function __construct(Word $word) {
	     $this->word = $word;
    }

    /**
     * get all words
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->word->getAll();
    }

    /**
     * find word by id
     *
     * @param int $id
     * @return App\Model\Word
     */
    public function find($id)
    {
        return $this->word->findOne($id);
    }

    /**
     * find word by its fields
     *
     * @param array $data
     * @return App\Model\Word
     */
    public function findWords(array $data)
    {
        return $this->word->findWords($data);
    }

    /**
     * delete word by id
     *
     * @param int $id
     * @return bool|null
     */
    public function delete($id)
    {
        return $this->word->deleteOne($id);
    }

    /**
     * Save a new model and return the instance.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model\Word
     */
    public function create(array $data) {
        return $this->word->create($data);
    }

    /**
     * update word.
     *
     * @param  int  $id
     * @param  array  $data
     * @param  string  $attribute default 'id'
     * @return bool
     */
    public function update($id, array $data, $attribute = 'id') {
        return $this->word->where($attribute, '=', $id)->update($data);
    }

    /**
     * destroy word by id
     *
     * @param  int $id
     * @return bool
     */
    public function destroy($id) {
      return $this->Word->destroy($id);
    }

    /**
     *  create word with name field
     *
     * @param  string $name
     * @return App\Model\Word
     */
    public function createWithAttrsOf(string $name) {
      return $this->word->createWithAttrsOf($name);
    }
}
