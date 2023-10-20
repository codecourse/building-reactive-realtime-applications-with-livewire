<form wire:submit="create" class="space-y-2">
    <div>
        <label for="body" class="sr-only">Post body</label>
        <x-textarea-input class="w-full h-28 p-4" wire:model="body" placeholder="What do you want to say?" />
        <x-input-error :messages="$errors->get('body')" />
    </div>

    <x-primary-button>Post</x-primary-button>
</form>
