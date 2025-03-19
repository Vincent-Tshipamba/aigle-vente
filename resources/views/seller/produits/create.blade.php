@extends('seller.layouts.app')

@section('content')
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Creation
        </h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route('seller.shops.products.index', $shop->_id) }}">Produits
                        /</a>
                </li>
                <li class="text-primary"> Creation</li>
            </ol>
        </nav>
    </div>
    <div class="titlr">
        <h1 class="text-2xl font-semibold text-black dark:text-white mb-4">
            Ajouter un produit
        </h1>
    </div>

    <form action="{{ route('shop.products.store', $shop->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-9 sm:grid-cols-2">

            <div class="flex flex-col gap-9">


                <!-- Input Fields -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            nom produit
                        </h3>
                    </div>
                    <div class="flex flex-col  p-6.5 pb-2 pt-6.5">
                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                nom produit
                            </label>
                            <input type="text" placeholder="Batterie Externe 20000mAh Power Bank" name="name"
                                id="name" required
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>


                    </div>
                    <div class="flex flex-col  p-6.5 py-2">
                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Categories
                            </label>

                            <select id="category" name="category_product_id" required
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="flex flex-col  p-6.5 py-2">
                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Prix
                            </label>
                            <input type="number" placeholder="2" min="1" name="price" id="price" required
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>


                    </div>

                    <div class="flex flex-col  px-6.5 py-2 pb-6.5">
                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Quantite
                            </label>
                            <input type="number" placeholder="2" min="1" name="stock_quantity" id="stock_quantity"
                                required
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>


                    </div>
                </div>

                <!-- Toggle switch input -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Description
                        </h3>
                    </div>
                    <div class="flex flex-col gap-5.5 p-6.5">
                        <div id="quill-editor"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            style="height: 300px;">{{ old('contenu') }}</div>

                        <textarea id="quill-editor-area" name="description"
                            class=" hidden w-full px-0 text-sm text-gray-700 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                            required>{{ old('contenu') }}</textarea>
                    </div>
                </div>

                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            File upload
                        </h3>
                    </div>
                    <div class="flex flex-col gap-5.5 p-6.5">
                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Attach file
                            </label>
                            <input type="file" name="media[]" id="media" multiple accept="image/*,video/*" required
                                class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary" />
                        </div>

                        <div id="image-preview" class="flex flex-wrap gap-4 mt-4"></div>
                    </div>
                </div>

                <!-- Time and date -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Etat produit
                        </h3>
                    </div>
                    <div class="flex flex-col gap-5.5 p-6.5">
                        <div>
                            <label for="state" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Etat du produit
                            </label>
                            <select id="state" name="state" required
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary">
                                <option value="">Sélectionnez l'état</option>
                                @foreach ($state as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- File upload -->

            </div>

            <div class="flex flex-col gap-9">
                <!-- Textarea Fields -->
                <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Details Produit
                        </h3>
                    </div>
                    <div class="flex flex-col gap-5.5 p-6.5">

                        <!-- Poids -->
                        <div>
                            <label for="weight" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Poids
                            </label>
                            <input type="number" id="weight" name="weight" placeholder="Poids (ex : 1kg)"
                                min="1"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <!-- Dimensions -->
                        <div>
                            <label for="dimensions" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Dimensions
                            </label>
                            <input type="text" id="dimensions" name="dimensions"
                                placeholder="Dimensions (ex : 10x20x30cm)"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <!-- Couleur -->
                        <div>
                            <label for="color" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Couleur
                            </label>
                            <input type="text" id="color" name="color" placeholder="Couleur (ex : Rouge)"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <!-- Taille -->
                        <div>
                            <label for="size" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Taille
                            </label>
                            <input type="number" id="size" name="size" placeholder="Taille (ex : M)"
                                min="1"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <!-- Modèle -->
                        <div>
                            <label for="model" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Modèle
                            </label>
                            <input type="text" id="model" name="model" placeholder="Modèle (ex : A1234)"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <!-- Expédition -->
                        <div>
                            <label for="shipping" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Expédition
                            </label>
                            <input type="text" id="shipping" name="shipping"
                                placeholder="Expédition (ex : Standard)"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <!-- Entretien -->
                        <div>
                            <label for="care" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Entretien
                            </label>
                            <input type="text" id="care" name="care"
                                placeholder="Entretien (ex : Nettoyage à sec)"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                        <!-- Marque -->
                        <div>
                            <label for="brand" class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Marque
                            </label>
                            <input type="text" id="brand" name="brand" placeholder="Marque (ex : Nike)"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                        </div>

                    </div>
                </div>




            </div>

            <button type="submit"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Ajouter
                le produit</button>

        </div>
    </form>

@section('script')
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mediaInput = document.getElementById('media');
            const previewContainer = document.getElementById('image-preview');

            // Vérifiez si les éléments existent
            if (!mediaInput || !previewContainer) {
                console.error("L'élément #media ou #image-preview est manquant dans le DOM.");
                return;
            }

            mediaInput.addEventListener('change', function(event) {
                const files = event.target.files;
                previewContainer.innerHTML = ''; // Efface les aperçus existants

                const maxSize = 10 * 1024 * 1024; // 10MB

                Array.from(files).forEach((file, index) => {
                    if (file.size > maxSize) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erreur',
                            text: 'La taille du fichier ' + file.name +
                                ' dépasse la limite de 10MB.',
                            toast: true,
                            position: 'top-end',
                            timer: 3000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                        });
                        return;
                    }

                    const fileReader = new FileReader();

                    fileReader.onload = function(e) {
                        const previewDiv = document.createElement('div');
                        previewDiv.classList.add('relative', 'w-24', 'h-24', 'border',
                            'rounded', 'overflow-hidden');

                        if (file.type.startsWith('image/')) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.alt = 'Selected Image';
                            img.classList.add('object-cover', 'w-full', 'h-full');
                            previewDiv.appendChild(img);
                        } else if (file.type.startsWith('video/')) {
                            const video = document.createElement('video');
                            video.src = e.target.result;
                            video.controls = true;
                            video.classList.add('object-cover', 'w-full', 'h-full');
                            previewDiv.appendChild(video);
                        }

                        const closeButton = document.createElement('button');
                        closeButton.innerHTML = '&times;';
                        closeButton.classList.add('absolute', 'top-0', 'right-0', 'text-white',
                            'bg-black', 'rounded-full', 'w-6', 'h-6', 'flex',
                            'items-center', 'justify-center');
                        closeButton.style.cursor = 'pointer';

                        closeButton.onclick = () => {
                            previewDiv.remove();
                            removeMedia(index);
                        };

                        previewDiv.appendChild(closeButton);
                        previewContainer.appendChild(previewDiv);
                    };

                    fileReader.readAsDataURL(file);
                });
            });

            function removeMedia(index) {
                const dataTransfer = new DataTransfer();

                Array.from(mediaInput.files).forEach((file, i) => {
                    if (i !== index) dataTransfer.items.add(file);
                });

                mediaInput.files = dataTransfer.files;
            }
        });

        document.getElementById("media").addEventListener("change", function(event) {
            let file = event.target.files[0];

            if (!file) return;

            // Vérification du type de fichier
            let allowedTypes = ["image/jpeg", "image/png", "image/gif", "video/mp4", "video/webm"];
            if (!allowedTypes.includes(file.type)) {
                 Swal.fire({
                            icon: 'error',
                            title: 'Erreur',
                            text: 'Type de fichier ' + file.name +
                                ' non autorisé !',
                            toast: true,
                            position: 'top-end',
                            timer: 3000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                        });
                return;
            }

            // Vérification de la taille (max 10MB)
            let maxSize = 10 * 1024 * 1024; // 10MB
            if (file.size > maxSize) {
                alert("Fichier trop lourd !");
                return;
            }

            console.log("Fichier valide :", file.name);
        });



        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}',
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true,
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: '{{ session('error') }}',
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true,
            });
        @endif
    </script>
@endsection
@endsection
