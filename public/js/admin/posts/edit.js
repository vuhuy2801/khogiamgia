const editorTextarea = document.getElementById("editor");
const btnSubmit = document.getElementById("btnSubmit");
const formSubmit = document.getElementById("formSubmit");
const titleInput = document.getElementById("title");
const slugInput = document.getElementById("slug");
const imageInput = document.getElementById("image");
// console.log(phpContentValue);
// const parser = new DOMParser();
// const parsedContent = parser.parseFromString(phpContentValue, "text/html");
// const plainTextContent = parsedContent.body.textContent;
// console.log(parsedContent);
// editorTextarea.value = plainTextContent;
btnSubmit.addEventListener("click", () => {
  formSubmit.submit();
});

function intEditor(content) {
  ClassicEditor.create(document.querySelector("#editor"))
    .then((editor) => {
      // editor.enableReadOnlyMode("editor");
      editor.setData(content);
      console.log(editor);
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
