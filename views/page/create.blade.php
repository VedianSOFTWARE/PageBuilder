<x-vedian::cms-layout>

    <x-slot name="pageTitle">
        {{ __('Create a new page') }}
    </x-slot>


    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8">
            
            Title: <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            slug: <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required>
            excerpt: <input type="text" name="excerpt" id="excerpt" value="{{ old('excerpt') }}" required>
            
            
        </div>
    </div>


</x-vedian::cms-layout>