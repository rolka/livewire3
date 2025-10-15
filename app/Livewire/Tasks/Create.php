<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('required|string|max:255')]
    public string $name = '';

    public function render(): View
    {
        return view('livewire.tasks.create');
    }
    public function save()
    {
        $this->validate();
        Task::create([
            'name' => $this->name,
        ]);
        session()->flash('success', 'Task created successfully.');
        $this->redirectRoute('tasks.index');
    }

}
