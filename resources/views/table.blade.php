@extends('index')
@section('content')
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <table class="divide-y divide-gray-300 ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    ID
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Name
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Created At
                                </th>
                                <th class="px-6 py-4 text-xs text-gray-500">
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            @foreach ($users as $user)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $user->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $user->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $user->created_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ url('/user/' . $user->id) }}"
                                            class="px-4 py-2 text-sm text-blue-600 bg-blue-200 rounded-full">Edit</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="px-4 py-2 text-sm text-red-400 bg-red-200 rounded-full"
                                                title="Delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-6 ml-6">
                    <a href="{{ url('/user/create') }}"
                        class="px-4 py-2 text-sm text-green-600 bg-green-200 rounded-full">Create</a>
                </div>
            </div>
        </div>
    </div>
@stop
