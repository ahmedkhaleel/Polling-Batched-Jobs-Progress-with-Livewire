<div>
    @if(! $batchId)
        <x-button wire:click="createServer">
            Create Server
        </x-button>
    @endif
    {{$batchProgress}}%
    @if ($batchId)
        <div class="relative pt-1 " wire:poll="updateBatchProgress">

            <div class="overflow-hidden h-4 flex rounded bg-green-100">
                <div style="width: {{$batchProgress}}%" class="bg-green-500 transition-all">

                </div>
            </div>
        </div>
    @endif
    @if ($batchCancelled)
        <p class="mt-4">Failed</p>
    @elseif($batchFinished)
        <p class="mt-4">Your server (# {{$serverId}}) has been created.</p>

    @endif
</div>
