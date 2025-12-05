<!-- resources/views/components/product-modal.blade.php -->

<div id="productModal" class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">

    <div class="bg-white dark:bg-gray-800 rounded-2xl w-full max-w-3xl p-6 relative">

        <!-- Кнопка закрытия -->
        <button
            onclick="closeModal()"
            class="absolute top-4 right-4 text-2xl font-bold text-gray-600 dark:text-gray-300 hover:text-red-500"
        >
            ✕
        </button>

        <!-- Контент -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Левая часть: Картинка -->
            <div class="aspect-square">
                <img id="modalImage" class="w-full h-full object-cover rounded-xl">
            </div>

            <!-- Правая часть: Название + Год -->
            <div>
                <div id="modalTitle" class="text-2xl font-bold mb-3 text-gray-900 dark:text-gray-100"></div>
                <div id="modalYear" class="text-gray-600 dark:text-gray-300 text-lg"></div>
            </div>

        </div>

        <!-- Описание снизу -->
        <div id="modalDescription" class="mt-6 text-gray-700 dark:text-gray-300 text-base leading-relaxed"></div>

    </div>
</div>
