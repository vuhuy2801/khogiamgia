document.addEventListener("DOMContentLoaded", function () {
  const btnDeletePost = $("#btn-delete-supplier");
  let idSupplier;

  const deleteForm = document.forms["delete-supplier-form"];

  $("#deleteSupplier").on("show.bs.modal", function (event) {
    const button = $(event.relatedTarget);
    idSupplier = button.data("supplier-id");
    console.log(idSupplier);
  });

  btnDeletePost.click(function () {
    deleteForm.action = "../nha-cung-cap/delete/" + idSupplier;
    deleteForm.submit();
  });
});
