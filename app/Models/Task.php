<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $fillable = ['name', 'is_completed'];

    public function casts(): array
    {
        return [
            'is_completed' => 'boolean',
        ];
    }

}
