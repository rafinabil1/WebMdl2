<?php

namespace App\Controller;

include "Traits/ApiResponseFormatter.php";
include "Models/Product.php";

use App\Models\Product;
use App\Traits\ApiResponseFormatter;

class ProductController
{
    use ApiResponseFormatter;

    public function index()
    {
        $productModel = new Product();
        $response = $productModel->findAll();

        if ($response === null) {
            return $this->apiResponse(404, "Products not found", null);
        }

        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        $productModel = new Product();
        $response = $productModel->findById($id);

        if ($response === null) {
            return $this->apiResponse(404, "Product not found", null);
        }

        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        if (json_last_error() || !isset($inputData['product_name'])) {
            return $this->apiResponse(480, "Error: invalid input", null);
        }

        $productModel = new Product();
        $response = $productModel->create([
            "product_name" => $inputData['product_name']
        ]);

        if ($response === null) {
            return $this->apiResponse(500, "Failed to insert product", null);
        }

        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        if (json_last_error() || !isset($inputData['product_name'])) {
            return $this->apiResponse(480, "Error: invalid input", null);
        }

        $productModel = new Product();
        $response = $productModel->update([
            "product_name" => $inputData['product_name']
        ], $id);

        if ($response === null) {
            return $this->apiResponse(500, "Failed to update product", null);
        }

        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id)
    {
        $productModel = new Product();
        $response = $productModel->delete($id);

        if ($response === null) {
            return $this->apiResponse(500, "Failed to delete product", null);
        }

        return $this->apiResponse(200, "success", $response);
    }
}
