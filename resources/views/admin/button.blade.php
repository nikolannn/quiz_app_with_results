@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>
    <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('categories.create') }}">Add Category</a></li>
        <li class="list-group-item"><a href="{{ route('questions.create') }}">Add Question</a></li>
        
        <!-- Add more admin links as needed -->
    </ul>
</div>
@endsection
