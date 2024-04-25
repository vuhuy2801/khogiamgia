<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use PDOException;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Voucher;

class DeleteVoucherTest extends TestCase
{
    private $voucherModel;

    protected function setUp(): void
    {
        // Assuming VoucherModel has a constructor that initializes the db property
        $this->voucherModel = new Voucher();
    }

    // Test case when deleting a null voucher should throw InvalidArgumentException
    public function testDeleteNullVoucherThrowsException()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->voucherModel->deleteVoucher(null);
    }


    // Test case when deleting a voucher with an existing voucher ID should throw RuntimeException
    public function testDeleteVoucherWithExistingIdThrowsException()
    {
        $this->expectException(RuntimeException::class);

        $this->voucherModel->deleteVoucher("SPPBAYTET2003");
    }


    public function testDeleteVoucher(): void
    {
        $voucherId = 'VCAWLOIJ24';

        $result = $this->voucherModel->deleteVoucher($voucherId);

        $this->assertTrue($result, "Voucher was not deleted successfully.");
    }
}
