import ApexCharts from "apexcharts";

// Fonction pour récupérer les données (exemple avec fetch API)
async function fetchChartData(period) {
    // Remplacez cette URL par votre endpoint d'API
    const response = await fetch(`/api/chart-data?period=${period}`);
    const data = await response.json();
    return {
        series: data.series,
        categories: data.categories,
    };
}

const chart02 = async () => {
    // Chargement initial des données
    const initialData = await fetchChartData("This Week");

    const chartOptions = {
        series: initialData.series,
        colors: ["#3056D3", "#80CAEE"], // Couleurs des barres
        chart: {
            type: "bar",
            height: 335,
            stacked: true,
            toolbar: {
                show: false,
            },
            zoom: {
                enabled: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                borderRadius: 0,
                columnWidth: "25%",
                borderRadiusApplication: "end",
                borderRadiusWhenStacked: "last",
            },
        },
        dataLabels: {
            enabled: false,
        },
        xaxis: {
            categories: initialData.categories, // Les dates de la période
            title: {
                text: "Dates",
            },
        },

        yaxis: {
            title: {
                text: "Nombre de Clients",
            },
        },
        legend: {
            position: "top",
            horizontalAlign: "left",
            fontFamily: "Satoshi",
            fontWeight: 500,
            fontSize: "14px",
            markers: {
                radius: 99,
            },
        },
        fill: {
            opacity: 1,
        },

        tooltip: {
            y: {
                formatter: (val) => `${val} Clients`,
            },
        },
    };

    // Initialisation du graphique
    const chartElement = document.querySelector("#chartTwo");
    if (chartElement) {
        const chart = new ApexCharts(chartElement, chartOptions);
        chart.render();

        // Gestion du changement de période
        const periodSelect = document.querySelector("#periodSelect");
        if (periodSelect) {
            periodSelect.addEventListener("change", async (e) => {
                const selectedPeriod = e.target.value;
                const newData = await fetchChartData(selectedPeriod);
                chart.updateOptions({
                    series: newData.series,
                    xaxis: {
                        categories: newData.categories,
                    },
                });
            });
        }
    }
};

export default chart02;
