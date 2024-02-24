<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $table = 'task_lists';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status'
    ];
    use HasFactory;
}
