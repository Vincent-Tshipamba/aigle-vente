@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-6">Modifier une catégorie</h1>
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom de la catégorie</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                        class="mt-1 block w-full p-2 border rounded @error('name') border-red-500 @enderror" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full p-2 border rounded @error('description') border-red-500 @enderror">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="mt-1 block w-full p-2 border rounded @error('image') border-red-500 @enderror">
                    @if ($category->image)
                        <div class="mt-2">
                            <img id="current-image" src="{{ asset($category->image) }}" alt="Image actuelle" class="w-32 h-32 rounded">
                            <p class="text-sm text-gray-500">Laisser vide pour ne pas modifier l'image.</p>
                        </div>
                    @endif
                    <div class="mt-2">
                        <img id="image-preview" src="#" alt="Aperçu de l'image" class="w-32 h-32 rounded hidden">
                    </div>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Enregistrer les modifications
                    </button>
                    <a href="{{ route('admin.categories.index') }}"
                        class="text-gray-500 hover:text-gray-700 underline">Annuler</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('image-preview');
            const currentImage = document.getElementById('current-image');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (currentImage) {
                        currentImage.classList.add('hidden');
                    }
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.classList.add('hidden');
                if (currentImage) {
                    currentImage.classList.remove('hidden');
                }
            }
        });
    </script>
@endsection
