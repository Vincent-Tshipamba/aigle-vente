<section class="grid grid-cols-4 w-full p-4 border-gray-200 rounded-xl gap-12">
    <div class="sm:col-span-2 xl:col-span-1 col-span-4">
        <h2 class="text-2xl font-bold mb-4">Informations sur le propriétaire de la boutique</h2>
        <div
            class="bg-white dark:bg-gray-900 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg border dark:border-gray-500 text-center">
            <div class="">
                <div class=" flex justify-center">
                    <img src="{{ isset($owner->image) ? $owner->image : asset('img/profil.jpeg') }}" alt=""
                        class=" w-28 h-28 rounded-full border border-gray-900 dark:border-gray-500 object-cover">
                </div>
            </div>
            <div class="mb-4">
                <h2
                    class="text-4xl mb-2 font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-5xl dark:text-white">
                    {{ $owner->first_name }} {{ $owner->last_name }}</h2>
                <p class="text-sm text-gray-400">{{ $owner->user->email }}</p>
            </div>

            <div class=" flex justify-center gap-5 text-center">
                <div>
                    <p class="mb-4 text-lg leading-none tracking-tight text-gray-700 dark:text-white">
                        @if (Cache::has('user-is-online-' . $owner->user->id))
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> En ligne
                            </div>
                        @else
                            <p class="text-gray-500">
                                En ligne il y a <span id="diff_seller_last_time"></span>
                            </p>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div
            class="border dark:border-gray-500 bg-white dark:bg-gray-900 shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">
            <div class=" text-left flex ">
                <p class="w-1/2">Prénom : </p><span class="font-bold">{{ $owner->first_name }}</span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Nom : </p><span class="font-bold">{{ $owner->last_name }}</span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Genre : </p><span class="font-bold">{{ $owner->sexe }}</span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Email : </p><span class="font-bold">{{ $owner->user->email }}</span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Téléphone : </p>
                <span class="font-bold">
                    {{ $owner->phone }}
                </span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Ville : </p>
                <span class="font-bold">
                    {{ $owner->city->name }}
                </span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Adresse : </p>
                <span class="font-bold">
                    {{ $owner->address }}
                </span>
            </div>
            <hr class="my-4">
            <div class="flex ">
                <p class="w-1/2">
                    Vendeur depuis le :
                </p>
                <span class="font-bold">
                    @php
                        $seller_creation_date = new DateTimeImmutable($owner->created_at);
                        $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::MEDIUM, IntlDateFormatter::NONE);
                        $seller_creation_date_format = $formatter->format($seller_creation_date);
                    @endphp
                    {{ $seller_creation_date_format }}
                </span>
            </div>
            <hr class="my-4">
            <div class=" text-left flex ">
                <p class="w-1/2">Nombre des boutiques : </p>
                <span class="font-bold">
                    {{ $owner->shops->count() }}
                </span>
            </div>
            <hr class="my-4">
        </div>
        <hr class="my-4">
    </div>
</section>
