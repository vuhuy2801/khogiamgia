let btnGetNews = document.querySelector("#btnGetNews");
let elmPostList = document.querySelector("#postList");
let current_page = 1;

if(btnGetNews){
    btnGetNews.addEventListener("click", function (event) {
        event.target.innerHTML = "Đang tải...";
        // add class disabled
        event.target.classList.add("disabled");
    
        api.get(`/post/bai-viets?page=${current_page}`)
            .then(function (response) {
                // console.log(response.data);
                renderNew(response.data.posts);
                event.target.innerHTML = "Xem thêm";
                // set enable button
                event.target.classList.remove("disabled");
    
                current_page++;
                if (response.data.totalPage == current_page) {
                    event.target.style.display = "none";
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}


function renderNew(data) {
    let htmlPosts = "";
    // map data
    data.forEach(function (post) {
        console.log(post);
        htmlPosts += tempHtmlPost(post);
    });

    elmPostList.innerHTML += htmlPosts;

    function tempHtmlPost(infoPost) {
        return `<div class="col-lg-4">
        <div class="post-box">
            <div class="post-img">
                <img src="${infoPost.image}" class="img-fluid" alt="${infoPost.title}">
            </div>
            <p class="post-date">${infoPost.createdAt}</p>
            <h3 class="post-title">
                <a href="bai-viet/${infoPost.slug}">${infoPost.title}</a>
            </h3>
            <p class="description">${infoPost.description}</p>
        </div>
    </div>`;
    }
}

new Swiper(".testimonials-slider", {
    speed: 600,
    // loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    slidesPerView: "auto",
    pagination: {
        el: ".swiper-pagination",
        type: "bullets",
        clickable: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 40,
        },

        1200: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
    },
});
