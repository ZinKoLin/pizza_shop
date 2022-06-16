<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller

    {

        public function index(){
            return view('admin.home');
        }
    
        #profile
    
        public function profile(){
            $id = optional(Auth::user())->id;

            

            // $id = auth()->user()->id;


            $userdata = User::where('id','=',$id)->first();
            return view('admin.profile.index')->with(['user'=>$userdata]);
        }
    
        public function category(){
    
            $data = Category::paginate(7);
            return view('admin.category.list')->with(['category'=>$data]);
        }
    
    
    
    
        public function categoryCreate()
        {
            return view('admin.category.createCategory');
        }
    
        
        public function categoryStore(Request $request){
    
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                
            ]);
     
            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }
                $data =[
                'category_name' => $request->name];
            
                Category::create($data);
    
           return redirect()->route('admin#category')->with(['categorySuccess'=>'Category Added...']);
        }
    
        public function deleteCategory($id){
            
            Category::where('category_id',$id)->delete();
    
            return back()->with(['categoryDelete'=>'Category Deleted...']);
    
        }
    
        public function updateCategory($id){
    
            $data = Category::where('category_id','=',$id)->first();
            return view('admin.category.edit')->with(['category'=>$data,'updateCategory'=>'Category Updated..']);
        }
    
       
        public function editCategory(Request $request){
    
    
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                
            ]);
     
            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }
    
            $updateData=[
                'category_name' => $request->name
            ];
    
            Category::where('category_id',$request->id)->update($updateData);
    
            return redirect()->route('admin#category')->with(['updateSuccess'=>'Updated Success...']);
    }
    
        //search category
    
        public function searchCategory(Request $request){
    
            $data = Category::where('category_name','like','%'.$request->searchData.'%')->paginate(7);
            return view('admin.category.list')->with(['category'=> $data]);
    
        }
    
    
    
            
        
    }
    

