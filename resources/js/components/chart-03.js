import ApexCharts from "apexcharts";
import axios from "axios";

// ===== chartThree
const chart03 = () => {
    // Make an API call to get the visits data
    axios
        .get("/api/shop/visitors", {
            params: {
                period: "monthly", // or 'yearly' based on your needs
            },
        })
        .then((response) => {
            // Extract the data for the chart
            const visits = response.data;

            // If we are fetching monthly data, extract months and visits count
            const months = visits.map(
                (visit) => `${visit.month}-${visit.year}`
            );
            const visitCounts = visits.map((visit) => visit.visits);

            const chartThreeOptions = {
                series: visitCounts,
                chart: {
                    type: "donut",
                    width: 380,
                },
                colors: ["#3C50E0", "#6577F3", "#8FD0EF", "#0FADCF"], // Customize based on the number of months/visits
                labels: months, // Use dynamic months (or years) for the labels
                legend: {
                    show: true, // Show legend
                    position: "bottom",
                },

                plotOptions: {
                    pie: {
                        donut: {
                            size: "65%",
                            background: "transparent",
                        },
                    },
                },

                dataLabels: {
                    enabled: false,
                },
                responsive: [
                    {
                        breakpoint: 640,
                        options: {
                            chart: {
                                width: 200,
                            },
                        },
                    },
                ],
            };

            // Render the chart
            const chartSelector = document.querySelector("#chartThree");

            if (chartSelector) {
                const chartThree = new ApexCharts(
                    chartSelector,
                    chartThreeOptions
                );
                chartThree.render();
            }
        })
        .catch((error) => {
            console.error("Error fetching visits data:", error);
        });
};

export default chart03;
