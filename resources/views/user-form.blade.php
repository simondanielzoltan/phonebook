@extends('index')
@section('content')
    {{-- TODO error handling --}}
    {{-- TODO notifactions --}}
    {{-- TODO email phone delete and update --}}
    {{-- TODO outsource input components --}}
    {{-- TODO back button --}}
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <form method="POST" action="{{ isset($user->id) ? route('user.update', $user->id) : route('user.store') }}">
                    @csrf
                    @if (isset($user->id))
                        @method('PUT')
                    @endif
                    <div class="mb-6">
                        <span class="text-gray-700">Name</span>
                        <input type="text" name="name" required
                            class="block w-full mt-1 rounded-md p-2 bg-gray-50 border border-gray-300 text-gray-900"
                            placeholder="" value="{{ old('name') ?? ($user->name ?? '') }}" />
                        <span class="text-gray-700">Emails</span>
                        <div id="emails">
                            @if (isset($user->id))
                                @foreach ($user->emails as $email)
                                    <input disabled type="email" name="emails[{{ $email->id }}]"
                                        class="block w-full mt-1 rounded-md p-2 bg-gray-50 border border-gray-300 text-gray-900"
                                        placeholder="" value="{{ old('emails' . $email->id) ?? $email->email }}" />
                                @endforeach
                            @else
                                <input type="email" name="newEmails[]"
                                    class="block w-full mt-1 rounded-md p-2 bg-gray-50 border border-gray-300 text-gray-900"
                                    placeholder="" value="" required />
                            @endif
                        </div>
                        <div class="mt-2">
                            <button onclick="addEmail();return false;"
                                class="px-4 py-2 text-sm
                            text-green-600 bg-green-200 rounded-full">Add</button>
                        </div>
                        <span class="text-gray-700">Phone</span>
                        <div id="phones" class="">
                            @if (isset($user->id))
                                @foreach ($user->phones as $phone)
                                    <input disabled type="phone" name="phones[{{ $phone->id }}]"
                                        class="block w-full mt-1 rounded-md p-2 bg-gray-50 border border-gray-300 text-gray-900"
                                        placeholder="" value="{{ old('phones' . $phone->id) ?? $phone->phone_number }}" />
                                @endforeach
                            @endif
                        </div>
                        <div class="mt-2">
                            <button onclick="addPhone();return false;"
                                class="px-4 py-2 text-sm
                            text-green-600 bg-green-200 rounded-full">Add</button>
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-600 rounded text-sm px-5 py-2.5">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop
<script>
    function addEmail() {
        $('#emails').append(
            '<input type="email" name="newEmails[]" class="block w-full mt-1 rounded-md p-2 bg-gray-50 border border-gray-300 text-gray-900"/>'
        )
    }

    function addPhone() {
        $('#phones').append(
            '<input type="phone" name="newPhones[]" class="block w-full mt-1 rounded-md p-2 bg-gray-50 border border-gray-300 text-gray-900"/>'
        )
    }
</script>
