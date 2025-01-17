@extends('layouts.main')

@section('title', 'Promoter Dashboard')

@section('content')

You are loggedin


<!-- Logout Button -->
<form action="{{ route('promoter.logout') }}" method="POST" class="mt-6">
    @csrf
    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
        Logout
    </button>
</form>

@endsection