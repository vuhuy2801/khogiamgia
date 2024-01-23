document.addEventListener("DOMContentLoaded", function () {
  const btnDeletePost = $("#btn-delete-banner");
  let idBanner;

  const deleteForm = document.forms["delete-banner-form"];

  $("#deleteBanner").on("show.bs.modal", function (event) {
    const button = $(event.relatedTarget);
    idBanner = button.data("banner-id");
    console.log(idBanner);
  });

  btnDeletePost.click(function () {
    deleteForm.action = "../banner/delete/" + idBanner;
    deleteForm.submit();
  });
});
