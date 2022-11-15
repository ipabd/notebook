<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Notebook extends Model
{
    use HasFactory;

    protected $table    = 'notebooks';
    protected $dates    = [
        'updated_at',
        'created_at',
    ];
    protected $fillable = [
        'fio',
        'telephone',
        'email',
        'datebirth',
        'img',
        'text'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
