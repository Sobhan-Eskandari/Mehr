<?php

namespace App\Http\Controllers;

use App\Market;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    /**
     * Return View file
     *
     * @var array
     */
    public function Backup()
    {
        return view('excel.exportImport');
    }

    /**
     * File Export Code
     *
     * @var array
     */
    public function downloadBackupUsers(Request $request, $type)
    {
        $users = User::get()->toArray();
        return Excel::create('All-Users', function($excel) use ($users) {
            $excel->sheet('mySheet', function($sheet) use ($users)
            {
                $sheet->fromArray($users);
            });
        })->download($type);
    }

    public function downloadBackupMarkets(Request $request, $type)
    {
        $markets = Market::get()->toArray();
        return Excel::create('All-Markets', function($excel) use ($markets) {
            $excel->sheet('mySheet', function($sheet) use ($markets)
            {
                $sheet->fromArray($markets);
            });
        })->download($type);
    }

    /**
     * Import file into database Code
     *
     * @var array
     */
    public function uploadBackupUsers(Request $request)
    {
        if($request->hasFile('import_file_user')){
//            if($request->file('import_file_user')->getClientOriginalExtension() === 'xlsx'){
            $path = $request->file('import_file_user')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        /**
                         * the columns we want to add to database
                         */
                        foreach ($value as $v) {
                            $insert[] = [
                                'systemic_code' => $v['systemic_code'],
                                'first_name' => $v['first_name'],
                                'last_name' => $v['last_name'],
                                'social_security_number' => $v['social_security_number'],
                                'education' => $v['education'],
                                'occupation' => $v['occupation'],
                                'state' => $v['state'],
                                'city' => $v['city'],
                                'address' => $v['address'],
                                'zip' => $v['zip'],
                                'home_tel' => $v['home_tel'],
                                'work_tel' => $v['work_tel'],
                                'emergency_tel' => $v['emergency_tel'],
                                'cell_1' => $v['cell_1'],
                                'cell_2' => $v['cell_2'],
                                'email' => $v['email'],
                                'bank_name' => $v['bank_name'],
                                'bank_card_number' => $v['bank_card_number'],
                                'bank_account_number' => $v['bank_account_number'],
                                'zhenic_card_number' => $v['zhenic_card_number'],
                                'marketer' => $v['marketer'],
                                'acquainted_by' => $v['acquainted_by'],
                                'description' => $v['description'],
                                'creator_id' => $v['creator_id'],
                                'editor_id' => $v['editor_id'],
                                'role' => $v['role'],
                                'password' => bcrypt($v['password']),
                                'last_logged_in_at' => $v['last_logged_in_at'],
                                'created_at' => $v['created_at'],
                                'updated_at' => $v['updated_at'],
                            ];
                        }
                    }
                }


                if(!empty($insert)){
                    User::insert($insert);
                    return back()->with('success','فایل با موفقیت بارگذاری شد');
                }

            }
//            }
        }

        return back()->with('error','لطفاً فایل خود را بررسی کنید، جایی از آن مشکل دارد!');
    }

    public function uploadBackupMarkets(Request $request)
    {
        if($request->hasFile('import_file_market')){
//            if($request->file('import_file_market')->getClientOriginalExtension() === 'xlsx'){
            $path = $request->file('import_file_market')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        /**
                         * the columns we want to add to database
                         */
                        foreach ($value as $v) {
                            $insert[] = [
                                'systemic_code' => $v['systemic_code'],
                                'user_id' => $v['user_id'],
                                'market_name' => $v['market_name'],
                                'state' => $v['state'],
                                'city' => $v['city'],
                                'address' => $v['address'],
                                'zip' => $v['zip'],
                                'longitude' => $v['longitude'],
                                'latitude' => $v['latitude'],
                                'normal_percentage' => $v['normal_percentage'],
                                'special_percentage' => $v['special_percentage'],
                                'special_percentage_start' => $v['special_percentage_start'],
                                'special_percentage_end' => $v['special_percentage_end'],
                                'contract_start' => $v['contract_start'],
                                'contract_end' => $v['contract_end'],
                                'market_type' => $v['market_type'],
                                'start' => $v['start'],
                                'end' => $v['end'],
                                'point' => $v['point'],
                                'pos' => $v['pos'],
                                'marketer' => $v['marketer'],
                                'acquainted_by' => $v['acquainted_by'],
                                'description' => $v['description'],
                                'creator_id' => $v['creator_id'],
                                'editor_id' => $v['editor_id'],
                                'created_at' => $v['created_at'],
                                'updated_at' => $v['updated_at'],
                            ];
                        }
                    }
                }


                if(!empty($insert)){
                    Market::insert($insert);
                    return back()->with('success','فایل با موفقیت بارگذاری شد');
                }

            }
//            }
        }

        return back()->with('error','لطفاً فایل خود را بررسی کنید، جایی از آن مشکل دارد!');
    }
}
