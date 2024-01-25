const toastElList = document.querySelector(".toast");
const toastElm = new bootstrap.Toast(toastElList, { delay: 2000 });
let elmToastContent = document.querySelector("#toastContent");

const api = axios.create({
    baseURL: 'http://localhost/api/',
    timeout: 15000,
    headers: {'X-Custom-Header': 'foobar'}
  });

function copyCouponCode(event, couponCode, link) {
    console.log(couponCode);
    console.log(link);
    event.target.innerHTML = couponCode;
    // show toast
    elmToastContent.innerHTML = "Sao chép thành công mã: " + couponCode;
    toastElm.show();
    // copy to clipboard
    navigator.clipboard.writeText(couponCode);
    // open link
    // counter for open link after 2s
    // let counter = 0;
    // let interval = setInterval(function () {
    //     counter++;
    //     if (counter == 2) {
    //         window.open(link, "_blank");
    //         clearInterval(interval);
    //     }
    // }, 1000);
}

function openLink(link) {
    // toast mở link sau 2s
    elmToastContent.innerHTML = "Mở link sau 2s";
    toastElm.show();
    // counter for open link after 2s
    let counter = 0;
    let interval = setInterval(function () {
        counter++;
        if (counter == 2) {
            window.open(link, "_blank");
            clearInterval(interval);
        }
    }, 1000);
}
