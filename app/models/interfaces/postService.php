<?php
interface PostService {
    public function Add(): bool;
    public function Edit(): bool;
    public function Delete(): bool;
    public function Search(): array;
    public function List(): array;
    public function GetPostsByCategory(): array;
}
?>