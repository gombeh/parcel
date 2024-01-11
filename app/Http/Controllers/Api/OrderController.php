<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Order\Create as CreateRequest;
use App\Http\Requests\Order\UpdateStatus as UpdateStatusRequest;
use App\Models\Order;
use App\Models\Customer;
use App\Http\Resources\OrderResource;
use DB;
use Throwable;
use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;



class OrderController extends Controller
{

    /**
     * @param  Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request):AnonymousResourceCollection
    {
        $orders = Order::with("sender", "receiver")
        ->when($request->input('order_id'), function(Builder $builder, $order_id) {
            $builder->whereKey($order_id);
        })
        ->when($request->input('status'), function(Builder $builder, $status) {
            $builder->where('status', $status);
        })
        ->latest()
        ->paginate();

        return OrderResource::collection($orders);
    }

    public function show(Order $order):OrderResource
    {
        $order->load('sender', 'receiver', 'parcels');
        return OrderResource::make($order);
    }

    /**
     * @param  OrderCreate $request
     * @return OrderResource
     */
    public function store(CreateRequest $request):OrderResource 
    {
        DB::beginTransaction();
        try {
            $sender = Customer::create($request->input('sender'));
            $receiver = Customer::create($request->input('receiver'));

            $order = Order::create([
                'sender_id' => $sender->id,
                'receiver_id' => $receiver->id,
            ]);

            $order->parcels()->createMany($request->input('parcels'));
            $order->load('parcels');
            DB::commit();
            
            return OrderResource::make($order);
        } catch(Throwable $exception) {
            DB::rollBack();
            throw new \Exception($exception->getMessage() . ' line ' . $exception->getLine());
        }
     }

     /**
      * @param  UpdateStatusRequest $
      * @return OrderResource
      */
     public function updateStatus(UpdateStatusRequest $request, Order $order) :OrderResource
     {
        $name = OrderStatusEnum::from($request->input('name'));
        $order->statuses()->create(['name' => $name]);
        $order->update(['status' => $name]);
        return OrderResource::make($order);
    }
}
