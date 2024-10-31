@props(['users', 'roles'])
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table border="1" id="users-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>
                            <span class="flex items-center">
                                #
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Nom d'utilisateur
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Email
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Role
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Statut
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                </svg>
                            </span>
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        @php
                            $cache_exists = false;
                            if (Cache::has('user-is-online-' . $user->id)) {
                                $cache_exists = true;
                            }
                        @endphp
                        <tr class="hover:bg-[#f0e6d9] hover:scale-100 transition-all duration-300 ease-in-out">
                            <td>{{ $key + 1 }}</td>
                            <td class="flex items-center px-6 py-4 hover:cursor-pointer hover:underline hover:text-[#e38407] hover:font-bold hover:scale-105 transition-all duration-300 ease-in-out"
                                @if ($user->client || $user->seller) onclick="window.location.href='{{ route('admin.users.show', $user->id) }}'" @endif
                                onclick="showUserProfile({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->created_at }}', '{{ $user->last_activity }}', '{{ $cache_exists }}')">
                                <img class="w-10 h-10 rounded-full"
                                    src="{{ $user->client->image ?? asset('img/profil.jpeg') }}" alt="">
                                <div class="ps-3">
                                    <div class="text-base">{{ $user->name }}</div>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td class="">
                                @foreach ($roles as $role)
                                    {{ $user->roles->contains($role) ? $role->name : '' }}
                                @endforeach
                            </td>
                            <td>
                                <div class="flex items-center">
                                    @if ($cache_exists)
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                                    @else
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Offline
                                    @endif
                                </div>
                            </td>
                            <td>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer"
                                        onchange="changeUserStatus({{ $user->id }})"
                                        {{ $user->is_active ? 'checked' : '' }}>
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-[#e38407]">
                                    </div>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
