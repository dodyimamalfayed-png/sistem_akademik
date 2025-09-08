@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Login</h2>

    @if($errors->any())
        <div class="bg-red-200 text-red-700 p-2 mb-3 rounded">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-3">
            <label for="password" class="block font-medium">Password</label>
            <input type="password" name="password" id="password" 
                   class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Login
        </button>
    </form>
</div>
@endsection
