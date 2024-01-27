let btnSearch = document.getElementById("searchBtn");
let searchInput = document.getElementById("searchInput");

btnSearch.addEventListener("click", function () {
    let searchValue = searchInput.value;
    // localhost/admin/theo-doi-gia-san-pham/search?q=áo
    window.location.href = `search?page=1&q=${searchValue}`;
});
// evnet enter
searchInput.addEventListener("keyup", function (event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        btnSearch.click();
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const btnDeleteProduct = $("#btn-delete-product");
    let idProduct;

    const deleteForm = document.forms["delete-product-form"];

    $("#deleteProduct").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);
        idProduct = button.data("product-id");
        console.log(idProduct);
    });

    btnDeleteProduct.click(function () {
        deleteForm.action = "../theo-doi-gia-san-pham/delete/" + idProduct;
        deleteForm.submit();
    });
});
