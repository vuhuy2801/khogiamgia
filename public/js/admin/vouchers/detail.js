document.addEventListener("DOMContentLoaded", function () {
  const btnDeleteVoucher = $("#btn-delete-voucher");
  let idVoucher;

  const deleteForm = document.forms["delete-voucher-form"];

  $("#deleteVoucher").on("show.bs.modal", function (event) {
    const button = $(event.relatedTarget);
    idVoucher = button.data("voucher-id");
    console.log(idVoucher);
  });

  btnDeleteVoucher.click(function () {
    deleteForm.action = "../ma-giam-gia/delete/" + idVoucher;
    deleteForm.submit();
  });
});
