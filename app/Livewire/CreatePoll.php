<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    private $pollModel;
    public $title;
    public $options = ['Initial Option', 'Second Option'];

    public function __construct()
    {
        $this->pollModel = new Poll();
    }

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function handleClick()
    {
        $this->options[] = 'New Option ' . (count($this->options) + 1);
    }

    public function removeOpt($index)
    {
        if (isset($this->options[$index])) {
            unset($this->options[$index]);
            $this->options = array_values($this->options); // Re-index the array
        }
    }

    public function createPoll()
    {
        $poll = $this->pollModel->create([
            'title' => $this->title,
        ]);

        foreach ($this->options as $optName) {
            $poll->options()->create([
                'name' => $optName,
            ]);
        }
    }
}