<?php

use App\Employee;
use App\Report;
use App\Customer;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Login Section
 */

Route::get('admin/login', ['as'=> 'adminLogin', 'uses'  =>  'Admin\AuthController@login']);
Route::post('admin/login', ['as'=> 'doAdminLogin', 'uses'  =>  'Admin\AuthController@doLogin']);
Route::get('admin/logout', ['as'=> 'adminLogout', 'uses'  =>  'Admin\AuthController@doLogout']);


// Admin Section
Route::group(
[
	'prefix' 		=> 'admin/',
	'middleware'    => 'admin',
],
function()
{
	Route::get('test-target', ['uses'  =>  'Admin\AreaController@target']);
	Route::get('test-line', ['uses'  =>  'Admin\LineController@test']);
	Route::get('test-export', ['uses'  =>  'Admin\DashboardController@export']);

	Route::get('dis-ibns', ['as'    =>  'disIBNS', 'uses'  =>  'Admin\ProductController@IBNS']);
	Route::get('dis-ucp', ['as'    =>  'disUCP', 'uses'  =>  'Admin\ProductController@UCP']);
	Route::get('dis-pos', ['as'    =>  'disPOS', 'uses'  =>  'Admin\ProductController@POS']);

	// Admin Dashboard
	Route::get('dashboard', ['as'    =>  '/', 'uses'  =>  'Admin\DashboardController@index']);
	Route::get('lock', ['as'    =>  'lock', 'uses'  =>  'Admin\DashboardController@lock']);

	// Message
	Route::get('all-messages', ['as'    =>  'adminInbox', 'uses'  =>  'Admin\InboxController@all']);
	Route::get('sent-messages', ['as'    =>  'adminSentMessages', 'uses'  =>  'Admin\InboxController@sent']);
	Route::get('create-message', ['as'    =>  'adminCreateMessage', 'uses'  =>  'Admin\InboxController@create']);
	Route::post('create-message', ['as'    =>  'adminDoCreateMessage', 'uses'  =>  'Admin\InboxController@doCreate']);
	Route::get('show-message/{id}', ['as'    =>  'adminShowMessage', 'uses'  =>  'Admin\InboxController@show']);
	Route::post('reply/{id}', ['as'    =>  'adminDoReply', 'uses'  =>  'Admin\InboxController@doReply']);

	// Level
	Route::get('levels', ['as'    =>  'levels', 'uses'  =>  'Admin\LevelController@listAll']);
	Route::get('add-level', ['as'    =>  'addLevel', 'uses'  =>  'Admin\LevelController@create']);
	Route::post('add-level', ['as'    =>  'doAddLevel', 'uses'  =>  'Admin\LevelController@doCreate']);
	Route::get('edit-level/{id}', ['as'    =>  'editLevel', 'uses'  =>  'Admin\LevelController@update']);
	Route::post('edit-level/{id}', ['as'    =>  'doEditLevel', 'uses'  =>  'Admin\LevelController@doUpdate']);
	Route::post('delete-level/{id}', ['as'    =>  'doDeleteLevel', 'uses'  =>  'Admin\LevelController@doDelete']);


	// Employee
	Route::get('add-employee', ['as'    =>  'addEmployee', 'uses'  =>  'Admin\EmployeeController@create']);
	Route::post('add-employee', ['as'    =>  'doAddEmployee', 'uses'  =>  'Admin\EmployeeController@doCreate']);
	Route::get('employees', ['as'    =>  'employees', 'uses'  =>  'Admin\EmployeeController@listAll']);
	Route::get('edit-employee/{id}', ['as'    =>  'editEmployee', 'uses'  =>  'Admin\EmployeeController@update']);
	Route::post('edit-employee/{id}', ['as'    =>  'doEditEmployee', 'uses'  =>  'Admin\EmployeeController@doUpdate']);
	Route::post('delete-employee/{id}', ['as'    =>  'doDeleteEmployee', 'uses'  =>  'Admin\EmployeeController@doDelete']);

	// Customer
	Route::get('add-customer', ['as'    =>  'addCustomer', 'uses'  =>  'Admin\CustomerController@create']);
	Route::post('add-customer', ['as'    =>  'doAddCustomer', 'uses'  =>  'Admin\CustomerController@doCreate']);
	Route::get('search-customer', ['as'    =>  'adminSearchCustomer', 'uses'  =>  'Admin\CustomerController@search']);
	Route::post('search-customer', ['as'    =>  'adminDoSearchCustomer', 'uses'  =>  'Admin\CustomerController@doSearch']);
	Route::get('customers', ['as'    =>  'customers', 'uses'  =>  'Admin\CustomerController@listAll']);
	Route::get('single-customer/{id}', ['as'    =>  'adminSingleDoctor', 'uses'  =>  'Admin\CustomerController@single']);
	Route::get('edit-customer/{id}', ['as'    =>  'editCustomer', 'uses'  =>  'Admin\CustomerController@update']);
	Route::post('edit-customer/{id}', ['as'    =>  'doEditCustomer', 'uses'  =>  'Admin\CustomerController@doUpdate']);
	Route::post('delete-customer/{id}', ['as'    =>  'doDeleteCustomer', 'uses'  =>  'Admin\CustomerController@doDelete']);
	Route::get('upload-doctors-list/{mr_id}', ['as'    =>  'uploadDoctorsList', 'uses'  =>  'Admin\CustomerController@upload']);
	Route::post('upload-doctors-list/{mr_id}', ['as'    =>  'doUploadDoctorsList', 'uses'  =>  'Admin\CustomerController@doUpload']);

	// Line
	Route::get('add-line', ['as'    =>  'addLine', 'uses'  =>  'Admin\LineController@create']);
	Route::post('add-line', ['as'    =>  'doAddLine', 'uses'  =>  'Admin\LineController@doCreate']);
	Route::get('lines', ['as'    =>  'lines', 'uses'  =>  'Admin\LineController@listAll']);
	Route::get('single-line/{id}/{month}', ['as'    =>  'adminSingleLine', 'uses'  =>  'Admin\LineController@single']);
	Route::get('edit-line/{id}', ['as'    =>  'editLine', 'uses'  =>  'Admin\LineController@update']);
	Route::post('edit-line/{id}', ['as'    =>  'doEditLine', 'uses'  =>  'Admin\LineController@doUpdate']);
	Route::post('delete-line/{id}', ['as'    =>  'doDeleteLine', 'uses'  =>  'Admin\LineController@doDelete']);
	Route::get('mr-achievements', ['as'    =>  'adminMRAchievement', 'uses'  =>  'Admin\LineController@achievement']);
	Route::post('mr-achievements', ['as'    =>  'adminDoMRAchievement', 'uses'  =>  'Admin\LineController@doAchievement']);

	// Level
	Route::get('forms', ['as'    =>  'forms', 'uses'  =>  'Admin\FormController@listAll']);
	Route::get('add-form', ['as'    =>  'addForm', 'uses'  =>  'Admin\FormController@create']);
	Route::post('add-form', ['as'    =>  'doAddForm', 'uses'  =>  'Admin\FormController@doCreate']);
	Route::get('edit-form/{id}', ['as'    =>  'editForm', 'uses'  =>  'Admin\FormController@update']);
	Route::post('edit-form/{id}', ['as'    =>  'doEditForm', 'uses'  =>  'Admin\FormController@doUpdate']);
	Route::post('delete-form/{id}', ['as'    =>  'doDeleteForm', 'uses'  =>  'Admin\FormController@doDelete']);


	// Product
	Route::get('add-product', ['as'    =>  'addProduct', 'uses'  =>  'Admin\ProductController@create']);
	Route::post('add-product', ['as'    =>  'doAddProduct', 'uses'  =>  'Admin\ProductController@doCreate']);
	Route::get('products', ['as'    =>  'products', 'uses'  =>  'Admin\ProductController@listAll']);
	Route::get('single-product/{id}', ['as'    =>  'singleProduct', 'uses'  =>  'Admin\ProductController@single']);
	Route::get('edit-product/{id}', ['as'    =>  'editProduct', 'uses'  =>  'Admin\ProductController@update']);
	Route::post('edit-product/{id}', ['as'    =>  'doEditProduct', 'uses'  =>  'Admin\ProductController@doUpdate']);
	Route::post('delete-product/{id}', ['as'    =>  'doDeleteProduct', 'uses'  =>  'Admin\ProductController@doDelete']);
	Route::get('distributors-dates', ['as'    =>  'DistributorsDates', 'uses'  =>  'Admin\ProductController@listAllDistributorsDates']);
	Route::get('distributors', ['as'    =>  'distributors', 'uses'  =>  'Admin\ProductController@listAllDistributors']);
	Route::get('add-distributor', ['as'    =>  'addDistributor', 'uses'  =>  'Admin\ProductController@addDistributor']);
	Route::post('add-distributor', ['as'    =>  'doAddDistributor', 'uses'  =>  'Admin\ProductController@doAddDistributor']);
	Route::get('mr-distributor/{distributor}/{ProductAreaId}', ['as'    =>  'MRDistributor', 'uses'  =>  'Admin\ProductController@MRDistributor']);
	Route::post('mr-distributor/{distributor}/{ProductAreaId}', ['as'    =>  'doMRDistributor', 'uses'  =>  'Admin\ProductController@doMRDistributor']);

	// Gift
	Route::get('add-gift', ['as'    =>  'addGift', 'uses'  =>  'Admin\GiftController@create']);
	Route::post('add-gift', ['as'    =>  'doAddGift', 'uses'  =>  'Admin\GiftController@doCreate']);
	Route::get('gifts', ['as'    =>  'gifts', 'uses'  =>  'Admin\GiftController@listAll']);
	Route::get('single-gift/{id}', ['as'    =>  'singleGift', 'uses'  =>  'Admin\GiftController@single']);
	Route::get('edit-gift/{id}', ['as'    =>  'editGift', 'uses'  =>  'Admin\GiftController@update']);
	Route::post('edit-gift/{id}', ['as'    =>  'doEditGift', 'uses'  =>  'Admin\GiftController@doUpdate']);
	Route::post('delete-gift/{id}', ['as'    =>  'doDeleteGift', 'uses'  =>  'Admin\GiftController@doDelete']);

	// Area
	Route::get('add-area', ['as'    =>  'addArea', 'uses'  =>  'Admin\AreaController@create']);
	Route::post('add-area', ['as'    =>  'doAddArea', 'uses'  =>  'Admin\AreaController@doCreate']);
	Route::get('areas', ['as'    =>  'areas', 'uses'  =>  'Admin\AreaController@listAll']);
	Route::get('single-area/{id}', ['as'    =>  'singleArea', 'uses'  =>  'Admin\AreaController@single']);
	Route::get('edit-area/{id}', ['as'    =>  'editArea', 'uses'  =>  'Admin\AreaController@update']);
	Route::post('edit-area/{id}', ['as'    =>  'doEditArea', 'uses'  =>  'Admin\AreaController@doUpdate']);
	Route::post('delete-area/{id}', ['as'    =>  'doDeleteArea', 'uses'  =>  'Admin\AreaController@doDelete']);


	// Territory
	Route::get('add-territory', ['as'    =>  'addTerritory', 'uses'  =>  'Admin\TerritoryController@create']);
	Route::post('add-territory', ['as'    =>  'doAddTerritory', 'uses'  =>  'Admin\TerritoryController@doCreate']);
	Route::get('territories', ['as'    =>  'territories', 'uses'  =>  'Admin\TerritoryController@listAll']);
	Route::get('single-territory/{id}', ['as'    =>  'singleTerritory', 'uses'  =>  'Admin\TerritoryController@single']);
	Route::get('edit-territory/{id}', ['as'    =>  'editTerritory', 'uses'  =>  'Admin\TerritoryController@update']);
	Route::post('edit-territory/{id}', ['as'    =>  'doEditTerritory', 'uses'  =>  'Admin\TerritoryController@doUpdate']);
	Route::post('delete-territory/{id}', ['as'    =>  'doDeleteTerritory', 'uses'  =>  'Admin\TerritoryController@doDelete']);

	// Visit Class
	Route::get('add-visit-class', ['as'    =>  'addVisitClass', 'uses'  =>  'Admin\VisitClassController@create']);
	Route::post('add-visit-class', ['as'    =>  'doAddVisitClass', 'uses'  =>  'Admin\VisitClassController@doCreate']);
	Route::get('visits-classes', ['as'    =>  'visitsClasses', 'uses'  =>  'Admin\VisitClassController@listAll']);
	Route::get('single-visit-class/{id}', ['as'    =>  'singleVisitClass', 'uses'  =>  'Admin\VisitClassController@single']);
	Route::get('edit-visit-class/{id}', ['as'    =>  'editVisitClass', 'uses'  =>  'Admin\VisitClassController@update']);
	Route::post('edit-visit-class/{id}', ['as'    =>  'doEditVisitClass', 'uses'  =>  'Admin\VisitClassController@doUpdate']);
	Route::post('delete-visit-class/{id}', ['as'    =>  'doDeleteVisitClass', 'uses'  =>  'Admin\VisitClassController@doDelete']);

	// Products Target
	Route::get('set-product-target', ['as'=>'setProductTarget', 'uses'=>'Admin\ProductController@productTarget']);
	Route::post('set-product-target', ['as'=>'doSetProductTarget', 'uses'=>'Admin\ProductController@doProductTarget']);
	Route::get('list-product-target', ['as'=>'adminListProductTarget', 'uses'=>'Admin\ProductController@listProductTarget']);
	Route::get('list-area-target/{product_target_id}', ['as'=>'adminListAreaTarget', 'uses'=>'Admin\ProductController@listAreaTarget']);
	Route::get('list-territory-target/{area_target_id}', ['as'=>'adminListTerritoryTarget', 'uses'=>'Admin\ProductController@listTerritoryTarget']);

	Route::get('set-area-target', ['as'=>'setAreaTarget', 'uses'=>'Admin\ProductController@areaTarget']);
	Route::post('set-area-target', ['as'=>'doSetAreaTarget', 'uses'=>'Admin\ProductController@doAreaTarget']);

	Route::get('set-territory-target', ['as'=>'setTerritoryTarget', 'uses'=>'Admin\ProductController@territoryTarget']);
	Route::post('set-territory-target', ['as'=>'doSetTerritoryTarget', 'uses'=>'Admin\ProductController@doTerritoryTarget']);


	Route::get('list-products-target', ['as'=>'listProductsTarget', 'uses'=>'Admin\ProductController@listAllTargets']);
	Route::get('edit-products-target/{productTargetId}', ['as'=>'updateProductsTarget', 'uses'=>'Admin\ProductController@updateProductTarget']);
	Route::post('edit-products-target/{productTargetId}', ['as'=>'doUpdateProductsTarget', 'uses'=>'Admin\ProductController@doUpdateProductTarget']);
	Route::post('delete-products-target/{productTargetId}', ['as'=>'doDeleteProductsTarget', 'uses'=>'Admin\ProductController@doDeleteProductsTarget']);

	Route::get('ajax-areas', ['as'=>'ajaxAreas', 'uses'=>'Admin\ProductController@ajaxAreas']);
	Route::get('ajax-territories', ['as'=>'ajaxTerritories', 'uses'=>'Admin\ProductController@ajaxTerritories']);
	Route::get('ajax-products', ['as'=>'ajaxProducts', 'uses'=>'Admin\ProductController@ajaxProducts']);
	Route::get('ajax-product-quantity', ['as'=>'ajaxProductQuantity', 'uses'=>'Admin\ProductController@ajaxProductQuantity']);

	// Plans
	Route::get('plans', ['as'=>'plans', 'uses'=>'Admin\PlanController@listAll']);
	Route::get('sm-pending-plans', ['as'    =>  'adminSMPendingPlans', 'uses'  =>  'Admin\PlanController@pendingSM']);
	Route::get('sm-approve-plan/{id}', ['as'=>'adminApproveSMPendingPlan', 'uses'=>'Admin\PlanController@approveSM']);
	Route::get('sm-decline-plan/{id}', ['as'=>'adminDeclineSMPendingPlan', 'uses'=>'Admin\PlanController@declineSM']);

	// Reports
	Route::get('reports', ['as'=>'reports', 'uses'=>'Admin\ReportController@listAll']);
	Route::get('requests', ['as'=>'requests', 'uses'=>'Admin\ReportController@listAllRequests']);
	Route::get('single-report/{level}/{id}', ['as'    =>  'adminSingleReport', 'uses'  =>  'Admin\ReportController@single']);
	Route::get('export-single-report/{level}/{id}/{type}', ['as'    =>  'adminExportSingleReport', 'uses'  =>  'Admin\ExportController@singleReport']);

	// Service Request
	Route::get('services-requests', ['as'    =>  'adminServicesRequests', 'uses'  =>  'Admin\ReportController@listAllServicesRequests']);
	Route::get('add-service-request', ['as'    =>  'adminAddServiceRequest', 'uses'  =>  'Admin\ReportController@createServiceRequest']);
	Route::post('add-service-request', ['as'    =>  'adminDoAddServiceRequest', 'uses'  =>  'Admin\ReportController@doCreateServiceRequest']);
	Route::get('sm-pending-services-requests', ['as'    =>  'adminSMPendingServicesRequests', 'uses'  =>  'Admin\ReportController@listAllSMPendingServicesRequests']);
	Route::get('sm-approve-service-request/{id}', ['as'=>'adminApproveSMPendingServiceRequest', 'uses'=>'Admin\ReportController@approveSMPendingServiceRequest']);
	Route::get('sm-decline-service-request/{id}', ['as'=>'adminDeclineSMPendingServiceRequest', 'uses'=>'Admin\ReportController@declineSMPendingServiceRequest']);


	// Leave Request
	Route::get('leave-requests', ['as'    =>  'leaveRequests', 'uses'  =>  'Admin\ReportController@listAllLeaveRequests']);
	Route::get('add-leave-request', ['as'    =>  'addLeaveRequest', 'uses'  =>  'Admin\ReportController@createLeaveRequest']);
	Route::post('add-leave-request', ['as'    =>  'doAddLeaveRequest', 'uses'  =>  'Admin\ReportController@doCreateLeaveRequest']);
	Route::get('sm-pending-leave-requests', ['as'    =>  'adminSMPendingLeaveRequests', 'uses'  =>  'Admin\ReportController@listAllSMPendingLeaveRequests']);
	Route::get('sm-approve-leave-request/{id}', ['as'=>'adminApprovePendingLeaveRequest', 'uses'=>'Admin\ReportController@approveSMPendingLeaveRequest']);
	Route::get('sm-decline-leave-request/{id}', ['as'=>'adminDeclinePendingLeaveRequest', 'uses'=>'Admin\ReportController@declineSMPendingLeaveRequest']);

	// Sales
	Route::get('sales', ['as'=>'sales', 'uses'=>'Admin\SaleController@listAll']);

	// Coverage
	Route::get('coverage', ['as'=>'coverage', 'uses'=>'Admin\CoverageController@listAll']);

	// Plan Search
	Route::get('plan-search', ['as'    =>  'adminPlanSearch', 'uses'  =>  'Admin\PlanController@search']);
	Route::post('plan-search', ['as'    =>  'adminDoPlanSearch', 'uses'  =>  'Admin\PlanController@doSearch']);
	Route::post('am-plan-search', ['as'    =>  'adminDoAMPlanSearch', 'uses'  =>  'Admin\PlanController@doAMSearch']);
	Route::post('sm-plan-search', ['as'    =>  'adminDoSMPlanSearch', 'uses'  =>  'Admin\PlanController@doSMSearch']);
	Route::get('export-plan-search/{type}', ['as'    =>  'adminExportPlanSearch', 'uses'  =>  'Admin\ExportController@planSearch']);
	Route::get('export-leave-request-search/{type}', ['as'    =>  'adminExportLeaveRequestSearch', 'uses'  =>  'Admin\ExportController@leaveRequestSearch']);

	// Report Search
	Route::get('report-search', ['as'    =>  'adminReportSearch', 'uses'  =>  'Admin\ReportController@search']);
	Route::post('report-search', ['as'    =>  'adminDoReportSearch', 'uses'  =>  'Admin\ReportController@doSearch']);
	Route::post('am-report-search', ['as'    =>  'adminDoAMReportSearch', 'uses'  =>  'Admin\ReportController@doAMSearch']);
	Route::post('sm-report-search', ['as'    =>  'adminDoSMReportSearch', 'uses'  =>  'Admin\ReportController@doSMSearch']);
	Route::get('export-report-search/{type}', ['as'    =>  'adminExportReportSearch', 'uses'  =>  'Admin\ExportController@reportSearch']);

	// Sales Search
	Route::get('sales-search', ['as'    =>  'adminSalesSearch', 'uses'  =>  'Admin\SaleController@search']);
	Route::post('sales-search', ['as'    =>  'adminDoSalesSearch', 'uses'  =>  'Admin\SaleController@doSearch']);
	Route::post('am-sales-search', ['as'    =>  'adminDoAMSalesSearch', 'uses'  =>  'Admin\SaleController@doAMSearch']);
	Route::post('sm-sales-search', ['as'    =>  'adminDoSMSalesSearch', 'uses'  =>  'Admin\SaleController@doSMSearch']);
	Route::get('export-sales-search/{type}', ['as'    =>  'adminExportSalesSearch', 'uses'  =>  'Admin\ExportController@salesSearch']);

	// Coverage Search
	Route::get('coverage-search', ['as'    =>  'adminCoverageSearch', 'uses'  =>  'Admin\CoverageController@search']);
	Route::post('coverage-search', ['as'    =>  'adminDoCoverageSearch', 'uses'  =>  'Admin\CoverageController@doSearch']);
	Route::get('export-coverage-search/{type}', ['as'    =>  'adminExportCoverageSearch', 'uses'  =>  'Admin\ExportController@coverageSearch']);

	// Task
	Route::get('add-task', ['as'    =>  'addTask', 'uses'  =>  'Admin\TaskController@create']);
	Route::post('add-task', ['as'    =>  'doAddTask', 'uses'  =>  'Admin\TaskController@doCreate']);
	Route::get('tasks', ['as'    =>  'tasks', 'uses'  =>  'Admin\TaskController@listAll']);
	Route::get('edit-task/{id}', ['as'    =>  'editTask', 'uses'  =>  'Admin\TaskController@update']);
	Route::post('edit-task/{id}', ['as'    =>  'doEditTask', 'uses'  =>  'Admin\TaskController@doUpdate']);
	Route::post('delete-task/{id}', ['as'    =>  'doDeleteTask', 'uses'  =>  'Admin\TaskController@doDelete']);


	// Announcement
	Route::get('add-announcement', ['as'    =>  'addAnnouncement', 'uses'  =>  'Admin\AnnouncementController@create']);
	Route::post('add-announcement', ['as'    =>  'doAddAnnouncement', 'uses'  =>  'Admin\AnnouncementController@doCreate']);
	Route::get('announcements', ['as'    =>  'announcements', 'uses'  =>  'Admin\AnnouncementController@listAll']);
	Route::get('edit-announcement/{id}', ['as'    =>  'editAnnouncement', 'uses'  =>  'Admin\AnnouncementController@update']);
	Route::post('edit-announcement/{id}', ['as'    =>  'doEditAnnouncement', 'uses'  =>  'Admin\AnnouncementController@doUpdate']);
	Route::post('delete-announcement/{id}', ['as'    =>  'doDeleteAnnouncement', 'uses'  =>  'Admin\AnnouncementController@doDelete']);

	// Request
	Route::get('request', ['as'    =>  'request', 'uses'  =>  'Admin\RequestController@listAll']);

	//Expenses Report
	Route::get('expenses-reports', ['as'    =>  'adminExpensesReports', 'uses'  =>  'Admin\ReportController@listAllExpensesReports']);
});

//Sales Manager Section
Route::group(
[
	'prefix'	=>	'sm/'
],
function(){
	Route::get('/', ['as'    =>  'sm', 'uses'  =>  'SM\DashboardController@index']);
	// Employees
	Route::get('employees', ['as'    =>  'smEmployees', 'uses'  =>  'SM\EmployeeController@listAll']);

	//Customers
	Route::get('customer', ['as'    =>  'smCustomers', 'uses'  =>  'SM\CustomerController@listAll']);

	// Products
	Route::get('products', ['as'    =>  'smProducts', 'uses'  =>  'SM\ProductController@listAll']);

	// Distributors
	Route::get('distributors', ['as'    =>  'smDistributors', 'uses'  =>  'SM\ProductController@listAllDistributors']);

	// Reports
	Route::get('reports', ['as'    =>  'smReports', 'uses'  =>  'SM\ReportController@listAll']);
	Route::get('ajax-doctors', ['as'=>'ajaxDoctors', 'uses'=>'MR\ReportController@ajaxDoctors']);
	Route::get('ajax-product-price', ['as'    =>  'ajaxProductPrice', 'uses'  =>  'MR\ProductController@ajaxProductPrice']);
	Route::get('add-report/{doctorId?}', ['as'    =>  'smAddReport', 'uses'  =>  'SM\ReportController@create']);
	Route::post('add-report', ['as'    =>  'smDoAddReport', 'uses'  =>  'SM\ReportController@doCreate']);
	Route::get('single-mr-report/{id}', ['as'    =>  'smMRSingleReport', 'uses'  =>  'SM\ReportController@singleMR']);
	Route::get('single-report/{id}', ['as'    =>  'smYourSingleReport', 'uses'  =>  'SM\ReportController@singleYours']);

	// Plans Search
	Route::get('plan-search', ['as'    =>  'smPlanSearch', 'uses'  =>  'SM\PlanController@search']);
	Route::post('plan-search', ['as'    =>  'smDoPlanSearch', 'uses'  =>  'SM\PlanController@doSearch']);
	Route::get('pending-plans', ['as'    =>  'smPendingPlans', 'uses'  =>  'SM\PlanController@pending']);
	Route::get('approve-plan/{id}', ['as'=>'smApprovePendingPlan', 'uses'=>'SM\PlanController@approve']);
	Route::get('decline-plan/{id}', ['as'=>'smDeclinePendingPlan', 'uses'=>'SM\PlanController@decline']);

	// Report Search
	Route::get('mr-report-search', ['as'    =>  'smMRReportSearch', 'uses'  =>  'SM\ReportController@MRSearch']);
	Route::post('mr-report-search', ['as'    =>  'smMRDoReportSearch', 'uses'  =>  'SM\ReportController@doMRSearch']);

	// Report Search
	Route::get('report-search', ['as'    =>  'smReportSearch', 'uses'  =>  'SM\ReportController@Search']);
	Route::post('report-search', ['as'    =>  'smDoReportSearch', 'uses'  =>  'SM\ReportController@doSearch']);

	// Sales Search
	Route::get('sales-search', ['as'    =>  'smSalesSearch', 'uses'  =>  'SM\SaleController@search']);
	Route::post('sales-search', ['as'    =>  'smDoSalesSearch', 'uses'  =>  'SM\SaleController@doSearch']);

	// Coverage Search
	Route::get('coverage-search', ['as'    =>  'smCoverageSearch', 'uses'  =>  'SM\CoverageController@search']);
	Route::post('coverage-search', ['as'    =>  'smDoCoverageSearch', 'uses'  =>  'SM\CoverageController@doSearch']);

	// MR Achievements
	Route::get('mr-achievements', ['as'    =>  'smMRAchievement', 'uses'  =>  'SM\LineController@achievement']);
	Route::post('mr-achievements', ['as'    =>  'smDoMRAchievement', 'uses'  =>  'SM\LineController@doAchievement']);
	Route::get('single-line/{id}/{month}', ['as'    =>  'smSingleLine', 'uses'  =>  'SM\LineController@single']);

	//Expenses Report
	Route::get('expenses-reports', ['as'    =>  'smExpensesReports', 'uses'  =>  'SM\ReportController@listAllExpensesReports']);
	Route::get('add-expense-report', ['as'    =>  'smAddExpenseReport', 'uses'  =>  'SM\ReportController@createExpenseReport']);
	Route::post('add-expense-report', ['as'    =>  'smDoAddExpenseReport', 'uses'  =>  'SM\ReportController@doCreateExpenseReport']);

	// Leave Request
	Route::get('leave-requests', ['as'    =>  'smLeaveRequests', 'uses'  =>  'SM\ReportController@listAllLeaveRequests']);
	Route::get('add-leave-request', ['as'    =>  'smAddLeaveRequest', 'uses'  =>  'SM\ReportController@createLeaveRequest']);
	Route::post('add-leave-request', ['as'    =>  'smDoAddLeaveRequest', 'uses'  =>  'SM\ReportController@doCreateLeaveRequest']);
	Route::get('pending-leave-requests', ['as'    =>  'smPendingLeaveRequests', 'uses'  =>  'SM\ReportController@listAllPendingLeaveRequests']);
	Route::get('approve-leave-request/{id}', ['as'=>'smApprovePendingLeaveRequest', 'uses'=>'SM\ReportController@approvePendingLeaveRequest']);
	Route::get('decline-leave-request/{id}', ['as'=>'smDeclinePendingLeaveRequest', 'uses'=>'SM\ReportController@declinePendingLeaveRequest']);

	// Service Request
	Route::get('services-requests', ['as'    =>  'smServicesRequests', 'uses'  =>  'SM\ReportController@listAllServicesRequests']);
	Route::get('add-service-request', ['as'    =>  'smAddServiceRequest', 'uses'  =>  'SM\ReportController@createServiceRequest']);
	Route::post('add-service-request', ['as'    =>  'smDoAddServiceRequest', 'uses'  =>  'SM\ReportController@doCreateServiceRequest']);
	Route::get('pending-services-requests', ['as'    =>  'smPendingServicesRequests', 'uses'  =>  'SM\ReportController@listAllPendingServicesRequests']);
	Route::get('approve-service-request/{id}', ['as'=>'smApprovePendingServiceRequest', 'uses'=>'SM\ReportController@approvePendingServiceRequest']);
	Route::get('decline-service-request/{id}', ['as'=>'smDeclinePendingServiceRequest', 'uses'=>'SM\ReportController@declinePendingServiceRequest']);


});

//Area Manager Section
Route::group(
[
	'prefix'	=>	'am/'
],
function(){
	Route::get('/', ['as'    =>  'am', 'uses'  =>  'AM\DashboardController@index']);
    // Employees
    Route::get('employees', ['as'    =>  'amEmployees', 'uses'  =>  'AM\EmployeeController@listAll']);

    //Customers
    Route::get('customer', ['as'    =>  'amCustomers', 'uses'  =>  'AM\CustomerController@listAll']);

    // Products
    Route::get('products', ['as'    =>  'amProducts', 'uses'  =>  'AM\ProductController@listAll']);

	// Distributors
	Route::get('distributors', ['as'    =>  'amDistributors', 'uses'  =>  'AM\ProductController@listAllDistributors']);

    // Reports
    Route::get('reports', ['as'    =>  'amReports', 'uses'  =>  'AM\ReportController@listAll']);
	Route::get('ajax-doctors', ['as'=>'ajaxDoctors', 'uses'=>'MR\ReportController@ajaxDoctors']);
	Route::get('ajax-product-price', ['as'    =>  'ajaxProductPrice', 'uses'  =>  'MR\ProductController@ajaxProductPrice']);
	Route::get('add-report/{doctorId?}', ['as'    =>  'amAddReport', 'uses'  =>  'AM\ReportController@create']);
	Route::post('add-report', ['as'    =>  'amDoAddReport', 'uses'  =>  'AM\ReportController@doCreate']);
	Route::get('single-mr-report/{id}', ['as'    =>  'amMRSingleReport', 'uses'  =>  'AM\ReportController@singleMR']);
	Route::get('single-report/{id}', ['as'    =>  'amYourSingleReport', 'uses'  =>  'AM\ReportController@singleYours']);

    // Plans Search
    Route::get('plan-search', ['as'    =>  'amPlanSearch', 'uses'  =>  'AM\PlanController@search']);
    Route::post('plan-search', ['as'    =>  'amDoPlanSearch', 'uses'  =>  'AM\PlanController@doSearch']);
	Route::get('pending-plans', ['as'    =>  'amPendingPlans', 'uses'  =>  'AM\PlanController@pending']);
	Route::get('approve-plan/{id}', ['as'=>'amApprovePendingPlan', 'uses'=>'AM\PlanController@approve']);
	Route::get('decline-plan/{id}', ['as'=>'amDeclinePendingPlan', 'uses'=>'AM\PlanController@decline']);

	// Report Search
	Route::get('mr-report-search', ['as'    =>  'amMRReportSearch', 'uses'  =>  'AM\ReportController@MRSearch']);
	Route::post('mr-report-search', ['as'    =>  'amMRDoReportSearch', 'uses'  =>  'AM\ReportController@doMRSearch']);

	// Report Search
	Route::get('report-search', ['as'    =>  'amReportSearch', 'uses'  =>  'AM\ReportController@Search']);
	Route::post('report-search', ['as'    =>  'amDoReportSearch', 'uses'  =>  'AM\ReportController@doSearch']);

	// Sales Search
	Route::get('sales-search', ['as'    =>  'amSalesSearch', 'uses'  =>  'AM\SaleController@search']);
	Route::post('sales-search', ['as'    =>  'amDoSalesSearch', 'uses'  =>  'AM\SaleController@doSearch']);

	// Coverage Search
	Route::get('coverage-search', ['as'    =>  'amCoverageSearch', 'uses'  =>  'AM\CoverageController@search']);
	Route::post('coverage-search', ['as'    =>  'amDoCoverageSearch', 'uses'  =>  'AM\CoverageController@doSearch']);

	// MR Achievements
	Route::get('mr-achievements', ['as'    =>  'amMRAchievement', 'uses'  =>  'AM\LineController@achievement']);
	Route::post('mr-achievements', ['as'    =>  'amDoMRAchievement', 'uses'  =>  'AM\LineController@doAchievement']);
	Route::get('single-line/{id}/{month}', ['as'    =>  'amSingleLine', 'uses'  =>  'AM\LineController@single']);

	//Expenses Report
	Route::get('expenses-reports', ['as'    =>  'amExpensesReports', 'uses'  =>  'AM\ReportController@listAllExpensesReports']);
	Route::get('add-expense-report', ['as'    =>  'amAddExpenseReport', 'uses'  =>  'AM\ReportController@createExpenseReport']);
	Route::post('add-expense-report', ['as'    =>  'amDoAddExpenseReport', 'uses'  =>  'AM\ReportController@doCreateExpenseReport']);

	// Leave Request
	Route::get('leave-requests', ['as'    =>  'amLeaveRequests', 'uses'  =>  'AM\ReportController@listAllLeaveRequests']);
	Route::get('add-leave-request', ['as'    =>  'amAddLeaveRequest', 'uses'  =>  'AM\ReportController@createLeaveRequest']);
	Route::post('add-leave-request', ['as'    =>  'amDoAddLeaveRequest', 'uses'  =>  'AM\ReportController@doCreateLeaveRequest']);
	Route::get('pending-leave-requests', ['as'    =>  'amPendingLeaveRequests', 'uses'  =>  'AM\ReportController@listAllPendingLeaveRequests']);
	Route::get('approve-leave-request/{id}', ['as'=>'amApprovePendingLeaveRequest', 'uses'=>'AM\ReportController@approvePendingLeaveRequest']);
	Route::get('decline-leave-request/{id}', ['as'=>'amDeclinePendingLeaveRequest', 'uses'=>'AM\ReportController@declinePendingLeaveRequest']);

	// Service Request
	Route::get('services-requests', ['as'    =>  'amServicesRequests', 'uses'  =>  'AM\ReportController@listAllServicesRequests']);
	Route::get('add-service-request', ['as'    =>  'amAddServiceRequest', 'uses'  =>  'AM\ReportController@createServiceRequest']);
	Route::post('add-service-request', ['as'    =>  'amDoAddServiceRequest', 'uses'  =>  'AM\ReportController@doCreateServiceRequest']);
	Route::get('pending-services-requests', ['as'    =>  'amPendingServicesRequests', 'uses'  =>  'AM\ReportController@listAllPendingServicesRequests']);
	Route::get('approve-service-request/{id}', ['as'=>'amApprovePendingServiceRequest', 'uses'=>'AM\ReportController@approvePendingServiceRequest']);
	Route::get('decline-service-request/{id}', ['as'=>'amDeclinePendingServiceRequest', 'uses'=>'AM\ReportController@declinePendingServiceRequest']);
});

// Medical Rep. Section
Route::group(
[
		'prefix' => 'mr'
],
function()
{
	// Medical Rep. Dashboard
	Route::get('/',  ['as' => 'mr', function () {
		$coverageStats              =   Employee::coverageStats(date('M-Y'));
		$totalProducts              =   Employee::monthlyDirectSales(date('M-Y'));
		$monthlyReports				=	Report::where('mr_id', 3)->where('month', date('M-Y'))->get(); //mr_session
		$doctors                    =   Customer::where('mr_id', 3)->get(); // mr_session;

		$dataView =	[
			'doctors'                       =>  count($doctors),
			'totalVisitsCount'              =>  $coverageStats['totalVisitsCount'],
			'actualVisitsCount'             =>  $coverageStats['actualVisitsCount'],
			'totalMonthlyCoverage'          =>  $coverageStats['totalMonthlyCoverage'],
			'totalSoldProductsSalesPrice' 	=>  $totalProducts['totalSoldProductsSalesPrice'],
			'monthlyReports'				=>	$monthlyReports
		];
		return view('mr.index', $dataView);
    }]);

	// Expenses Reports
	Route::get('expenses-reports', ['as'    =>  'expensesReports', 'uses'  =>  'MR\ReportController@listAllExpensesReports']);
	Route::get('add-expense-report', ['as'    =>  'addExpenseReport', 'uses'  =>  'MR\ReportController@createExpenseReport']);
	Route::post('add-expense-report', ['as'    =>  'doAddExpenseReport', 'uses'  =>  'MR\ReportController@doCreateExpenseReport']);

	// Leave Request
	Route::get('leave-requests', ['as'    =>  'leaveRequests', 'uses'  =>  'MR\ReportController@listAllLeaveRequests']);
	Route::get('add-leave-request', ['as'    =>  'addLeaveRequest', 'uses'  =>  'MR\ReportController@createLeaveRequest']);
	Route::post('add-leave-request', ['as'    =>  'doAddLeaveRequest', 'uses'  =>  'MR\ReportController@doCreateLeaveRequest']);

	// Service Request
	Route::get('services-requests', ['as'    =>  'servicesRequests', 'uses'  =>  'MR\ReportController@listAllServicesRequests']);
	Route::get('add-service-request', ['as'    =>  'addServiceRequest', 'uses'  =>  'MR\ReportController@createServiceRequest']);
	Route::post('add-service-request', ['as'    =>  'doAddServiceRequest', 'uses'  =>  'MR\ReportController@doCreateServiceRequest']);

	// Plans
	Route::get('plans', ['as'    =>  'plans', 'uses'  =>  'MR\PlanController@listAll']);
	Route::get('ajax-plans', ['as'    =>  'ajaxPlans', 'uses'  =>  'MR\PlanController@ajaxPlans']);
	Route::get('add-plan', ['as'    =>  'addPlan', 'uses'  =>  'MR\PlanController@create']);
	Route::post('add-plan', ['as'    =>  'doAddPlan', 'uses'  =>  'MR\PlanController@doCreate']);

	Route::get('ajax-visit-statue', ['as'    =>  'ajaxVisitStatue', 'uses'  =>  'MR\ReportController@ajaxVisitStatue']);
	Route::get('ajax-planned-vs-actual', ['as'    =>  'ajaxPlannedVsActual', 'uses'  =>  'MR\ReportController@plannedVsActual']);


	// Reports
	Route::get('ajax-doctors', ['as'=>'ajaxDoctors', 'uses'=>'MR\ReportController@ajaxDoctors']);
	Route::get('reports', ['as'    =>  'reports', 'uses'  =>  'MR\ReportController@listAll']);
	Route::get('add-report/{doctorId?}', ['as'    =>  'addReport', 'uses'  =>  'MR\ReportController@create']);
	Route::post('add-report', ['as'    =>  'doAddReport', 'uses'  =>  'MR\ReportController@doCreate']);
	Route::get('single-report/{id}', ['as'    =>  'singleReport', 'uses'  =>  'MR\ReportController@single']);
	Route::get('ajax-product-price', ['as'    =>  'ajaxProductPrice', 'uses'  =>  'MR\ProductController@ajaxProductPrice']);

	// Lines
	Route::get('single-line/{currentMonth}', ['as'    =>  'singleLine', 'uses'  =>  'MR\LineController@single']);
	Route::get('single-doctor/{id}', ['as'    =>  'singleDoctor', 'uses'  =>  'MR\CustomerController@single']);
	Route::get('line-history', ['as'    =>  'lineHistory', 'uses'  =>  'MR\LineController@history']);
	Route::post('line-history', ['as'    =>  'doLineHistory', 'uses'  =>  'MR\LineController@doHistory']);
	Route::get('ajax-coverage-by-specialty', ['as'    =>  'ajaxCoverageBySpecialty', 'uses'  =>  'MR\LineController@ajaxCoverageBySpecialty']);

	// Sales Search
	Route::get('sales-search', ['as'    =>  'salesSearch', 'uses'  =>  'MR\SaleController@search']);
	Route::post('sales-search', ['as'    =>  'doSalesSearch', 'uses'  =>  'MR\SaleController@doSearch']);

    // Report Search
    Route::get('report-search', ['as'    =>  'reportSearch', 'uses'  =>  'MR\ReportController@search']);
    Route::post('report-search', ['as'    =>  'doReportSearch', 'uses'  =>  'MR\ReportController@doSearch']);

	// Plan Search
	Route::get('plan-search', ['as'    =>  'planSearch', 'uses'  =>  'MR\PlanController@search']);
	Route::post('plan-search', ['as'    =>  'doPlanSearch', 'uses'  =>  'MR\PlanController@doSearch']);

	Route::get('test', ['as'    =>  'test', 'uses'  =>  'MR\LineController@test']);
});