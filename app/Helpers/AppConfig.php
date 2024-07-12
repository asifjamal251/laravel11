<?php 

if (! function_exists('short_description')) {
    function short_description($str) {
            $description = substr($str, 0, 10);
            return $description;
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



