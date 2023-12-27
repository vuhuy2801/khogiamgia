<?php
interface CategoryService {
    public function Add(): bool;
    public function Edit(): bool;
    public function Delete(): bool;
    public function List(): array;
}
?>