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
                    <h2 class="sr-only">Summary</h2>
                    <div class="rounded-lg bg-white shadow-sm ring-1 ring-gray-900/5">
                        <dl class="flex flex-wrap">
                            <div class="flex-auto pl-6 pt-6">
                                <dt class="text-sm font-semibold leading-6 text-gray-900">Amount</dt>
                                <dd class="mt-1 text-base font-semibold leading-6 text-gray-900">$10,560.00</dd>
                            </div>

                        </dl>
                        <div class="mt-6 border-t border-gray-900/5 px-6 py-6">
                            <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Download receipt
                                <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                </div>
                <!-- Invoice -->
                <div
                    class="-mx-4 px-2 py-2 bg-white shadow-sm ring-1 ring-gray-900/5 sm:mx-0 sm:rounded-lg sm:px-8 sm:pb-14 lg:col-span-2 lg:row-span-2 lg:row-end-2 xl:px-16 xl:pb-10 xl:pt-8">

                    <div class="py-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="Enter the name of your page">
                        </div>
                    </div>
                    <div class="py-4">
                        <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                        <div class="mt-2">
                            <input type="text" name="slug" id="slug"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="enter-the-slug-of-your-page">
                        </div>
                    </div>
                </div>
            </div>


            {{ $slot ?? '' }}
</x-app-layout>
