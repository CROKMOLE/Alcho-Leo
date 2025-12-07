@include('market-pages.components.product-details')


<div class="container mx-auto">

    <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">
        Products
    </h1>

    @include('market-pages.components.filter-tags')

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 overflow-visible">
        @foreach($products as $product)
            {{ view('market-pages.components.product-card', ['product' => $product]) }}
        @endforeach
    </div>

    <div class="mt-8 text-gray-800 dark:text-gray-200">
        {{ $products->links() }}
    </div>

</div>

<script>
    function openModal(image, title, year, description) {
        document.getElementById('modalImage').src = image;
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalYear').innerText = year;
        document.getElementById('modalDescription').innerText = description;

        const modal = document.getElementById('productModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        const modal = document.getElementById('productModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.getElementById('productModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>

