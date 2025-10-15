<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('nullable|boolean')]
    public bool $is_completed;

    public Task $task;

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->name = $task->name;
        $this->is_completed = $task->is_completed;
    }

    public function render(): View
    {
        return view('livewire.tasks.edit');
    }

    public function save()
    {
        $this->validate();
        $this->task->update([
            'name' => $this->name,
            'is_completed' => $this->is_completed,
        ]);
        session()->flash('success', 'Task updated successfully.');
        $this->redirectRoute('tasks.index', navigate: true);

    }

}
