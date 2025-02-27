<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Task extends Model
    {
        /** @use HasFactory<\Database\Factories\TaskFactory> */
        use HasFactory;

        protected $guarded = [
            'id'
        ];

        public function subTasks(): HasMany
        {
            return $this->hasMany(SubTask::class);
        }

        public function column()
        {
            return $this->belongsTo(Column::class);
        }
    }
