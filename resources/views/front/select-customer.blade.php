@extends('layouts.main')

@section('title', 'Select Customer')

@section('content')
@include('partials.header')

<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4">Select a Customer</h1>
    <form action="{{ route('set.customer') }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid sm:grid-cols-2 gap-2">
            @foreach ($customers as $customer)
            <label for="customer-{{ $customer['id'] }}" class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                <span class="text-sm text-gray-500 dark:text-neutral-400">{{ $customer['name'] }}</span>
                <input type="radio" name="customer_id" value="{{ $customer['id'] }}" id="customer-{{ $customer['id'] }}" class="shrink-0 ms-auto mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
            </label>
            @endforeach
        </div>

        @if ($errors->any())
        <div class="text-red-500 mt-4">{{ $errors->first() }}</div>
        @endif

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mt-4">
            Continue
        </button>
    </form>
</div>


@endsection
