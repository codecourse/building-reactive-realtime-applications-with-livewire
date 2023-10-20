<form wire:submit="create" class="space-y-2">
    <div>
        <label for="body" class="sr-only">Post body</label>
        <x-textarea-input class="w-full h-28 p-4" />
        <x-input-error :messages="$errors->get('body')" />
    </div>

    <div class="flex items-center space-x-2">
        <x-primary-button>Edit</x-primary-button>
        <button type="button" x-on:click="$dispatch('edit-cancel')">Cancel</button>
    </div>
</form>
