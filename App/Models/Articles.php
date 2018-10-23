<?php

namespace App\Models;


use App\Model;

class Articles extends Model
{
    const TABLE = 'articles';

    public $title;
    public $author;
    public $content;
    public $category;
}