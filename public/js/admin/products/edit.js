const btnSubmit = document.getElementById("btnSubmit");
const formSubmit = document.getElementById("formSubmit");
const imageInput = document.getElementById("image");

document.getElementById("link").addEventListener("change", function () {
  const linkValue = this.value.trim();
  if (linkValue === "") {
    showError("link", "Vui lòng nhập link sản phẩm");
  } else {
    hideError("link");
  }
});

document.getElementById("productName").addEventListener("change", function () {
  const productNameValue = this.value.trim();
  if (productNameValue === "") {
    showError("productName", "Vui lòng nhập tên sản phẩm");
  } else {
    hideError("productName");
  }
});

document.getElementById("productId").addEventListener("change", function () {
  const productIdValue = this.value;
  console.log(productIdValue);
  if (productIdValue === "") {
    showError("productId", "Vui lòng nhập mã sản phẩm");
  } else {
    hideError("productId");
  }
});

document.getElementById("soldCount").addEventListener("change", function () {
  const soldCountValue = this.value;
  console.log(soldCountValue);
  if (soldCountValue === "") {
    showError("soldCount", "Vui lòng nhập lượt bán");
  } else {
    hideError("soldCount");
  }
});
document.getElementById("rateCount").addEventListener("change", function () {
  const rateCountValue = this.value;
  console.log(rateCountValue);
  if (rateCountValue === "") {
    showError("rateCount", "Vui lòng nhập lượt đánh giá");
  } else {
    hideError("rateCount");
  }
});

btnSubmit.addEventListener("click", () => {
  clearAllErrors();
  //get value
  const link = document.getElementById("link").value.trim();
  const productName = document.getElementById("productName").value.trim();
  const productId = document.getElementById("productId").value.trim();
  const soldCount = document.getElementById("productId").value.trim();
  const rateCount = document.getElementById("productId").value.trim();
  let isValid = true;

  if (link === "") {
    showError("link", "Vui lòng nhập link sản phẩm");
    isValid = false;
  } else {
    hideError("link");
  }

  if (productName === "") {
    showError("productName", "Vui lòng nhập tên sản phẩm");
    isValid = false;
  } else {
    hideError("productName");
  }

  if (productId === "") {
    showError("productId", "Vui lòng nhập mã sản phẩm");
    isValid = false;
  } else {
    hideError("productId");
  }

  if (soldCount === "") {
    showError("soldCount", "Vui lòng nhập lượt bán");
    isValid = false;
  } else {
    hideError("soldCount");
  }

  if (rateCount === "") {
    showError("rateCount", "Vui lòng nhập lượt đánh giá");
    isValid = false;
  } else {
    hideError("rateCount");
  }

  if (!isValid) {
    event.preventDefault();
  } else {
    $(".toast_update").toast("show");
    const toast = $(".toast_update");

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
  if (inputElement.value.trim() !== "") {
    inputElement.addEventListener("onchange", function () {
      console.log("change");
      hideError(inputId);
    });
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

let myDropzone;

Dropzone.options.myDropzone = {
  acceptedFiles: "image/*",
  maxFiles: 1,
  dictDefaultMessage: "<i class='bi bi-upload'></i></br>Click để tải ảnh lên",
  thumbnailHeight: null,
  thumbnailWidth: null,
  init: function () {
    const previewsContainer = document.getElementById("myDropzone");
    const deleteBtn = document.getElementById("deleteImageBtn");
    myDropzone = this;
    const defaultImageUrl = dataProduct.image;
    let mockFile = {
      name: "Filename",
      size: 12345,
    };
    this.displayExistingFile(mockFile, defaultImageUrl);

    this.on("addedfile", function (file) {
      if (mockFile) {
        this.removeFile(mockFile);
      }
      if (this.files.length > 1) {
        this.removeFile(this.files[0]);
      }
      previewsContainer.style.display =
        this.files.length > 0 ? "block" : "none";
    });

    this.on("success", function (file) {
      imageInput.value = file.name;
      deleteBtn.style.display = "inline-block";
    });

    this.on("removedfile", function (file) {
      imageInput.value = "";
      deleteBtn.style.display = "none";
    });

    deleteBtn.addEventListener("click", function () {
      const files = myDropzone.getAcceptedFiles();
      myDropzone.removeFile(mockFile);
      if (files.length > 0) {
        myDropzone.removeFile(files[0]);
      }
    });

    this.on("thumbnail", function (file) {
      file.previewElement.classList.add("hoverable");
      file.previewElement.addEventListener("mouseleave", function () {
        file.previewElement.classList.remove("hoverable");
      });
    });
  },
};
