<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'claims_controller';
$route['404_override'] = 'claims_controller/error404';
$route['translate_uri_dashes'] = FALSE;

$route['login-submit'] = 'claims_controller/login';
$route['dashboard'] = 'claims_controller/dashboard';
$route['dashboard/(:any)/(:any)'] = 'claims_controller/dashboard/$1/$2';
$route['staff'] = 'claims_controller/staff';
$route['add-staff'] = 'claims_controller/add_staff';
$route['save-vendor'] = 'claims_controller/save_vendor';
$route['add-vendor'] = 'claims_controller/add_vendor';
$route['my-profile/(:any)'] = 'claims_controller/user_profile/$1';
$route['staff-profile/(:any)'] = 'claims_controller/user_profile/$1';
$route['staff/update-profile/(:any)'] = 'claims_controller/user_profile_update/$1';
$route['create-staff'] = 'claims_controller/create_staff';
$route['update-profile'] = 'claims_controller/update_user_profile';
$route['my-task'] = 'claims_controller/create_task';
$route['end-task'] = 'claims_controller/end_task';
$route['remove-task'] = 'claims_controller/remove_task';
$route['update-task'] = 'claims_controller/update_task';
$route['change-password'] = 'claims_controller/change_password';
$route['remove-vendor'] = 'claims_controller/remove_staff';

$route['guest'] = 'customers/create_customers';
$route['manager'] = 'claims_controller/dashboard';
$route['cashier'] = 'claims_controller/dashboard';

$route['back-up'] = 'claims_controller/back_up';
$route['local-backup'] = 'claims_controller/local_backup';
$route['dropbox'] = 'dropboxAPI/request_dropbox';
$route['access_dropbox'] = 'dropboxAPI/access_dropbox';
$route['test_dropbox'] = 'dropboxAPI/test_dropbox';

$route['homes/create-homes'] = 'homes/create_homes';
$route['homes/new-homes'] = 'homes/new_homes';
$route['homes/update-homes/(:num)'] = 'homes/homes_info/$1';
$route['homes/active-homes'] = 'homes/active_homes';
$route['homes/homes-info/(:num)'] = 'homes/homes_info/$1';
$route['register-homes'] = 'homes/register_homes';
$route['delete-homes'] = "homes/delete_homes";
$route['update-homes'] = "homes/update_home";
$route['image-delete'] = "homes/image_delete";

$route['customers/create-customers'] = 'customers/create_customers';
$route['customers/new-customers'] = 'customers/new_customers';
$route['customers/active-customers'] = 'customers/active_customers';
$route['customers/profile/(:num)'] = 'customers/customers_profile/$1';
$route['register-customers'] = 'customers/register_customers';
$route['delete-customers'] = "customers/delete_customers";
$route['update-customers'] = "customers/update_customer";

$route['buildings/create-buildings'] = 'buildings/create_buildings';
$route['buildings/new-buildings'] = 'buildings/new_buildings';
$route['buildings/active-buildings'] = 'buildings/active_buildings';
$route['buildings/update-buildings/(:num)'] = 'buildings/update_buildings/$1';
$route['get-city-district'] = "buildings/get_city_district";
$route['register-buildings'] = 'buildings/register_buildings';
$route['delete-buildings'] = "buildings/delete_buildings";
$route['update-buildings'] = "buildings/update_buildings";
$route['building-update'] = "buildings/building_update";


$route['memberships/create-packages-memberships'] = 'memberships/create_memberships_packages';
$route['memberships/create-memberships'] = 'memberships/create_memberships';
$route['memberships/all-memberships'] = 'memberships/all_memberships_packages';
$route['memberships/active-memberships'] = 'memberships/active_memberships';
$route['memberships/passive-memberships'] = 'memberships/passive_memberships';
$route['memberships/expired-memberships'] = 'memberships/expired_memberships';
$route['memberships/transactions'] = 'memberships/transactions';
$route['register-memberships-packages'] = 'memberships/register_memberships_packages';
$route['delete-memberships-packages'] = "memberships/delete_memberships_packages";
$route['update-memberships-packages'] = "memberships/update_memberships_packages";
$route['register-memberships'] = 'memberships/register_memberships';
$route['delete-memberships'] = "memberships/delete_memberships";
$route['active-memberships'] = "memberships/actived_memberships";
$route['block-memberships'] = 'memberships/block_memberships';
$route['delete-transactions'] = "memberships/delete_transactions";
$route['update-memberships'] = "memberships/update_memberships";
$route['membership-update'] = "memberships/membership_update";
$route['add-memberships'] = 'memberships/add_memberships';
$route['delete-vendor-memberships'] = "memberships/delete_vendor_memberships";
$route['update-vendor-memberships'] = "memberships/update_vendor_memberships";
$route['vendor-membership-update'] = "memberships/vendor_membership_update";
$route['expire'] = 'expire/index';
$route['terms-conditions'] = 'memberships/terms_and_conditions';
$route['kvkk'] = 'memberships/kvkk';
$route['privacy-policy'] = 'memberships/privacy_policy';
$route['about-us'] = 'memberships/about_us';

$route['membershiplans'] = 'memberships/membershiplans';
$route['register-bankinfos'] = 'memberships/register_bankinfos';
$route['buy-package'] = "memberships/buy_package";
$route['credit-card-pay'] = "memberships/credit_card_pay";

$route['contract/create-contract'] = "contract/create_contract";
$route['contract/create-contract/(:num)'] = "contract/create_contract/$1";
$route['contract/new-contracts'] = 'contract/new_contracts';
$route['contract/approved-contracts'] = 'contract/approved_contracts';
$route['contract/rejected-contracts'] = 'contract/rejected_contracts';
$route['contract/paid-contracts'] = 'contract/paid_contracts';
$route['insert-contract'] = "contract/insert_contract";
$route['account-query'] = 'contract/account_query';
$route['approve-contract'] = 'contract/approve_contract';
$route['reject-contract'] = "contract/reject_contract";
$route['remove-contract'] = 'contract/remove_contract';
$route['cash-receive2'] = "contract/cash_recieve2";
$route['reapply-contract'] = "contract/reapply_contract";
$route['contract/promissory/(:any)'] = "contract/promissory/$1";
$route['get-customer-info'] = "contract/get_customer_info";
$route['get-building-homeinfo'] = "contract/get_building_homeinfo";
$route['get-home-info'] = "contract/get_home_info";



$route['payments/contract-details/(:any)'] = 'payments/contract_details/$1';
$route['payments/contract-details'] = 'payments/contract_details';
$route['search-contract'] = 'payments/search_contract';
$route['pay-contract'] = 'payments/pay_contract';
$route['c_fully-paid'] = 'payments/c_fully_paid';
$route['invoice/(:any)'] = "payments/invoice/$1";
$route['evacuation/(:any)'] = "payments/evacuation/$1";
$route['turnkey/(:any)'] = "payments/turnkey/$1";

$route['fully-paid'] = 'payments/fully_paid';

$route['reports'] = 'reports/all_reports';
$route['get-clients'] = 'reports/get_clients';

$route['logout'] = 'claims_controller/logout';
