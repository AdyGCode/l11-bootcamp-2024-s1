<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <form action="{{ route('chirps.store') }}"
              method="POST">

            {{-- Cross-Site Request Forgery - Prevention --}}
            @csrf
            <label for="message">Chirp?</label>
            <textarea name="message" id="message"
                      cols="30" rows="3"
                      placeholder="{{ __('What\'s on your mind?') }}"
                      class="block w-full border-gray-300
                         rounded-sm shadow-sm
                         focus:border-indigo-300
                         focus:ring focus:ring-indigo-300
                         focus:ring-opacity-50">{{ old('message') }}</textarea>

            <x-input-error class="mt-2"
                           :messages="$errors->get('message')"></x-input-error>

            <x-primary-button class="mt-4">{{ __('Chirp!') }}</x-primary-button>

        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach($chirps as $chirp)
                <section class="p-6 flex space-x-2">
                    <p class="text-4xl bg-black text-white">C</p>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <h5>
                                <span class="text-gray-800">{{ $chirp->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">
                                    {{ $chirp->created_at->diffForHumans() }}
                                </small>
                                @unless($chirp->created_at->eq($chirp->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __("edited") }}</small>
                                @endunless
                            </h5>
                            @if($chirp->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            V
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('chirps.edit',$chirp)">
                                            {{ __("Edit") }}
                                        </x-dropdown-link>
                                        <form method="POST"
                                              action="{{ route('chirps.destroy', $chirp) }}">
                                            @csrf
                                            @method('delete')

                                            <x-dropdown-link
                                                :href="route('chirps.destroy',$chirp)"
                                                onclick="event.preventDefault(); this.closest('form').submit();"
                                            >
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif
                        </div>

                        <p class="mt-4 text-lg text-gray-900">{{  $chirp->message }}</p>
                    </div>
                </section>
            @endforeach
        </div>


    </div>
</x-app-layout>
