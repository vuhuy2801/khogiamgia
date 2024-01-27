<?php
require_once 'app/config/DbConnection.php';
require_once 'app/models/interfaces/postService.php';

class Post implements PostService
{
    private $postId;
    private $title;
    private $image;
    private $slug;
    private $supplierId;
    private $content;
    private $description;
    private $categories_post;
    private $createdAt;
    private $updatedAt;
    private $status;
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection();
    }

    public function getPostId()
    {
        return $this->postId;
    }

    public function setPostId($value)
    {
        $this->postId = $value;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getImage()
    {
        return $this->image;
    }


    public function setImage($value)
    {
        $this->image = $value;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($value)
    {
        $this->slug = $value;
    }

    public function getSupplierId()
    {
        return $this->supplierId;
    }

    public function setSupplierId($value)
    {
        $this->supplierId = $value;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($value)
    {
        $this->content = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getCategoriesPost()
    {
        return $this->categories_post;
    }

    public function setCategoriesPost($value)
    {
        $this->categories_post = $value;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($value)
    {
        $this->createdAt = $value;
    }
    public function getUpdateAt()
    {
        return $this->updatedAt;
    }

    public function setUpdateAt($value)
    {
        $this->updatedAt = $value;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($value)
    {
        $this->status = $value;
    }

    public function List(): array
    {
        $connection = $this->db->getConnection();

        if ($connection) {
            $query = "CALL GetListPosts()";
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return [];
        }
    }

    public function getSlugPost($slug)
    {
        $connection = $this->db->getConnection();
        $query = "CALL GetSlug(?);";
        try {
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $slug);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function ListUser(): array
    {
        $connection = $this->db->getConnection();

        if ($connection) {
            $query = "CALL GetListPostsUser()";
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return [];
        }
    }

    public function Add(): bool
    {
        $connection = $this->db->getConnection();
        $query = "CALL AddPost(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->title);
        $statement->bindParam(2, $this->image);
        $statement->bindParam(3, $this->slug);
        $statement->bindParam(4, $this->supplierId);
        $statement->bindParam(5, $this->content);
        $statement->bindParam(6, $this->description);
        $statement->bindParam(7, $this->categories_post);
        $statement->bindParam(8, $this->createdAt);
        $statement->bindParam(9, $this->updatedAt);
        $statement->bindParam(10, $this->status);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }

    }

    public function Edit(): bool
    {
        $connection = $this->db->getConnection();
        $query = "CALL UpdatePost(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->postId);
        $statement->bindParam(2, $this->title);
        $statement->bindParam(3, $this->image);
        $statement->bindParam(4, $this->slug);
        $statement->bindParam(5, $this->supplierId);
        $statement->bindParam(6, $this->content);
        $statement->bindParam(7, $this->description);
        $statement->bindParam(8, $this->categories_post);
        $statement->bindParam(9, $this->updatedAt);
        $statement->bindParam(10, $this->status);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Delete(): bool
    {
        $connection = $this->db->getConnection();
        $query = "CALL DeletePost(?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->postId);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Search(): array
    {
        $connection = $this->db->getConnection();
        $query = "CALL SearchPostByTitle(?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->title);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function GetPostsByCategory(): array
    {
        $connection = $this->db->getConnection();
        $query = "CALL GetPostsByCategory(?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->categories_post);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }


    public function GetPostsBySupplier($id): array
    {
        $connection = $this->db->getConnection();
        $query = "CALL GetPostsBySupplierId(?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $id);

        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }


    public function GetPostDetail($postId)
    {
        $connection = $this->db->getConnection();
        $query = "CALL GetPostDetail(?)";
        try {
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $postId, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    // getpostdetailbyslug
    public function GetPostDetailBySlug($slug)
    {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM post WHERE slug = '$slug'";
        try {
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function GetCategory($categoryId)
    {
        $connection = $this->db->getConnection();
        $query = "SELECT categoryName FROM `category` WHERE categoryId = $categoryId";
        try {
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function GetListPostSortByDate($limit, $offset): array
    {

        $connection = $this->db->getConnection();
        $query = "SELECT post.title, post.image, post.slug,post.description,post.createdAt FROM post WHERE post.status = 1 ORDER BY createdAt DESC LIMIT $limit OFFSET $offset";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }

    // get total post
    public function GetTotalPost(): int
    {
        $connection = $this->db->getConnection();
        $query = "SELECT COUNT(*) FROM post";
        $statement = $connection->prepare($query);
        try {
            $statement->execute();
            $result = $statement->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            return 0;
        }
    }


    public function GetGuidancePostsBySupplierId($id): array
    {
        $connection = $this->db->getConnection();
        $query = "CALL GetGuidancePostsBySupplierId(?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $id);

        try {
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return [];
        }
    }

}
?>