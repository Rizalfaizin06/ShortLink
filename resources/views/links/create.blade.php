@extends('layouts.app')
@section('content')
    <div
        class="w-full max-w-sm mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" method="POST" action="{{ route('links.store') }}">
            @csrf
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Create Short Link</h5>
            @if ($errors->any())
                <div class="bg-red-100 text-red-500 p-4 rounded-md mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label for="url_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="url_title" id="url_title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Cybersecurity Class" required value="{{ old('url_title') }}" />

            </div>
            <div>
                <label for="original_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Original
                    URL</label>
                <input type="text" name="original_url" id="original_url"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="https://meet.google.com/xxx-xxx-xx" required value="{{ old('original_url') }}" />
            </div>
            <div class="grid md:grid-cols-2 md:gap-6 ">
                <label for="link.unaki.ac.id" class="block text-sm font-medium text-gray-900 dark:text-white">Link</label>


                <label for="custom_slug" class="ps-4 block text-sm font-medium text-gray-900 dark:text-white">Your
                    Slug</label>
            </div>
            <div class="flex md:flex-cols-3 md:gap-6 align-items-center justify-items-center -mt-5">

                <input type="text" name="link.unaki.ac.id" id="link.unaki.ac.id" placeholder="link.unaki.ac.id"
                    value="link.unaki.ac.id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required readonly />

                <span class="w-auto  inline-block text-gray-900 dark:text-white font-bold text-2xl">/</span>

                <input type="text" name="custom_slug" id="custom_slug" placeholder="Cybersecurity"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    value="{{ old('custom_slug') }}" />

            </div>


            <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>

        </form>
    </div>
@endsection
