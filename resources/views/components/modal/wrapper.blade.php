@props(['id'])

<div id="{{ $id }}" data-modal-close="{{ $id }}"
     class="hidden fixed top-0 left-0 z-[100] w-screen h-screen flex-col justify-center items-center bg-black/50">
    <div class="w-[480px] bg-white min-h-[200px] rounded-lg">
        {{ $slot }}
    </div>
</div>
