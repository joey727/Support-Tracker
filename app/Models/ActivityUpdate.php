<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityUpdate extends Model
{
    protected $fillable = [
        'activity_id', 'user_id', 'status', 'remark',
        'actor_name', 'actor_email', 'actor_title', 'metadata'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
