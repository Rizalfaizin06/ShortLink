@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Link</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('links.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="url_title" class="form-label">Title URL</label>
                            <input type="text" class="form-control @error('url_title') is-invalid @enderror"
                                id="url_title" name="url_title" value="{{ old('url_title') }}" required>
                            @error('url_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="original_url" class="form-label">Original URL</label>
                            <input type="url" class="form-control @error('original_url') is-invalid @enderror"
                                id="original_url" name="original_url" value="{{ old('original_url') }}" required>
                            @error('original_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="custom_slug" class="form-label">Custom Slug (Optional)</label>
                            <input type="text" class="form-control @error('custom_slug') is-invalid @enderror"
                                id="custom_slug" name="custom_slug" value="{{ old('custom_slug') }}">
                            <div class="form-text">Leave empty for random slug</div>
                            @error('custom_slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
