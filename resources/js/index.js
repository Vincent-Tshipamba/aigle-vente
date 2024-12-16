import chart01 from "./components/chart-01";
import chart02 from "./components/chart-02";
import chart03 from "./components/chart-03";
import chartWishlist from "./components/chart-wishlist";
import chartContactedSellers from "./components/chart-contacted-sellers";
import map01 from "./components/map-01";

// Common Variables for Both Charts
const currentYear = new Date().getFullYear();
const currentMonth = new Date().getMonth() + 1;
const startYear = 2022;

// Wishlist Chart Selectors
const yearSelectWishlist = document.getElementById('year-select-wishlist');
const monthSelectWishlist = document.getElementById('month-select-wishlist');

// Contacted Sellers Chart Selectors
const yearSelectContactedSellers = document.getElementById('year-select-contacted-sellers');
const monthSelectContactedSellers = document.getElementById('month-select-contacted-sellers');

// Months Array
const months = [
    'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
    'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
];

// Populate Year Options
function populateYears(selectElement) {
    for (let year = startYear; year <= currentYear; year++) {
        const option = document.createElement('option');
        option.value = year;
        option.text = year;
        selectElement.appendChild(option);
    }
}

// Update Month Options
function updateMonths(selectElement, selectedYear) {
    selectElement.innerHTML = '';
    const allOption = document.createElement('option');
    allOption.value = 'all';
    allOption.text = 'Tous les mois';
    selectElement.appendChild(allOption);

    const maxMonth = (selectedYear == currentYear) ? currentMonth : 12;
    for (let i = 0; i < maxMonth; i++) {
        const option = document.createElement('option');
        option.value = i + 1;
        option.text = months[i];
        selectElement.appendChild(option);
    }
}

// Initialize Selectors for Wishlist Chart
populateYears(yearSelectWishlist);
yearSelectWishlist.value = currentYear;
updateMonths(monthSelectWishlist, currentYear);

// Initialize Selectors for Contacted Sellers Chart
populateYears(yearSelectContactedSellers);
yearSelectContactedSellers.value = currentYear;
updateMonths(monthSelectContactedSellers, currentYear);

// Event Listeners for Wishlist Chart
yearSelectWishlist.addEventListener('change', function () {
    updateMonths(monthSelectWishlist, this.value);
    chartWishlist(yearSelectWishlist.value, monthSelectWishlist.value);
});

monthSelectWishlist.addEventListener('change', function () {
    chartWishlist(yearSelectWishlist.value, monthSelectWishlist.value);
});

// Event Listeners for Contacted Sellers Chart
yearSelectContactedSellers.addEventListener('change', function () {
    updateMonths(monthSelectContactedSellers, this.value);
    chartContactedSellers(yearSelectContactedSellers.value, monthSelectContactedSellers.value);
});

monthSelectContactedSellers.addEventListener('change', function () {
    chartContactedSellers(yearSelectContactedSellers.value, monthSelectContactedSellers.value);
});

document.addEventListener("DOMContentLoaded", () => {
    chartWishlist(yearSelectWishlist.value, monthSelectWishlist.value);
    chartContactedSellers(yearSelectContactedSellers.value, monthSelectContactedSellers.value);
    chart01();
    chart02();
    chart03();
    map01();
});
