<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.search-users', [
            'users'=> Employee::where('name', 'like' , $this->search . '%')->get()
        ]);
    }

}
