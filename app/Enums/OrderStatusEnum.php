<?php
  
namespace App\Enums;
 
enum OrderStatusEnum:string {
    case REGISTER_ORDER = 'register_order';
    case POPULATE = 'populate';
    case PROCCESS_IN_HUB = 'proccess_in_hub';
    case DISTRIBUTE = 'distribute';
    case DELIVERED = 'delivered';


    public static function prevValue(string $case): string
    {
        $cases = self::cases();
        $index = array_search($case, array_column($cases, 'value')) ?? 0;
        $prevIndex = $index > 0 ? --$index :0;
        return $cases[$prevIndex]->value;
    }
}