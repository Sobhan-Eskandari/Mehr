<?php

namespace App\Http\Controllers;

use App\Categorable;
use App\Category;
use App\RegType;
use App\RegTypeable;
use App\User;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminDashboard.customer.index', ['users' => User::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        $banks = [
            'پارسیان'=>'پارسیان',
            'ملی'=>'ملی',
            'سپه'=>'سپه',
            'صنعت و معدن'=>'صنعت و معدن',
            'کشاورزی'=>'کشاورزی',
            'مسکن'=>'مسکن',
            'توسعه تعاون'=>'توسعه تعاون',
            'اقتصاد نوین'=>'اقتصاد نوین',
            'کارآفرین'=>'کارآفرین',
            'سامان'=>'سامان',
            'پاسارگارد'=>'پاسارگاد',
            'سرمایه'=>'سرمایه',
            'سینا'=>'سینا',
            'شهر'=>'شهر',
            'دی'=>'دی',
            'انصار'=>'انصار',
            'تجارت'=>'تجارت',
            'رفاه کارگران'=>'رفاه کارگران',
            'صادرات ایران'=>'صادرات ایران',
            'ملت'=>'ملت',
            'حکمت ایرانیان'=>'حکمت ایرانیان',
            'گردشگری'=>'گردشگری',
            'قوانین'=>'قوامین',
            'ایران زمین'=>'ایران زمین',
            'خاورماینه'=>'خاورمیانه',
            'آینده'=>'آینده',
            'مهر اقتصاد'=>'مهر اقتصاد',
            'توسعه صادرات ایران'=>'توسعه صادرات ایران'
        ];

        $regTypes = RegType::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();
        return view('adminDashboard.customer.create', compact('states', 'banks', 'regTypes', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();

        $input['description'] = $input['text'];

        $input['password'] = bcrypt($request->password);

        $user = User::create($input);

        $user->regTypes()->sync([$input['reg_type']]);

        $user->categories()->sync($input['categories']);

        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        foreach ($user->regTypes as $regType){
            $setRegType = $regType->name;
        }

        foreach ($user->categories as $category){
            $setCategories[] = $category->name;
        }

        return view('adminDashboard.customer.show', compact('user', 'setRegType', 'setCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

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

        $banks = [
            'پارسیان'=>'پارسیان',
            'ملی'=>'ملی',
            'سپه'=>'سپه',
            'صنعت و معدن'=>'صنعت و معدن',
            'کشاورزی'=>'کشاورزی',
            'مسکن'=>'مسکن',
            'توسعه تعاون'=>'توسعه تعاون',
            'اقتصاد نوین'=>'اقتصاد نوین',
            'کارآفرین'=>'کارآفرین',
            'سامان'=>'سامان',
            'پاسارگارد'=>'پاسارگاد',
            'سرمایه'=>'سرمایه',
            'سینا'=>'سینا',
            'شهر'=>'شهر',
            'دی'=>'دی',
            'انصار'=>'انصار',
            'تجارت'=>'تجارت',
            'رفاه کارگران'=>'رفاه کارگران',
            'صادرات ایران'=>'صادرات ایران',
            'ملت'=>'ملت',
            'حکمت ایرانیان'=>'حکمت ایرانیان',
            'گردشگری'=>'گردشگری',
            'قوانین'=>'قوامین',
            'ایران زمین'=>'ایران زمین',
            'خاورماینه'=>'خاورمیانه',
            'آینده'=>'آینده',
            'مهر اقتصاد'=>'مهر اقتصاد',
            'توسعه صادرات ایران'=>'توسعه صادرات ایران'
        ];

        $regTypes = RegType::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();

        return view('adminDashboard.customer.edit', compact('user','states','banks', 'regTypes', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        $input['description'] = $input['text'];

        if(isset($input['reg_type'])){
            $user->regTypes()->sync([$input['reg_type']]);
        }

        if (isset($input['categories'])){
            $user->categories()->sync($input['categories']);
        }

        $user->update($input);

        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        $user = User::withTrashed()->whereId($id)->first();
        $users = User::withTrashed()->whereId($id)->first();
        $user->updated_at = $users->deleted_at;
        $user->save();

        Session::flash('deleted_user', 'کاربر پاک شد');

        return redirect('/customers');
    }
    
	public function NewAppLogin(Request $request){
	        $input = $request->all();
		    if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
	            $user = User::whereEmail($input['email'])
	                ->get([
	                    'id',
	                    'first_name',
	                    'last_name',
	                    'social_security_number',
	                    'state',
	                    'city',
	                    'cell_1',
	                    'email',
	                    'zhenic_card_number',
	                    'role',
	                ]);
	                $user[0]->markets;
	            return Response::json(array(
	                'error' => false,
	                'approve' => true,
	                'user' => $user,
	                'status_code' => 200
	            ));
	
	        } else {
	            return Response::json(array(
	                'error' => false,
	                'approve' => false,
	                'status_code' => 200
	            ));
	        }
	    }

    public function finduser(Request $request){
        $keys = $request->name;
        $keys = trim($keys);
        $key = explode(" ",$keys);
        if(!isset($key[1])){
            $key[1]=$key[0];
        }
        $users = collect();
        $usersTable = User::where('first_name','like',"%{$key[0]}%")->
        orWhere('first_name', 'like', "%{$key[1]}%")->
        orWhere('last_name', 'like', "%{$key[0]}%")->
        orWhere('last_name', 'like', "%{$key[1]}%")->
        orWhere('state', 'like', "%{$keys}%")->
        orWhere('city', 'like', "%{$keys}%")->
        orWhere('social_security_number', 'like', "%{$keys}%")->
        get();
        $categories = Category::where('name','like',"%{$keys}%")->get();
        if(count($usersTable)>0){
            $users = $usersTable;
        }
        if(!empty($categories)) {

            foreach ($categories as $category) {
                $userss = $category->users()->get();
                $users = $users->merge($userss);
            }
        }
        $users = new paginator($users,8,1);
        return view('adminDashboard.customer.index',compact('users'));
    }
}
