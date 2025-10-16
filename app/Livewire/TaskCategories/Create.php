<?php

namespace App\Livewire\TaskCategories;

use App\Models\TaskCategory;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('required|string|max:255')]
    public string $name;

    public function save(): void
    {
        $this->validate();
        TaskCategory::create([
            'name' => $this->name,
        ]);
        session()->flash('success', 'Task category successfully created.');
        $this->redirectRoute('task-categories.index', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.task-categories.create', [
            'categories' => TaskCategory::all(),
        ]);
    }
}
