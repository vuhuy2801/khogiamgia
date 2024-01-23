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
