<?php

namespace App\Http\Controllers;

use App\EmailCredetial;
use App\Mail\SendCredential;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PHPExcel_IOFactory;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        if ($request->get('type') == 0) {
            try {

                $file = $request->file('file');
                if($file->getClientOriginalExtension() != 'xlsx')
                    return response(['message'=>'Please upload only Excel files'],404);
                if ($file == null)
                    return response(['message' => 'Error in uploading your file'], 500);
                $inputFileType = PHPExcel_IOFactory::identify($file);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($file);
            } catch (Exception $e) {
                return response(['messge' => 'Error in uploading file to the server'], 500);
            }
            $sheet = $objPHPExcel->getSheet(0);
            $sheetValue = [];
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            $university = [];
            for ($row = 2; $row <= $highestRow; $row++) {
                //  Read a row of data into an array
                $university[$row - 2] = new UniversityFile();
                $university[$row - 2]->name = $sheet->getCell('A' . $row)->getValue();
                if (!ctype_alpha($university[$row - 2]->name))
                    return response(['message' => 'Name field contains other than alphabets ']);
                $university[$row - 2]->location = $sheet->getCell('B' . $row)->getValue();
                $university[$row - 2]->state = $sheet->getCell('C' . $row)->getValue();
                $university[$row - 2]->phone = $sheet->getCell('D' . $row)->getValue();
                if (!ctype_digit($university[$row - 2]->phone))
                    return response(['message' => 'Name field contains other than numbers ']);
            }
            foreach ($university as $uni) {
                DB::table('table_university')->insert([
                    'name' => $uni->name,
                    'location' => $uni->location,
                    'state' => $uni->state,
                    'phone' => $uni->phone
                ]);
            }

            return response(['message' => 'University details has been uploaded successfully'], 200);
        } elseif ($request->get('type') == 1) {

            try {
                $file = $request->file('file');
                if($file->getClientOriginalExtension() != 'xlsx')
                    return response(['message'=>'Please upload only Excel files'],404);
                if ($file == null)
                    return response(['message' => 'Error in uploading your file'], 500);
                $inputFileType = PHPExcel_IOFactory::identify($file);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($file);
            } catch (Exception $e) {
                return response(['messge' => 'Error in uploading file to the server'], 500);
            }
            $sheet = $objPHPExcel->getSheet(0);
            $sheetValue = [];
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            $ombudsman = [];

            for ($row = 2; $row <= $highestRow; $row++) {
                //  Read a row of data into an array
                $ombudsman[$row - 2] = new UniversityFile();
                $ombudsman[$row - 2]->name = $sheet->getCell('A' . $row)->getValue();
                if (!ctype_alpha($ombudsman[$row - 2]->name))
                    return response(['message' => 'Name field contains other than alphabets ']);
                $ombudsman[$row - 2]->university_name = $sheet->getCell('B' . $row)->getValue();
                $ombudsman[$row - 2]->email = $sheet->getCell('C' . $row)->getValue();
                $ombudsman[$row - 2]->phone = $sheet->getCell('D' . $row)->getValue();
                if (!ctype_digit($ombudsman[$row - 2]->name))
                    return response(['message' => 'Phone field contains other than numbers ']);
            }
            foreach ($ombudsman as $uni) {

                $university = DB::table('table_university')->where('name', 'like', $uni->university_name)
                    ->get(['id'])->first();
                if ($university == null)
                    return response(['message' => 'Sorry university is not found in our table. Please upload the university id first. University name is ' . $uni->university_name], 404);
                $user = new User();
                $user->email = $uni->email;
                $user->password = Hash::make(UtilityController::getPassword($uni->name, $uni->email));
                $user->roles = 'Ombudsman';
                $user->username = $uni->name;
                $user->save();
                $user_id = DB::table('users')->orderBy('created_at', 'desc')->get(['id'])->first();
                DB::table('user_ombudsman')->insert([
                    'name' => $uni->name,
                    'university_id' => $university->id,
                    'phone' => $uni->phone,
                    'user_id' => $user_id->id,
                ]);
                $data = [
                    'username' => $uni->email,
                    'password' => UtilityController::getPassword($uni->name, $uni->email)
                ];
                $emailCredential = new EmailCredetial();
                $emailCredential->username = $uni->email;
                $emailCredential->password = UtilityController::getPassword($uni->name, $uni->email);
                Mail::to($uni->email)->send(new SendCredential($emailCredential));

            }


            return response(['message' => 'Ombudsman details has been uploaded successfully'], 200);
        } else
            return response(['message' => 'Invalid type for upload'], 404);


    }
}

class UniversityFile{
    public $name;
    public $location;
    public $state;
    public $phone;
}

class OmbudsmanFile{
    public $name;
    public $university_name;
    public $email;
    public $phone;
}

class CollegeFile{
    public $name;
    public  $university_name;
    public $state;
    public $location;
}

