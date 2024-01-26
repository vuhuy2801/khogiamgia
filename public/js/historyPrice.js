const elmInfoProductContent = document.querySelector(".info-product__content");
const elmInfoProductImg = document.querySelector(".info-product__img");
// advice-product
const elmAdviceProduct = document.querySelector(".advice-product");
// advice-product__content
const elmAdviceProductContent = document.querySelector(
    ".advice-product__content"
);
const elmLinkProduct = document.getElementById("linkProduct");
const elmInfoProduct = document.getElementById("infoProduct");
const elmNotifiCation = document.getElementById("notifiCation");
// btn-paste
const elmBtnPaste = document.querySelector(".btn-paste");

//elmLinkProduct on typing or on have value elmBtnPaste innerHTML = "xóa"
elmLinkProduct.addEventListener("input", function () {
    if (elmLinkProduct.value === "") {
        elmBtnPaste.innerHTML = `<i class="bi bi-clipboard"></i> Dán`;
    } else {
        elmBtnPaste.innerHTML = `<i class="bi bi-x-circle"></i> Xóa`;
    }
});

// handle click btn-paste
elmBtnPaste.addEventListener("click", function () {
    if (elmLinkProduct.value === "") {
        navigator.clipboard.readText().then((text) => {
            elmLinkProduct.value = text;
        });
        elmBtnPaste.innerHTML = `<i class="bi bi-x-circle"></i> Xóa`;
    } else {
        elmLinkProduct.value = "";
        elmBtnPaste.innerHTML = `<i class="bi bi-clipboard"></i> Dán`;
    }
});

function renderInfoProduct(data) {
    const { infoProduct, dataChart } = data;
    const {
        image,
        name,
        rateCount,
        soldCount,
        currentPrice,
        minPrice,
        maxPrice,
    } = infoProduct;
    const { labels } = dataChart;

    elmInfoProductImg.innerHTML = `<img src="${image}" alt="anh-san-pham">`;

    elmInfoProductContent.innerHTML = `
    <h4>${name}</h4>
    <div class="row vote-sold-count mt-2">
        <!-- đánh giá -->
        <div><i class="bi bi-star-fill" style="vertical-align: text-bottom;"></i>
            <b>Đánh giá: ${rateCount}</b>
        </div>
        <!-- đã bán -->
        <div><i class="bi bi-bag-check-fill" style="vertical-align: text-bottom;"></i>
            <b>Đã bán: ${soldCount}</b>
        </div>
    </div>
    <div class="row price mt-4">
        <div class="col-md-4 current-price">
            <div class="alert alert-info " role="alert">
                Giá hiện tại: ${currentPrice} vnđ
            </div>
        </div>
        <div class="col-md-4 low-price ${labels.length < 2 ? `d-none` : ""}">
            <div class="alert alert-success " role="alert">
                Giá thấp nhất: ${minPrice} vnđ
            </div>
        </div>
        <div class="col-md-4 high-price ${labels.length < 2 ? `d-none` : ""}">
            <div class="alert alert-danger " role="alert">
                Giá cao nhất: ${maxPrice} vnđ
            </div>
        </div>
    </div>
    <div class="row chart">
        <div class="col-md-12">
        ${
            labels.length < 2
                ? `<div class="alert alert-danger " role="alert">
                Sản phẩm chưa được theo dõi trong hệ thống, vui lòng thử lại sau
    </div>`
                : ""
        }
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class="row go-to-shop ">
        <div class="col-md-4 ms-auto d-flex">
            <button class="btn btn-primary ms-auto "><i class="bi bi-cart-fill"
                    style="vertical-align: text-bottom;"></i> Đến nơi
                bán</button>
        </div>
    </div>`;
}

function getHistoryPriceProduct() {
    if (elmLinkProduct.value === "") {
        elmNotifiCation.classList.remove("d-none");
        elmNotifiCation.innerHTML = `
        <div class="alert alert-danger" role="alert">
        <i class="bi bi-exclamation-triangle-fill" style="vertical-align: text-bottom;"></i><b id="notiErrorContent">Vui lòng nhập link sản phẩm</b>
        </div>
        `;
        return;
    }

    const regex =
        /^https?:\/\/(?:www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})+(?:\/[^\/\s]*)?$/u;
    if (!regex.test(elmLinkProduct.value)) {
        elmNotifiCation.classList.remove("d-none");
        elmNotifiCation.innerHTML = `
        <div class="alert alert-danger" role="alert">
        <i class="bi bi-exclamation-triangle-fill" style="vertical-align: text-bottom;"></i><b id="notiErrorContent">Link sản phẩm không hợp lệ</b>
        </div>
        `;
        return;
    }

    elmLinkProduct.addEventListener("input", function () {
        elmNotifiCation.classList.add("d-none");
    });

    elmNotifiCation.classList.remove("d-none");
    elmNotifiCation.innerHTML = `
    <div class="alert alert-info" role="alert" id="notiError">
    <i class="bi bi-exclamation-triangle-fill" style="vertical-align: text-bottom;"></i>
    <b id="notiFetchingContent">Đang lấy dữ liệu...</b>
    </div>
    `;

    api
        .get(`/product/lich-su-gia?link=${elmLinkProduct.value}`)
        .then(function (response) {
            elmNotifiCation.classList.add("d-none");
            elmInfoProduct.classList.remove("d-none");
            renderInfoProduct(response.data);
            if (response.data.dataChart.labels.length > 2) {
                showChart(
                    response.data.dataChart.labels,
                    response.data.dataChart.values
                );
            }
            getAdviceProduct(response.data.infoProduct.description);
            console.log(response);
        })
        .catch(function (error) {
            elmNotifiCation.classList.remove("d-none");
            elmNotifiCation.innerHTML = `  <div class="alert alert-danger" role="alert"> <i class="bi bi-exclamation-triangle-fill" style="vertical-align: text-bottom;"></i>
            <b id="notiErrorContent">${error.response.data}</b>  </div>`;
            console.log(error);
        });
}

function getAdviceProduct(description) {
    elmAdviceProduct.classList.remove("d-none");
    elmAdviceProductContent.innerHTML = "Đang tải dữ liệu...";
    const data = {
        description: description,
    };

    api
        .post("/product/lay-loi-khuyen", data)
        .then(function (response) {
            elmAdviceProductContent.innerHTML = response.data;
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
}

// Chart configuration
function showChart(labels, values) {
    let ctx = document.getElementById("myChart").getContext("2d");
    let chartStatus = Chart.getChart("myChart"); // <canvas> id
    if (chartStatus != undefined) {
        chartStatus.destroy();
    }

    var myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Giá sản phẩm",
                    data: values,
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
