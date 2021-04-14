<x-app-layout>
    <x-slot name="header">
        Add Recipe
    </x-slot>

    <div class="flex items-center justify-center h-screen form-container">
        <form action="/submit" method="post" class="form w-full max-w-sm bg-white shadow-md rounded px-8 pt-6 pb-8">
            @csrf
            @if ($errors->any())
                <div class="form-error-status-message" role="alert">
                    Please fix the following errors
                </div>
            @endif
            <div class="form-input-row">
                <div class="md:w-1/3">
                    <label class="form-label" for="title">
                        Title
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input id="title"
                           type="text"
                           name="title"
                           value="{{ old('title') }}"
                           class="form-input">
                    @error('title')
                    <p class="form-input-error-label">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-input-row">
                <div class="md:w-1/3">
                    <label for="ingredients" class="form-label" for="desription">
                        Ingredients
                    </label>
                </div>
                <div class="md:w-2/3">
                    <p class="text-gray-500 text-xs">each ingredient on a new line.</p>
                    <p class="text-gray-500 text-xs">Ingredient, mass /g, $ /g</p>
                    <textarea id="ingredients"
                              name="ingredients"
                              class="form-input h-48"
                              placeholder="Avocado, 0.5, 0.07
                              Lettuce, 0.3, 0.04">{{ old('ingredients') }}</textarea>
                    @error('ingredients')
                    <p class="form-input-error-label">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-input-row">
                <div class="md:w-1/3">
                    <label for="instructions" class="form-label" for="desription">
                        Instructions
                    </label>
                </div>
                <div class="md:w-2/3">
                    <textarea id="instructions"
                              name="instructions"
                              class="form-input h-24"
                              placeholder="How to do it?">{{ old('instructions') }}</textarea>
                </div>
            </div>

            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button type="submit" class="btn">
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>