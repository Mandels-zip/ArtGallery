@extends('/layouts/header')

    <div class="container">
        <h1>Dashboard</h1>
        <p>Welcome, {{Auth::user()->nickname}}!</p>
    </div>
