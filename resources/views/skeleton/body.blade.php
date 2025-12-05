
<!-- Верхняя панель -->
<header class="fixed top-0 left-0 w-full z-50 flex items-center justify-between px-6 py-3 bg-orange-400 dark:bg-orange-600 shadow-md">
    <!-- Левая часть: иконка + кнопки -->
    <div class="flex items-center">
        <div class="mr-4 w-10 h-10 bg-white dark:bg-gray-200 rounded-full flex items-center justify-center">
            <span class="text-orange-500 dark:text-orange-700 font-bold">I</span>
        </div>

        <nav class="flex space-x-2">
            <button class="px-4 py-2 rounded bg-orange-400 dark:bg-orange-600 hover:bg-orange-300 dark:hover:bg-orange-500 transition font-medium">
                Каталог 1
            </button>
            <button class="px-4 py-2 rounded bg-orange-400 dark:bg-orange-600 hover:bg-orange-300 dark:hover:bg-orange-500 transition font-medium">
                Каталог 2
            </button>
            <button class="px-4 py-2 rounded bg-orange-400 dark:bg-orange-600 hover:bg-orange-300 dark:hover:bg-orange-500 transition font-medium">
                Каталог 3
            </button>
        </nav>
    </div>

    <!-- Правая часть: кнопки -->
    <div class="flex items-center space-x-2">
        <!-- Переключение темы -->
        <form action="{{ route('theme.toggle') }}" method="POST">
            @csrf
            <button type="submit" class="px-3 py-1 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                {{ $theme === 'dark' ? '🌙' : '☀️' }}
            </button>
        </form>

        <!-- Язык -->
        <button class="px-3 py-1 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow hover:bg-gray-200 dark:hover:bg-gray-700 transition">
            EN
        </button>
    </div>
</header>

<!-- Контент -->
<main class="flex flex-col items-center justify-start flex-1 pt-20 lg:pt-24 px-6 lg:px-8 w-full">
    <div class="bg-white dark:bg-gray-800 w-full max-w-6xl p-6 rounded shadow">
        @include($page)
    </div>
</main>
