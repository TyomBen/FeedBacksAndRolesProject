<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Feedback extends Model
{
    protected $table = 'feedbacks';
    protected $fillable = [
        'name',
        'file',
        'email',
        'user_id',
        'subject',
        'message',
        'admin_mark'
    ];

    public function answer () : HasMany
    {
        return $this->hasMany(Answer::class);
    }
    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
