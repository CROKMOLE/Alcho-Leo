<div class="m-2 relative border border-gray-200 dark:border-gray-700
                        p-5 rounded-xl group
                        bg-gray-100 dark:bg-gray-700
                        transition-shadow duration-300 hover:shadow-2xl">

    <div class="relative overflow-visible mb-4 aspect-square">
        <img
            src="{{ asset('storage/' . $product->picture) }}"
            class="w-full h-full object-cover rounded-lg transition-all duration-300
                               group-hover:scale-125 group-hover:z-20 relative"
        >
    </div>

    <div class="font-bold text-xl mb-1 leading-snug text-gray-900 dark:text-gray-100">
        {{ $product->title }}
    </div>
    @if($product->tags?->count())
        <div class="flex flex-wrap gap-1 mb-2">
            @include('filament.columns.tags', ['record' => $product])
        </div>
    @endif

    <!-- ✅ Год -->
    <div class="text-gray-600 dark:text-gray-300 text-base mb-4">
        {{ $product->year }}
    </div>

    <!-- Кнопка -->
    <button
        onclick="openModal(
        '{{ asset('storage/' . $product->picture) }}',
        '{{ $product->title }}',
        '{{ $product->year }}',
        '{{ $product->description }}'
    )"
        class="inline-block w-full text-center
           bg-blue-600 hover:bg-blue-700
           text-white
           py-3 rounded-lg
           text-lg font-semibold transition"
    >
        Details
    </button>

</div>


