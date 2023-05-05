<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'time', 'completed', 'datetime', 'user_id', 'tasklist_id', 'deleted_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function tasklist() {
        return $this->belongsTo(Tasklist::class);
    }
}
