<?php
namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RolePermission;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menus = Menu::whereNull('parent')->orderBy('ordering')->with(['childs'=>function($query){
            $query->orderBy('ordering');
        }])->get();
        return view('admin.menu.list', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:menus,slug',
            'status' => 'required',
        ]);
        $slug = Str::slug($request->name, '_');
        $menu = Menu::firstOrNew(['slug'=>$slug]);
        $menu->name = $request->name;
        $menu->status = $request->status??1;
        $menu->icon = $request->icon;
        if($menu->save()){
            return redirect()->route('admin.menu.index')->with(['class'=>'success','message'=>'Menu created successfully']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'something went wrong !']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return view('admin.menu.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $menu = Menu::where('slug', $id)->first();
        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        if($request->_list){
            foreach ($request->data as $key=>$menu) {
               $parentMenu = Menu::select(['slug', 'ordering','parent'])->where('slug', $menu['id'])->first();
               $parentMenu->parent = NULL;
               $parentMenu->ordering = $key;
               $parentMenu->save();
               if(isset($menu['children'])) {
                    foreach($menu['children'] as $key2 =>$childs) {
                        $childMenu = Menu::select('slug', 'ordering', 'parent')->where('slug', $childs['id'])->first();
                        $childMenu->ordering = $key2;
                        $childMenu->parent = $parentMenu->slug;
                        $childMenu->save();
                    }
               }
            }
            return response()->json(array('error'=>false,'message'=>['Menu updated successfully']));
        }
        $menu = Menu::firstorNew(['slug'=>$request->slug]);
        $menu->name = $request->menu_name;
        $menu->icon = $request->icon;
        $menu->status = $request->status;
        if($menu->save()){
            return redirect()->route('admin.menu.index')->with(['class'=>'success','message'=>'Menu updated successfully']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Something went wrong !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::select('slug', 'parent')->with(['childs'])->where('slug', $id)->first();
        if($menu->childs->count()){
            return response()->json(['class'=>'success', 'message'=>'You need to delete child first.']);
        }else{
            $permisions = Permission::where('menu_slug', $menu->slug)->pluck('permission_key');
            Permission::where('menu_slug', $menu->slug)->delete();
            RolePermission::whereIn('permission_key', $permisions)->delete();
             
            if($menu->delete()){
                return response()->json(['class'=>'success', 'message'=>'Menu deleted successfully']);
            }
            return response()->json(['class'=>'error', 'message'=>'Something went wrong !'], 500);
            
        }
    }
}