<?php

namespace Smpl\LoginDigiForSDI\Http\Controllers;

use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class LoginDigiForSDIController extends Controller
{

    public function __construct() 
    {
        $this->urlAuth = env('BASE_URL_API_AUTH', 'localhost:8099');
        $this->urlHrdlive = env('BASE_URL_API_HRDLIVE', 'localhost:8099');
        $this->urlBstar = env('BASE_URL_API_BSTAR', 'localhost:8099');
        $this->Bearertoken = null;
    }

    public function index(Request $request)
    {
    //  dd(view());
     return view('vendor.login.index'); 

    }

    public function auth(Request $request){
        // \Log::channel('reqres')->info('======================================================');
        // \Log::channel('reqres')->info('LOGIN : ');
        // \Log::channel('reqres')->info('ip Address : '. $this->getClientIP());
        // \Log::channel('reqres')->info('username : ' . $request->email);
        // \Log::channel('reqres')->info('======================================================');

        // DIRECT BYPASS
        if($request->email == "digifordsi+"){
            $url="login";

            $param = array(
                // 'username' => $username,
                'username' => "s1700",
                'password' => "welcome1",
                'userType' => 1,
            ); 
    
            $result = $this->postLogin($url,$param);
    
            if( isset($result['boii'])){
                
                $request->session()->regenerate();
                $request->session()->put('data',$result);
                
                if(strpos($result['boii']['data']['nip'], "DIR")  !== false){
                    $request->session()->put('datas','direksi');
                }
                
                return redirect()->route('dashboard');
                // return redirect()->route('puk.performance.index');
    
    
            }else{
                return back()->withErrors([
                    'email' => $result['message'],
                ])->onlyInput('email');
            };
        }
        if($request->email == "dr1234"){
            $request->session()->regenerate();
            $request->session()->put('datas','direksi');

            return redirect()->route('puk.performance.index');
        }
        if($request->email == "s1234"){
            $request->session()->regenerate();
            $request->session()->put('datas','puk');
            
            return redirect()->route('puk.performance.index');
        }
        if($request->email == "local"){
            $data='
            {
                "boii": {
                    "data": {
                        "firstname": "ADANG AHMAD KUNANDAR",
                        "jabatan_created_at": "2020-01-01 16:08:31",
                        "pegawai_id": 937,
                        "jabatan": "DIREKTUR UTAMA",
                        "kode_jabatan": "S01",
                        "created_at": null,
                        "unit_kerja_id": 1499,
                        "level_pangkat_id": 7,
                        "updated_at": null,
                        "nip": "DIR.22.1",
                        "branch_name": "DIREKTUR UTAMA",
                        "fcm_token": "test",
                        "kodediv": null,
                        "term": true,
                        "id": 1012,
                        "unit_kerja_name": "DIREKTUR UTAMA",
                        "access_menu": [],
                        "jabatan_id": 4286,
                        "levelJabatan": 7,
                        "list_pemutus": [],
                        "lastname": null,
                        "branch_code": "000",
                        "foto": "File Photo not found",
                        "user_real_name": "ADANG AHMAD KUNANDAR",
                        "branch_address": "JL. BRAGA NO. 135",
                        "adhoc": [
                            {
                                "jabatan_created_at": "2020-01-01 16:08:31",
                                "pymt": null,
                                "kode_wilayah": "3273",
                                "jabatan": "DIREKTUR BISNIS",
                                "unit_kerja_id": 1498,
                                "jabatan_id": 4284,
                                "level_pangkat_id": 8,
                                "level_jabatan_id": 28,
                                "unit_kerja_id_induk": 1499,
                                "branch_code": "000",
                                "kode": "DBS",
                                "branch_name": "DIREKTUR BISNIS",
                                "branch_address": null,
                                "kodediv": null
                            }
                        ],
                        "hrmis_token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6OTM3LCJucnAiOiIyMDI3OTAiLCJuaXAiOiJESVIuMjIuMSIsInVzZXJfaWQiOjEwMTIsImphYmF0YW5faWQiOjQyODYsInN0YXJ0X3dvcmtpbmdfZGF0ZSI6IjIwMjItMDgtMjQgMDA6MDA6MDAiLCJicmFuY2hfY29kZSI6IjAwMCIsInVuaXRfa2VyamFfaWQiOjE0OTksInJvbGVzIjpbInBlZyJdLCJrb2RlIjoiUzAxIiwibHZscGFuZ2thdCI6NywiaWF0IjoxNjg3NDAyMjI4fQ.UJpPIt_q1RJkvX7I0YvbLqDBUJ2uy9KoQRrK9r-fD6w",
                        "username": "s1700"
                    },
                    "auth": {
                        "authorization": "eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJzMTcwMCIsImF1dGhvcml0aWVzIjpbXSwiaWF0IjoxNjg3NDAyMjI4LCJleHAiOjE2ODc0ODg2Mjh9.VvVDSea4dOIMjka0opVT1OHNRvjeBnW5pQxrrHhS-VeVBemGuN1DbZX4QJbQr0UBDhD5ObEOq9Vx4yEAwV1oCQ",
                        "tokenType": "Bearer ",
                        "scope": "JwtSecretKey",
                        "expiresIn": 86400
                    }
                },
                "userType": "BJBS"
            }
            ';
            $data = json_decode((string)$data, true);
            $request->session()->regenerate();
            $request->session()->put('datas','direksi');
            $request->session()->put('data',$data);

            $data = $request->session()->get('data');
            
            return redirect()->route('landing');
        }
        // END OF DIRECT BYPASS
        $request->validate([
            'email' => ['required'],
        ]);

        $url="login";

        $username = $request->email;
        $password = $request->password;
        $usertype=1;

        $param = array(
            // 'username' => $username,
            'username' => $username,
            'password' => $password,
            'userType' => $usertype,
        ); 

        $result = $this->postLogin($url,$param);

        if( isset($result['boii'])){
            
            // $request->session()->regenerate();
            // $request->session()->put('data',$result);

            session()->regenerate();
            session(['data' => $result]);
            
            if(strpos($result['boii']['data']['nip'], "DIR")  !== false){
                $request->session()->put('datas','direksi');
            }
            
            // return redirect()->route('dashboard');
            // return redirect()->route('puk.performance.index');
            return redirect()->route('landing');



        }else{
            return back()->withErrors([
                'email' => $result['message'],
            ])->onlyInput('email');
        };

    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        // $request->session()->invalidate();
        session()->flush();
        session()->regenerate(true);
        

        return redirect()->intended($this->redirectPath());
    }

    public function postLogin($url, $param) {

        $client = new Client([
            'base_uri' => $this->urlAuth,
            // 'verify' => false
            ]);

        $headers = [
            'Content-Type'      => 'application/json',
            'Connection'       => 'keep-alive',
            'Transfer-Encoding' => 'chunked'
        ];

        $response = $client->post($url, [
            'headers' => $headers,
            'json' => $param
        ]);

        return json_decode((string) $response->getBody(), true);


    }
}
