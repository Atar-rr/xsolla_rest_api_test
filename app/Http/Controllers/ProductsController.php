<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidationException;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductIndexRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Service\ProductCreateService;
use App\Service\ProductService;
use App\Service\ProductUpdateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ProductIndexRequest $request
     * @param ProductService $productService
     * @return ProductCollection
     */
    public function index(ProductIndexRequest $request, ProductService $productService): ProductCollection
    {
        [$products, $total] = $productService->getList($request->getDto());

        return (new ProductCollection($products, $total));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductCreateRequest $request
     * @param ProductCreateService $createService
     *
     * @return JsonResponse
     */
    public function store(ProductCreateRequest $request, ProductCreateService $createService): JsonResponse
    {
        try {
            $productId = $createService->create($request->getDto());
        } catch (\Exception $e) {
            return response()
                ->json(['error' => ['message' => $e->getMessage()]], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['data' => ['id' => $productId]], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return ProductResource
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest $request
     * @param ProductUpdateService $productUpdateService
     * @param \App\Models\Product $product
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(
        ProductUpdateRequest $request,
        ProductUpdateService $productUpdateService,
        Product $product
    ): JsonResponse {
        try {
           $productId = $productUpdateService->update($request->getDto(), $product);
        } catch (ValidationException $e) {
            return response()
                ->json(['error' => ['message' => $e->getMessage()]], Response::HTTP_BAD_REQUEST);
        }

        return response()
            ->json(['data' => ['id' => $productId], 'message' => 'Товар успешно обновлен'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()
            ->json(['message' => 'Товар успешно удален'], Response::HTTP_OK);
    }
}
