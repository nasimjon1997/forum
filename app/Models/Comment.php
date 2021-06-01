<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'user_id',
        'image',
        'text'
    ];

    /**
     * Get place of this categories.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
