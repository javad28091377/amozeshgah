<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table = 'terms';
    protected $primarykey = 'id';
    public $incrementing = true;
    protected $keytype = 'int';
    protected $fillable = ['title','master','capacity','price','pic'];
}
