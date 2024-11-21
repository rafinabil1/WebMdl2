<?php

namespace App\Routes;

include "Controller/ProductController.php";

use App\Controller\ProductController;

class ProductRoutes
{
    public function handle($method, $path)
    {
        // Jika request method GET dan path sama dengan '/api/product'
        if ($method == "GET" && $path == '/api/product') {
            $controller = new ProductController();
            echo json_encode($controller->index());
            return;
        }

        // Jika request method GET dan path sama dengan '/api/product/{id}'
        if ($method == "GET" && strpos($path, "/api/product/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new ProductController();
            echo json_encode($controller->getById($id));
            return;
        }

        // Jika request method POST dan path sama dengan '/api/product'
        if ($method == "POST" && $path == "/api/product") {
            $controller = new ProductController();
            echo json_encode($controller->insert());
            return;
        }

        // Jika request method PUT dan path sama dengan '/api/product/{id}'
        if ($method == "PUT" && strpos($path, "/api/product/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new ProductController();
            echo json_encode($controller->update($id));
            return;
        }

        // Jika request method DELETE dan path sama dengan '/api/product/{id}'
        if ($method == "DELETE" && strpos($path, "/api/product/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new ProductController();
            echo json_encode($controller->delete($id));
            return;
        }

        // Jika tidak ada route yang cocok, beri respon 404
        http_response_code(404);
        echo json_encode(["error" => "Not Found"]);
    }
}
