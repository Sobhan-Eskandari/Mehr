<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\EditAdminRequest;
use App\Http\Requests\infoRequest;
use App\Photo;
use App\Photoable;
use App\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminDashboard.setting.index', ['admins' => Admin::paginate(5), 'siteInfo'=> SiteInfo::findOrFail(1)]);
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
        return view('adminDashboard.setting.createAdmin', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateRequest $request)
    {
        $input = $request->all();

        $input['password'] = bcrypt($request->password);

        $admin = Admin::create($input);

        Session::flash('admin_created', 'ادیمن ساخته شد');

        return redirect('/settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

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

        return view('adminDashboard.setting.editAdmin', compact('admin', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        isset($input['create_admin']) ? $input['create_admin'] = 1 : $input['create_admin'] = 0;
        isset($input['edit_admin']) ? $input['edit_admin'] = 1 : $input['edit_admin'] = 0;
        isset($input['delete_admin']) ? $input['delete_admin'] = 1 : $input['delete_admin'] = 0;
        isset($input['create_user']) ? $input['create_user'] = 1 : $input['create_user'] = 0;
        isset($input['edit_user']) ? $input['edit_user'] = 1 : $input['edit_user'] = 0;
        isset($input['delete_user']) ? $input['delete_user'] = 1 : $input['delete_user'] = 0;
        isset($input['create_market']) ? $input['create_market'] = 1 : $input['create_market'] = 0;
        isset($input['edit_market']) ? $input['edit_market'] = 1 : $input['edit_market'] = 0;
        isset($input['delete_market']) ? $input['delete_market'] = 1 : $input['delete_market'] = 0;
        isset($input['create_news']) ? $input['create_news'] = 1 : $input['create_news'] = 0;
        isset($input['edit_news']) ? $input['edit_news'] = 1 : $input['edit_news'] = 0;
        isset($input['delete_news']) ? $input['delete_news'] = 1 : $input['delete_news'] = 0;
        isset($input['view_message']) ? $input['view_message'] = 1 : $input['view_message'] = 0;

        Session::flash('admin_updated', 'ادیمن به روز رسانی شد');

        $admin->update($input);

        return redirect('/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();

        Session::flash('deleted_user', 'ادمین پاک شد');

        return redirect('/settings');
    }

    public function info(infoRequest $request){

        $input = $request->all();
        $siteInfo = SiteInfo::findOrFail(1);

        /**
         * the photos already saved in the database
         */
        foreach ($siteInfo->photos as $photo){
            $setPhotoId[] = $photo->id;
        }

        /**
         * slider 1
         */
        if($file = $request->file('photo_1')){
            if(!empty($setPhotoId[0])){
//                // delete the actual file
//                $siteInfo->photos->delete();
                Photoable::where('photoable_id', '=', 1)
                    ->where('photo_id', '=', $setPhotoId[0])->delete();
                Photo::whereId($setPhotoId[0])->delete();
            }
            $name = time() . $file->getClientOriginalName();
            $file->move('ZhenicImages', $name);
            $photo = Photo::create(['address'=>$name]);
            $photoToSave = Photo::findOrFail($photo->id);
            $siteInfo->photos()->save($photoToSave);
        }

        /**
         * slider 2
         */
        if($file = $request->file('photo_2')){
            if(!empty($setPhotoId[1])){
//                // delete the actual file
//                $siteInfo->photos->delete();
                Photoable::where('photoable_id', '=', 1)
                    ->where('photo_id', '=', $setPhotoId[1])->delete();
                Photo::whereId($setPhotoId[1])->delete();
            }
            $name = time() . $file->getClientOriginalName();
            $file->move('ZhenicImages', $name);
            $photo = Photo::create(['address'=>$name]);
            $photoToSave = Photo::findOrFail($photo->id);
            $siteInfo->photos()->save($photoToSave);
        }

        /**
         * slider 3
         */
        if($file = $request->file('photo_3')){
            if(!empty($setPhotoId[2])){
//                // delete the actual file
//                $siteInfo->photos->delete();
                Photoable::where('photoable_id', '=', 1)
                    ->where('photo_id', '=', $setPhotoId[2])->delete();
                Photo::whereId($setPhotoId[2])->delete();
            }
            $name = time() . $file->getClientOriginalName();
            $file->move('ZhenicImages', $name);
            $photo = Photo::create(['address'=>$name]);
            $photoToSave = Photo::findOrFail($photo->id);
            $siteInfo->photos()->save($photoToSave);
        }

        $siteInfo->update($input);

        return redirect('/settings');
    }
}
