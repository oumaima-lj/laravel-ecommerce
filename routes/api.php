use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductApiController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'user']);

    Route::apiResource('products', ProductApiController::class);

    Route::get('products/featured', [ProductApiController::class, 'featured']);
    Route::get('products/latest', [ProductApiController::class, 'latest']);
});
