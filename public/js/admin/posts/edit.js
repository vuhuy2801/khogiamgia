const editorTextarea = document.getElementById("editor");
const btnSubmit = document.getElementById("btnSubmit");
const formSubmit = document.getElementById("formSubmit");
const titleInput = document.getElementById("title");
const slugInput = document.getElementById("slug");
const imageInput = document.getElementById("image");

document.getElementById("title").addEventListener("change", function () {
  const titleValue = this.value.trim();
  if (titleValue === "") {
    showError("title", "Vui lòng nhập tiêu đề");
  } else {
    hideError("title");
  }
});

document.getElementById("description").addEventListener("change", function () {
  const descriptionValue = this.value.trim();
  if (descriptionValue === "") {
    showError("title", "Vui lòng nhập mô tả");
  } else {
    hideError("description");
  }
});

document.getElementById("slug").addEventListener("change", function () {
  const slugValue = this.value;
  console.log(slugValue);
  if (slugValue === "") {
    showError("slug", "Vui lòng nhập slug");
  } else {
    hideError("slug");
  }
});

document.getElementById("supplierId").addEventListener("change", function () {
  hideError("supplierId");
});

document
  .getElementById("category_post")
  .addEventListener("change", function () {
    hideError("category_post");
  });

btnSubmit.addEventListener("click", () => {
  clearAllErrors();
  //get value
  const title = document.getElementById("title").value.trim();
  const description = document.getElementById("description").value.trim();
  const slug = document.getElementById("slug").value.trim();
  const supplierId = document.getElementById("supplierId").value;
  const categoryPost = document.getElementById("category_post").value;
  let isValid = true;

  if (title === "") {
    showError("title", "Vui lòng nhập tiêu đề");
    isValid = false;
  } else {
    hideError("title");
  }

  if (description === "") {
    showError("description", "Vui lòng nhập mô tả");
    isValid = false;
  } else {
    hideError("description");
  }

  if (slug === "") {
    isValid = false;
  }

  if (supplierId === "Chọn nhà cung cấp") {
    showError("supplierId", "Vui lòng chọn nhà cung cấp");
    isValid = false;
  } else {
    hideError("supplierId");
  }

  if (categoryPost === "Danh mục") {
    showError("category_post", "Vui lòng chọn danh mục");
    isValid = false;
  } else {
    hideError("category_post");
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

function intEditor(content) {
  ClassicEditor.create(document.querySelector("#editor"))
    .then((editor) => {
      editor.setData(content);
      editor.model.document.on("change:data", () => {
        let data = editor.getData().trim();
        if (data == "") {
          showError("editor", "Vui lòng nhập nội dung");
        } else {
          hideError("editor");
        }
      });
    })
    .catch((error) => {
      console.error(error);
    });
}
intEditor(dataPost.content);
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
    const defaultImageUrl = dataPost.image;
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

function createSlug(string) {
  const search = [
    /(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g,
    /(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g,
    /(ì|í|ị|ỉ|ĩ)/g,
    /(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g,
    /(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g,
    /(ỳ|ý|ỵ|ỷ|ỹ)/g,
    /(đ)/g,
    /(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/g,
    /(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/g,
    /(Ì|Í|Ị|Ỉ|Ĩ)/g,
    /(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/g,
    /(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/g,
    /(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/g,
    /(Đ)/g,
    /[^a-zA-Z0-9\-\_]/g,
  ];

  const replace = [
    "a",
    "e",
    "i",
    "o",
    "u",
    "y",
    "d",
    "A",
    "E",
    "I",
    "O",
    "U",
    "Y",
    "D",
    "-",
  ];

  let result = string;

  for (let i = 0; i < search.length; i++) {
    result = result.replace(search[i], replace[i]);
  }

  result = result.replace(/(-)+/g, "-");
  result = result.toLowerCase();

  return result;
}

titleInput.addEventListener("change", () => {
  let titleValue = titleInput.value;
  let slugTitle = createSlug(titleValue);
  slugInput.value = slugTitle;
});
