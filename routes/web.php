<?php

use App\Http\Controllers\Auth\AdminHomeController;
use App\Http\Controllers\Auth\AdminListController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\BankController;
use App\Http\Controllers\Auth\CustomerManagerController;
use App\Http\Controllers\Auth\DistrictController;
use App\Http\Controllers\Auth\HouseController;
use App\Http\Controllers\Auth\LandController;
use App\Http\Controllers\Auth\NewsController;
use App\Http\Controllers\Auth\PermissionController;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\Auth\TypeOfNewsController;
use App\Http\Controllers\TestSubmit;
use App\Http\Controllers\UserController\ClientLoginController;
use App\Http\Controllers\UserController\ClientLogoutController;
use App\Http\Controllers\UserController\ClientRegisterController;
use App\Http\Controllers\UserController\CustomerController;
use App\Http\Controllers\UserController\ForgetPassController;
use App\Http\Controllers\UserController\DistrictClientController;
use App\Http\Controllers\UserController\HomeController;
use App\Http\Controllers\UserController\NewsClientController;
use App\Http\Controllers\UserController\HomeDetailController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

//front-end
Route::get('/', [
    HomeController::class, 'index'
])->name('home');

Route::get('home-list/{id}', [
    HomeController::class, 'homelist'
])->name('home-list');
Route::get('/land-list/{id}', [
    HomeController::class, 'landList'
])->name('land-list');

//detail
Route::get('/house-detail/{id}', [
    HomeDetailController::class, 'nhadat'
])->name('houseDetail');

//list
Route::get('/newsList', function() {
    return view('front-end.contents.news.news-list');
})->name('newsList');
Route::get('/tin-tuc-detail', function () {
    return view('front-end.contents.news.tin-tuc-detail');
})->name('newsDetail');

//client login, logout
Route::prefix('client')->group(function() {
    Route::get('/login', [
        ClientLoginController::class, 'index'
    ])->name('client.login.index');
    Route::post('/login', [
        ClientLoginController::class, 'store'
    ])->name('client.login.store');
    Route::post('/logout', [
        ClientLogoutController::class, 'store'
    ])->name('client.logout');
    Route::get('/register', [
        ClientRegisterController::class, 'index'
    ])->name('client.register.index');
    Route::post('/register', [
        ClientRegisterController::class, 'store'
    ])->name('client.register.store');
});

//client account manager
Route::prefix('account-manager')->group(function() {
    Route::get('/', [
        CustomerController::class, 'index'
    ])->name('account.index');

    Route::get('/edit', [
        CustomerController::class, 'edit'
    ])->name('account.info.edit');
    Route::post('/store', [
        CustomerController::class, 'update'
    ])->name('account.info.update');

        //forget pass
    Route::get('/forgetpassword', [
        ForgetPassController::class, 'forgetPass'
    ])->name('account.password.forget');
    Route::post('/forgetpassword', [
        ForgetPassController::class, 'forgetPassStore'
    ]);
    Route::get('/getpassword/{customer}/{token}', [
        ForgetPassController::class, 'getPass'
    ])->name('account.password.get');
    Route::post('/getpassword/{customer}/{token}', [
        ForgetPassController::class, 'getPassStore'
    ]);

        //change pass
    Route::get('/change-password', [
        forgetPassController::class, 'changePass'
    ])->name('account.password.edit');
    Route::post('/change-password', [
        forgetPassController::class, 'changePassStore'
    ])->name('account.pass.update');

    Route::get('/posted-news', [
        CustomerController::class, 'postedNews'
    ])->name('account.postedNews.index');
});

//Front-end bank-account
Route::get('/bankList', [
    NewsClientController::class, 'bankList'
])->name('bankList');

Route::post('client/getStates', [
    DistrictClientController::class, 'getDistricts'
])->name('client.getDistricts');

Route::post('client/getWards', [
    DistrictClientController::class, 'getWards'
])->name('client.getWards');

Route::prefix('news')->group(function(){
    Route::get('/create', [
        NewsClientController::class, 'create'
    ])->name('client.news.create');

    Route::post('/save-to-session', [
        NewsClientController::class, 'addToSession'
    ])->name('client.news.session');

    Route::post('/store', [
        NewsClientController::class, 'store'
    ])->name('client.news.store');

    Route::post('getFormType',[
        NewsClientController::class,'getLoaiHinhThuc'
    ])->name('client.getFormType');

    Route::post('getNewsPrice', [
        NewsClientController::class, 'getNewsPrice'
    ])->name('client.getNewsPrice');

    Route::post('getUnit', [
        NewsClientController::class, 'getDonVi'
    ])->name('client.getUnit');
});

Route::post('getStates', [DistrictController::class, 'getDistricts'])->name('getDistricts');

Route::post('getWards', [DistrictController::class, 'getWards'])->name('getWards');

//admin
Route::prefix('admin')->group(function () {
    //home
    Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('/', [AdminHomeController::class, 'index']);

    //auth
    //register
    Route::get('/register', [RegisterController::class, 'index'])->name('admin.register');
    Route::post('/register', [RegisterController::class, 'store']);

    //login
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'store']);

    //logout
    Route::post('/logout', [LogoutController::class, 'store'])->name('admin.logout');

    Route::prefix('management')->group(function() {
        //role
        Route::prefix('role')->group(function() {
            Route::get('/', [
                RoleController::class, 'index'
            ])->name('admin.role.index');
            Route::get('/{id_role}&{id_permission}', [
                RoleController::class, 'removePermission'
            ])->name('admin.role.removePermission');
            Route::post('/update/{id_role}', [
                RoleController::class, 'updateMultiplePermissions'
            ])->name('admin.role.updatePermissions');
            Route::get('/add', [
                RoleController::class, 'add'
            ])->name('admin.role.add');
            Route::post('store', [
                RoleController::class, 'store'
            ])->name('admin.role.store');
        });

        //permission
        Route::prefix('permission')->group(function() {
            Route::get('/', [
                PermissionController::class, 'index'
            ])->name('admin.permission.index');
            Route::get('/add', [
                PermissionController::class, 'add'
            ])->name('admin.permission.add');
            Route::post('/store', [
                PermissionController::class, 'store'
            ])->name('admin.permission.store');
        });

        Route::prefix('staff_management')->group(function (){
            Route::get('/', [
                AdminListController::class, 'index'
            ])->name('admin.adminList.index');
            Route::get('/add', [
                AdminListController::class, 'add'
            ])->name('admin.adminList.add');
            Route::post('/store', [
                AdminListController::class, 'store'
            ])->name('admin.adminList.store');
            Route::get('/edit/{id}', [
                AdminListController::class, 'edit'
            ])->name('admin.adminList.edit');
            Route::post('/update/{id}', [
                AdminListController::class, 'update'
            ])->name('admin.adminList.update');
            Route::get('/delete/{id}', [
                AdminListController::class, 'delete'
            ])->name('admin.adminList.delete');
        });
    });

    //bank
    Route::prefix('bank')->group(function () {
        Route::get('/', [
            BankController::class, 'index'
        ])->name('admin.bank.index');

        Route::get('/create', [
            BankController::class, 'create'
        ])->name('admin.bank.create');

        Route::post('/store', [
            BankController::class, 'store'
        ])->name('admin.bank.store');

        Route::get('/edit/{id}', [
            BankController::class, 'edit'
        ])->name('admin.bank.edit');

        Route::post('/update/{id}', [
            BankController::class, 'update'
        ])->name('admin.bank.update');

        Route::get('/delete/{id}', [
            BankController::class, 'delete'
        ])->name('admin.bank.delete');
    });


    //estate
    Route::prefix('estate')->group(function () {
        //house
        Route::prefix(('house'))->group(function () {
            Route::get('/', [
                HouseController::class, 'index'
            ])->name('admin.house.index');

            Route::get('/house_detail/{id}', [
                HouseController::class, 'detail'
            ])->name('admin.house.detail');

            Route::get('/create', [
                HouseController::class, 'create'
            ])->name(('admin.house.create'));

            Route::post('/store', [
                HouseController::class, 'store'
            ])->name('admin.house.store');

            Route::get('/edit/{id}', [
                HouseController::class, 'edit'
            ])->name('admin.house.edit');

            Route::post('/update/{id}', [
                HouseController::class, 'update'
            ])->name('admin.house.update');

            Route::get('/delete/{id}', [
                HouseController::class, 'delete'
            ])->name('admin.house.delete');
        });

        //land
        Route::prefix('land')->group(function () {
            Route::get('/', [
                LandController::class, 'index'
            ])->name('admin.land.index');

            Route::get('/land_detail/{id}', [
                LandController::class, 'detail'
            ])->name('admin.land.detail');

            Route::get('/create', [
                LandController::class, 'create'
            ])->name(('admin.land.create'));

            Route::post('/store', [
                LandController::class, 'store'
            ])->name('admin.land.store');

            Route::get('/edit/{id}', [
                LandController::class, 'edit'
            ])->name('admin.land.edit');

            Route::post('/update/{id}', [
                LandController::class, 'update'
            ])->name('admin.land.update');

            Route::get('/delete/{id}', [
                LandController::class, 'delete'
            ])->name('admin.land.delete');
        });
    });

    //news
    Route::prefix('estate_news')->group(function () {
        Route::prefix('typeOfNews')->group(function () {
            Route::get('/', [
                TypeOfNewsController::class, 'index'
            ])->name('admin.typeOfNews.index');

            Route::get('/create', [
                TypeOfNewsController::class, 'create'
            ])->name('admin.typeOfNews.create');

            Route::post('/create', [
                TypeOfNewsController::class, 'store'
            ])->name('admin.typeOfNews.store');

            Route::get('/edit/{newsType}', [
                TypeOfNewsController::class, 'edit'
            ])->name('admin.typeOfNews.edit');

            Route::post('/update/{newsType}', [
                TypeOfNewsController::class, 'update'
            ])->name('admin.typeOfNews.update');
        });

        Route::prefix('news')->group(function () {
            Route::get('/', [
                NewsController::class, 'index'
            ])->name('admin.news.index');

            Route::get('/create/{id}', [
                NewsController::class, 'create'
            ])->name('admin.news.create');

            Route::post('/store/{id_cus}', [
                NewsController::class, 'store'
            ])->name('admin.news.store');

            Route::get('/edit/{id}&{id_cus}', [
                NewsController::class, 'edit'
            ])->name('admin.news.edit');

            Route::post('/update/{id}', [
                NewsController::class, 'update'
            ])->name('admin.news.update');

            Route::get('/delete/{id}', [
                NewsController::class, 'delete'
            ])->name('admin.news.delete');

            Route::post('getFormType',[
                NewsController::class,'getLoaiHinhThuc'
            ])->name('admin.getFormType');

            Route::post('getNewsPrice', [
                NewsController::class, 'getNewsPrice'
            ])->name('admin.getNewsPrice');

            Route::post('getUnit', [
                NewsController::class, 'getDonVi'
            ])->name('admin.getUnit');

            Route::get('/detail/{id}', [
                NewsController::class, 'detail'
            ])->name('admin.news.detail');

            Route::post('/verify/{id}', [
                NewsController::class, 'verify'
            ])->name('admin.news.verify');
        });
    });

    //customer
    Route::prefix('customer_manager')->group(function () {
        Route::get('/', [
            CustomerManagerController::class, 'index'
        ])->name('admin.customer.index');

        Route::get('/detail/{id}', [
            CustomerManagerController::class, 'detail'
        ])->name('admin.customer.detail');

        Route::get('/edit/{id}', [
            CustomerManagerController::class, 'edit'
        ])->name('admin.customer.edit');

        Route::post('/update/{id}', [
            CustomerManagerController::class, 'update'
        ])->name('admin.customer.update');

        Route::get('/create', [
            CustomerManagerController::class, 'create'
        ])->name('admin.customer.create');

        Route::post('/store', [
            CustomerManagerController::class, 'store'
        ])->name('admin.customer.store');

        Route::post('/verify/{id}', [
            CustomerManagerController::class, 'verify'
        ])->name('admin.customer.verify');

        Route::get('/delete/{id}', [
            CustomerManagerController::class, 'delete'
        ])->name('admin.customer.delete');
    });
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/testSubmit', [
    TestSubmit::class, 'index'
])->name('test.index');

Route::post('/testSubmit', [
    TestSubmit::class, 'submit'
])->name('test.post');

Route::get('/showNoti', function() {
    return view('showNoti');
});
