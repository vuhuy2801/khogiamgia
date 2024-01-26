let chartView = document.getElementById("chartStatistics");
let modal = new bootstrap.Modal(document.getElementById("chartModel"));
let ctx = document.getElementById("chartStatistics").getContext("2d");
let myChart = null;
let currentChart = null;


function showChartView(nameChart) {
    modal.show();
    if (nameChart == "overviewVoucher") {
        if (currentChart == "overviewVoucher") {
            return;
        }
        if (myChart) {
            myChart.destroy();
        }

        chartVoucher();
    }
    if (nameChart == "overviewPost") {
        if (currentChart == "overviewPosst") {
            return;
        }
        if (myChart) {
            myChart.destroy();
        }
        chartPost();
    }
    if (nameChart == "overviewWebsite") {
        if (currentChart == "overviewWebsite") {
            return;
        }
        if (myChart) {
            myChart.destroy();
        }
        chartWebsiteAccess();
    }
    if (nameChart == "overviewTotalVoucher") {
        if (currentChart == "overviewTotalVoucher") {
            return;
        }
        if (myChart) {
            myChart.destroy();
        }
        chartVoucherCountByProvider();
    }

    currentChart = nameChart;
}

function chartVoucher() {
    myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: dataChartVoucher.labels,
            datasets: [
                {
                    label: "Số lượng mã giảm giá",
                    data: dataChartVoucher.data,
                    backgroundColor: [
                        "rgba(255, 0, 0, 0.5)",
                        "rgba(0, 123, 255, 0.5)",
                    ],
                    borderColor: ["rgba(255, 0, 0, 1)", "rgba(0, 123, 255, 1)"],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
        },
    });
}

function chartPost() {
    myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: dataChartPost.labels,
            datasets: [
                {
                    label: "Số lượng bài viết",
                    data: dataChartPost.data,
                    backgroundColor: [
                        "rgba(0, 123, 255, 0.5)",
                        "rgba(255, 0, 0, 0.5)",
                        "rgba(0, 255, 0, 0.5)",
                        "rgba(255, 255, 0, 0.5)",
                        "rgba(255, 0, 255, 0.5)",
                    ],
                    borderColor: [
                        "rgba(0, 123, 255, 1)",
                        "rgba(255, 0, 0, 1)",
                        "rgba(0, 255, 0, 1)",
                        "rgba(255, 255, 0, 1)",
                        "rgba(255, 0, 255, 1)",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
}
function chartWebsiteAccess() {
    myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: dataChartWebsite.labels,
            datasets: [
                {
                    label: "Lượt truy cập",
                    data: dataChartWebsite.data,
                    backgroundColor: "rgba(0, 123, 255, 0.5)",
                    borderColor: "rgba(0, 123, 255, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
}

function chartVoucherCountByProvider() {
    myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: dataChartVoucherCountByProvider.labels,
            datasets: [
                {
                    label: "Số mã giảm giá",
                    data: dataChartVoucherCountByProvider.data,
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56",
                        "#4BC0C0",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
        },
    });
}
