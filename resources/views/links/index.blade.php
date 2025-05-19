@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Link Management</h5>
            <a href="{{ route('links.create') }}" class="btn btn-primary btn-sm">Create New Link</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>URL Title</th>
                        <th>Short URL</th>
                        <th>Original URL</th>
                        <th>Clicks</th>
                        @if (Auth::user()->isAdmin())
                            <th>Created By</th>
                        @endif
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($links as $link)
                        <tr>
                            <td>{{ $link->url_title }}</td>
                            <td>
                                <a href="{{ url($link->slug) }}" target="_blank">
                                    {{ url($link->slug) }}
                                </a>
                            </td>
                            <td>{{ Str::limit($link->original_url, 50) }}</td>
                            <td>{{ $link->clicks }}</td>
                            @if (Auth::user()->isAdmin())
                                <td>{{ $link->user->name }}</td>
                            @endif
                            <td>{{ $link->created_at->format('Y-m-d H:i') }}</td>
                            <td class="d-flex">
                                <a href="{{ route('links.edit', $link) }}" class="btn btn-sm btn-info me-2">Edit</a>
                                <form action="{{ route('links.destroy', $link) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
