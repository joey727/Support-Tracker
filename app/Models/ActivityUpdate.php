<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'user_id',
        'status',
        'remark',
        'actor_name',
        'actor_email',
        'actor_title',
        'metadata',
    ];

    public function activity()
    {
        // Correct: local key is 'id', foreign key is 'activity_id'
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }

    public function user()
    {
        // Correct: local key is 'id', foreign key is 'user_id'
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
