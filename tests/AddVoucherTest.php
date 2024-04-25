<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use PDOException;
use PHPUnit\Framework\TestCase;
use RuntimeException;


class AddVoucherTest extends TestCase
{
    // Test case when adding a null voucher should throw InvalidArgumentException
    public function testAddNullVoucherThrowsException()
    {
        $this->expectException(InvalidArgumentException::class);

        $voucherModel = new \Voucher();

        $voucherModel->addVoucher(null);
    }

    // Test case when adding a voucher with expiration date before creation date should throw InvalidArgumentException
    public function testAddVoucherWithInvalidDatesThrowsException()
    {
        $this->expectException(InvalidArgumentException::class);

        $voucherModel = new \Voucher();

        $voucher = new \Voucher();
        $voucher->setExpiresAt('2022-01-01');
        $voucher->setExpressAt('2022-01-02');

        $voucherModel->addVoucher($voucher);
    }

    // Test case when adding a voucher with an existing voucher ID should throw RuntimeException
    public function testAddVoucherWithExistingIdThrowsException()
    {
        $this->expectException(RuntimeException::class);

        $voucherModel = new \Voucher();

        $voucher = new \Voucher();
        $voucher->setVoucherId('SPPBAYTET123');
        $voucher->setExpressAt('2024-01-02');
        $voucher->setExpiresAt('2024-01-04');

        $voucherModel->addVoucher($voucher);
    }

    // Test case for successful addition of a voucher
    public function testAddValidVoucherReturnsTrue()
    {
        $voucherModel = new \Voucher();

        $voucher = new \Voucher();
        $voucher->setVoucherId('VCAWLOIJ24');
        $voucher->setVoucherName('20k');
        $voucher->setQuantity(99);
        $voucher->setMinimumDiscount('500k');
        $voucher->setConditionsOfUse('mã giảm giá chỉ sử dụng 1 lần');
        $voucher->setExpressAt('2024-01-02');
        $voucher->setExpiresAt('2024-01-04');
        $voucher->setCategoryId(3);
        $voucher->setCreatedAt('2024-03-25 10:00:00');
        $voucher->setUpdatedAt('2024-03-25 10:00:00');
        $voucher->setIsTrend(1);
        $voucher->setSupplierId(1);
        $voucher->setStatus(1);
        $voucher->setAddress_target('https://shopee.vn/M%E1%BA%B7t-n%E1%BA%A1-d%C6%B0%E1%BB%A1ng-da-Vita-Genic-Jelly-Mask-BANOBAGI-30ml-H%E1%BB%99p-10-mi%E1%BA%BFng-i.512108408.19086750529?utm_campaign=-&utm_content=PING----&utm_medium=affiliates&utm_source=an_17383630066&utm_term=akam4vpvakoh');
        $voucher->setDiscountType(3);
        $voucher->setMaximunDiscount('20k');
        $voucher->setIs_inWallet(1);

        $result = $voucherModel->addVoucher($voucher);

        $this->assertTrue($result);
    }
}
