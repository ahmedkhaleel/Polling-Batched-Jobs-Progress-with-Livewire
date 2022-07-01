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
    public $batchId;
    public function createServer()
    {
       $batch= Bus::batch([
            new TaskOne(),
            new TaskTow(),
            new TaskThree(),
            new TaskFour(),
            new TaskFive(),
        ])
            ->dispatch();
       $this->batchId = $batch->id;
    }
    public function getImportBatchProperty()
    {
        if(!$this->batchId)
        {
            return null;
        }

        return Bus::findBatch($this->batchId);
    }

    public function render()
    {
        return view('livewire.create-server');
    }
}
