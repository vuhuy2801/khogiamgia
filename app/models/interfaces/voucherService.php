<?php
interface VoucherService
{
    public function addVoucher(Voucher $voucher): bool;
    public function updateVoucher(Voucher $voucher): bool;
    public function deleteVoucher($voucherId): bool;
    public function getListVoucherByAdmin(): array;
    public function getListVoucherByUser(): array;
    public function getVoucherDetail($voucherId);
    public function getListVoucherBySupplier($idSupplier): array;
    public function getVouchersByCategoryId($category, $supplierId): array;
    public function SearchVoucherByKeyword(): array;
}
