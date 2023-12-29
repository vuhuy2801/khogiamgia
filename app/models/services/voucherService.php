<?php
interface VoucherService {
    public function Add(): bool;
    public function Edit(): bool;
    public function Delete(): bool;
    public function List(): array;
    public function GetTrendingVouchers(): array;
    public function GetVouchersBySupplierId(): array;
    public function GetVouchersByCategoryId(): array;
    public function SearchVoucherAndDiscountByKeyword(): array;
}
?>