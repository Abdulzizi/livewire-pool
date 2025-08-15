<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    private $pollModel;
    public $title;
    // public $options = ['Initial Option', 'Second Option'];
    public $options = [];

    protected $rules = [
        'title' => 'required|string|min:3|max:255',
        'options' => 'required|array|min:2|max:10',
        'options.*' => 'required|string|min:2|max:255',
    ];

    protected $messages = [
        'title.required' => 'The poll title is required.',
        'options.*.required' => 'Option name must be provided.',
    ];

    public function __construct()
    {
        $this->pollModel = new Poll();
    }

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function handleClick()
    {
        // $this->options[] = 'New Option ' . (count($this->options) + 1);
        $this->options[] = '';
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
        $this->validate();

        $poll = $this->pollModel->create([
            'title' => $this->title,
        ]);

        foreach ($this->options as $optName) {
            $poll->options()->create([
                'name' => $optName,
            ]);
        }

        session()->flash('message', 'Poll created successfully!');

        // Reset the form
        $this->title = '';
        $this->options = [];
    }
}