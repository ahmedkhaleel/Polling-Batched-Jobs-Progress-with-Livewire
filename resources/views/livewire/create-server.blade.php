<div>
    <x-button wire:click="createServer">
        Create Server
    </x-button>
    <div wire:poll="updateBatchProgress">
        {{ $batchProgress }}
    </div>
</div>
