<?php

namespace App\Livewire;

use Livewire\Component;

class CreateUser extends Component
{
    public $title = 'Create User';
    public function render()
    {
        return view('livewire.create-user');
    }
}
