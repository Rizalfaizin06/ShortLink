@extends('layouts.app')

@section('content')
    <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h5 class="text-xl font-semibold text-gray-800 dark:text-white">User Management</h5>
            <a href="{{ route('users.create') }}"
                class="bg-blue-600 dark:bg-blue-500 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">
                Create User
            </a>
        </div>


        <div class="relative overflow-x-auto shadow-md rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->role->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{-- <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                                <div class="flex space-x-2">
                                    <a href="{{ route('users.edit', $user) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        Edit
                                    </a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                            onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                    <form action="{{ route('users.resetPassword', $user) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        <button type="submit"
                                            class="font-medium text-amber-600 dark:text-amber-600 hover:underline"
                                            onclick="return confirm(`Are you sure you want to reset the password to 'universitasaki'?`)">Reset
                                            Password</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


    </div>
@endsection
