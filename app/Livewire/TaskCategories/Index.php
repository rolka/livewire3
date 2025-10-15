<?php

namespace App\Livewire\TaskCategories;

use App\Models\TaskCategory;
use Illuminate\View\View;
use Livewire\Component;

class Index extends Component
{
    // public function delete( TaskCategory $taskCategory )
    public function delete( int $id ): void
    {
        // $taskCategory->delete();
        $taskCategory = TaskCategory::findOrFail($id);
        if ( $taskCategory->tasks()->count() > 0 )
        {
            $taskCategory->tasks()->detach();
        }
        $taskCategory->delete();
    }

    public function render(): View
    {
        return view('livewire.task-categories.index', [
            'taskCategories' => TaskCategory::withCount('tasks')->paginate(5),

        ]);
    }
}
