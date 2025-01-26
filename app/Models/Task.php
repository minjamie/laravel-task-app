<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // 이 줄 추가
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Task",
 *     type="object",
 *     required={"title", "due_date"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="New Task"),
 *     @OA\Property(property="description", type="string", example="Task description"),
 *     @OA\Property(property="due_date", type="string", format="date", example="2025-02-01"),
 *     @OA\Property(property="completed", type="boolean", example=false)
 * )
 */
class Task extends Model
{
    use HasFactory;  

    protected $fillable = ['title', 'description', 'due_date', 'completed'];
}
