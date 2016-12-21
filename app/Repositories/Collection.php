<?php

namespace App\Repositories;

use App\Models\Collection as M_Collection;
use App\Repositories\Book;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Collection extends BaseRepository
{
    private $book;

    public function __construct(M_Collection $model, Book $book)
    {
        $this->model = $model;
        $this->book = $book;
    }

    public function createOrFail(array $fields) : Model
    {
        $fields['uuid'] = Uuid::uuid4()->toString();
        $fields['book_id'] = $this->book->show($fields['book_id'])->id;
        $fields['user_id'] = auth()->user()->id;

        return $this->model
            ->create($fields);
    }
}

