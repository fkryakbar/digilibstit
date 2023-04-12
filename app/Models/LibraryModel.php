<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryModel extends Model
{
    use HasFactory;

    protected $table = 'library';
    protected $guarded = [];
}
