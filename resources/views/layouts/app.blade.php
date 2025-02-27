@php
    $boardsCount = 0;
    if(isset($boards)) {
        $boardsCount = count($boards);
    }
    if(!isset($selectedBoardId)) {
        $selectedBoardId = null;
    }
@endphp

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'App') | MyBoard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:300,400,500,600,700,800" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans">
<div class="w-screen h-[97px] flex items-center bg-white">
    <div class="w-[300px] h-full flex items-center px-8 border-r border-lines">
        <x-logo/>
    </div>
    <div class="flex-1 h-full">
        @yield('heading')
    </div>
</div>
<div class="w-screen h-[calc(100vh_-_97px)] flex bg-light-grey">
    <aside class="w-[300px] h-full pb-8 pr-6 bg-white border-r border-lines">
        <div class="mt-7">
            <p class="pl-8 font-bold text-xs tracking-[2.4px] text-medium-grey uppercase">
                All boards ({{ $boardsCount }})</p>
            <div class="mt-6">
                <ul>
                    @foreach($boards as $board)
                        <li>
                            <a href="/boards/{{ $board->id }}"
                               class="block px-8 py-2 mb-1 text-[15px]/6 {{ $board->id == $selectedBoardId ? 'bg-purple text-white' : 'text-medium-grey hover:bg-purple-light hover:text-white' }} rounded-br-full rounded-tr-full cursor-pointer">
                                {{ $board->title }}
                            </a>
                        </li>
                    @endforeach
                    <li>
                        <button data-modal-open="create-board"
                                class="px-8 py-2 mb-1 text-[15px]/6 text-purple hover:text-purple-light">
                            + Create New Board
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <x-modal.create-board id="create-board"/>
    </aside>

    <main class="flex-1 h-full overflow-hidden">
        @yield('content')
    </main>
</div>
</body>
</html>
