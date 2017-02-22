<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\EditMarketRequest;
use App\Http\Requests\marketRequest;
use App\logo;
use App\Market;
use App\Mategorty;
use App\Photo;
use App\RegType;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Morilog\Jalali\Facades\jDate;

class marketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markets = Market::paginate(8);
        return view('adminDashboard.market.index',compact('markets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   $states = [
        '0'=>'انتخاب کنید',
        'آذربایجان شرقی'=>'آذربایجان شرقی',
        'آذربایجان غربی'=>'آذربایجان غربی',
        'اردبیل'=>'اردبیل',
        'اصفهان'=>'اصفهان',
        'البرز'=>'البرز',
        'ایلام'=>'ایلام',
        'بوشهر'=>'بوشهر',
        'تهران'=>'تهران',
        'چهارمحال و بختیاری'=>'چهارمحال و بختیاری',
        'خراسان جنوبی'=>'خراسان جنوبی',
        'خراسان رضوی'=>'خراسان رضوی',
        'خراسان شمالی'=>'خراسان شمالی',
        'خوزستان'=>'خوزستان',
        'زنجان'=>'زنجان',
        'سمنان'=>'سمنان',
        'سیستان و بلوچستان'=>'سیستان و بلوچستان',
        'فارس'=>'فارس',
        'قزوین'=>'قزوین',
        'قم'=>'قم',
        'کردستان'=>'کردستان',
        'کرمان'=>'کرمان',
        'کرمانشاه'=>'کرمانشاه',
        'کهکیلویه و بویراحمد'=>'کهکیلویه و بویراحمد',
        'گلستان'=>'گلستان',
        'گیلان'=>'گیلان',
        'لرستان'=>'لرستان',
        'مازندران'=>'مازندران',
        'مرکزی'=>'مرکزی',
        'هرمزگان'=>'هرمزگان',
        'همدان'=>'همدان',
        'یزد'=>'یزد'
    ];

        $user = User::find($id);
        $marketCategories = Mategorty::pluck('name','id')->all();
        $systemicCategories = Category::pluck('name','id')->all();
        $regTypes = RegType::pluck('name','id')->all();
        $tags = Tag::pluck('name','id')->all();
        return view('adminDashboard.market.create',compact('user','states','marketCategories','systemicCategories','regTypes','tags'));
    }
    //////find seller
    public function searchSeller(Request $request){
        $fullname = $request->name;
        $name = explode(" ",$fullname);
        if(!isset($name[1])){
            $name[1]=$name[0];
        }
        $users = User::where('first_name', 'like', "%{$name[0]}%")->orWhere('last_name', 'like', "%{$name[1]}%")->
        orWhere('first_name', 'like', "%{$name[1]}%")->orWhere('last_name', 'like', "%{$name[0]}%")
            ->whereRole(1)->get();
        //return redirect('markets/find')->with('users',$users);
        return view('adminDashboard.market.findOwner', compact('users'));

    }

    public function searchSSeller(){
        return view('adminDashboard.market.findOwner');
    }
    //////find marketer

    public function searchMarketer(Request $request){
        $fullname = $request->name;
        $name = explode(" ", $fullname);
        if (!isset($name[1])) {
            $name[1] = $name[0];
        }
        $users = User::where('first_name', 'like', "%{$name[0]}%")->orWhere('last_name', 'like', "%{$name[1]}%")->
        orWhere('first_name', 'like', "%{$name[1]}%")->orWhere('last_name', 'like', "%{$name[0]}%")->get();
        //return redirect('markets/find')->with('users',$users);
        return view('adminDashboard.market.FindMarketer', compact('users'));

    }
    public function searchMMarketer(){
        return view('adminDashboard.market.FindMarketer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Redirect
     */
    public function store(marketRequest $request)
    {
        $newTagId=[];
        $input = $request->all();

        foreach ($input as $key => $value){
            if($value == ''){
                $input[$key] = null;
            }
        }

        $input['contract_start']=str_replace('/','-',$request->contract_start);
        $input['contract_end']=str_replace('/','-',$request->contract_end);

        if(empty($input['contract_start'])){
            $input['contract_start'] = jDate::forge('now')->format('date');
        }

        if(empty($input['contract_end'])){
            $end = explode('-',$input['contract_start']);
            $end[0] = $end[0] + 1;
            $end = implode('-',$end);
            $input['contract_end'] = $end;
        }

        $input['special_percentage_start']=str_replace('/','-',$request->special_percentage_start);
        $input['special_percentage_end']=str_replace('/','-',$request->special_percentage_end);
        $input['start']=str_replace('/','-',$request->start);
        $input['end']=str_replace('/','-',$request->end);
        $input['creator_id'] = 0;

        if($newTags = $request->newTags){
            $newTagss = explode(",",$newTags);
            foreach ($newTagss as $newTag){
                $result = Tag::whereName($newTag)->first();
                if(!empty($result)){
                    $newTagId[] =  $result->id;
                }else{
                    $made = Tag::create(['name'=>$newTag]);
                    $newTagId[] = $made->id;
                }
            }
        }

        $market = Market::create($input);

        if($tags = $request->tags || !empty($newTagId)){
            $tags = $request->tags;
            if(!empty($newTagId)){
                foreach ($newTagId as $ids){
                    $tags[] = $ids;
                }
            }
            $market->tags()->sync($tags);
        }

        if($categories = $request->categories){
            $market->categories()->attach($categories);
        }

        if($regType = $request->regType){
            $market->regTypes()->attach($regType);
        }

        if($marketCategories = $request->marketsCategories){
            $market->mategories()->attach($marketCategories);
        }

        $images[] = $request->file('img1');
        $images[] = $request->file('img2');
        $images[] = $request->file('img3');

        foreach ($images as $image){
            if($image) {
                $name = time() . $image->getClientOriginalName();
                $photo = Photo::create(['address' => $name]);
                $image->move('marketsPhotos', $name);
                $market->photos()->save($photo);
            }else{
//                $photo = Photo::find(1);
//                $market->photos()->save($photo);
            }
        }

        if($logo = $request->file('logo')){
            $name = time() . $logo->getClientOriginalName();
            $photo =new logo(['address' => $name]);
            $logo->move('marketsPhotos', $name);
            $market->logo()->save($photo);
        }else{
//            $logo = logo::find(1);
//            $market->logo()->save($logo);
        }

        Session::flash('message', 'فروشگاه ساخته شد');

        return redirect('/markets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mategoryName = "";
        $TagName = "";
        $categoryName = "";
        $regName = "";
        $market = Market::findOrFail($id);
        $mategories = $market->mategories;
        $tags = $market->tags;
        $categories = $market->categories;
        $regs = $market->regTypes;
        foreach ($mategories as $mategory){
            $mategoryName = $mategoryName . ",". $mategory->name;
        }
        foreach ($tags as $tag){
            $TagName = $TagName . ",". $tag->name;
        }
        foreach ($categories as $category){
            $categoryName = $categoryName . ",". $category->name;
        }
        foreach ($regs as $reg){
            $regName = $regName . ",". $reg->name;
        }
        $mategoryName = ltrim($mategoryName, ",");
        $TagName = ltrim($TagName, ",");
        $categoryName = ltrim($categoryName, ",");
        $regName = ltrim($regName, ",");
       // dd($market->photos[0]->address);
        $user = User::findOrFail($market->user_id);
        return view('adminDashboard.market.show',compact('market','user','mategoryName','TagName','categoryName','regName'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($marketId,$sellerId)
    {
        $states = [
            '0'=>'انتخاب کنید',
            'آذربایجان شرقی'=>'آذربایجان شرقی',
            'آذربایجان غربی'=>'آذربایجان غربی',
            'اردبیل'=>'اردبیل',
            'اصفهان'=>'اصفهان',
            'البرز'=>'البرز',
            'ایلام'=>'ایلام',
            'بوشهر'=>'بوشهر',
            'تهران'=>'تهران',
            'چهارمحال و بختیاری'=>'چهارمحال و بختیاری',
            'خراسان جنوبی'=>'خراسان جنوبی',
            'خراسان رضوی'=>'خراسان رضوی',
            'خراسان شمالی'=>'خراسان شمالی',
            'خوزستان'=>'خوزستان',
            'زنجان'=>'زنجان',
            'سمنان'=>'سمنان',
            'سیستان و بلوچستان'=>'سیستان و بلوچستان',
            'فارس'=>'فارس',
            'قزوین'=>'قزوین',
            'قم'=>'قم',
            'کردستان'=>'کردستان',
            'کرمان'=>'کرمان',
            'کرمانشاه'=>'کرمانشاه',
            'کهکیلویه و بویراحمد'=>'کهکیلویه و بویراحمد',
            'گلستان'=>'گلستان',
            'گیلان'=>'گیلان',
            'لرستان'=>'لرستان',
            'مازندران'=>'مازندران',
            'مرکزی'=>'مرکزی',
            'هرمزگان'=>'هرمزگان',
            'همدان'=>'همدان',
            'یزد'=>'یزد'
        ];

        $marketCategories = Mategorty::pluck('name','id')->all();
        $systemicCategories = Category::pluck('name','id')->all();
        $regTypes = RegType::pluck('name','id')->all();
        $tags = Tag::pluck('name','id')->all();
        $user = User::find($sellerId);
        $market = Market::find($marketId);
        $images = [];
        if($market->photos) {
            foreach ($market->photos as $photo) {
                $images[] = $photo->address;
            }
        }
        // dd($images);
        return view('adminDashboard.market.edit',compact('user','market','states','marketCategories','systemicCategories','regTypes','tags','images'));
    }
    public function searchSellerEdit(Request $request,$marketId){
        $fullname = $request->name;
        $name = explode(" ",$fullname);
        if(!isset($name[1])){
            $name[1]=$name[0];
        }
        $users = User::where('first_name', 'like', "%{$name[0]}%")->orWhere('last_name', 'like', "%{$name[1]}%")->
        orWhere('first_name', 'like', "%{$name[1]}%")->orWhere('last_name', 'like', "%{$name[0]}%")
            ->whereRole(1)->get();
        $market = Market::find($marketId);
        return view('adminDashboard.market.findOwnerEdit', compact('users','market'));

    }
    public function searchSSellerEdit($marketId){
        $market = Market::find($marketId);
        return view('adminDashboard.market.findOwnerEdit',compact('market'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Redirect
     */
    public function update(EditMarketRequest $request, $id)
    {
        $input = $request->all();

        foreach ($input as $key => $value){
            if($value == ''){
                $input[$key] = null;
            }
        }

        $input['contract_end']=str_replace('/','-',$request->contract_end);
        $input['contract_start']=str_replace('/','-',$request->contract_start);
        $input['special_percentage_start']=str_replace('/','-',$request->special_percentage_start);
        $input['special_percentage_end']=str_replace('/','-',$request->special_percentage_end);
        $input['start']=str_replace('/','-',$request->start);
        $input['end']=str_replace('/','-',$request->end);
        $input['creator_id'] = 0;

        if($newTags = $request->newTags){
            $newTagss = explode(",",$newTags);
            foreach ($newTagss as $newTag){
                $result = Tag::whereName($newTag)->first();
                if(!empty($result)){
                    $newTagId[] =  $result->id;
                }else{
                    $made = Tag::create(['name'=>$newTag]);
                    $newTagId[] = $made->id;
                }
            }
        }

        $market = Market::findOrFail($id);

        if($tags = $request->tags || !empty($newTagId)){
            $tags = $request->tags;
            if(!empty($newTagId)){
                foreach ($newTagId as $ids){
                    $tags[] = $ids;
                }
            }
            $market->tags()->sync($tags);
        }else{
            $market->tags()->detach();
        }

        if($categories = $request->categories){
            $market->categories()->sync($categories);
        }else{
            $market->categories()->detach();
        }

        if($regType[] = $request->regType){
            $market->regTypes()->sync($regType);
        }else{
            $market->regTypes()->detach();
        }

        if($marketCategories = $request->marketsCategories){
            $market->mategories()->sync($marketCategories);
        }else{
            $market->mategories()->detach();
        }

        $photos = $market->photos;

	    if($file = $request->file('img1')){
            if(count($photos) != 0 && isset($photos[0])){
                File::delete('marketsPhotos/' . $photos[0]->address);
                Photo::find($photos[0]->id)->delete();
                $market->photos()->detach($photos[0]->id);
            }
            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['address' => $name]);
            $file->move('marketsPhotos', $name);
            $market->photos()->save($photo);
        }

        if($file = $request->file('img2')){
            if(count($photos) != 0 && isset($photos[1])){
                File::delete('marketsPhotos/' . $photos[1]->address);
                Photo::find($photos[1]->id)->delete();
                $market->photos()->detach($photos[1]->id);
            }
            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['address' => $name]);
            $file->move('marketsPhotos', $name);
            $market->photos()->save($photo);
        }

        if($file = $request->file('img3')){
            if(count($photos) != 0 && isset($photos[2])){
                File::delete('marketsPhotos/' . $photos[2]->address);
                Photo::find($photos[2]->id)->delete();
                $market->photos()->detach($photos[2]->id);
            }
            $name = time() . $file->getClientOriginalName();
            $photo = Photo::create(['address' => $name]);
            $file->move('marketsPhotos', $name);
            $market->photos()->save($photo);
        }
        
        if($logo = $request->file('logo')){
            $setLogo = $market->logo();
            if(isset($setLogo)){
                $market->logo()->delete();

            }
            $name = time() . $logo->getClientOriginalName();
            $photo =new logo(['address' => $name]);
            $logo->move('marketsPhotos', $name);
            $market->logo()->save($photo);
        }

        $market->update($input);

        Session::flash('message', 'فروشگاه به روز شد');

        return redirect('/markets');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Market::findOrFail($id)->delete();
        $market = Market::withTrashed()->whereId($id)->first();
        $markets = Market::withTrashed()->whereId($id)->first();
        $market->updated_at = $markets->deleted_at;
        $market->save();

        Session::flash('message', 'فروشگاه پاک شد');

//        $market = Market::findOrFail($id);
//        $market->delete();

        return redirect('/markets');
    }

    public function findmarket(Request $request){
        $marketsName = Market::where('market_name','like',"%{$request->name}%")->orWhere('city', 'like', "%{$request->name}%")
            ->orWhere('state', 'like', "%{$request->name}%")->get();

        $tags = Tag::Where('name', 'like', "%{$request->name}%")->get();

        $mategories = Mategorty::Where('name', 'like', "%{$request->name}%")->get();

        $categories = Category::where('name','like',"%{$request->name}%")->get();

        $markets = collect();
        if(count($marketsName)>0){
            $markets = $marketsName;
        }
        if(count($tags)>0) {

            foreach ($tags as $tag) {
                $marketss = $tag->markets()->get();
                $markets = $markets->merge($marketss);
            }
        }
        if(count($mategories)>0) {
            foreach ($mategories as $mategory) {
                $marketss = $mategory->markets()->get();
                $markets = $markets->merge($marketss);
            }
        }
        if(count($categories)>0) {
            foreach ($categories as $category) {
                $marketss = $category->markets()->get();
                $markets = $markets->merge($marketss);
            }
        }
        $markets = new paginator($markets,8,1);
        return view('adminDashboard.market.index',compact('markets'));
    }
}
