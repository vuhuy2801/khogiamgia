const btnSubmit = document.getElementById("btnSubmit");
const formSubmit = document.getElementById("formSubmit");
const imageInput = document.getElementById("image");

document.getElementById("supplierName").addEventListener("change", function () {
  const supplierNameValue = this.value.trim();
  if (supplierNameValue === "") {
    showError("supplierName", "Vui lòng nhập tên nhà cung cấp");
  } else {
    hideError("supplierName");
  }
});

document.getElementById("link_target").addEventListener("change", function () {
  const link_targetValue = this.value.trim();
  if (link_targetValue === "") {
    showError("link_target", "Vui lòng nhập link tham chiếu");
  } else {
    hideError("link_target");
  }
});

btnSubmit.addEventListener("click", () => {
  clearAllErrors();
  //get value
  const supplierName = document.getElementById("supplierName").value.trim();
  const link_target = document.getElementById("link_target").value.trim();
  let isValid = true;

  if (supplierName === "") {
    showError("supplierName", "Vui lòng nhập tên nhà cung cấp");
    isValid = false;
  } else {
    hideError("supplierName");
  }

  if (link_target === "") {
    showError("link_target", "Vui lòng nhập link tham chiếu");
    isValid = false;
  } else {
    hideError("link_target");
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
    const defaultImageUrl = dataSupplier.image;
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
