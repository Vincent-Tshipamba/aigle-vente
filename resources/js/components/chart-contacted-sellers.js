import ApexCharts from 'apexcharts'

let chartContactedSellersByPeriod = null;

const chartContactedSellers = (year, month) => {
    let url = `/client/api/contacted-sellers?year=${year}`;
    if (month !== "all") {
        url += `&month=${month}`;
    }

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const dates = data.map(item => item.date);
            const aggregates = data.map(item => item.aggregate);

            const chartContactedSellersOptions = {
                series: [
                    {
                        name: "Total des vendeurs contactés",
                        data: aggregates
                    },
                ],
                colors: ["#3C50E0"],
                chart: {
                    fontFamily: "Satoshi, sans-serif",
                    type: "bar",
                    height: 350,
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "55%",
                        endingShape: "rounded",
                        borderRadius: 2,
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    show: true,
                    width: 4,
                    colors: ["transparent"],
                },
                xaxis: {
                    categories: dates,
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                    title: {
                        text: "Dates"
                    }
                },
                legend: {
                    show: true,
                    position: "top",
                    horizontalAlign: "left",
                    fontFamily: "Satoshi",

                    markers: {
                        radius: 99,
                    },
                },
                yaxis: {
                    title: {
                        text: "Nombre de contacts",
                    },
                },
                grid: {
                    yaxis: {
                        lines: {
                            show: false,
                        },
                    },
                },
                fill: {
                    opacity: 1,
                },

                labels: dates,

                tooltip: {
                    x: {
                        show: true,
                        formatter: (val, opt) => dates[opt.dataPointIndex],
                    },
                    y: {
                        formatter: function (val) {
                            return val;
                        },
                    },
                },
            }

            if (chartContactedSellersByPeriod) {
                chartContactedSellersByPeriod.updateOptions({
                    xaxis: {
                        categories: dates,
                    },
                });
                chartContactedSellersByPeriod.updateSeries([
                    {
                        name: "Total des vendeurs contactés",
                        data: aggregates,
                    },
                ]);
            } else {
                chartContactedSellersByPeriod = new ApexCharts(
                    document.querySelector("#chartContactedSellersByPeriod"),
                    chartContactedSellersOptions
                );

                chartContactedSellersByPeriod.render();
            }
        })
        .catch(error => console.error('Erreur lors de la récupération des données :', error));
}



export default chartContactedSellers;
