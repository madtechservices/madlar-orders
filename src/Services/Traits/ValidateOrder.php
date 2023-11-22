<?php

namespace TomatoPHP\TomatoOrders\Services\Traits;

use Illuminate\Http\Request;

trait ValidateOrder
{
    private function validate(Request &$request,bool $edit = false): void
    {
        if($edit){
            $request->validate([
                'user_id' => 'nullable|exists:users,id',
                'country_id' => 'nullable|exists:countries,id',
                'area_id' => 'nullable|exists:areas,id',
                'city_id' => 'nullable|exists:cities,id',
                'address_id' => 'nullable|exists:locations,id',
                'account_id' => 'nullable|exists:accounts,id',
                'cashier_id' => 'nullable|exists:users,id',
                'coupon_id' => 'nullable|exists:coupons,id',
                'shipper_id' => 'nullable|exists:deliveries,id',
                'shipping_vendor_id' => 'nullable|exists:shipping_vendors,id',
                'branch_id' => 'nullable|exists:branches,id',
                'uuid' => 'sometimes|max:255|string|unique:orders,uuid,'.$this->order->id,
                'type' => 'nullable|max:255|string',
                'name' => 'nullable|max:255|string',
                'phone' => 'nullable|max:255',
                'flat' => 'nullable|max:255|string',
                'address' => 'nullable|max:65535',
                'source' => 'sometimes|max:255|string',
                'shipper_vendor' => 'nullable|max:255|string',
                'total' => 'nullable',
                'discount' => 'nullable',
                'shipping' => 'nullable',
                'vat' => 'nullable',
                'status' => 'nullable|max:255|string',
                'is_approved' => 'nullable',
                'is_closed' => 'nullable',
                'is_on_table' => 'nullable',
                'table' => 'nullable|max:255|string',
                'notes' => 'nullable|max:65535',
                'has_returns' => 'nullable',
                'return_total' => 'nullable',
                'reason' => 'nullable|max:255|string',
                'is_payed' => 'nullable',
                'payment_method' => 'nullable|max:255|string',
                'payment_vendor' => 'nullable|max:255|string',
                'payment_vendor_id' => 'nullable|max:255|string'
            ]);
        }
        else {
            $request->validate([
                'user_id' => 'nullable|exists:users,id',
                'country_id' => 'nullable|exists:countries,id',
                'area_id' => 'nullable|exists:areas,id',
                'city_id' => 'nullable|exists:cities,id',
                'address_id' => 'nullable|exists:locations,id',
                'account_id' => 'nullable|exists:accounts,id',
                'cashier_id' => 'nullable|exists:users,id',
                'coupon_id' => 'nullable|exists:coupons,id',
                'shipper_id' => 'nullable|exists:deliveries,id',
                'shipping_vendor_id' => 'nullable|exists:shipping_vendors,id',
                'branch_id' => 'nullable|exists:branches,id',
                'uuid' => 'required|max:255|string|unique:orders,uuid',
                'type' => 'nullable|max:255|string',
                'name' => 'nullable|max:255|string',
                'phone' => 'nullable|max:255',
                'flat' => 'nullable|max:255|string',
                'address' => 'nullable|max:65535',
                'source' => 'required|max:255|string',
                'shipper_vendor' => 'nullable|max:255|string',
                'total' => 'nullable',
                'discount' => 'nullable',
                'shipping' => 'nullable',
                'vat' => 'nullable',
                'status' => 'nullable|max:255|string',
                'is_approved' => 'nullable',
                'is_closed' => 'nullable',
                'is_on_table' => 'nullable',
                'table' => 'nullable|max:255|string',
                'notes' => 'nullable|max:65535',
                'has_returns' => 'nullable',
                'return_total' => 'nullable',
                'reason' => 'nullable|max:255|string',
                'is_payed' => 'nullable',
                'payment_method' => 'nullable|max:255|string',
                'payment_vendor' => 'nullable|max:255|string',
                'payment_vendor_id' => 'nullable|max:255|string'
            ]);
        }
    }
}
