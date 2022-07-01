<?php

namespace App\Http\Livewire;

use App\Jobs\Taskfive;
use App\Jobs\TaskFour;
use App\Jobs\TaskOne;
use App\Jobs\Taskthree;
use App\Jobs\TaskTow;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateServer extends Component
{
    public $batchId;
    public $serverId;

    public $batchFinished = false;
    public $batchCancelled = false;
    public $batchProgress = 0;
    public function createServer()
    {
        $this->serverId = 1;
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
    public function updateBatchProgress()
    {
        $this->batchProgress = $this->getImportBatchProperty()->progress();
        $this->batchFinished = $this->getImportBatchProperty()->finished();
        $this->batchCancelled = $this->getImportBatchProperty()->cancelled();

    }

    public function render()
    {
        return view('livewire.create-server');
    }
}
