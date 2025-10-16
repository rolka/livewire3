<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use App\Models\TaskCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(as: 'categories', except: '')]
    public ?array $selectedCategories = [];

    public function render(): View
    {
        return view('livewire.tasks.index', [
            'tasks' => Task::query()
                ->with('media', 'taskCategories')
                ->when($this->selectedCategories, function (Builder $query) {
                    $query->whereHas('taskCategories', function (Builder $query) {
                        $query->whereIn('id', $this->selectedCategories);
                    });
                })
                ->latest()
                ->paginate(3),
            'categories' => TaskCategory::all(),
        ]);
    }
    public function delete(Task $task): void
        // public function delete( int $id )
    {
        // Task::where('id', $id)->delete();
        // $this->authorize('delete', $task);
        $task->delete();
        session()->flash('success', 'Task deleted successfully.');

    }

}

