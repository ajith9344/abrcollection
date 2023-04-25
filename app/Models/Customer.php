<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $tabel='customers';
    protected $fillable=['name','server','account','username','password','type','network','noofconn','phone','rental','address','total','remark'];
}
