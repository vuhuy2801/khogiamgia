<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use PDOException;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Voucher;

class getVoucherDetailTest extends TestCase
{
    private $voucherModel;

    protected function setUp(): void
    {
        // Assuming VoucherModel has a constructor that initializes the db property
        $this->voucherModel = new Voucher();
    }

    public function testGetVoucherDetail(): void
    {
        $voucherId = 1; // replace with a valid voucher ID

        $result = $this->voucherModel->getVoucherDetail($voucherId);

        // Check that the result is an associative array with the expected keys
        $this->assertIsArray($result);
        $this->assertArrayHasKey('voucherId', $result);
        $this->assertArrayHasKey('voucherName', $result);
        $this->assertArrayHasKey('supplierId', $result);
        $this->assertArrayHasKey('expiresAt', $result);
        $this->assertArrayHasKey('discountType', $result);
        $this->assertArrayHasKey('maximumDiscount', $result);
        $this->assertArrayHasKey('minimumDiscount', $result);
        $this->assertArrayHasKey('quantity', $result);
        $this->assertArrayHasKey('categoryId', $result);
        $this->assertArrayHasKey('conditionsOfUse', $result);
        $this->assertArrayHasKey('address_target', $result);
        $this->assertArrayHasKey('is_inWallet', $result);
    }

    public function testGetVoucherDetailWithEmptyId(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("VoucherId empty or null.");

        $this->voucherModel->getVoucherDetail(null);
    }

    public function testGetVoucherDetailWithNonExistingId(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("VoucherId does not exist in the database.");

        $this->voucherModel->getVoucherDetail("non-existing-id");
    }
}
