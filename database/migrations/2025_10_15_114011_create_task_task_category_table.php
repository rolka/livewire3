<?php

use App\Models\Task;
use App\Models\TaskCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_task_category', function (Blueprint $table) {
            // $table->foreignIdFor(Task::class)->constrained()->cascadeOnDelete();
            $table->foreignId('task_id')->constrained()->cascadeOnDelete();

            // $table->foreignId(TaskCategory::class)->constrained()->cascadeOnDelete();
            $table->foreignId('task_category_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_task_category');
    }
};
