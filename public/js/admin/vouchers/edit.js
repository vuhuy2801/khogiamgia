const minPriceElement = document.getElementById("minPrice");
const typeDiscount = document.getElementById("typeDiscount");
const maxDiscountElement = document.getElementById("maxDiscount");
const hastagElement = document.getElementById("hastag");
const remainingElement = document.getElementById("remaining");
const categoryElement = document.getElementById("category");
const noteElement = document.getElementById("note");
const voucherCodeElement = document.getElementById("voucherCode");
const elmEndDateElement = document.getElementById("endDate");
const btnSubmit = document.getElementById("btnSubmit");
const formSubmit = document.getElementById("formSubmit");
const elmExpiresAt = document.getElementById("expiresAt");
const elmCategoryId = document.getElementById("categoryId");
const elmDiscountType = document.getElementById("discountType");
const elmDiscount = document.getElementById("discountValue");
const elmIs_inWallet = document.getElementById("is_inWallet");
const emlSupplierId = document.getElementById("supplierId");

// add event onkeyup formSubmit
formSubmit.addEventListener("keyup", function (e) {
  let elmInput = e.target.getAttribute("name");
  if (elmInput === "voucherId") {
    voucherCodeElement.innerText = e.target.value;
  }
  if (elmInput === "quantity") {
    remainingElement.innerText = e.target.value;
  }
  if (elmInput === "voucherName") {
    elmDiscount.innerText = e.target.value;
  }
  if (elmInput === "minimunDiscount") {
    minPriceElement.innerText = e.target.value;
  }
  if (elmInput === "maximumDiscount") {
    maxDiscountElement.innerText = e.target.value;
  }
  if (elmInput === "conditionsOfUse") {
    noteElement.innerHTML = `<span>Lưu ý: </span>` + e.target.value;
  }
});

elmExpiresAt.addEventListener("change", function () {
  elmEndDateElement.innerHTML =
    `  <svg width="8" height="8" viewBox="0 0 8 8" fill="none"
  xmlns="http://www.w3.org/2000/svg">
  <g clip-path="url(#clip0_223_1138)">
      <path fill-rule="evenodd" clip-rule="evenodd"
          d="M4 7.5C4.92826 7.5 5.8185 7.13125 6.47487 6.47487C7.13125 5.8185 7.5 4.92826 7.5 4C7.5 3.07174 7.13125 2.1815 6.47487 1.52513C5.8185 0.868749 4.92826 0.5 4 0.5C3.07174 0.5 2.1815 0.868749 1.52513 1.52513C0.868749 2.1815 0.5 3.07174 0.5 4C0.5 4.92826 0.868749 5.8185 1.52513 6.47487C2.1815 7.13125 3.07174 7.5 4 7.5ZM8 4C8 5.06087 7.57857 6.07828 6.82843 6.82843C6.07828 7.57857 5.06087 8 4 8C2.93913 8 1.92172 7.57857 1.17157 6.82843C0.421427 6.07828 0 5.06087 0 4C0 2.93913 0.421427 1.92172 1.17157 1.17157C1.92172 0.421427 2.93913 0 4 0C5.06087 0 6.07828 0.421427 6.82843 1.17157C7.57857 1.92172 8 2.93913 8 4Z"
          fill="black" />
      <path fill-rule="evenodd" clip-rule="evenodd"
          d="M3.75 1.5C3.8163 1.5 3.87989 1.52634 3.92678 1.57322C3.97366 1.62011 4 1.6837 4 1.75V4.355L5.624 5.283C5.6799 5.31672 5.72039 5.37097 5.73682 5.43414C5.75325 5.49732 5.74431 5.56442 5.71192 5.6211C5.67954 5.67778 5.62626 5.71954 5.56349 5.73746C5.50072 5.75538 5.43343 5.74804 5.376 5.717L3.626 4.717C3.58774 4.69514 3.55593 4.66356 3.5338 4.62545C3.51168 4.58735 3.50001 4.54407 3.5 4.5V1.75C3.5 1.6837 3.52634 1.62011 3.57322 1.57322C3.62011 1.52634 3.6837 1.5 3.75 1.5Z"
          fill="black" />
  </g>
  <defs>
      <clipPath id="clip0_223_1138">
          <rect width="8" height="8" fill="white" />
      </clipPath>
  </defs>
</svg> ` + elmExpiresAt.value;
});

elmCategoryId.addEventListener("change", function () {
  categoryElement.innerText =
    elmCategoryId.options[elmCategoryId.selectedIndex].text;
});

elmDiscountType.addEventListener("change", function () {
  typeDiscount.innerText =
    elmDiscountType.options[elmDiscountType.selectedIndex].text;
});

elmIs_inWallet.addEventListener("change", function () {
  if (elmIs_inWallet.value == 0) {
    hastagElement.innerHTML = `# Mã nhập tay`;
  } else {
    hastagElement.innerHTML = `# Mã trong ví`;
  }
});

emlSupplierId.addEventListener("change", function () {
  const supplierId = emlSupplierId.value;
  let urlImage = "";
  switch (supplierId) {
    case "1":
      urlImage = "/public/images/logo/round-logo/logo-shopee-tron.png";
      break;
    case "2":
      urlImage = "/public/images/logo/round-logo/tiki.jpg";
      break;
    case "3":
      urlImage = "/public/images/logo/round-logo/tiktokshop.jpg";
      break;
    case "4":
      urlImage = "/public/images/logo/round-logo/logo-lazada.png";
      break;
    default:
      urlImage = "/public/images/logo/round-logo/default.png";
  }
  document.getElementById("imageLogo").src = urlImage;
});

document.getElementById("voucherId").addEventListener("change", function () {
  const voucherIdValue = this.value.trim();
  if (voucherIdValue === "") {
    showError("voucherId", "Vui lòng nhập mã voucher");
  } else {
    hideError("voucherId");
  }
});

document.getElementById("voucherName").addEventListener("change", function () {
  const voucherNameValue = this.value.trim();
  if (voucherNameValue === "") {
    showError("voucherName", "Vui lòng nhập tên voucher");
  } else {
    hideError("voucherName");
  }
});

document.getElementById("quantity").addEventListener("change", function () {
  const quantityValue = this.value.trim();
  if (quantityValue === "") {
    showError("quantity", "Vui lòng nhập số lượng");
  } else {
    hideError("quantity");
  }
});

document
  .getElementById("minimunDiscount")
  .addEventListener("change", function () {
    const minimunDiscountValue = this.value.trim();
    if (minimunDiscountValue === "") {
      showError("minimunDiscount", "Vui lòng nhập đơn tối thiểu");
    } else {
      hideError("minimunDiscount");
    }
  });

document
  .getElementById("maximumDiscount")
  .addEventListener("change", function () {
    const maximunDiscountValue = this.value.trim();
    if (maximunDiscountValue === "") {
      showError("maximumDiscount", "Vui lòng nhập giảm giá tối đa");
    } else {
      hideError("maximumDiscount");
    }
  });

document
  .getElementById("address_target")
  .addEventListener("change", function () {
    const address_targetValue = this.value.trim();
    if (address_targetValue === "") {
      showError("address_target", "Vui lòng nhập link tiếp thị liên kết");
    } else {
      hideError("address_target");
    }
  });

document.getElementById("supplierId").addEventListener("change", function () {
  const supplierIdValue = this.value;
  if (supplierIdValue === "Chọn nhà cung cấp") {
    showError("supplierId", "Vui lòng chọn nhà cung cấp");
  } else {
    hideError("supplierId");
  }
});

document.getElementById("discountType").addEventListener("change", function () {
  const discountTypeValue = this.value;
  if (discountTypeValue === "Chọn loại mã giảm giá") {
    showError("discountType", "Vui lòng chọn loại mã giảm giá");
  } else {
    hideError("discountType");
  }
});

document.getElementById("categoryId").addEventListener("change", function () {
  const categoryIdValue = this.value.trim();

  if (categoryIdValue === "Chọn nghành hàng") {
    showError("categoryId", "Vui lòng chọn nghành hàng");
  } else {
    hideError("categoryId");
  }
});

btnSubmit.addEventListener("click", () => {
  clearAllErrors();
  const voucherId = document.getElementById("voucherId").value.trim();
  const voucherName = document.getElementById("voucherName").value.trim();
  const quantity = document.getElementById("quantity").value.trim();
  const address_target = document.getElementById("address_target").value.trim();
  const supplierId = document.getElementById("supplierId").value;
  const supplierIdElement = document.getElementById("supplierId").value;
  const discountTypeElement = document.getElementById("discountType").value;
  const categoryIdElement = document.getElementById("categoryId").value.trim();
  const conditionsOfUseElement =
    document.getElementById("conditionsOfUse").value;
  const expiresAtElement = document.getElementById("expiresAt").value;
  const minimunDiscount = document
    .getElementById("minimunDiscount")
    .value.trim();
  const maximumDiscount = document
    .getElementById("maximumDiscount")
    .value.trim();
  let isValid = true;

  let expiresDate = new Date(expiresAtElement);

  if (expiresAtElement === "") {
    showError("expiresAt", "Vui lòng nhập ngày hết hạn");
    isValid = false;
  } else if (expiresDate < new Date()) {
    showError("expiresAt", "Vui lòng nhập đúng ngày hết hạn");
    isValid = false;
  } else {
    hideError("expiresAt");
  }

  if (categoryIdElement === "Chọn nghành hàng") {
    showError("categoryId", "Vui lòng chọn nghành hàng");
    let isValid = true;
  } else {
    hideError("categoryId");
  }

  if (discountTypeElement === "Chọn loại mã giảm giá") {
    showError("discountType", "Vui lòng chọn loại mã giảm giá");
    let isValid = true;
  } else {
    hideError("discountType");
  }

  if (supplierIdElement === "Chọn nhà cung cấp") {
    showError("supplierId", "Vui lòng chọn nhà cung cấp");
    let isValid = true;
  } else {
    hideError("supplierId");
  }

  if (conditionsOfUseElement === "") {
    showError("conditionsOfUse", "Vui lòng nhập lưu ý mã giảm giá");
    isValid = false;
  } else {
    hideError("conditionsOfUse");
  }

  if (voucherId === "") {
    showError("voucherId", "Vui lòng nhập sản giảm giá");
    isValid = false;
  } else {
    hideError("voucherId");
  }

  if (voucherName === "") {
    showError("voucherName", "Vui lòng nhập tên mã giảm giá");
    isValid = false;
  } else {
    hideError("voucherName");
  }

  if (quantity === "") {
    showError("quantity", "Vui lòng nhập số lượng");
    isValid = false;
  } else {
    hideError("quantity");
  }

  if (minimunDiscount === "") {
    showError("minimunDiscount", "Vui lòng nhập đơn tối thiểu");
    isValid = false;
  } else {
    hideError("minimunDiscount");
  }

  if (maximumDiscount === "") {
    showError("maximumDiscount", "Vui lòng nhập giảm giá tối đa");
    isValid = false;
  } else {
    hideError("maximumDiscount");
  }

  if (address_target === "") {
    showError("address_target", "Vui lòng nhập link tiếp thị liên kết");
    isValid = false;
  } else {
    hideError("address_target");
  }

  if (!isValid) {
    event.preventDefault();
  } else {
    $(".toast_update").toast("show");
    const toast = $(".toast_update");
    // toast.toast("show");

    let countdown = 2;
    const countdownInterval = setInterval(function () {
      toast.find("span").html("Rời đi sau " + countdown + " giây");
      countdown--;

      if (countdown < 0) {
        clearInterval(countdownInterval);
        formSubmit.submit();
      }
    }, 1000);
  }
});

// Hiển thị thông báo lỗi
function showError(inputId, errorMessage) {
  const inputElement = document.getElementById(inputId);
  const errorElement = document.createElement("div");
  errorElement.className = "invalid-feedback";
  errorElement.innerText = errorMessage;
  inputElement.classList.add("is-invalid");
  inputElement.parentNode.appendChild(errorElement);
}

// Ẩn thông báo lỗi
function hideError(inputId) {
  const inputElement = document.getElementById(inputId);
  inputElement.classList.remove("is-invalid");
  const errorElement =
    inputElement.parentNode.querySelector(".invalid-feedback");
  if (errorElement) {
    errorElement.remove();
  }
}
// clear lỗi
function clearAllErrors() {
  const errorElements = document.querySelectorAll(".invalid-feedback");
  errorElements.forEach(function (errorElement) {
    errorElement.remove();
  });

  const invalidInputs = document.querySelectorAll(".is-invalid");
  invalidInputs.forEach(function (invalidInput) {
    invalidInput.classList.remove("is-invalid");
  });
}
