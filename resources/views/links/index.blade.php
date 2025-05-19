@extends('layouts.app')

@section('content')
    <main class="container mx-auto p-4">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded-lg" id="success-message">
                <strong>{{ session('success') }}</strong>
            </div>
            <script>
                // Set a timer to hide the success message after 2 seconds
                setTimeout(function() {
                    const messageElement = document.getElementById('success-message');
                    if (messageElement) {
                        messageElement.style.display = 'none';
                    }
                }, 2000); // 2000ms = 2 seconds
            </script>
        @endif
        <!-- Search and Filter Section -->
        <div class="bg-white border-gray-200 dark:bg-gray-700 rounded-lg shadow-md p-6 mb-8 ">
            <div class="flex flex-col md:flex-row md:justify-between space-y-4 md:space-y-0">
                <!-- Search -->
                <div class="flex-1 md:mr-4">
                    <form action="{{ route('links.index') }}" method="GET">
                        <div class="flex gap-4 w-full">

                            <div class="relative flex-1">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white dark:bg-gray-600 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 sm:text-sm "
                                    placeholder="Search links..." name="search" value="{{ request()->search }}">

                            </div>
                            <button type="submit"
                                class="block w-auto py-2 px-3 bg-white-600 border border-blue-300 dark:border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 dark:focus:ring-gray-500 focus:border-blue-500 dark:focus:border-gray-500 text-blue-800 dark:text-white no-underline font-semibold hover:no-underline sm:text-sm">Search</button>
                        </div>
                    </form>
                </div>

                <!-- Filters -->
                <div class="flex flex-col md:flex-row space-y-4  md:space-y-0 md:space-x-4">

                    {{-- <select
                        class="block w-full md:w-auto py-2 pe-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="all">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <select
                        class="block w-full md:w-auto py-2 pe-7 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="all">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select> --}}
                    <a href="{{ route('links.create') }}"
                        class="block w-full md:w-auto py-2 px-3 bg-blue-600 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-white no-underline font-semibold hover:no-underline sm:text-sm text-center dark:bg-blue-500 dark:border-gray-300 dark:text-white">
                        Create Link
                    </a>

                </div>
            </div>
        </div>

        <!-- Link Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($links as $link)
                <!-- Card 1 -->
                <div
                    class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h2 class="text-lg font-semibold text-gray-800 mb-1 truncate dark:text-gray-50">
                                {{ $link->url_title }}
                            </h2>

                        </div>

                        <div class="mb-3">
                            <p class="text-sm text-gray-500 dark:text-gray-200 mb-1">Original URL:</p>
                            <p class="text-sm text-gray-600 dark:text-gray-50 truncate">
                                {{ $link->original_url }}</p>
                        </div>


                        <div class="mb-4">
                            <p class="text-sm text-gray-500 dark:text-gray-200 mb-1">Short Link:</p>
                            <div class="flex items-center">
                                <a href="{{ $link->slug }}" target="_blank"
                                    class="text-sm text-blue-600 dark:text-blue-400 hover:underline truncate">link.unaki.ac.id/{{ $link->slug }}</a>
                                <div class="relative ml-2 group">
                                    <button id="copyButton-{{ $link->id }}"
                                        data-clipboard-text="https://link.unaki.ac.id/{{ $link->slug }}"
                                        class="ml-2 text-gray-400 hover:text-blue-500 focus:outline-none"
                                        onclick="copyToClipboard('copyButton-{{ $link->id }}')">
                                        <img src="{{ asset('images/copy.svg') }}" class="h-4 w-4 mr-3" alt="Logo">

                                    </button>
                                    <div
                                        class="absolute bottom-full left-1/2 transform -translate-x-1/2 -translate-y-2 hidden group-hover:block bg-gray-800 text-white text-xs rounded py-1 px-2 whitespace-nowrap">
                                        Copy link
                                    </div>

                                    <div id="tooltip-{{ $link->id }}"
                                        class="hidden absolute bottom-full left-1/2 transform -translate-x-1/2 -translate-y-2 bg-gray-800 text-white text-xs rounded py-1 px-2 whitespace-nowrap">
                                        Link copied!
                                    </div>
                                </div>
                                <!-- Tooltip -->

                            </div>
                        </div>
                        @if (Auth::user()->isAdmin())
                            <div class="mb-3">
                                <p class="text-sm text-gray-500 dark:text-gray-200 mb-1">Created By:
                                    {{ $link->user->name }}</p>
                            </div>
                        @endif
                        <div class="mb-3">
                            <p class="text-sm text-gray-500 dark:text-gray-200 mb-1">Created At:
                                {{ $link->created_at->format('Y-m-d H:i') }}
                            </p>


                        </div>
                        <div class="flex justify-between items-center">
                            @if ($link->clicks < 15)
                                <div
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-900">
                                    <img src="{{ asset('images/graph-warning.svg') }}" class="h-4 w-4 mr-3" alt="Logo">
                                    <span class="text-sm ">{{ $link->clicks }} Engagement</span>
                                </div>
                            @else
                                <div
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <img src="{{ asset('images/graph.svg') }}" class="h-4 w-4 mr-3" alt="Logo">
                                    <span class="text-sm ">{{ $link->clicks }} Engagement</span>
                                </div>
                            @endif

                            <div class="flex space-x-2">
                                <form action="{{ route('links.edit', $link) }}" method="GET" class="inline">

                                    <div class="relative group">
                                        <button class="text-gray-400 hover:text-blue-500 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <div
                                            class="absolute bottom-full right-0 transform -translate-y-2 hidden group-hover:block bg-gray-800 text-white text-xs rounded py-1 px-2 whitespace-nowrap">
                                            Edit link</div>
                                    </div>
                                </form>

                                <div class="relative group">
                                    <form action="{{ route('links.destroy', $link) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this link?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-gray-400 hover:text-red-500 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                        <div
                                            class="absolute bottom-full right-0 transform -translate-y-2 hidden group-hover:block bg-gray-800 text-white text-xs rounded py-1 px-2 whitespace-nowrap">
                                            Delete link</div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        {{-- @dd($links->appends(request()->query())->links()) --}}
        <div class="mt-6">
            {{ $links->appends(request()->query())->links() }}
        </div>
        <!-- Pagination -->

    </main>
    <script>
        function copyToClipboard(buttonId) {
            const button = document.getElementById(buttonId);
            const link = button.getAttribute("data-clipboard-text");

            // Create a temporary textarea element to select and copy text
            const tempInput = document.createElement("textarea");
            document.body.appendChild(tempInput);
            tempInput.value = link;
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);

            // Show Tooltip
            const tooltip = document.getElementById(
                "tooltip-" + buttonId.split("-")[1]
            );
            tooltip.classList.remove("hidden");

            // Hide tooltip after 2 seconds
            setTimeout(() => {
                tooltip.classList.add("hidden");
            }, 1000);
        }
    </script>
@endsection
