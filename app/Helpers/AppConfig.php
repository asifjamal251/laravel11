<?php 

if (! function_exists('short_description')) {
    function short_description($str) {
            $description = substr($str, 0, 10);
            return $description;
    }
}

<<<<<<< HEAD
// if (!function_exists('adminRoute')) {
//     function adminRoute($slug,$param=null){
//         return route('admin.'.request()->segment(2).'.'.$slug,$param);
//     }
// }

=======
if (!function_exists('adminRoute')) {
    function adminRoute($slug,$param=null){
        return route('admin.'.request()->segment(2).'.'.$slug,$param);
    }
}
if (!function_exists('can')) {
    function can($expression,$type='admin') {
        $expression = strpos($expression, '_')?$expression : $expression.'_'.request()->segment(2);
        return  auth($type)->user()->hasAccess($expression.'_'.request()->segment(2));
    }
}

if (!function_exists('bucketPath')) {
    function bucketPath($name,$image='') {
        return  ('images/'.str_singular($name).'/'.$image);
    }
}
if (!function_exists('bucketUrl')) {
    function bucketUrl($image='',$path='') {       
        return 'https://'.preg_replace('/([^:])(\/{2,})/', '$1/','d2sexodnj2769r.cloudfront.net/'.$path.'/'.$image);          
    }
}
>>>>>>> origin/main
if (!function_exists('cdn')) {
    function cdn($image='',$path='') {
        return bucketUrl($image,$path);          
    }
}

if(!function_exists('get_app_setting')){
    function get_app_setting($setting_type){
        $setting = App\Models\SiteSetting::with(['siteLogo','siteFavicon'])->latest()->first();
        if($setting[$setting_type]){

            if($setting_type == 'logo' && $setting->siteLogo){
                return $setting->siteLogo->file;
            }
            if($setting_type == 'favicon' && $setting->siteFavicon){
                return $setting->siteFavicon->file;
            }

            return $setting[$setting_type];
        }
        return "Undefined request";
    }
}

if (!function_exists('getAdmin')) {
    function getAdmin($get_detail){
        $admin = \Auth::guard('admin')->user();

        if($get_detail != 'password' && $get_detail != 'role' && $get_detail != 'role_id'){
            if($admin[$get_detail]){
                return $admin[$get_detail];
            }
        }

        if ($get_detail == 'role') {
            $admin->with('role')->first();
            return $admin->role->display_name;
        }
        
        return "Undefined request";
    }
}

<<<<<<< HEAD
=======
if (!function_exists('AdminLog')) {
    function AdminLog($request,$logName = 'Basic',$text = 'Nothing') {

        $log = new App\Model\AdminLog;
        $log->admin_id = \Auth::guard('admin')->user()->id??'';
        $log->log_name = $logName;
        $log->route = $request->url();

        $log->ipAddress = $request->ip();
        $log->method = $request->method();
        $log->text = $text;

        $log->save();

    }
}

if (!function_exists('plateRate')) {

    function plateRate($clientID, $plateSize, $type){

        if($type == 'Long Run' || $type == 'long run'){
            $rate = App\Models\ClientPlate::where(['client_id'=> $clientID, 'plate_size' => $plateSize])->value('long_run_rate');
            return $rate;
        }
        else{
            $rate = App\Models\ClientPlate::where(['client_id'=> $clientID, 'plate_size' => $plateSize])->value('short_run_rate');
            return $rate;
        }
        
    }
}


if (!function_exists('plateWeight')) {

    function plateWeight($plateSize, $type){
        $weight = App\Models\PlateStock::where(['type'=> $type, 'size' => $plateSize])->first();
        if($weight != null || $weight != ''){
            return $weight->weight;
        }
        return null;
    }
}

>>>>>>> origin/main




