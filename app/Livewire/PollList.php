<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class PollList extends Component
{
    public $polls;
    protected $PollModel;
    protected $listeners = [
        'pollCreated' => 'mount',
    ];

    public function __construct()
    {
        $this->PollModel = new Poll();
    }

    public function mount()
    {
        $this->getPolls();
    }
    public function render()
    {
        return view('livewire.poll-list');
    }

    public function getPolls()
    {
        $this->polls = $this->PollModel->all();
    }
}