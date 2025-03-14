<div
    class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8">
    <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap">
        <div class="flex w-full flex-wrap gap-3 sm:gap-5">
            <div class="flex min-w-47.5">
                <span
                    class="mr-2 mt-1 flex h-4 w-full max-w-4 items-center justify-center rounded-full border border-primary">
                    <span class="block h-2.5 w-full max-w-2.5 rounded-full bg-primary"></span>
                </span>
                <div class="w-full">
                    <p class="font-semibold text-primary">Total Revenue</p>
                    <p class="text-sm font-medium" id="total-revenue">0</p>
                </div>
            </div>
            <div class="flex min-w-47.5">
                <span
                    class="mr-2 mt-1 flex h-4 w-full max-w-4 items-center justify-center rounded-full border border-secondary">
                    <span class="block h-2.5 w-full max-w-2.5 rounded-full bg-secondary"></span>
                </span>
                <div class="w-full">
                    <p class="font-semibold text-secondary">Total Sales</p>
                    <p class="text-sm font-medium " id="total-sales">0</p>
                </div>
            </div>
        </div>
        <div class="flex w-full max-w-45 justify-end">
            <div class="inline-flex items-center rounded-md bg-whiter p-1.5 dark:bg-meta-4">
                <button data-period="day"
                    class="period-btn rounded  px-3 py-1 text-xs font-medium text-black shadow-card hover:bg-white hover:shadow-card  dark:text-white dark:hover:bg-boxdark active">
                    Jours
                </button>
                <button data-period="week"
                    class="period-btn rounded px-3 py-1 text-xs font-medium text-black hover:bg-white hover:shadow-card dark:text-white dark:hover:bg-boxdark">
                    Semaine
                </button>
                <button data-period="month"
                    class="period-btn rounded px-3 py-1 text-xs font-medium text-black hover:bg-white hover:shadow-card dark:text-white dark:hover:bg-boxdark">
                    Mois
                </button>
            </div>

        </div>

    </div>
    <div>
        <div id="chartOne" class="-ml-5"></div>
    </div>
</div>

<style>
    .period-btn.active {
        background-color: #e38407;
        /* Couleur de fond pour le bouton actif */
        color: #fff;
        /* Couleur du texte pour le bouton actif */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        /* Optionnel : effet d'ombre */
    }
</style>

