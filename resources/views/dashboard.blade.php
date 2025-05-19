@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            <h5 class="card-title">Selamat datang, {{ Auth::user()->name }}!</h5>
            <p class="card-text">Ini adalah dashboard URL Shortener Anda.</p>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Link URLs</h5>
                            <p class="card-text">Kelola tautan pendek Anda.</p>
                            <a href="{{ route('links.index') }}" class="btn btn-primary">Kelola Link</a>
                        </div>
                    </div>
                </div>

                @if (Auth::user()->role_id === 1)
                    <div class="col-md-4">
                        <div class="card bg-light mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Users</h5>
                                <p class="card-text">Kelola pengguna sistem.</p>
                                <a href="{{ route('users.index') }}" class="btn btn-primary">Kelola Users</a>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-md-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Buat Link Baru</h5>
                            <p class="card-text">Buat tautan pendek baru.</p>
                            <a href="{{ route('links.create') }}" class="btn btn-success">Buat Link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
