<?php

namespace TomatoPHP\TomatoOrders\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class CompanyController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoOrders\Models\Company::class;
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
            view: 'tomato-orders::companies.index',
            table: \TomatoPHP\TomatoOrders\Tables\CompanyTable::class
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
            model: \TomatoPHP\TomatoOrders\Models\Company::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-orders::companies.create',
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
            model: \TomatoPHP\TomatoOrders\Models\Company::class,
            validation: [
                'logo' => 'nullable|image|max:1024',
                'country_id' => 'nullable|exists:countries,id',
                'name' => 'required|max:255|string',
                'ceo' => 'nullable|max:255|string',
                'address' => 'nullable|max:255|string',
                'city' => 'nullable|max:255|string',
                'zip' => 'nullable|max:255|string',
                'registration_number' => 'nullable|max:255|string',
                'tax_number' => 'nullable|max:255|string',
                'email' => 'nullable|max:255|string|email',
                'phone' => 'nullable|max:255|min:12',
                'website' => 'nullable|max:255|string',
                'notes' => 'nullable|max:65535'
            ],
            message: __('Company updated successfully'),
            redirect: 'admin.companies.index',
            hasMedia: true,
            collection: [
                'logo' =>false
            ]
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoOrders\Models\Company $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoOrders\Models\Company $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-orders::companies.show',
            hasMedia: true,
            collection: [
                'logo' =>false
            ]
        );
    }

    /**
     * @param \TomatoPHP\TomatoOrders\Models\Company $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoOrders\Models\Company $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-orders::companies.edit',
            hasMedia: true,
            collection: [
                'logo' =>false
            ]
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoOrders\Models\Company $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoOrders\Models\Company $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'logo' => 'nullable|image|max:1024',
                'country_id' => 'nullable|exists:countries,id',
                'name' => 'sometimes|max:255|string',
                'ceo' => 'nullable|max:255|string',
                'address' => 'nullable|max:255|string',
                'city' => 'nullable|max:255|string',
                'zip' => 'nullable|max:255|string',
                'registration_number' => 'nullable|max:255|string',
                'tax_number' => 'nullable|max:255|string',
                'email' => 'nullable|max:255|string|email',
                'phone' => 'nullable|max:255|min:12',
                'website' => 'nullable|max:255|string',
                'notes' => 'nullable|max:65535'
            ],
            message: __('Company updated successfully'),
            redirect: 'admin.companies.index',
            hasMedia: true,
            collection: [
                'logo' =>false
            ]
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoOrders\Models\Company $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoOrders\Models\Company $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Company deleted successfully'),
            redirect: 'admin.companies.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
