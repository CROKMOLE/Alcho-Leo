
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

<div class="flex flex-1">

	<!-- ЛЕВЫЙ БЛОК -->
	<aside class="hidden xl:flex w-64 p-4 bg-gray-100 dark:bg-gray-900">
		<div class="slideshow left-slideshow w-full h-full
				border-2 border-orange-400 rounded-xl
				overflow-hidden shadow-lg
				flex items-center justify-center">

			<img class="slideshow-image w-full h-full object-cover
               transition-opacity duration-1000 opacity-0" alt="Alcohol image"/>
		</div>
	</aside>

	<!-- ОСНОВНОЙ КОНТЕНТ -->
	<main class="flex-1 pt-20 px-6">
		<div class="max-w-6xl mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow">
			@include($page)
		</div>
	</main>

	<!-- ПРАВЫЙ БЛОК -->
	<aside class="hidden xl:flex w-64 p-4 bg-gray-100 dark:bg-gray-900">
		<div class="slideshow left-slideshow w-full h-full
				border-2 border-orange-400 rounded-xl
				overflow-hidden shadow-lg
				flex items-center justify-center">

			<img class="slideshow-image w-full h-full object-cover
               transition-opacity duration-1000 opacity-0" alt="Alcohol image"/>
		</div>
	</aside>

</div>

<footer class="bg-slate-900 text-slate-400 mt-16">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-10">

            <!-- Левая колонка -->
            <div class="md:col-span-2">
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-8 h-8 rounded-full bg-indigo-500"></div>
                </div>

                <!-- Соцсети -->
                <div class="flex space-x-4 mt-6 text-slate-400">
                    <a href="#" class="hover:text-white transition">Facebook</a>
                    <a href="#" class="hover:text-white transition">Instagram</a>
                    <a href="#" class="hover:text-white transition">Telegram</a>
                    <a href="#" class="hover:text-white transition">Tiktok</a>
                    <a href="#" class="hover:text-white transition">YouTube</a>
                </div>
            </div>


            <!-- Solutions -->
            <div>
                <h3 class="text-white font-semibold mb-4">Solutions</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-white">Marketing</a></li>
                    <li><a href="#" class="hover:text-white">Analytics</a></li>
                    <li><a href="#" class="hover:text-white">Automation</a></li>
                    <li><a href="#" class="hover:text-white">Commerce</a></li>
                    <li><a href="#" class="hover:text-white">Insights</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h3 class="text-white font-semibold mb-4">Support</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-white">Submit ticket</a></li>
                    <li><a href="#" class="hover:text-white">Documentation</a></li>
                    <li><a href="#" class="hover:text-white">Guides</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div>
                <h3 class="text-white font-semibold mb-4">Company</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-white">About</a></li>
                    <li><a href="#" class="hover:text-white">Blog</a></li>
                    <li><a href="#" class="hover:text-white">Jobs</a></li>
                    <li><a href="#" class="hover:text-white">Press</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div>
                <h3 class="text-white font-semibold mb-4">Legal</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-white">Terms of service</a></li>
                    <li><a href="#" class="hover:text-white">Privacy policy</a></li>
                    <li><a href="#" class="hover:text-white">License</a></li>
                </ul>
            </div>
        </div>

        <!-- Нижняя линия -->
        <div class="border-t border-slate-700 mt-12 pt-6 text-sm text-slate-500">
            © 2025 Your Company, Inc. All rights reserved.
        </div>
    </div>
</footer>
