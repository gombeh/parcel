<?php
  
namespace App\Enums;
 
enum OrderStatusEnum:string {
    case REGISTER_ORDER = 'register_order';
    case POPULATE = 'populate';
    case PROCCESS_IN_HUB = 'proccess_in_hub';
    case DISTRIBUTE = 'distribute';
    case DELIVERED = 'delivered';
}