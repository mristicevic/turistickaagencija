<?php
use App\Http\Controllers\TripController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Trip;
use App\Models\Catagory;
use App\Models\User;
use App\Models\ShopCart;
use App\Models\Processing;
use App\Http\Controllers\API\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// logovanje
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//vracanje korisnika
Route::get('/trips',function(){
    return Trip::all();
});

Route::get('/users',function(){
    return User::all();
});

//update , delete
Route::put('/products/{product}',function(Product $product){
    
    request()->validate([

        'title' => 'required'

    ]);
    
    $success = $product->update([
      
        'title' => request('title'),

    ]);

    return[ 
        'success' => $success
    ];
});

Route::put('/users/{user}',function(User $user){
    
    request()->validate([

        'email' => 'required'

    ]);
    
    $success = $product->update([
      
        'email' => request('email'),

    ]);

    return[ 
        'success' => $success
    ];
});


Route::delete('/products/{product}',function(Product $product){
    
    $success = $product->delete();

    return[ 
        'success' => $success
    ];
});



Route::delete('/users/{user}',function(User $user){
    
    $success = $user->delete();

    return[ 
        'success' => $success
    ];
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/trips', [TripController::class, 'allcarts']);
    Route::put('/trips/{id}', [TripController::class, 'update']);
    Route::delete('/trips/{id}', [TripController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

    
    
    
   

