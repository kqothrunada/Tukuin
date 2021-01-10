<?php

namespace App\Http\Controllers;

use App\CartModel;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    function addItem(){
        return view('pages.additem');
    }

    function itemDetail($id){
        $item = Item::find($id);
        return view('pages.itemdetail')->with('item', $item);
    }
    
    function doAddItem(Request $request){
        $item = new Item();

        $validatedData = $request->validate([
        'name' => 'required|max:20',
        'desc' => 'required|min:10',
        'price' => 'required|integer|gte:1000',
        'image' => 'required|image'
        ]);

        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->desc = $request->input('desc');
        $path = $request->image->store('images', 'public');
        $item->image = substr($path, 7);
       
        $item->save();
        return redirect(url('/'));
    }

    function doEditItem(Request $request){
        $item = Item::find($request->id);

        $validatedData = $request->make([
            'name' => 'required|max:20',
            'desc' => 'required|min:20',
            'price' => 'required|integer|gte:1000'
        ]);

        if($request->image){
            $validatedData = $request->validate([
            'image' => 'required|image'
            ]);
           
            $filepath  = public_path().'/storage/images/'.$item->image;
            unlink($filepath);
            $path = $request->image->store('images', 'public');
            $item->image = substr($path, 7);
        }

        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->desc = $request->input('desc');
        
        $item->save();
        return redirect(url('/'));
    }
    
    function edit($id){
        $item = Item::find($id);
        return view('pages.edititem')->with('item', $item);
    }
    
    function deleteItem($id){
        $item = Item::find($id);
        return view('pages.deleteitem')->with('item', $item);
    }
    
    function destroyItem($id){
        $item = Item::find($id);
        $filepath  = public_path().'/storage/images/'.$item->image;
        unlink($filepath);
        $item->delete();
        return redirect('/');
    }
    
    function index(){
        $items = DB::table('items')->paginate(6);
        return view('home', ['items' => $items]);
    }

    function search(Request $request){
        $search = $request->search;

        $items = DB::table('items')
        ->where('name','like',"%".$search."%")->paginate();

        return view('home', ['items' => $items]);
    }
}
