<?php
require_once 'app/config/DbConnection.php';

class CategoryPost
{
    private $categoryies_post;
    private $categories_post_name;
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection();
    }

    // getter and setter for categoryies_post and categories_post_name
    public function getCategoryies_post()
    {
        return $this->categoryies_post;
    }

    public function setCategoryies_post($categoryies_post)
    {
        $this->categoryies_post = $categoryies_post;
    }

    public function getCategories_post_name()
    {
        return $this->categories_post_name;
    }

    public function setCategories_post_name($categories_post_name)
    {
        $this->categories_post_name = $categories_post_name;
    }


    public function List(): array
    {
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "SELECT * FROM CATEGORY_POST";
            $staement = $connection->prepare($query);
            $staement->execute();
            $result = $staement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return [];
        }
    }
}
