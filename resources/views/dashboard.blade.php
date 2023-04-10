@extends('/layouts/header')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <p>Welcome, {{ Auth::user()->name }}!</p>
    </div>


    
@endsection