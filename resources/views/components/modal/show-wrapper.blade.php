@props(['id'])

<div id="{{ $id }}" onclick="closeShowTaskModal()"
     class="flex fixed top-0 left-0 z-[100] w-screen h-screen flex-col justify-center items-center bg-black/50">
    <div onclick="stopEventPropagation(event)" class="relative z-[110] w-[480px] bg-white min-h-[200px] rounded-lg">
        {{ $slot }}
    </div>
</div>

<script>
    function stopEventPropagation(event) {
        event.stopPropagation(); // Prevent modal close when clicking inside
    }
</script>
