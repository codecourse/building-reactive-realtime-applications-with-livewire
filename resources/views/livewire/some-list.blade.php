<div>
    <livewire:some-list-count :things="$things" />

    @foreach ($things as $thing)
        <div>{{ $thing }}</div>
    @endforeach

    <button wire:click="addThing">Add thing</button>
</div>
