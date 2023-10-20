<div class="flex items-start space-x-5 border-b-slate-200 border-b pb-8">
    <div class="shrink-0 w-12">
        <img src="{{ $post->user->avatarUrl() }}" class="w-12 h-12 rounded-full">
    </div>
    <div class="grow space-y-2">
        <div class="font-bold text-lg">{{ $post->user->name }}</div>
        <div>
            <p>{{ $post->body }}</p>
        </div>
    </div>
</div>
