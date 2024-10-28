@extends('admin.layouts.app')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none sm:flex items-center mb-3">
        <nav class="flex px-5 py-3 text-gray-700 rounded-lg bg-[#eaeaebf3] dark:bg-[#1E293B]" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.dashboard') }}"
                        class="inline-flex items-center space-x-2 text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                        </svg>
                        <span class="space-x-2">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>
                <li class="inline-flex items-center text-sm font-bold text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                    aria-current="page">
                    Liste des utilisateurs
                </li>
            </ol>
        </nav>
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

    <h6 class="mb-4 ps-3">Consultez la liste de tous les utilisateurs enregistrés</h6>
    <hr class="mb-4" />
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-gray-400 dark:bg-gray-800 dark:text-red-400"
                role="alert">

                <span class="font-medium">{{ $error }}</span>

            </div>
        @endforeach
    @endif
    <div class="mb-4 border-b border-gray-200 text-white">
        <ul style="color: white" class="flex flex-wrap -mb-px text-lg text-white font-medium text-center" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
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

@endsection
@section('script')
    <script>
        if (document.getElementById("users-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const exportCustomCSV = function(dataTable, userOptions = {}) {
                // A modified CSV export that includes a row of minuses at the start and end.
                const clonedUserOptions = {
                    ...userOptions
                }
                clonedUserOptions.download = false
                const csv = simpleDatatables.exportCSV(dataTable, clonedUserOptions)
                // If CSV didn't work, exit.
                if (!csv) {
                    return false
                }
                const defaults = {
                    download: true,
                    lineDelimiter: "\n",
                    columnDelimiter: ";"
                }
                const options = {
                    ...defaults,
                    ...clonedUserOptions
                }
                const separatorRow = Array(dataTable.data.headings.filter((_heading, index) => !dataTable.columns
                        .settings[index]?.hidden).length)
                    .fill("+")
                    .join("+"); // Use "+" as the delimiter

                const str = separatorRow + options.lineDelimiter + csv + options.lineDelimiter + separatorRow;

                if (userOptions.download) {
                    // Create a link to trigger the download
                    const link = document.createElement("a");
                    link.href = encodeURI("data:text/csv;charset=utf-8," + str);
                    link.download = (options.filename || "datatable_export") + ".txt";
                    // Append the link
                    document.body.appendChild(link);
                    // Trigger the download
                    link.click();
                    // Remove the link
                    document.body.removeChild(link);
                }

                return str
            }
            const dataTable = new simpleDatatables.DataTable("#users-table", {
                searchable: true,
                sortable: true,
                template: (options, dom) => "<div class='" + options.classes.top + "'>" +
                    "<div class='flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-3 rtl:space-x-reverse w-full sm:w-auto'>" +
                    (options.paging && options.perPageSelect ?
                        "<div class='" + options.classes.dropdown + "'>" +
                        "<label>" +
                        "<select class='" + options.classes.selector + "'></select> " + options.labels.perPage +
                        "</label>" +
                        "</div>" : ""
                    ) +
                    "<button id='exportDropdownButton' data-dropdown-toggle='exportDropdown' type='button' class='flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto'>" +
                    "Export as" +
                    "<svg class='-me-0.5 ms-1.5 h-4 w-4' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 24'>" +
                    "<path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m19 9-7 7-7-7' />" +
                    "</svg>" +
                    "</button>" +
                    "<div id='exportDropdown' class='z-10 hidden w-52 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700' data-popper-placement='bottom'>" +
                    "<ul class='p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400' aria-labelledby='exportDropdownButton'>" +
                    "<li>" +
                    "<button id='export-csv' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                    "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                    "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm1.018 8.828a2.34 2.34 0 0 0-2.373 2.13v.008a2.32 2.32 0 0 0 2.06 2.497l.535.059a.993.993 0 0 0 .136.006.272.272 0 0 1 .263.367l-.008.02a.377.377 0 0 1-.018.044.49.49 0 0 1-.078.02 1.689 1.689 0 0 1-.297.021h-1.13a1 1 0 1 0 0 2h1.13c.417 0 .892-.05 1.324-.279.47-.248.78-.648.953-1.134a2.272 2.272 0 0 0-2.115-3.06l-.478-.052a.32.32 0 0 1-.285-.341.34.34 0 0 1 .344-.306l.94.02a1 1 0 1 0 .043-2l-.943-.02h-.003Zm7.933 1.482a1 1 0 1 0-1.902-.62l-.57 1.747-.522-1.726a1 1 0 0 0-1.914.578l1.443 4.773a1 1 0 0 0 1.908.021l1.557-4.773Zm-13.762.88a.647.647 0 0 1 .458-.19h1.018a1 1 0 1 0 0-2H6.647A2.647 2.647 0 0 0 4 13.647v1.706A2.647 2.647 0 0 0 6.647 18h1.018a1 1 0 1 0 0-2H6.647A.647.647 0 0 1 6 15.353v-1.706c0-.172.068-.336.19-.457Z' clip-rule='evenodd'/>" +
                    "</svg>" +
                    "<span>Export CSV</span>" +
                    "</button>" +
                    "</li>" +
                    "<li>" +
                    "<button id='export-json' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                    "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                    "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Zm-.293 9.293a1 1 0 0 1 0 1.414L9.414 14l1.293 1.293a1 1 0 0 1-1.414 1.414l-2-2a1 1 0 0 1 0-1.414l2-2a1 1 0 0 1 1.414 0Zm2.586 1.414a1 1 0 0 1 1.414-1.414l2 2a1 1 0 0 1 0 1.414l-2 2a1 1 0 0 1-1.414-1.414L14.586 14l-1.293-1.293Z' clip-rule='evenodd'/>" +
                    "</svg>" +
                    "<span>Export JSON</span>" +
                    "</button>" +
                    "</li>" +
                    "<li>" +
                    "<button id='export-txt' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                    "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                    "<path fill-rule='evenodd' d='M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z' clip-rule='evenodd'/>" +
                    "</svg>" +
                    "<span>Export TXT</span>" +
                    "</button>" +
                    "</li>" +
                    "<li>" +
                    "<button id='export-sql' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
                    "<svg class='me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>" +
                    "<path d='M12 7.205c4.418 0 8-1.165 8-2.602C20 3.165 16.418 2 12 2S4 3.165 4 4.603c0 1.437 3.582 2.602 8 2.602ZM12 22c4.963 0 8-1.686 8-2.603v-4.404c-.052.032-.112.06-.165.09a7.75 7.75 0 0 1-.745.387c-.193.088-.394.173-.6.253-.063.024-.124.05-.189.073a18.934 18.934 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.073a10.143 10.143 0 0 1-.852-.373 7.75 7.75 0 0 1-.493-.267c-.053-.03-.113-.058-.165-.09v4.404C4 20.315 7.037 22 12 22Zm7.09-13.928a9.91 9.91 0 0 1-.6.253c-.063.025-.124.05-.189.074a18.935 18.935 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.074a10.163 10.163 0 0 1-.852-.372 7.816 7.816 0 0 1-.493-.268c-.055-.03-.115-.058-.167-.09V12c0 .917 3.037 2.603 8 2.603s8-1.686 8-2.603V7.596c-.052.031-.112.059-.165.09a7.816 7.816 0 0 1-.745.386Z'/>" +
                    "</svg>" +
                    "<span>Export SQL</span>" +
                    "</button>" +
                    "</li>" +
                    "</ul>" +
                    "</div>" + "</div>" +
                    (options.searchable ?
                        "<div class='" + options.classes.search + "'>" +
                        "<input class='" + options.classes.input + "' placeholder='" + options.labels.placeholder +
                        "' type='search' title='" + options.labels.searchTitle + "'" + (dom.id ?
                            " aria-controls='" + dom.id + "'" : "") + ">" +
                        "</div>" : ""
                    ) +
                    "</div>" +
                    "<div class='" + options.classes.container + "'" + (options.scrollY.length ?
                        " style='height: " + options.scrollY + "; overflow-Y: auto;'" : "") + "></div>" +
                    "<div class='" + options.classes.bottom + "'>" +
                    (options.paging ?
                        "<div class='" + options.classes.info + "'></div>" : ""
                    ) +
                    "<nav class='" + options.classes.pagination + "'></nav>" +
                    "</div>"
            })


            const $exportButton = document.getElementById("exportDropdownButton");
            const $exportDropdownEl = document.getElementById("exportDropdown");

            document.getElementById("export-csv").addEventListener("click", () => {
                simpleDatatables.exportCSV(dataTable, {
                    download: true,
                    lineDelimiter: "\n",
                    columnDelimiter: ";"
                })
            })
            document.getElementById("export-sql").addEventListener("click", () => {
                simpleDatatables.exportSQL(dataTable, {
                    download: true,
                    tableName: "export_table"
                })
            })
            document.getElementById("export-txt").addEventListener("click", () => {
                simpleDatatables.exportTXT(dataTable, {
                    download: true
                })
            })
            document.getElementById("export-json").addEventListener("click", () => {
                simpleDatatables.exportJSON(dataTable, {
                    download: true,
                    space: 3
                })
            })
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
                    }
                }
            });
        }

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
                            '<th class="text-center"><a href="#" class="text-black dark:text-white p-2 bg-bg-chart hover:bg-gray-600" data-role-id="' +
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
                            '"><th class="text-md text-start"><a href="#" class="hover:bg-custom-dark p-2" data-permission-id="' +
                            permission.id + '" data-permission-name="' + permission.name +
                            '">' +
                            permission.name + '</a></th>';
                        roles.forEach(function(role) {
                            var checked = rolePermissions[role.id] &&
                                rolePermissions[
                                    role.id].includes(permission.id) ? 'checked' :
                                '';
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
                        var urlPermissionUpdate =
                            "{{ route('permissions.update', ':permissionId') }}"
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
                                            'Permission updated successfully'
                                        );
                                        Swal.fire({
                                            title: 'Succès!',
                                            text: response
                                                .message,
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
                                        console.error(
                                            'Error updating permission:',
                                            error);
                                    }
                                });
                            } else if (result.dismiss === Swal.DismissReason
                                .cancel) {
                                // Send AJAX request to delete permission
                                $.ajax({
                                    url: urlPermissionDestroy,
                                    method: 'DELETE',
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        console.log(
                                            'Permission deleted successfully'
                                        );
                                        Swal.fire({
                                            title: 'Succès!',
                                            text: response
                                                .message,
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
                                        console.error(
                                            'Error deleting permission:',
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
                        var urlRoleUpdate = "{{ route('roles.update', ':roleId') }}"
                            .replace(':roleId',
                                roleId)
                        var urlRoleDestroy = "{{ route('roles.destroy', ':roleId') }}"
                            .replace(
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
                                        console.log(
                                            'Role updated successfully'
                                        );
                                        Swal.fire({
                                            title: 'Succès!',
                                            text: response
                                                .message,
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
                                        console.error(
                                            'Error updating role:',
                                            error);
                                    }
                                });
                            } else if (result.dismiss === Swal.DismissReason
                                .cancel) {
                                // Send AJAX request to delete role
                                $.ajax({
                                    url: urlRoleDestroy,
                                    method: 'DELETE',
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        console.log(
                                            'Role deleted successfully'
                                        );
                                        Swal.fire({
                                            title: 'Succès!',
                                            text: response
                                                .message,
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
                                        console.error(
                                            'Error deleting role:',
                                            error);
                                    }
                                });
                            }
                        });
                    });

                    // Attach change event listeners to checkboxes
                    var requestInProgress = false;

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
            })
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
                            '<tr><th class="text-md text-start"><a href="#" class="hover:bg-[#] p-2" data-user-id="' +
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
                        var urlUserDestroy = "{{ route('users.destroy', ':userId') }}"
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
            })
        }
    </script>
@endsection
