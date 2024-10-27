@props(['users', 'roles'])
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table border="1" id="search-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom d'utilisateur</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="">
                                @foreach ($roles as $role)
                                    {{ $user->roles->contains($role) ? $role->name : '' }}
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('users.destroy', $user->id) }}"
                                    onclick="remove(event, '{{ $user->id }}', '{{ $user->name }}')">
                                    <svg class="w-6 h-6 text-black dark:text-white hover:text-red-500 dark:hover:text-red-500"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M5 8a4 4 0 1 1 8 0 4 4 0 0 1-8 0Zm-2 9a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-1Zm13-6a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-4Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
