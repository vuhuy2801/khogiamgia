<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use PDOException;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Voucher;

class GetListVoucherByUserTest extends TestCase
{
    private $voucherModel;

    protected function setUp(): void
    {
        // Assuming VoucherModel has a constructor that initializes the db property
        $this->voucherModel = new Voucher();
    }

    public function testGetListVoucherByUser(): void
    {
        $result = $this->voucherModel->getListVoucherByUser();

        // Check that the result is an array
        $this->assertIsArray($result);

        // Check that each item in the array is an associative array with the expected keys
        foreach ($result as $item) {
            $this->assertIsArray($item);
            $this->assertArrayHasKey('voucherId', $item);
            $this->assertArrayHasKey('voucherName', $item);
            $this->assertArrayHasKey('supplierId', $item);
            $this->assertArrayHasKey('expiresAt', $item);
            $this->assertArrayHasKey('discountType', $item);
            $this->assertArrayHasKey('maximumDiscount', $item);
            $this->assertArrayHasKey('minimumDiscount', $item);
            $this->assertArrayHasKey('quantity', $item);
            $this->assertArrayHasKey('categoryId', $item);
            $this->assertArrayHasKey('conditionsOfUse', $item);
            $this->assertArrayHasKey('address_target', $item);
            $this->assertArrayHasKey('is_inWallet', $item);
        }
    }
}
