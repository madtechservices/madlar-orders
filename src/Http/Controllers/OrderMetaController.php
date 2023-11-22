<?php

namespace TomatoPHP\TomatoOrders\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class OrderMetaController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoOrders\Models\OrderMeta::class;
    }

    /**
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'tomato-orders::order-metas.index',
            table: \TomatoPHP\TomatoOrders\Tables\OrderMetaTable::class
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: \TomatoPHP\TomatoOrders\Models\OrderMeta::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-orders::order-metas.create',
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoOrders\Models\OrderMeta::class,
            validation: [
                            'order_id' => 'required|exists:orders,id',
            'key' => 'required|max:255|string',
            'value' => 'nullable',
            'type' => 'nullable|max:255|string',
            'group' => 'nullable|max:255|string'
            ],
            message: __('OrderMeta updated successfully'),
            redirect: 'admin.order-metas.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoOrders\Models\OrderMeta $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoOrders\Models\OrderMeta $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-orders::order-metas.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoOrders\Models\OrderMeta $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoOrders\Models\OrderMeta $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-orders::order-metas.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoOrders\Models\OrderMeta $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoOrders\Models\OrderMeta $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                            'order_id' => 'sometimes|exists:orders,id',
            'key' => 'sometimes|max:255|string',
            'value' => 'nullable',
            'type' => 'nullable|max:255|string',
            'group' => 'nullable|max:255|string'
            ],
            message: __('OrderMeta updated successfully'),
            redirect: 'admin.order-metas.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoOrders\Models\OrderMeta $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoOrders\Models\OrderMeta $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('OrderMeta deleted successfully'),
            redirect: 'admin.order-metas.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
