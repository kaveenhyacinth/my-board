<?php

    namespace App\Models;

    use Database\Factories\BoardFactory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\HasManyThrough;

    class Board extends Model
    {
        /** @use HasFactory<BoardFactory> */
        use HasFactory;

        protected $guarded = [
            'id'
        ];

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function columns(): HasMany
        {
            return $this->hasMany(Column::class);
        }

        public function tasks(): HasManyThrough
        {
            return $this->hasManyThrough(Task::class, Column::class);
        }
    }
