const editorTextarea = document.getElementById("editor");

function intEditor(content) {
  ClassicEditor.create(document.querySelector("#editor"))
    .then((editor) => {
      editor.enableReadOnlyMode("editor");
      editor.setData(content);
      console.log(editor);
    })
    .catch((error) => {
      console.error(error);
    });
}
intEditor(dataPost.content);

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
