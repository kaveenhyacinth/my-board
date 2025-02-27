<?php

    namespace App\Models;

    use Database\Factories\ColumnFactory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Column extends Model
    {
        /** @use HasFactory<ColumnFactory> */
        use HasFactory;

        protected $fillable = ['name', 'order'];

        public function board(): BelongsTo
        {
            return $this->belongsTo(Board::class);
        }

        public function tasks(): HasMany
        {
            return $this->hasMany(Task::class);
        }
    }
