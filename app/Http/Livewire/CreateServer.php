<?php

namespace App\Http\Livewire;

use App\Jobs\Taskfive;
use App\Jobs\TaskFour;
use App\Jobs\TaskOne;
use App\Jobs\Taskthree;
use App\Jobs\TaskTow;
use Illuminate\Support\Facades\Bus;
use Livewire\Component;

class CreateServer extends Component
{
    public function createServer()
    {
        Bus::batch([
            new TaskOne(),
            new TaskTow(),
            new TaskThree(),
            new TaskFour(),
            new TaskFive(),
        ])
            ->dispatch();
    }

    public function render()
    {
        return view('livewire.create-server');
    }
}
