<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feestdag extends Model
{
    use HasFactory;

    protected $table = 'feestdagen';

    protected $fillable = ['column1', 'column2'];
}
