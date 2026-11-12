

<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
 
use Illuminate\Support\Facades\Route;
//===========================
// sigle route /static route
//===========================
Route::get('/', function () {
    return view('welcome');
});
Route::get('/product/list', function () {
    return view('product/products');
});
Route::get('/product/about', function () {
    return view('product/about');
});

//=================================
// route parameter / dynamic route
//=================================

Route::get('/product/{qty}/{price}',
    function(int $qty, int $price){
        return "Product id : " . $qty * $price;
});
//===============================================
// ============ Route + data + views ============
//===============================================
Route::get('/product/list', function () {
    $product = [
        "id" => 1,
        "name" => "Iphone 14",
        "price" => 1000,
        "qty" => 10,
        "image" => "https://i.pinimg.com/1200x/a8/a4/f8/a8a4f8095c42cd7b8ca1c957c8efb3ad.jpg",
        'description' => "The iPhone 14 is a smartphone designed, developed, and marketed by Apple Inc. It"
    ];

    return view('product/products', compact('product'));
});

// =======================
// HTTP Methods
// =======================
    
    Route::get('/get', function(){
        return "Show Data";
    });
    
    Route::post("/post", function(){
        return "Create Data /Update Data (optional)";
    });
    
    Route::put("/put", function(){
        return "Update Date 1 object";
    });
    
    Route::patch("/patch", function(){
        return "Update Data 1 part of object";
    });
    
    Route::delete("/delete", function(){
        return "Delete Data 1 object";
    });



*/


// Route::get('/product', [ProductController::class, 'index']);



// Route::get('/', function(){
//       // return redirect('/user/index'); // use url for redirect
//       return redirect()->route('home'); // use route name instance of base url
//   });
  
//   Route::get('/user/index', function(){
//       return view('user.index');
//   })->name('home');
  
//   Route::get('/user/about', function(){
//       return view('user.about');
//   })->name('about');
  
//   Route::get('/user/contact', function(){
//       return view('user.contact');
//   })->name('contact');



 
 
 // ==========================================
 // Route + prefix + name + Controller + group
 // ==========================================
 
 Route::get('/', function () {
     return redirect()->route('product.index');
 });
 
 // Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
 // Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
 // Route::get('/product/show', [ProductController::class, 'show'])->name('product.show');
 // Route::get('/product/edit', [ProductController::class, 'edit'])->name('product.edit');
 
 Route::prefix('/product')->name('product.')->controller(ProductController::class)->group(function(){
     Route::get('/index', 'index')->name('index');
     Route::get('/show', 'show')->name('show');
     Route::get('/create', 'create')->name('create');
     Route::get('/edit', 'edit')->name('edit');
 });
//----------------
// category
//---------------
Route::prefix('/category')->name('category.')->controller(CategoryController::class)->group(function(){
    Route::get('/index', 'index')->name('index');
});
//  Route::get('/category/index',function(){
//     return view('category.index');
//  });




