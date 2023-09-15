<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	https://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There are three reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the] Router which controller/method to use if those

| provided in the URL cannot be matched to a valid route.

|

|	$route['translate_uri_dashes'] = FALSE;

|

| This is not exactly a route, but allows you to automatically route

| controller and method names that contain dashes. '-' isn't a valid

| class or method name character, so it requires translation.

| When you set this option to TRUE, it will replace ALL dashes in the

| controller and method URI segments.

|

| Examples:	my-controller/index	-> my_controller/index

|		my-controller/my-method	-> my_controller/my_method

*/

$route['default_controller'] = 'UserProfile_Controller/index';

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;



//Main Controller routes

$route['hospital/login-page'] = 'MainController/temp';

$route['hospital/registration-page'] = 'MainController/temp2';

//Admin Panel

$route['Admin/AdminLogin'] = 'Admin_Controller/index';
$route['Admin/login'] = 'Admin_Controller/login';
$route['Admin/dashboard'] = 'Admin_Controller/dashboard';
$route['Admin/departments'] = 'Admin_Controller/departments';
$route['Admin/add-department'] = 'Admin_Controller/addDept';
$route['Admin/logout'] = 'Admin_Controller/logout';

// User panel routes

$route['user/login-page'] = 'UserProfile_Controller/index';

$route['user/registration-page'] = 'UserProfile_Controller/regPage';

$route['user/timeline'] = 'UserProfile_Controller/timeline';
$route['user/reviews'] = 'UserProfile_Controller/reviews';

$route['user/top-hospitals'] = 'UserProfile_Controller/top_hospitals';

$route['user/top-doctors'] = 'UserProfile_Controller/top_doctors';

$route['user/recommend-me'] = 'UserProfile_Controller/recommendMe';



// Hospital panel routes

$route['hospital/dashboard'] = 'Hospital_Controller/dashboard';

$route['hospital/profile'] = 'Hospital_Controller/profile';

$route['hospital/doctors'] = 'Hospital_Controller/doctors';

$route['hospital/patients'] = 'Hospital_Controller/patients';
 
$route['hospital/appointments'] = 'Hospital_Controller/appointments';

$route['hospital/ongoing-treatments'] = 'Hospital_Controller/ongoing_treatments';

$route['hospital/doctors-schedule'] = 'Hospital_Controller/schedule';


$route['hospital/departments'] = 'Hospital_Controller/departments';

$route['hospital/employees-list'] = 'Hospital_Controller/employees';

$route['hospital/leaves'] = 'Hospital_Controller/leaves';

$route['hospital/holidays'] = 'Hospital_Controller/holiday';

$route['hospital/diagnostic-services'] = 'Hospital_Controller/diagnostic_services';

$route['hospital/treatments'] = 'Hospital_Controller/treatments';

$route['hospital/customer-queries'] = 'Hospital_Controller/cusQueries';

$route['hospital/hospital-offers'] = 'Hospital_Controller/hosOffers';

$route['hospital/trending-offers'] = 'Hospital_Controller/trending_offers';

$route['hospital/hospital-advertisement'] = 'Hospital_Controller/hosAdvertise';

$route['hospital/comparison'] = 'Hospital_Controller/comparison';

$route['hospital/logout'] = 'Hospital_Controller/logout';

$route['hospital/edit-hospital-profile'] = 'Hospital_Controller/edit_hos_profile';

$route['hospital/add-doctor'] = 'Hospital_Controller/addDoc';

$route['hospital/add-department'] = 'Hospital_Controller/addDept';

$route['hospital/add-doctor-schedule'] = 'Hospital_Controller/addSchedule';

$route['hospital/add-employee'] = 'Hospital_Controller/addEmp';

$route['hospital/edit-employee'] = 'Hospital_Controller/editEmp';

$route['hospital/Medications'] = 'Medications_pdf_controller/generatePdf';



// Doctor panel routes



$route['doctor/doctor-login'] = 'DoctorProfile_Controller/docLogin';

$route['doctor/doctor-registration'] = 'DoctorProfile_Controller/docReg';

$route['doctor/doctor-dashboard'] = 'doctorProfile_Controller/docDashboard';

$route['doctor/doctor-profile'] = 'doctorProfile_Controller/profile';

$route['doctor/doctor-patients'] = 'doctorProfile_Controller/patients';

$route['doctor/doctor-private-patients'] = 'doctorProfile_Controller/my_patients';

$route['doctor/doctor-prescription'] = 'doctorProfile_Controller/prescription';

$route['doctor/doctor-treatment'] = 'doctorProfile_Controller/treatment';

$route['doctor/doctor-consult'] = 'doctorProfile_Controller/consult';
