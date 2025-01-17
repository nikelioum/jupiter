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
                <button data-category="all" class="category-btn w-full text-left px-4 py-2 rounded hover:bg-gray-700">All Products</button>
            </li>
            @foreach ($categories as $category)
                <li>
                    <button data-category="{{ $category->id }}" class="category-btn w-full text-left px-4 py-2 rounded hover:bg-gray-700">
                        {{ $category->name }}
                    </button>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-4">
        <h2 class="text-lg font-bold mb-4">Products for {{ $selectedCustomer['name'] }}</h2>
        <div id="products" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
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
            productElement.className = 'p-4 border rounded bg-white shadow';
            productElement.innerHTML = `
                <img src="/storage/${product.image}" alt="${product.name}" class="w-full h-32 object-cover rounded mb-4">
                <h3 class="text-lg font-bold mb-2">${product.name}</h3>
                <p class="text-gray-600 mb-4">${product.description}</p>
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add to Cart</button>
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
