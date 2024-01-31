<?php

namespace App\Services\ItemsTypes;

use App\Enums\CurrencyTypeEnum;
use App\Models\Billing;
use Brick\Money\Money;

class StorageItem implements InvoiceItemI{

    public function __construct(protected Billing $billing)
    {

    }

    /**
     * Calculate Total For a Billing
     *
     * @return string
     */
    public function calculateTotal(): string
    {
        return Money::of($this->billing->service->cost ?? 0, CurrencyTypeEnum::USD)->plus($this->billing->quantity ?? 0)->getAmount();
    }
}