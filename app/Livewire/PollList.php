<?php

namespace App\Livewire;

use App\Models\Option;
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

    public function vote($optionId)
    {
        $option = Option::find($optionId);

        if ($option) {
            $option->votes()->create([
                'option_id' => $optionId,
            ]);

            session()->flash('message', 'Your vote has been recorded successfully.');

            $this->dispatch('poll-voted');
        } else {
            session()->flash('error', 'An error occurred while processing your vote.');

            $this->dispatch('poll-error');
        }

        $this->getPolls();
    }
}