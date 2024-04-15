<x-app-layout>
    {{--    File: /resources/views/chirps/edit.blade.php --}}

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <form method="POST"
              action="{{ route('chirps.update', $chirp) }}">

            {{-- Include CSRF Protection --}}
            @csrf

            @method('patch')

            <textarea name="message" id="message"
                      cols="30" rows="3"
                      placeholder="{{ __('What\'s on your mind?') }}"
                      class="block w-full border-gray-300
                         rounded-sm shadow-sm
                         focus:border-indigo-300
                         focus:ring focus:ring-indigo-300
                         focus:ring-opacity-50"
            >{{ old('message', $chirp->message) }}</textarea>

            <x-input-error class="mt-2"
                           :messages="$errors->get('message')"></x-input-error>
            <div class="mt-4 space-x-2">
                <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
                <a href="{{ route('chirps.index') }}">{{ __('Cancel') }}</a>
            </div>

        </form>

    </div>

</x-app-layout>
