<!-- resources/views/profile/edit.blade.php -->
@extends('admin.layouts.main')

@section('content')
@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
    </div>
    <div>
        <label for="profile">Profile:</label>
        <textarea id="profile" name="profile" rows="4" required>{{ $user->profile }}</textarea>
    </div>
    <button type="submit">Update Profile</button>
</form>

@endsection