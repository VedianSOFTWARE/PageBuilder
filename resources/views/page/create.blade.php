<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Page create') }}
        </h2>
    </x-slot>

    <x-form-section submit="asd">
        <x-slot name="title">
            {{ __('Update Password') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </x-slot>

        <x-slot name="form">
        </x-slot>
        <x-slot name="actions">
            {{-- <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message> --}}

            <x-button>
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form-section>

</x-app-layout>
