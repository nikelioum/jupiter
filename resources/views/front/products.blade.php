@extends('layouts.main')

@section('title', 'Products')

@section('content')
@include('partials.header')
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-gray-800 text-white p-4">
        <h2 class="text-lg font-bold mb-4">Categories</h2>
        <ul id="categories" class="space-y-2">
            <li>
                <button data-category="all"
                    class="category-btn w-full text-left px-4 py-2 rounded hover:bg-gray-700">All Products</button>
            </li>
            @foreach ($categories as $category)
                <li>
                    <button data-category="{{ $category->id }}"
                        class="category-btn w-full text-left px-4 py-2 rounded hover:bg-gray-700">
                        {{ $category->name }}
                    </button>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4">
        <h2 class="text-lg font-bold mb-4">Products for {{ $selectedCustomer['name'] }}</h2>
        <div id="products" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Products will be dynamically displayed here -->
        </div>
    </main>
</div>

<script>
    // Embed products and categories in JavaScript
    const products = @json($products);

    function displayProducts(category = 'all') {
        const productContainer = document.getElementById('products');
        productContainer.innerHTML = '';

        // Filter products by category
        const filteredProducts = category === 'all'
            ? products
            : products.filter(product => product.category_id == category);

        // Display filtered products
        filteredProducts.forEach(product => {
            const productElement = document.createElement('div');
            productElement.className = 'flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70';
            productElement.innerHTML = `
            <img class="w-full h-60 object-cover rounded-t-xl" src="/storage/${product.image ?? 'placeholder.jpg'}" alt="${product.name ?? ''}">
            <div class="p-4 md:p-5">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                    ${product.name ?? ''}
                </h3>
                <p class="mt-1 text-gray-500 dark:text-neutral-400">
                    ${product.description ?? ''}
                </p>
                <div class="pb-3">
                    <span class="bg-blue-100 text-blue-600 text-xs font-semibold px-2 py-1 rounded">${product.category_name ?? ''}</span>
                </div>
                <p class="mt-5 text-xs text-gray-500 dark:text-neutral-500">
                    $${product.price ?? '0.00'}
                </p>
                <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Add to Cart
                </button>
            </div>
            `;

            productContainer.appendChild(productElement);
        });

        // Handle case when no products are found
        if (filteredProducts.length === 0) {
            productContainer.innerHTML = '<p class="text-gray-600">No products available for this category.</p>';
        }
    }

    // Event Listeners for Category Buttons
    document.querySelectorAll('.category-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const category = e.target.getAttribute('data-category');
            displayProducts(category);
        });
    });

    // Display all products on page load
    displayProducts();
</script>
@endsection