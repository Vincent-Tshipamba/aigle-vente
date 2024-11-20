import ApexCharts from "apexcharts";

// ===== chartOne
const chart01 = () => {
    // Set up the initial chart options
    const chartOneOptions = {
        series: [
            {
                name: "Total Revenue",
                data: [], // Initial empty data
            },
            {
                name: "Total Sales",
                data: [], // Initial empty data
            },
        ],
        legend: {
            show: false,
            position: "top",
            horizontalAlign: "left",
        },
        colors: ["#3C50E0", "#80CAEE"],
        chart: {
            fontFamily: "Satoshi, sans-serif",
            height: 335,
            type: "area",
            dropShadow: {
                enabled: true,
                color: "#623CEA14",
                top: 10,
                blur: 4,
                left: 0,
                opacity: 0.1,
            },
            toolbar: {
                show: false,
            },
        },
        responsive: [
            {
                breakpoint: 1024,
                options: {
                    chart: {
                        height: 300,
                    },
                },
            },
            {
                breakpoint: 1366,
                options: {
                    chart: {
                        height: 350,
                    },
                },
            },
        ],
        stroke: {
            width: [2, 2],
            curve: "straight",
        },
        markers: {
            size: 0,
        },
        labels: {
            show: false,
            position: "top",
        },
        grid: {
            xaxis: {
                lines: {
                    show: true,
                },
            },
            yaxis: {
                lines: {
                    show: true,
                },
            },
        },
        dataLabels: {
            enabled: false,
        },
        markers: {
            size: 4,
            colors: "#fff",
            strokeColors: ["#3056D3", "#80CAEE"],
            strokeWidth: 3,
            strokeOpacity: 0.9,
            strokeDashArray: 0,
            fillOpacity: 1,
            discrete: [],
            hover: {
                size: undefined,
                sizeOffset: 5,
            },
        },
        xaxis: {
            type: "category",
            categories: [], // Initial empty categories
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            title: {
                style: {
                    fontSize: "0px",
                },
            },
            min: 0,
            max: 100,
        },
    };

    const chartSelector = document.querySelectorAll("#chartOne");
    let chartOne;

    // Initialize the chart
    if (chartSelector.length) {
        chartOne = new ApexCharts(
            document.querySelector("#chartOne"),
            chartOneOptions
        );
        chartOne.render();
    }

    // Function to fetch data based on selected period
    const fetchChartData = (period) => {
        // AJAX request to fetch data for the selected period
        fetch(`/api/stock-movements?period=${period}`)
            .then((response) => response.json())
            .then((data) => {
                // Update the chart with the new data
                chartOne.updateOptions({
                    series: [
                        {
                            name: "Total Revenue",
                            data: data.revenues, // From the API response
                        },
                        {
                            name: "Total Sales",
                            data: data.sales, // From the API response
                        },
                    ],
                    xaxis: {
                        categories: data.categories, // Categories from the API
                    },
                });

                // Update the total revenue and total sales
                document.getElementById("total-revenue").textContent =
                    data.totalRevenue;
                document.getElementById("total-sales").textContent =
                    data.totalSales;
            })
            .catch((error) => console.error("Error fetching data:", error));
    };

    // Fetch initial data for the default period (e.g., 'day')
    fetchChartData("day");

    // Event listeners for the period buttons
    const dayButton = document.querySelector("button[data-period='day']");
    const weekButton = document.querySelector("button[data-period='week']");
    const monthButton = document.querySelector("button[data-period='month']");

    // Fetch data for the selected period on button click
    if (dayButton) {
        dayButton.addEventListener("click", () => fetchChartData("day"));
    }
    if (weekButton) {
        weekButton.addEventListener("click", () => fetchChartData("week"));
    }
    if (monthButton) {
        monthButton.addEventListener("click", () => fetchChartData("month"));
    }

    // Sélectionnez tous les boutons avec la classe "period-btn"
    const periodButtons = document.querySelectorAll(".period-btn");

    // Fonction pour mettre à jour l'état actif
    const setActiveButton = (button) => {
        // Supprime la classe "active" de tous les boutons
        periodButtons.forEach((btn) => btn.classList.remove("active"));

        // Ajoute la classe "active" au bouton cliqué
        button.classList.add("active");
    };

    // Ajoutez un écouteur d'événement à chaque bouton
    periodButtons.forEach((button) => {
        button.addEventListener("click", () => {
            setActiveButton(button);

            // Appelez votre fonction pour charger les données en fonction de la période
            const period = button.getAttribute("data-period");
            fetchChartData(period); // Charge les données pour la période sélectionnée
        });
    });
};

export default chart01;
