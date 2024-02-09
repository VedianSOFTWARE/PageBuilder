<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Page') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="mx-auto grid max-w-2xl grid-cols-1 grid-rows-1 items-start gap-x-8 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <!-- Page sidebar options -->
                <div class="lg:col-start-3 lg:row-end-1">
                    <div class="rounded-lg bg-white shadow-sm ring-1 ring-gray-900/5">
                        <dl class="flex flex-wrap">
                            <div class="flex-auto pl-6 pt-6">
                                <x-vedian::page-visibility />
                            </div>

                        </dl>
                        <dl class="flex flex-wrap">
                            <div class="flex-auto pl-6 pt-6">

                                <livewire:vedian::row-toolbar />
                            </div>

                        </dl>
                        <dl class="flex flex-wrap">
                            <div class="flex-auto pl-6 pt-6">
                                <x-vedian::page-status />

                            </div>

                        </dl>


                        <div class="mt-6 border-t border-gray-900/5 px-6 py-6 text-right">
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </div>
                </div>
                <!-- Invoice -->
                <div
                    class="-mx-4 px-2 py-2 bg-white shadow-sm ring-1 ring-gray-900/5 sm:mx-0 sm:rounded-lg sm:px-4 sm:pb-14 lg:col-span-2 lg:row-span-2 lg:row-end-2 xl:px-8 xl:pb-5 xl:pt-4">

                    <livewire:vedian::title-slug />
                </div>
            </div> 


            {{ $slot ?? '' }}
</x-app-layout>
 