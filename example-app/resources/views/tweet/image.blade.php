@props([
    'images' => []
])

@if(count($images) > 0)
<div class="{}" class="px-2">
    <div class="flex justify-center -mx-2">
        @foreach($images as $images)
        <div class="w-1/6 px-2 mt-5">
            <div class="bg-gray-400">
                <a @click="$dispatch('img-modal', { imgModalSrc:'{{ asset('storage/images/' . $image->name) }}' )" class="cursor-pointer">
                    <img src="{{ asset('storage/images/' . $image->name) }}" alt="{{ $image->name }}" class="object-fit w-full">
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif