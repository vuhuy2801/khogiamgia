<?php
require_once 'app/models/PostModel.php';


class PostController
{
    private $postData;

    public function __construct()
    {
        $this->postData = new Post();
    }

    public function getListPostsUser()
    {
        return $this->postData->ListUser();

    }

    public function getListWithSupplier($id)
    {
        return $this->postData->GetPostsBySupplier($id);

    }

    public function getListGuidanceWithSupplier($id)
    {
        return $this->postData->GetGuidancePostsBySupplierId($id);

    }
    public function getPostDetail($postId)
    {
        return $this->postData->GetPostDetail($postId);
    }
    public function getPostDetailBySlug($slug)
    {
        $post = $this->postData->GetPostDetailBySlug($slug);
        $idPost = $post['postId'];
        $title = $post['title'];
        $author = "admin";
        $date = $post['createdAt'];
        $category = $this->postData->GetCategory($post['categories_post']);
        $imageUrl = $post['image'];
        $altName = $post['title'];
        $content = $post['content'];
        include_once 'app/views/post/detail.php';
    }
    // get list post for api
    function getPostListApi()
    {
        header('Content-Type: application/json');
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : null;
        if (!$currentPage) {
            http_response_code(400);
            echo "Không có trang này";
            return;
        }
        $limit = 6;
        // if total post < 6  return all post
        $totalPost = $this->postData->GetTotalPost();
        $totalPages = ceil($totalPost / $limit);
        if ($currentPage > $totalPages || $currentPage < 1) {
            // set 404 page
            http_response_code(400);
            echo "Không có trang này";
            return;
        }
        if ($totalPost < $limit) {
            $offset = 0;
            $posts['totalPage'] = 1;
            $posts['posts'] = $this->postData->GetListPostSortByDate($limit, $offset);
            echo json_encode($posts);
            return;
        }

        // create new key totalPage
        $posts['totalPage'] = $totalPages;
        $offset = ($currentPage - 1) * 6;
        $posts['posts'] = $this->postData->GetListPostSortByDate($limit, $offset);
        echo json_encode($posts);


    }



}

?>