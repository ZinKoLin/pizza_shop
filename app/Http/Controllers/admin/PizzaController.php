<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class PizzaController extends Controller
{
    //list page
    public function pizza(){
        $piza = Pizza::paginate(5);
        if(count($piza) == 0){
            $emptyStatus = 0;
            
        }else{
            $emptyStatus = 1;
        }
        
        return view('admin.pizza.list')->with(['pizalist'=>$piza, 'status'=>$emptyStatus]);
    }


    public function createPizza(){
        return view('admin.pizza.create');
    }

    public function storePizza(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pzname'=> 'required',
            'pzimage'=> 'required',
            'pzprice'=> 'required',
            'publish'=> 'required',
            'pzcategory'=> 'required',
            'pzdiscount'=> 'required',
            'pzbuyOneget'=> 'required',
            'pzwtime'=> 'required',
            'pzdescription'=> 'required',
            
        ]);
 
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $files = $request->file('pzimage');
        $fileName = uniqid().'_'.$files->getClientOriginalName();
        $files->move(public_path().'/uploads/',$fileName);

        $data= $this->requestPizzaData($request, $fileName);

        Pizza::create($data);

        return redirect()->route('admin#pizza')->with(['create'=>'success..store']);

    }

    private function requestPizzaData($request, $fileName){
        return[

            'pizza_name'=> $request->pzname,
            'image'=> $fileName,
            'price'=> $request->pzprice,
            'public_status'=> $request->publish,
            'category_id'=> $request->pzcategory,
            'discount_price'=> $request->pzdiscount,
            'buy_get_one_status'=> $request->pzbuyOneget,
            'waiting_time'=> $request->pzwtime,
            'description'=> $request->pzdescription,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ];

    }

    //delete pizzq
    public function deletePizza($id){
        $data = Pizza::select('image')->where('pizza_id',$id)->first();
        $image = $data['image'];

        Pizza::where('pizza_id',$id)->delete();//delete database

        //public/uploads image delete
        if(File::exists(public_path().'/uploads/'.$image)){
            File::delete(public_path().'/uploads/'.$image);

        }
        return back()->with(['deletesucess'=>'Selected Pizza was Deleted']);
    }
}
