<?php

    use App\Models\Task;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('sub_tasks', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->boolean('completed')->default(false);
                $table->foreignIdFor(Task::class)->constrained()->cascadeOnDelete();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('sub_tasks');
        }
    };
