import ApexCharts from 'apexcharts'

let chartWishListByPeriod = null;

const chartWishlist = (year, month) => {
    let url = `/client/api/wishlist?year=${year}`;
    if (month !== "all") {
        url += `&month=${month}`;
    }

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const dates = data.map(item => item.date);
            const aggregates = data.map(item => item.aggregate);

            const chartWishlistOptions = {
                series: [
                    {
                        name: "Total des produits ajoutés dans la liste des souhaits",
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
                        text: "Nombre d'ajouts",
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

            const chartSelector = document.querySelectorAll("#chartWishListByPeriod");

            if (chartWishListByPeriod) {
                chartWishListByPeriod.updateOptions({
                    xaxis: {
                        categories: dates,
                    },
                });
                chartWishListByPeriod.updateSeries([
                    {
                        name: "Total des produits ajoutés dans la liste des souhaits",
                        data: aggregates,
                    },
                ]);
            } else {
                chartWishListByPeriod = new ApexCharts(
                    document.querySelector("#chartWishListByPeriod"),
                    chartWishlistOptions
                );

                chartWishListByPeriod.render();
            }
        })
        .catch(error => console.error('Erreur lors de la récupération des données :', error));
}



export default chartWishlist;
