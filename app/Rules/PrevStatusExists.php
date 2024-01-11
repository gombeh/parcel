<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\OrderStatus;
use App\Enums\OrderStatusEnum;

class PrevStatusExists implements ValidationRule
{
    /**
     * @param string $order_id
     */
    public function __construct(private string $order_id) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
         $statusExists = OrderStatus::where([
                'order_id' => $this->order_id,
                'name' => OrderStatusEnum::prevValue($value),
            ])
            ->exists();

        if(!$statusExists)
        {
            $fail("the prev status not exists in databse");
        }
    }
}
