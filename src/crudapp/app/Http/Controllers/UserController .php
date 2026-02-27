<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
  
class UserController extends Controller
{ 
  
 public function store(Request $request)
    {       
           
           $request->validate([ 'image' => 'required|mimes:jpg,png,jpeg',]);
              
           // Saving an uploaded image 
           $imagePath = $request->file('image')->store('images','public'); 
 
            return back()->with('success','Image Uploaded Successfully!');
    }
}