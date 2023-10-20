<div class="space-y-8">
    @for ($chunk = 0; $chunk < $page; $chunk++)
        <livewire:post-chunk :ids="$chunks[$chunk]" :key="$chunk" :chunk="$chunk" />
    @endfor

    @if ($this->hasMorePages())
        <div x-data x-intersect="$wire.incrementPage"></div>
    @endif
</div>
