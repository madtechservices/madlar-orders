<?php

namespace TomatoPHP\TomatoOrders\Services\Traits;

use Illuminate\Http\Request;
use TomatoPHP\TomatoOrders\Models\Order;

trait UpdateOrder
{
    public function update(Request $request): Order
    {
        $this->handleRequest($request);
        $this->validate($request, true);
        $this->order->update($request->all());
        $this->syncItems($request, true);
        $this->syncMeta($request);

        $this->log(__("Order Has Been Updated"));

        return $this->order;
    }
}
