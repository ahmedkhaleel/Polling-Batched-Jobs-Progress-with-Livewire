<div>
    <x-button wire:click="createServer">
        Create Server
    </x-button>
    @if($batchId)
    {{$this->getImportBatchProperty()->progress()}}
    @endif
</div>
