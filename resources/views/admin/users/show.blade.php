@extends('admin.layouts.app')

@section('content')
    <section class=" w-full p-4 flex justify-between gap-8">
        <div class="">
            <div class="bg-[#fcdab40a] shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg text-center">
                <div class="">
                    <div class=" flex justify-center">
                        <img src="{{ $user->client->image ?? asset('img/profil.jpeg') }}" alt=""
                            class=" w-28 h-28 rounded-full border border-gray-900 dark:border-gray-500 object-cover">
                    </div>
                </div>
                <div class="mb-4">
                    <h2
                        class="text-4xl mb-2 font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-5xl dark:text-white">
                        {{ $user->name }}</h2>
                    <p class="text-sm text-gray-400">{{ $user->email }}</p>
                </div>

                <div class=" flex justify-center gap-5 text-center">
                    <div>
                        <p
                            class="mb-4 text-4xl leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                            @if (Cache::has('user-is-online-' . $user->id))
                                <span class="text-green-500">
                                    Online
                                </span>
                            @else
                                <span class="text-gray-500" id="last-activity">
                                    En ligne il y a <span id="time-difference"></span>
                                </span>
                            @endif
                        </p>
                    </div>
                </div>

            </div>

            <div
                class=" bg-[#fcdab40a] shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">

                <div
                    class="mb-1.5 text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                    <h2>Cordonnées utilisateur</h2>
                </div>
                <hr class="my-4">
                <div class=" text-left">
                    <p>Email : <span class="font-bold">{{ $user->email }}</span></p>
                </div>
                <hr class="my-4">

                <div class=" text-left">
                    <p> Date de creation du compte :
                        <span class="font-bold">
                            @php
                                $date = new DateTimeImmutable($user->created_at);
                                $formatter = new IntlDateFormatter(
                                    'fr_FR',
                                    IntlDateFormatter::MEDIUM,
                                    IntlDateFormatter::NONE,
                                );
                                $format = $formatter->format($date);
                            @endphp
                            {{ $format }}
                        </span>
                    </p>
                </div>
                <hr class="my-4">
            </div>
        </div>
        <div class=" bg-[#fcdab40a] shadow-lg dark:shadow-lg dark:shadow-gray-500/20 p-4 mb-4 rounded-lg w-full">
            <div class=" flex justify-between mb-4 items-center">
                <h3
                    class="text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-2xl lg:text-2xl dark:text-white">
                </h3>
            </div>

            <div class=" flex justify-center items-center w-full h-full">
                <p class=" text-lg font-normal text-gray-500 lg:text-sm  dark:text-gray-400">

                </p>
            </div>

        </div>
    </section>

    <script>
        function updateTimeDifference() {
            const lastActivity = new Date("{{ $user->last_activity }}");
            const now = new Date();
            const diffInSeconds = Math.floor((now - lastActivity) / 1000);

            const diffInMinutes = Math.floor(diffInSeconds / 60);
            const diffInHours = Math.floor(diffInMinutes / 60);

            const hours = diffInHours;
            const minutes = diffInMinutes % 60;
            const seconds = diffInSeconds % 60;

            let timeDifference = '';
            if (hours > 0) {
                timeDifference += hours + ' heure' + (hours > 1 ? 's' : '');
            }
            if (minutes > 0) {
                if (timeDifference) timeDifference += ' ';
                timeDifference += minutes + ' minute' + (minutes > 1 ? 's' : '');
            }
            timeDifference += ` ${seconds} seconde${seconds !== 1 ? 's' : ''}`; // Affiche les secondes

            document.getElementById('time-difference').textContent = timeDifference;
        }

        // Mettre à jour le compteur chaque seconde
        setInterval(updateTimeDifference, 1000);
        // Initial call to set the correct time immediately
        updateTimeDifference();
    </script>
@endsection
