<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'welcome';
$route['ipanel'] = 'ipanel/login';

$route['aboutus']='welcome/aboutus';
$route['faq']='welcome/faq';
$route['testimonials']="welcome/feedback";
$route['writefeedback']="welcome/writefeedback";
$route['submitfeedback']="welcome/submitfeedback";
$route['contact']="welcome/contact";


$route['terms-policy']='welcome/termsconditions';
$route['privacy-policy']='welcome/privacypolicy';
$route['disclaimer']='welcome/disclaimer';
$route['return-policy']='welcome/returnrefund';
$route['delivery-time']='welcome/deliverytime';
$route['cancellation']='welcome/cancellation';
$route['Franchise']='welcome/franchisee';
$route['Customization']='welcome/customize';
$route['newarrival'] = 'web/products/getNewArrivals';
$route['todaysdeal'] = 'web/products/getTodaysDeal';
$route['categoryproduct']='web/products/getCategoryWise';
$route['shopbycategory']='web/products/shopbycategory';
$route['shopbybrand']='web/products/shopbybrand';
$route['loadprdoucts/(:num)']='web/products/getproducts/$1';
$route['allprdoucts']='web/products/showallProducts';
$route['filterproducts']='web/products/filterproducts';
$route['moredetails/(:any)/(:any)/(:any)']="web/products/getdetails/$1/$2/$3";
$route['products/(:any)/(:any)']="web/products/getCategoryProducts/$1/$2";
$route['packdetails']="web/products/getPackDetails";


$route['login']="welcome/login";
$route['logout']='web/user/logout';

$route['register']="welcome/register";
$route['verifyemailid'] = 'web/user/isuniqueemail';
$route['registration'] = 'web/user/do_registration';
$route['processlogin'] = 'web/user/do_login';
$route['signup']='web/user/do_signup';       
$route['processtologin'] = 'web/user/do_login_for';
$route['forgetpassword']='welcome/forget';
$route['processtoforget']='web/user/verifytoforget';
$route['changepassword/(:any)/(:any)/(:any)']='web/user/changepassword/$3';
$route['modifypassword']='web/user/resetpassword';

$route['storecart'] = 'web/cart/storecart';
$route['updatecart'] = 'web/cart/updatecart';
$route['cart'] = 'web/cart/showmycart';
$route['placeorder'] = 'web/cart/confirmeorder';

$route['response']='web/cart/payuresponse';
$route['confirmorder']='web/cart/confirmeorder';
$route['txnresponse']='web/cart/ccavResponse';



$route['checkuserlogin']="welcome/checkuserlogin";
$route['wishlist']="web/my/wishlist";
$route['addtowishlist']="web/my/addtowishlist";
$route['deletewish/(:any)']="web/my/deletewish/$1";
$route['myaccount']="web/my/index";
$route['updatemyaccount']='web/my/updatemyaccount';
$route['changename']="web/my/index";
$route['changemobile']="web/my/index";
$route['changepassword']="web/my/index";
$route['updatename']="web/my/updatename";
$route['updatemobile']="web/my/updatemobile";
$route['updatepassword']="web/my/changepassword";
$route['myaddress']="web/my/myaddress";
$route['addaddress']="web/my/addaddress";
$route['editmyaddress/(:any)']="web/my/editmyaddress/$1";
$route['updatemyaddress/(:any)']="web/my/updatemyaddress/$1";
$route['deletemyaddress/(:any)']="web/my/deleteaddress/$1";

$route['myorders']="web/my/order";
$route['orderdetails/(:any)']='web/my/orderdetails/$1';



$route['shipping']='web/cart/shipping';
$route['getlocation']='web/cart/getlocation';
$route['setpincode']='web/cart/sessionpincode';
$route['addshipping']="web/cart/addshipping";
$route['editaddress/(:any)']="web/cart/editaddress/$1";
$route['updateshipping/(:any)']="web/cart/updateshipping/$1";
$route['deleteaddress/(:any)']="web/cart/deleteaddress/$1";
$route['delivertoaddress/(:any)']="web/cart/activateaddress/$1";
$route['checkout']="web/cart/checkout";
$route['disclaimer']="welcome/diclaimer";
$route['privacy-policy']="welcome/privacypolicy";
$route['terms&conditions']="welcome/termsconditions";
$route['return-refund']="welcome/returnrefund";




///////////////////////////////////// ipanel ///////////////////////////////////////////////
$route['ipanel'] = 'ipanel/login';
$route['OrderAjax_list']='ipanel/order/ajax_list';
$route['orders/(:any)']='ipanel/order/index/$1';
$route['orderdetail/(:any)']='ipanel/order/viewdetails/$1';
$route['changeorderstatus']='ipanel/order/changestatus';

$route['customize_product'] = 'welcome/customize_product';
///////////////////////////////////// ipanel /////////////////////////////////////////////


$route['404_override'] = 'welcome/showerror';
$route['translate_uri_dashes'] = FALSE;
