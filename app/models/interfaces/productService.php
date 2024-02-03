<?php
interface ProductService
{
    public function Add(): bool;
    public function Edit(): bool;
    public function Delete(): bool;
    public function List(): array;
    public function ListAdmin($offSet, $limit): array;
    public function Detail($productId);
}
