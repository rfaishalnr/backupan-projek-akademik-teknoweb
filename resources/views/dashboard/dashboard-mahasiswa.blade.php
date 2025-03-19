@extends('layouts.app')
@section('content')
    <h1>Dashboard Mahasiswa</h1>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection
