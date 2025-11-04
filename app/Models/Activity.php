<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'active',
    ];

    public function updates()
    {
        return $this->hasMany(ActivityUpdate::class, 'activity_id', 'id');
    }
}
