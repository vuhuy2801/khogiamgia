<?php
interface UsedService
{
    public function addUsed($voucherId, $usedCount);
    public function updateUsed($voucherId, $usedCount);

    public function getUsedByVoucherId($voucherId);

    public function isExistUsed($voucherId);
    public function List(): array;
}
