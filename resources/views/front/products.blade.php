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
            <li>
                <button data-category="electronics" class="category-btn w-full text-left px-4 py-2 rounded hover:bg-gray-700">Electronics</button>
            </li>
            <li>
                <button data-category="clothing" class="category-btn w-full text-left px-4 py-2 rounded hover:bg-gray-700">Clothing</button>
            </li>
            <li>
                <button data-category="books" class="category-btn w-full text-left px-4 py-2 rounded hover:bg-gray-700">Books</button>
            </li>
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
    const products = [
        { id: 1, name: 'Laptop', description: 'A powerful laptop.', image: 'https://via.placeholder.com/150', category: 'electronics' },
        { id: 2, name: 'Smartphone', description: 'A cutting-edge smartphone.', image: 'https://via.placeholder.com/150', category: 'electronics' },
        { id: 3, name: 'T-Shirt', description: 'A comfortable T-Shirt.', image: 'https://via.placeholder.com/150', category: 'clothing' },
        { id: 4, name: 'Jeans', description: 'Stylish jeans.', image: 'https://via.placeholder.com/150', category: 'clothing' },
        { id: 5, name: 'Novel', description: 'A captivating novel.', image: 'https://via.placeholder.com/150', category: 'books' },
        { id: 6, name: 'Biography', description: 'An inspiring biography.', image: 'https://via.placeholder.com/150', category: 'books' },
    ];

    function displayProducts(category = 'all') {
        const productContainer = document.getElementById('products');
        productContainer.innerHTML = '';

        const filteredProducts = category === 'all'
            ? products
            : products.filter(product => product.category === category);

        filteredProducts.forEach(product => {
            const productElement = document.createElement('div');
            productElement.className = 'p-4 border rounded bg-white shadow';
            productElement.innerHTML = `
                <img src="${product.image}" alt="${product.name}" class="w-full h-32 object-cover rounded mb-4">
                <h3 class="text-lg font-bold mb-2">${product.name}</h3>
                <p class="text-gray-600 mb-4">${product.description}</p>
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add to Cart</button>
            `;
            productContainer.appendChild(productElement);
        });
    }

    document.querySelectorAll('.category-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const category = e.target.getAttribute('data-category');
            displayProducts(category);
        });
    });

    displayProducts();
</script>
@endsection
