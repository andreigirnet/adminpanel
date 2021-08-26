<?php
use App\Http\Controllers\admin\CartController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PermissionsController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CartCategoryController;
use App\Models\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostsController;

//admin routes only here

    //Search Route
    Route::prefix('admin')->
    middleware('auth','HasPermission')->namespace('Admin')->
    group(function(){
        Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');

        Route::get('/search', function(){
            $posts = Posts::latest();
            if(request('search')){
                     $posts
                      ->where('title','like','%'.request('search').'%')
                      ->orWhere('content','like','%'.request('search').'%');
            }

            return view('admin.posts.search.index',[
                'posts' => $posts->get()
            ]);
        })->name('search.index');
//Endsearch route

     Route::get('/posts', [PostsController::class,'index'])->name('posts.index');
     Route::get('posts/create',[PostsController::class,'create'])->name('posts.create');
     Route::post('posts/store',[PostsController::class,'store'])->name('posts.store');
     //Update, Destroy
     Route::get('posts/{post}/edit',[PostsController::class,'edit'])->name('posts.edit');
     Route::patch('posts/{post}/update',[PostsController::class,'update'])->name('posts.update');
     Route::delete('posts/{post}/destroy',[PostsController::class,'destroy'])->name('posts.destroy');
//    Route::resource('posts', PostsController::class);
    //Route::resource('category', CategoryController::class);

    //Categories routes
   Route::get('/categories', [CategoryController::class,'index'])->name('category.index');
   Route::get('/categories/create', [CategoryController::class,'create'])->name('category.create');
   Route::post('/categories/store', [CategoryController::class,'store'])->name('category.store');
   Route::get('/categories/{category}/edit', [CategoryController::class,'edit'])->name('category.edit');
   Route::patch('/categories/{category}/update', [CategoryController::class,'update'])->name('category.update');
   Route::delete('/categories/{category}/destroy', [CategoryController::class,'destroy'])->name('category.destroy');
    //users routes
    Route::get('/users', [UserController::class,'index'])->name('users.index');
    Route::get('/users/create', [UserController::class,'create'])->name('users.create');
    Route::post('/users/store', [UserController::class,'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class,'edit'])->name('users.edit');
    Route::patch('/users/{user}/update', [UserController::class,'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');
   //Roles routes

    Route::get('/roles', [RolesController::class,'index'])->name('roles.index');
   Route::get('/roles/create', [RolesController::class,'create'])->name('roles.create');
   Route::post('/roles/store', [RolesController::class,'store'])->name('roles.store');
   Route::get('/roles/{role}/edit', [RolesController::class,'edit'])->name('roles.edit');
   Route::patch('/roles/{role}/update', [RolesController::class,'update'])->name('roles.update');
   Route::delete('/roles/{role}/destroy', [RolesController::class,'destroy'])->name('roles.destroy');

   //Permissions routes

    Route::get('/permissions', [PermissionsController::class,'index'])->name('permissions.index');
   Route::get('/permissions/create', [PermissionsController::class,'create'])->name('permissions.create');
   Route::post('/permissions/store', [PermissionsController::class,'store'])->name('permissions.store');
   Route::get('/permissions/{permissions}/edit', [PermissionsController::class,'edit'])->name('permissions.edit');
   Route::patch('/permissions/{permissions}/update', [PermissionsController::class,'update'])->name('permissions.update');
   Route::delete('/permissions/{permissions}/destroy', [PermissionsController::class,'destroy'])->name('permissions.destroy');

    //Cart routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/create',[CartController::class, 'create'])->name('cart.create');
    Route::post('cart/store',[CartController::class, 'store'])->name('cart.store');
    Route::get('cart/{cart}/edit',[CartController::class,'edit'])->name('cart.edit');
    Route::patch('cart/{cart}/update',[CartController::class, 'update'])->name('cart.update');
    Route::delete('cart/{cart}/destroy',[CartController::class,'destroy'])->name('cart.destroy');

    //CartCategory
    Route::get('/category', [CartCategoryController::class, 'index'])->name('cart_category.index');
    Route::get('/category/create',[CartCategoryController::class, 'create'])->name('cart_category.create');
    Route::post('/category/store',[CartCategoryController::class, 'store'])->name('cart_category.store');
    Route::get('/category/{cart_category}/edit',[CartCategoryController::class,'edit'])->name('cart_category.edit');
    Route::patch('/category/{cart_category}/update',[CartCategoryController::class, 'update'])->name('cart_category.update');
    Route::delete('/category/{cart_category}/destroy',[CartCategoryController::class,'destroy'])->name('cart_category.destroy');
    });
