<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // 이 줄 추가
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;  

    protected $fillable = ['title', 'description', 'due_date', 'completed'];
}
