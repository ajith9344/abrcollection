<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
    use HasFactory;
    protected $tabel='sims';
    protected $fillable=['name','network','noofconn','date','phone','address'];
}
