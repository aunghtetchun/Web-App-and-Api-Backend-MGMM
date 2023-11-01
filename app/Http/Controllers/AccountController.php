<?php

namespace App\Http\Controllers;

use App\Account;
use App\Skin;
use App\Photo;
use App\Seller;
use App\AccountSkin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts=Account::all();
        return view('account.index',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required',
            'server_id' => 'required',
            'seller_id' => 'required',
            'type' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'skin_id' => 'array',
            'profile' => 'required', // Assuming profile is an image file
            'images'=>'required',
        ]);
    
        // Handle profile photo upload
        if ($request->hasFile('profile')){
           $newName = uniqid()."_profile.".$request->file("profile")->getClientOriginalExtension();
           $image_resize = Image::make($request->file("profile"));
           $image_resize->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
            });
           $image_resize->save(public_path('storage/profile/' .$newName));
        }
    
        // Create an account
        $account = new Account;
        $account->game_id = $request->input('game_id');
        $account->server_id = $request->input('server_id');
        $account->seller_id = $request->input('seller_id');
        $account->type = $request->input('type');
        $account->title = $request->input('title');
        $account->security = Seller::find($request->input('seller_id'))->level;
        $account->price = $request->input('price');
        $account->description = $request->input('description');
        $account->profile = $newName;
        $account->save();
        
        if($request->input('skin_id')){
            // Attach skins to the account
            $account->skins()->attach($request->input('skin_id'));
        }
       
        if ($request->hasFile('images')){
            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_post.png";
                $image_resize = Image::make($image);
                $image_resize->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save(public_path('storage/skins/' .$newName));

                $photo=new Photo();
                $photo->name=$newName;
                $aa=Account::get()->last();
                $photo->account_id=$aa->id;
                $photo->save();
            }
        }
    
        return redirect()->route('account.index')->with('success', 'Account created successfully.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return view('account.show',compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('account.edit',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $request->validate([
            'game_id' => 'required',
            'server_id' => 'required',
            'type' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'skin_id' => 'array',
        ]);
    
        // Handle profile photo upload
        if ($request->hasFile('profile')){
           $newName = uniqid()."_profile.".$request->file("profile")->getClientOriginalExtension();
           $image_resize = Image::make($request->file("profile"));
           $image_resize->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
            });
           $image_resize->save(public_path('storage/profile/' .$newName));
            $account->profile = $newName;
        }
    
        // Create an account
        $account->game_id = $request->input('game_id');
        $account->server_id = $request->input('server_id');
        $account->type = $request->input('type');
        $account->title = $request->input('title');
        $account->price = $request->input('price');
        $account->description = $request->input('description');
        $account->update();
        if($request->input('skin_id')){
            AccountSkin::where('account_id',$account->id)->delete();
            // Attach skins to the account
            $account->skins()->attach($request->input('skin_id'));
        }
       
        return redirect()->route('account.index')->with('success', 'Account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $old=Photo::where('account_id',$account->id)->get();
        foreach ($old as $o){
            unlink(storage_path('/app/public/skins/'.$o->name));
        }
        Photo::where('account_id',$account->id)->delete();
        AccountSkin::where('account_id',$account->id)->delete();
        $account->delete();
        return redirect()->route('account.index')->with('success', 'Account deleted successfully.');
    }
}
