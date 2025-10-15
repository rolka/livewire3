<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.tasks.index', [
            'tasks' => Task::latest()->paginate(5)
        ]);
    }
    public function delete(Task $task)
    // public function delete( int $id )
    {
        // Task::where('id', $id)->delete();
        // $this->authorize('delete', $task);
        $task->delete();
        session()->flash('success', 'Task deleted successfully.');

    }

}

