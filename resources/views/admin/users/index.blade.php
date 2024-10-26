@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none sm:flex items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Liste des utilisateurs</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <div class="inline-flex gap-x-2 me-4">
                        <a href="#" id="newUserButton"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent hover:bg-[#e38407] bg-[#f8b544] text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Créer un utilisateur
                        </a>
                        <a href="#" id="newPermissionButton"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent hover:bg-[#e38407] bg-[#f8b544] text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Créer une permission
                        </a>

                        <a href="#" id="newRoleButton"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent hover:bg-[#e38407] bg-[#f8b544] text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Créer un rôle
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-4">Consultez la liste de tous les utilisateurs enregistrés</h6>
        <hr class="mb-4" />
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-gray-900 dark:bg-gray-800 dark:text-red-400"
                    role="alert">

                    <span class="font-medium">{{ $error }}</span>

                </div>
            @endforeach
        @endif
        <div class="page-content">
            <div class="mb-4 border-b border-gray-200 text-white">
                <ul style="color: white" class="flex flex-wrap -mb-px text-lg text-white font-medium text-center"
                    id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg text-black dark:text-white hover:text-gray-700 dark:hover:text-gray-300"
                            id="users-tab" data-tabs-target="#users" type="button" role="tab" aria-controls="users"
                            aria-selected="false">Tableau des utilisateurs</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg dark:text-white text-gray-800 hover:text-gray-700 dark:hover:text-gray-300"
                            id="profile-tab" data-tabs-target="#rolesPermissions" type="button" role="tab"
                            aria-controls="rolesPermissions" aria-selected="false">Rôles et permissions</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 rounded-t-lg dark:text-white text-gray-800 hover:text-gray-700 dark:hover:text-gray-300"
                            id="assignRole-tab" data-tabs-target="#assignRole" type="button" role="tab"
                            aria-controls="assignRole" aria-selected="false">Attribution des rôles aux
                            utilisateurs</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden rounded-lg" id="users" role="tabpanel" aria-labelledby="users-tab">
                    <x-users-table :users="$users" :roles="$roles"></x-users-table>
                </div>
                <div class="hidden p-4 rounded-lg bg-custom-dark" id="rolesPermissions" role="tabpanel"
                    aria-labelledby="rolesPermission-tab">
                    <x-roles-permissions-table></x-roles-permissions-table>
                </div>
                <div class="hidden p-4 rounded-lg bg-custom-dark" id="assignRole" role="tabpanel"
                    aria-labelledby="assignRole-tab">
                    <x-assign-roles-table></x-assign-roles-table>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->


@section('script')
    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>
    <script>
        function remove(event, userId, userName) {
            event.preventDefault();
            var urlUserDestroy = "{{ route('users.delete', ':userId') }}"
                .replace(':userId', userId)
            Swal.fire({
                title: 'Utilisateur : ' + userName,
                text: 'Etes-vous sûr de vouloir supprimer cet utilisateur?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Oui, suprimer',
                cancelButtonText: 'Non, annuler',
                background: '#132329', // Fond sombre
                color: '#fff', // Couleur du texte blanche
                iconColor: '#ffdd57',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: urlUserDestroy,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(
                                'User deleted successfully');
                            Swal.fire({
                                title: 'Succès!',
                                text: response.message,
                                icon: 'success',
                                timer: 2000,
                                timerProgressBar: true,
                                background: '#132329', // Fond sombre
                                color: '#fff', // Couleur du texte blanche
                                iconColor: '#ffdd57',
                            });
                            getUsersRoles();
                            userRoles.splice(userId, 1);
                        },
                        error: function(error) {
                            console.error('Error deleting user:',
                                error);
                        }
                    });
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            getRolesAndPermissions();
            getUsersRoles();
        });
    </script>

    <script>
        $('#newUserButton').click(function(e) {
            e.preventDefault();

            // Trigger SweetAlert with input
            Swal.fire({
                title: 'Créer un utilisateur',
                html: `
                <form id="new-user-form" class="p-4 md:p-5" method="post" action="{{ route('users.store') }}">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2 text-left">
                        <div class="col-span-2 flex items-center">
                            <label for="name" class="block w-full mb-2 text-sm md:text-base font-medium text-white">Nom d'utilisateur</label>
                            <input type="text" name="name" id="name" class="bg-custom-dark border border-gray-300 text-gray-200 text-sm md:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="John Doe" required="">
                        </div>
                        <div class="col-span-2 flex items-center">
                            <label for="email" class="block w-full mb-2 text-sm md:text-base font-medium text-white">Adresse mail</label>
                            <input type="email" name="email" id="email" class="bg-custom-dark border border-gray-300 text-gray-200 text-sm md:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="exemple@exemple.com" required="">
                        </div>
                        <div class="col-span-2 flex items-center">
                            <label for="password" class="block w-full mb-2 text-sm md:text-base font-medium text-white">Mot de passe</label>
                            <input type="text" name="password" id="password" class="w-full bg-custom-dark border border-gray-300 text-gray-200 text-sm md:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tapez un mot de passe" required="">
                        </div>
                        <div class="flex space-x-3">
                            <input id="mail" name="mail" type="checkbox" class="md:w-5 md:h-5 w-4 h-4 text-indigo-600 bg-custom-dark border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="mail" class="block text-sm md:text-base font-medium text-gray-300">Notifier par mail</label>
                        </div>
                    </div>
                </form>
            `,
                showCancelButton: true,
                confirmButtonText: 'Ajouter un nouvel utilisateur',
                cancelButtonText: 'Annuler',
                allowOutsideClick: false, // Empêche de fermer en cliquant en dehors
                preConfirm: () => {
                    const formData = new FormData($('#new-user-form')[0]);

                    // Vérifier si les champs sont vides
                    const name = formData.get('name');
                    const email = formData.get('email');
                    const password = formData.get('password');

                    if (!name || !email || !password) {
                        Swal.showValidationMessage('Veuillez remplir tous les champs requis.');
                        return false;
                    }

                    formData.append('_token', '{{ csrf_token() }}'); // Ajouter le token CSRF
                    return {
                        name: name,
                        email: email,
                        password: password,
                        mail: formData.get('mail'),
                        _token: formData.get('_token') // Inclure le token CSRF
                    };
                },
                customClass: {
                    popup: 'bg-gray-900 text-white rounded-lg shadow-lg', // Classes Tailwind pour le popup
                    confirmButton: 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded', // Bouton de confirmation
                    cancelButton: 'bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded' // Bouton d'annulation
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // Faire la requête AJAX pour ajouter l'utilisateur
                    $.ajax({
                        url: '{{ route('users.store') }}',
                        method: 'POST',
                        data: result.value,
                        success: function(response) {
                            Swal.fire({
                                title: 'Utilisateur créé avec succès !',
                                text: response.message,
                                icon: 'success',
                                timer: 2000,
                                timerProgressBar: true,
                                background: '#132329', // Fond sombre
                                color: '#fff', // Couleur du texte blanche
                                iconColor: '#ffdd57',
                            });
                            getUsersRoles(); // Mettre à jour la liste des utilisateurs et rôles
                        },
                        error: function(error) {
                            Swal.fire({
                                title: 'Erreur',
                                text: error.responseJSON?.message ||
                                    'Une erreur est survenue lors de la création de l\'utilisateur.',
                                icon: 'error',
                                background: '#132329', // Fond sombre
                                color: '#fff', // Couleur du texte blanche
                                iconColor: '#ffdd57',
                            });
                        }
                    });
                }
            });
        });


        $('#newPermissionButton').click(function(e) {
            e.preventDefault();

            // Trigger SweetAlert with input
            Swal.fire({
                title: 'Créer une permission',
                input: 'text',
                inputPlaceholder: 'Entrez le nom de la permission',
                showCancelButton: true,
                confirmButtonText: 'Créer',
                cancelButtonText: 'Annuler',
                inputValidator: (value) => {
                    if (!value) {
                        return 'Vous devez entrer un nom de permission !';
                    }
                },
                customClass: {
                    popup: 'bg-gray-900 text-white rounded-lg shadow-lg', // Classes Tailwind pour le popup
                    confirmButton: 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded', // Bouton de confirmation
                    cancelButton: 'bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded' // Bouton d'annulation
                },
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Make AJAX request to add the permission
                    $.ajax({
                        url: '{{ route('permissions.store') }}',
                        method: 'POST',
                        data: {
                            name: result.value,
                            _token: '{{ csrf_token() }}' // CSRF token for security
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Permission créée avec succès !',
                                text: response.message,
                                icon: 'success',
                                timer: 2000,
                                timerProgressBar: true,
                                background: '#132329', // Fond sombre
                                color: '#fff', // Couleur du texte blanche
                                iconColor: '#ffdd57',
                            });
                            getRolesAndPermissions();
                        },
                        error: function(error) {
                            Swal.fire({
                                title: 'Erreur',
                                text: xhr.responseJSON.message ||
                                    'Une erreur est survenue lors de la création de la permission.',
                                icon: 'error',
                                background: '#132329', // Fond sombre
                                color: '#fff', // Couleur du texte blanche
                                iconColor: '#ffdd57',
                            });
                        }
                    });
                }
            });
        });

        $('#newRoleButton').click(function(e) {
            e.preventDefault();

            // Trigger SweetAlert with input
            Swal.fire({
                title: 'Créer un rôle',
                input: 'text',
                inputPlaceholder: 'Entrez le nom du nouveau rôle',
                showCancelButton: true,
                confirmButtonText: 'Créer',
                cancelButtonText: 'Annuler',
                inputValidator: (value) => {
                    if (!value) {
                        return 'Vous devez entrer un nom de rôle !';
                    }
                },
                customClass: {
                    popup: 'bg-gray-900 text-white rounded-lg shadow-lg', // Classes Tailwind pour le popup
                    confirmButton: 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded', // Bouton de confirmation
                    cancelButton: 'bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded' // Bouton d'annulation
                },
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Make AJAX request to add the permission
                    $.ajax({
                        url: '{{ route('roles.store') }}',
                        method: 'POST',
                        data: {
                            name: result.value,
                            _token: '{{ csrf_token() }}' // CSRF token for security
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Rôle créé avec succès !',
                                text: response.message,
                                icon: 'success',
                                timer: 2000,
                                timerProgressBar: true,
                                background: '#132329', // Fond sombre
                                color: '#fff', // Couleur du texte blanche
                                iconColor: '#ffdd57',
                            });
                            getRolesAndPermissions();
                        },
                        error: function(error) {
                            Swal.fire({
                                title: 'Erreur',
                                text: xhr.responseJSON.message ||
                                    'Une erreur est survenue lors de la création de la permission.',
                                icon: 'error',
                                background: '#132329', // Fond sombre
                                color: '#fff', // Couleur du texte blanche
                                iconColor: '#ffdd57',
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        function getRolesAndPermissions() {
            $.ajax({
                url: "{{ route('roles.permissions.index') }}",
                method: "GET",
                success: function(response) {
                    var roles = response.roles;
                    var permissions = response.permissions;
                    var rolePermissions = response.rolePermissions;

                    // Create the table header with roles
                    var header = '<tr class="bg-bg-chart"><th style="background-color: #d1d5db;"></th>';
                    roles.forEach(function(role) {
                        header +=
                            '<th class="text-center"><a href="#" class="text-black dark:text-white p-2 hover:bg-[#f9b544]" data-role-id="' +
                            role.id + '" data-role-name="' + role.name + '">' + role.name + '</a></th>';
                    });
                    header += '</tr>';
                    $('#rolesTable thead').html(header);

                    // Create the table body with permissions and checkboxes
                    var body = '';

                    // Function to evaluate and update the "manage all" checkbox
                    function updateManageAllCheckbox(roleId) {
                        var allChecked = true;
                        var manageAllCheckbox = null;

                        $('input.permission-checkbox[data-role-id="' + roleId + '"]').each(function() {
                            if ($(this).closest('tr').hasClass('manage-all-permission')) {
                                manageAllCheckbox = $(this);
                            } else {
                                if (!$(this).is(':checked')) {
                                    allChecked = false;
                                }
                            }
                        });

                        if (manageAllCheckbox) {
                            manageAllCheckbox.prop('checked', allChecked);
                        }
                    }

                    // Function to handle checking or unchecking all permissions
                    function toggleAllPermissions(roleId, checkAll) {
                        $('input.permission-checkbox[data-role-id="' + roleId + '"]').each(function() {
                            if (!$(this).closest('tr').hasClass('manage-all-permission')) {
                                $(this).prop('checked', checkAll);
                            }
                        });
                    }

                    // Initial rendering of the table
                    permissions.forEach(function(permission) {
                        var isManageAll = (permission.name === 'gérer tout');
                        var rowClass = isManageAll ? 'manage-all-permission' : '';

                        body += '<tr class="' + rowClass +
                            '"><th class="text-md" ><a href="#" class="hover:bg-[#f9b544] p-2" data-permission-id="' +
                            permission.id + '" data-permission-name="' + permission.name + '">' +
                            permission.name + '</a></th>';
                        roles.forEach(function(role) {
                            var checked = rolePermissions[role.id] && rolePermissions[
                                role.id].includes(permission.id) ? 'checked' : '';
                            body +=
                                '<td class="text-center"><input type="checkbox" class="permission-checkbox" data-role-id="' +
                                role.id + '" data-permission-id="' + permission.id +
                                '" ' + checked + '></td>';
                        });
                        body += '</tr>';
                    });

                    $('#rolesTable tbody').html(body);

                    $('#rolesTable').on('click', 'a[data-permission-id]', function(event) {
                        event.preventDefault();
                        var permissionId = $(this).data('permission-id');
                        var permissionName = $(this).text();
                        var urlPermissionUpdate = "{{ route('permissions.update', ':permissionId') }}"
                            .replace(':permissionId', permissionId)
                        var urlPermissionDestroy =
                            "{{ route('permissions.destroy', ':permissionId') }}"
                            .replace(':permissionId', permissionId)

                        Swal.fire({
                            title: 'Permission : ' + permissionName,
                            html: '<input id="permission-name" class="bg-custom-dark text-gray-200" type="text" value="' +
                                permissionName + '">',
                            text: 'Que voulez-vous faire?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Mettre à jour',
                            cancelButtonText: 'Supprimer',
                            background: '#132329', // Fond sombre
                            color: '#fff', // Couleur du texte blanche
                            iconColor: '#ffdd57',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Handle update action
                                var newPermissionName = $('#permission-name').val();
                                // Send AJAX request to update permission
                                $.ajax({
                                    url: urlPermissionUpdate,
                                    method: 'PUT',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        name: newPermissionName,
                                    },
                                    success: function(response) {
                                        console.log(
                                            'Permission updated successfully');
                                        Swal.fire({
                                            title: 'Succès!',
                                            text: response.message,
                                            icon: 'success',
                                            timer: 2000,
                                            timerProgressBar: true,
                                            background: '#132329', // Fond sombre
                                            color: '#fff', // Couleur du texte blanche
                                            iconColor: '#ffdd57',
                                        });
                                        getRolesAndPermissions();
                                    },
                                    error: function(error) {
                                        console.error('Error updating permission:',
                                            error);
                                    }
                                });
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                // Send AJAX request to delete permission
                                $.ajax({
                                    url: urlPermissionDestroy,
                                    method: 'DELETE',
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        console.log(
                                            'Permission deleted successfully');
                                        Swal.fire({
                                            title: 'Succès!',
                                            text: response.message,
                                            icon: 'success',
                                            timer: 2000,
                                            timerProgressBar: true,
                                            background: '#132329', // Fond sombre
                                            color: '#fff', // Couleur du texte blanche
                                            iconColor: '#ffdd57',
                                        });
                                        getRolesAndPermissions();
                                    },
                                    error: function(error) {
                                        console.error('Error deleting permission:',
                                            error);
                                    }
                                });
                            }
                        });
                    });

                    $('#rolesTable').on('click', 'a[data-role-id]', function(event) {
                        event.preventDefault();
                        var roleId = $(this).data('role-id');
                        var roleName = $(this).text();
                        var urlRoleUpdate = "{{ route('roles.update', ':roleId') }}".replace(':roleId',
                            roleId)
                        var urlRoleDestroy = "{{ route('roles.destroy', ':roleId') }}".replace(
                            ':roleId', roleId)

                        Swal.fire({
                            title: 'Role : ' + roleName,
                            html: '<input id="role-name" type="text" class="bg-custom-dark text-gray-200" value="' +
                                roleName + '">',
                            text: 'Que voulez-vous faire?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Mettre à jour',
                            cancelButtonText: 'Supprimer',
                            background: '#132329', // Fond sombre
                            color: '#fff', // Couleur du texte blanche
                            iconColor: '#ffdd57',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Handle update action
                                var newRoleName = $('#role-name').val();
                                // Send AJAX request to update role
                                $.ajax({
                                    url: urlRoleUpdate,
                                    method: 'PUT',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        name: newRoleName,
                                    },
                                    success: function(response) {
                                        console.log('Role updated successfully');
                                        Swal.fire({
                                            title: 'Succès!',
                                            text: response.message,
                                            icon: 'success',
                                            timer: 2000,
                                            timerProgressBar: true,
                                            background: '#132329', // Fond sombre
                                            color: '#fff', // Couleur du texte blanche
                                            iconColor: '#ffdd57',
                                        });
                                        getRolesAndPermissions();
                                    },
                                    error: function(error) {
                                        console.error('Error updating role:',
                                            error);
                                    }
                                });
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                // Send AJAX request to delete role
                                $.ajax({
                                    url: urlRoleDestroy,
                                    method: 'DELETE',
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        console.log('Role deleted successfully');
                                        Swal.fire({
                                            title: 'Succès!',
                                            text: response.message,
                                            icon: 'success',
                                            timer: 2000,
                                            timerProgressBar: true,
                                            background: '#132329', // Fond sombre
                                            color: '#fff', // Couleur du texte blanche
                                            iconColor: '#ffdd57',
                                        });
                                        getRolesAndPermissions();
                                    },
                                    error: function(error) {
                                        console.error('Error deleting role:',
                                            error);
                                    }
                                });
                            }
                        });
                    });

                    // Attach change event listeners to checkboxes
                    var requestInProgress = false;

                    $('#rolesTable').on('change', 'input.permission-checkbox', function() {
                        if (requestInProgress) {
                            return;
                        }

                        requestInProgress = true;

                        var roleId = $(this).data('role-id');
                        var permissionId = $(this).data('permission-id');
                        var checked = $(this).is(':checked');

                        // If the "manage all" checkbox is changed, check/uncheck all other permissions
                        if ($(this).closest('tr').hasClass('manage-all-permission')) {
                            toggleAllPermissions(roleId, checked);
                        } else {
                            // Otherwise, update the "manage all" checkbox based on individual permissions
                            updateManageAllCheckbox(roleId);
                        }

                        // Your existing AJAX logic to update permissions on the server
                        $.ajax({
                            url: "{{ route('roles.permissions.update') }}",
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                role_id: roleId,
                                permission_id: permissionId,
                                assign: checked
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Succès!',
                                    text: response.message,
                                    icon: 'success',
                                    timer: 2000,
                                    timerProgressBar: true,
                                    background: '#132329', // Fond sombre
                                    color: '#fff', // Couleur du texte blanche
                                    iconColor: '#ffdd57',
                                });
                                requestInProgress = false;
                            },
                            error: function(error) {
                                Swal.fire({
                                    title: 'Erreur!',
                                    text: 'Il y a eu une erreur lors de l\'assignation de la permission.',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                    background: '#132329', // Fond sombre
                                    color: '#fff', // Couleur du texte blanche
                                    iconColor: '#ffdd57',
                                });
                                requestInProgress = false;
                            }
                        });
                    });
                },
                error: function(error) {
                    console.error("There was an error fetching roles and permissions:", error);
                }
            });
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#new-permission-form').on('submit', function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('permissions.store') }}",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                                title: 'Succès!',
                                text: response.message,
                                icon: 'success',
                                timer: 2000,
                                timerProgressBar: true,
                                background: '#132329', // Fond sombre
                                color: '#fff', // Couleur du texte blanche
                                iconColor: '#ffdd57',
                            }),
                            getRolesAndPermissions();
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Erreur!',
                            text: xhr.responseJSON.message ||
                                'Une erreur est survenue.',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            background: '#132329', // Fond sombre
                            color: '#fff', // Couleur du texte blanche
                            iconColor: '#ffdd57',
                        });
                    },
                    complete: function() {
                        // Reset the form
                        $('#new-permission-form')[0].reset();
                    }
                });
            });

            $('#new-role-form').on('submit', function(event) {
                event.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('roles.store') }}",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            title: 'Succès!',
                            text: response.message,
                            icon: 'success',
                            timer: 2000,
                            timerProgressBar: true,
                            background: '#132329', // Fond sombre
                            color: '#fff', // Couleur du texte blanche
                            iconColor: '#ffdd57',
                        });

                        getRolesAndPermissions();

                        $('#new-role-form')[0].reset();
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Erreur!',
                            text: xhr.responseJSON.message ||
                                'Une erreur est survenue.',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            background: '#132329', // Fond sombre
                            color: '#fff', // Couleur du texte blanche
                            iconColor: '#ffdd57',
                        });
                    }
                });
            });
        });
    </script>

    <script>
        function getUsersRoles() {
            $.ajax({
                url: "{{ route('roles.users.index') }}",
                method: "GET",
                success: function(response) {
                    var users = response.users;
                    var roles = response.roles;
                    var userRoles = response.userRoles;

                    // Create the table header with roles
                    var header = '<tr class="bg-bg-chart"><th style="background-color: #d1d5db;"></th>';
                    roles.forEach(function(role) {
                        header +=
                            '<th class="text-center">' + role.name + '</th>';
                    });
                    header += '</tr>';
                    $('#usersRolesTable thead').html(header);

                    // Create the table body with users and checkboxes
                    var body = '';

                    // Initial rendering of the table
                    users.forEach(function(user) {
                        body +=
                            '<tr><th class="text-md"><a href="#" class="hover:bg-[#f9b544] text-start p-2" data-user-id="' +
                            user.id + '" data-user-name="' + user.name + '">' + user.name + '</a></th>';
                        roles.forEach(function(role) {
                            var checked = userRoles[user.id] && userRoles[user.id].includes(role
                                .id) ? 'checked' : '';
                            body +=
                                '<td class="text-center"><input type="checkbox" class="user-checkbox" data-role-id="' +
                                role.id + '" data-user-id="' + user.id +
                                '" ' + checked + '></td>';
                        });
                        body += '</tr>';
                    });

                    $('#usersRolesTable tbody').html(body);

                    $('#usersRolesTable').on('click', 'a[data-user-id]', function(event) {
                        event.preventDefault();
                        var userId = $(this).data('user-id');
                        var userName = $(this).text();
                        var urlUserDestroy = "{{ route('users.delete', ':userId') }}"
                            .replace(':userId', userId)

                        Swal.fire({
                            title: 'Utilisateur : ' + userName,
                            text: 'Etes-vous sûr de vouloir supprimer cet utilisateur?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Oui, suprimer',
                            cancelButtonText: 'Non, annuler',
                            background: '#132329', // Fond sombre
                            color: '#fff', // Couleur du texte blanche
                            iconColor: '#ffdd57',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: urlUserDestroy,
                                    method: 'DELETE',
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        console.log(
                                            'User deleted successfully');
                                        Swal.fire({
                                            title: 'Succès!',
                                            text: response.message,
                                            icon: 'success',
                                            timer: 2000,
                                            timerProgressBar: true,
                                            background: '#132329', // Fond sombre
                                            color: '#fff', // Couleur du texte blanche
                                            iconColor: '#ffdd57',
                                        });
                                        getUsersRoles();
                                        userRoles.splice(userId, 1);
                                    },
                                    error: function(error) {
                                        console.error('Error deleting user:',
                                            error);
                                    }
                                });
                            }
                        });
                    });

                    // Attach change event listeners to checkboxes
                    var requestInProgress = false;

                    $('#usersRolesTable').on('change', 'input.user-checkbox', function() {
                        if (requestInProgress) {
                            return;
                        }

                        requestInProgress = true;

                        var roleId = $(this).data('role-id');
                        var userId = $(this).data('user-id');
                        var checked = $(this).is(':checked');

                        // Your existing AJAX logic to update user's roles on the server
                        $.ajax({
                            url: "{{ route('users.roles.update') }}",
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                role_id: roleId,
                                user_id: userId,
                                assign: checked
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Succès!',
                                    text: response.message,
                                    icon: 'success',
                                    timer: 2000,
                                    timerProgressBar: true,
                                    background: '#132329', // Fond sombre
                                    color: '#fff', // Couleur du texte blanche
                                    iconColor: '#ffdd57',
                                });
                                requestInProgress = false;
                            },
                            error: function(error) {
                                Swal.fire({
                                    title: 'Erreur!',
                                    text: 'Il y a eu une erreur lors de l\'assignation du rôle.',
                                    icon: 'error',
                                    confirmButtonText: 'OK',
                                    background: '#132329', // Fond sombre
                                    color: '#fff', // Couleur du texte blanche
                                    iconColor: '#ffdd57',
                                });
                                requestInProgress = false;
                            }
                        });
                    });
                },
                error: function(error) {
                    console.error("There was an error fetching roles and permissions:", error);
                }
            });
        }
    </script>


    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>
@endsection
@endsection
