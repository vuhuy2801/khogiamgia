const editorTextarea = document.getElementById("editor");
const parser = new DOMParser();
const parsedContent = parser.parseFromString(phpContentValue, "text/html");
const plainTextContent = parsedContent.body.textContent;
editorTextarea.value = plainTextContent;

ClassicEditor.create(document.querySelector("#editor"))
  .then((editor) => {
    editor.enableReadOnlyMode("editor");
    console.log(editor);
  })
  .catch((error) => {
    console.error(error);
  });

document.addEventListener("DOMContentLoaded", function () {
  const btnDeletePost = $("#btn-delete-post");
  let idPost;

  const deleteForm = document.forms["delete-post-form"];

  $("#deletePost").on("show.bs.modal", function (event) {
    const button = $(event.relatedTarget);
    idPost = button.data("post-id");
    console.log(idPost);
  });

  btnDeletePost.click(function () {
    deleteForm.action = "../bai-viet/delete/" + idPost;
    deleteForm.submit();
  });
});
