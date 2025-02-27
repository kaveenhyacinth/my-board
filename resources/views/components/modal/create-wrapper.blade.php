@props(['id'])

<div id="{{ $id }}" data-modal-close="{{ $id }}" data-app-modal
     class="hidden fixed top-0 left-0 z-[100] w-screen h-screen flex-col justify-center items-center bg-black/50">
    @if(session('success') == $id)
        <script type="text/javascript">
            sessionStorage.removeItem('persistentModal')
        </script>
    @endif
    <div class="w-[480px] bg-white min-h-[200px] rounded-lg">
        {{ $slot }}
    </div>
</div>
