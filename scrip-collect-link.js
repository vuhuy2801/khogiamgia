{
    /* <li class="col-xs-2-4 shopee-search-item-result__item" data-sqe="item"><a data-sqe="link" href="/Combo-3-quần-lót-nam-dáng-Trunk-Bamboo-kháng-khuẩn-Coolmate-i.24710134.3431453055?sp_atk=a78f92c7-b6c1-4343-aef6-ea61f0bbd268&amp;xptdk=a78f92c7-b6c1-4343-aef6-ea61f0bbd268"> */
}
let dataLink = [];

// emulate scroll to 5000px
// window.scrollTo({
//     top: 500, // Vị trí muốn cuộn đến (đơn vị: pixel)
//     behavior: 'smooth' // Tùy chọn để tạo hiệu ứng cuộn mượt (có thể sử dụng 'auto' hoặc 'smooth')
// });

function scrollToBottom() {
    console.log("scrollToBottom...");
    window.scrollTo({
        top: 1000,
        behavior: "smooth",
    });

    setTimeout(() => {
        window.scrollTo({
            top: 2000,
            behavior: "smooth",
        });
    }, 2000);

    setTimeout(() => {
        window.scrollTo({
            top: 3000,
            behavior: "smooth",
        });
    }, 4000);

    setTimeout(() => {
        window.scrollTo({
            top: 4000,
            behavior: "smooth",
        });
    }, 6000);
    setTimeout(() => {
        window.scrollTo({
            top: 5000,
            behavior: "smooth",
        });
    }, 8000);
}

//
setTimeout(() => {
    document
        .querySelectorAll(".shopee-search-item-result__item a")
        .forEach((item) => {
            dataLink.push(item.href);
        });
    console.log("đang thu thập dữ liệu...");
    elmShopeeIconButtonRight.click();
}, 10000);

scrollToBottom();

// shopee-icon-button shopee-icon-button--right
let elmShopeeIconButtonRight = document.querySelector(
    ".shopee-icon-button.shopee-icon-button--right"
);
// loop click button next page
elmShopeeIconButtonRight.onclick = () => {
    scrollToBottom();
    setTimeout(() => {
        document
            .querySelectorAll(".shopee-search-item-result__item a")
            .forEach((item) => {
                dataLink.push(item.href);
            });
        console.log("đang thu thập dữ liệu...");
    }, 10000);

    setTimeout(() => {
        // if aria-disabled="true" => stop
        if (elmShopeeIconButtonRight.getAttribute("aria-disabled") == "true") {
            console.log("stop");
            console.log(dataLink);
            return;
        }
        elmShopeeIconButtonRight.click();
    }, 12000);
    console.log(dataLink.length);
};

// let elmShopeeButtonNoOutline = document.querySelectorAll('.shopee-button-no-outline');
// // onclick collect data
// elmShopeeButtonNoOutline.forEach((item) => {
//     item.onclick = () => {
//         setTimeout(() => {
//             window.scrollTo(0, 5000);
//             document.querySelectorAll('.shopee-search-item-result__item a').forEach((item) => {
//                 dataLink.push(item.href);
//             });
//         }, 5000);
//         console.log(dataLink.length);
//     }
// });


