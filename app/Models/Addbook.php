<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addbook extends Model
{
    use HasFactory;

    protected $table = 'addbooks';
    protected $primaryKey = 'book_id';

    protected $fillable = ['title', 'author', 'image', 'date'];




}
