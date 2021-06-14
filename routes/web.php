<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\GalleryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

//category

Route::get('/categories', [CategoryController::class, 'Index'])->name('categories');

Route::get('/add/category', [CategoryController::class, 'AddCategory'])->name('add.category');

Route::post('/store/category', [CategoryController::class, 'StoreCategory'])->name('store.category');

Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');

Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');

Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');

//subcategory

Route::get('/subcategories', [SubCategoryController::class, 'Index'])->name('subcategories');

Route::get('/add/subcategory', [SubCategoryController::class, 'AddSubCategory'])->name('add.subcategory');

Route::post('/store/subcategory', [SubCategoryController::class, 'StoreSubCategory'])->name('store.subcategory');

Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'EditSubCategory'])->name('edit.subcategory');

Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');

Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');

//district

Route::get('/district', [DistrictController::class, 'Index'])->name('district');

Route::get('/add/district', [DistrictController::class, 'AddDistrict'])->name('add.district');

Route::post('/store/district', [DistrictController::class, 'StoreDistrict'])->name('store.district');

Route::get('/edit/district/{id}', [DistrictController::class, 'EditDistrict'])->name('edit.district');

Route::post('/update/district/{id}', [DistrictController::class, 'UpdateDistrict'])->name('update.district');

Route::get('/delete/district/{id}', [DistrictController::class, 'DeleteDistrict'])->name('delete.district');

//subdistrict

Route::get('/subdistrict', [SubDistrictController::class, 'Index'])->name('subdistrict');

Route::get('/add/subdistrict', [SubDistrictController::class, 'AddSubDistrict'])->name('add.subdistrict');

Route::post('/store/subdistrict', [SubDistrictController::class, 'StoreSubDistrict'])->name('store.subdistrict');

Route::get('/edit/subdistrict/{id}', [SubDistrictController::class, 'EditSubDistrict'])->name('edit.subdistrict');

Route::post('/update/subdistrict/{id}', [SubDistrictController::class, 'UpdateSubDistrict'])->name('update.subdistrict');

Route::get('/delete/subdistrict/{id}', [SubDistrictController::class, 'DeleteSubDistrict'])->name('delete.subdistrict');

//post
Route::get('/allpost', [PostController::class, 'index'])->name('all.post');

Route::get('/createpost', [PostController::class, 'Create'])->name('create.post');

Route::post('/store/post', [PostController::class, 'StorePost'])->name('store.post');

Route::get('/edit/post/{id}', [PostController::class, 'EditPost'])->name('edit.post');

Route::post('/update/post/{id}', [PostController::class, 'UpdatePost'])->name('update.post');

Route::get('/delete/post/{id}', [PostController::class, 'DeletePost'])->name('delete.post');


// Json Data for Category and District
Route::get('/get/subcategory/{category_id}', [PostController::class, 'GetSubCategory']);

Route::get('/get/subdistrict/{district_id}', [PostController::class, 'GetSubDistrict']);


//social and seo

Route::get('/social/setting', [SettingController::class, 'SocialSetting'])->name('social.setting');

Route::post('/social/update/{id}', [SettingController::class, 'SocialUpdate'])->name('update.social');

Route::get('/seo/setting', [SettingController::class, 'SeoSetting'])->name('seo.setting');

Route::post('/seo/update/{id}', [SettingController::class, 'SeoUpdate'])->name('update.seo');

//Livetv

Route::get('/livetv/setting', [SettingController::class, 'LiveTvSetting'])->name('livetv.setting');

Route::post('/livetv/update/{id}', [SettingController::class, 'LiveTvUpdate'])->name('update.livetv');

Route::get('/livetv/active/{id}', [SettingController::class, 'ActiveSetting'])->name('active.livetv');

Route::get('/livetv/deactive/{id}', [SettingController::class, 'DeactiveSetting'])->name('deactive.livetv');

Route::get('/notice/setting', [SettingController::class, 'NoticeSetting'])->name('notice.setting');

Route::post('/notice/update/{id}', [SettingController::class, 'NoticeUpdate'])->name('update.notice');

Route::get('/notice/active/{id}', [SettingController::class, 'ActiveNotice'])->name('active.notice');

Route::get('/notice/deactive/{id}', [SettingController::class, 'DeactiveNotice'])->name('deactive.notice');

//website

Route::get('/setting/website', [SettingController::class, 'WebsiteSetting'])->name('all.website');

Route::get('/add/website', [SettingController::class, 'AddWebsiteSetting'])->name('add.website');

Route::post('/website/store', [SettingController::class, 'StoreWebsite'])->name('store.website');


Route::get('/edit/website/{id}', [SettingController::class, 'EditWebsite'])->name('edit.website');

Route::get('/delete/website/{id}', [SettingController::class, 'DeleteWebsite'])->name('delete.website');

Route::post('/website/update/{id}', [SettingController::class, 'UpdateWebsite'])->name('update.website');

//gallary

Route::get('/photo/gallery', [GalleryController::class, 'PhotoGallery'])->name('photo.gallery');

Route::get('/add/photo', [GalleryController::class, 'AddPhoto'])->name('add.photo');

Route::post('/store/photo', [GalleryController::class, 'StorePhoto'])->name('store.photo');


//video
Route::get('/video/gallery', [GalleryController::class, 'VideoGallery'])->name('video.gallery');

Route::get('/add/video', [GalleryController::class, 'AddVideo'])->name('add.video');

Route::post('/store/video', [GalleryController::class, 'StoreVideo'])->name('store.video');
