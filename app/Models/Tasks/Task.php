<?php

namespace App\Models\Tasks;

use App\Observers\Tasks\TaskObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'uuid',
        'is_finished',
    ];

    /**
     * Boot function.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });

        static::observe(TaskObserver::class);
    }
    
    /**
     * Finish task
     *
     * @return bool
     */
    public function finish(): bool
    {
        return $this->update([
            'is_finished' => true,
        ]);
    }

    public function scopeUnfinished($query)
    {
        return $query->where('is_finished', false);
    }
}
