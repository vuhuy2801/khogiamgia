<?php
interface PostService {
    public function Add(): bool;
    public function Edit(): bool;
    public function Delete(): bool;
    // public function Search(string $key): array;
    public function List(): array;
}
?>