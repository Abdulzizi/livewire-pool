<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = ['Initial Option', 'Second Option'];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function handleClick()
    {
        $this->options[] = 'New Option ' . (count($this->options) + 1);
    }
}