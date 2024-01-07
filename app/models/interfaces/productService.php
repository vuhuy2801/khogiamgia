<?php
interface ProductService {
    public function Add(): bool;
    public function Edit(): bool;
    public function Delete(): bool;
    public function List(): array;
    public function Search(): array;
    public function GetProductWithPriceByLink(): array;
}
?>