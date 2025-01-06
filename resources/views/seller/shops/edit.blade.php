@extends('seller.layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="max-w-2xl mx-auto p-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Modifier la boutique {{ old('name', $shop->name) }}
            </h1>

            <form action="{{ route('shops.update', $shop->_id) }}" method="POST">

                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="name" class="block text-lg font-medium text-gray-800 mb-1">Nom de la boutique</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        required value="{{ old('name', $shop->name) }}">
                </div>

                <div class="mb-6">
                    <label for="address" class="block text-lg font-medium text-gray-800 mb-1">Adresse</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        required value="{{ old('address', $shop->address) }}">
                </div>

                <div class="mb-4">
                    <label for="contenu" class="block text-lg font-medium text-gray-800 mb-1">Contenu de
                        l'article</label>

                    <div id="quill-editor"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        style="height: 300px;">{{ old('contenu') }}</div>

                    <textarea id="quill-editor-area" name="description"
                        class="block hidden w-full px-0 text-sm text-gray-700 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                        required>{{ old('contenu') }}</textarea>


                    @error('contenu')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>



                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 bg-indigo-500 text-white font-semibold rounded-md hover:bg-indigo-600 focus:outline-none">Submit</button>
                </div>
            </form>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (document.getElementById('quill-editor-area')) {
                    var editor = new Quill('#quill-editor', {
                        modules: {
                            toolbar: [
                                [{
                                    'header': [1, 2, false]
                                }],
                                ['bold', 'italic', 'underline', 'strike'],
                                ['blockquote', 'code-block'],
                                [{
                                    'list': 'ordered'
                                }, {
                                    'list': 'bullet'
                                }],
                                ['link', 'image', 'video'],
                                ['clean']
                            ]
                        },
                        theme: 'snow'
                    });
                    var quillEditor = document.getElementById('quill-editor-area');
                    editor.on('text-change', function() {
                        quillEditor.value = editor.root.innerHTML;
                    });
                    quillEditor.addEventListener('input', function() {
                        editor.root.innerHTML = quillEditor.value;
                    });
                }
            });
        </script>

    @endsection
