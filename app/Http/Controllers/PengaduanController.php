<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\masyarakat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Alert;
use Redirect;

class PengaduanController extends Controller
{    
    
    public function index(){
        if(Auth::check()){
            if(Auth::user()->level === 'admin'){
            return redirect('/adminIndex');
            }elseif(Auth::user()->level === 'petugas'){
                return redirect('/petugasIndex');
            }else{
                return redirect('/home');
            }
        }else{
            return view('index',['active'=>'index']);
        }
        
    }
    public function home(){
        if(Auth::check()){
            $verify = Auth::user()->is_verified;
            if($verify != '0'){
                $getDate = DB::table('pengaduan')->where('nik',Auth::user()->nik)->where('status','selesai')->where('is_deleted','0')->join('tanggapan','pengaduan.id_pengaduan','=','tanggapan.id_pengaduan')->join('petugas','petugas.id_petugas','=','tanggapan.id_petugas')->value('sent_at');;
                $date = Carbon::parse($getDate)->format('d F Y');
                $notif = DB::table('pengaduan')->where('nik',Auth::user()->nik)->where('status','selesai')->where('is_deleted','0')->join('tanggapan','pengaduan.id_pengaduan','=','tanggapan.id_pengaduan')->join('petugas','petugas.id_petugas','=','tanggapan.id_petugas')->orderBy('sent_at','desc')->get();
                
                return view('home',['active'=>'home'],compact('notif','date'));
            }else{
                return view('not_verified',['active'=>'not_verified']);
            }
            
        }else{
            return redirect('/');
        }
    }
    public function pengaduan(){
        if(Auth::check()){
            return view('pengaduan',['active'=>'pengaduan','status' => '0']);
        }else{
            return redirect('/');
        }   
    }
    public function riwayat($id){
        if(Auth::check()){
            $data = DB::table('pengaduan')->where('nik',$id)->where('is_deleted','0')->get();
            $dataCount = DB::table('pengaduan')->where('nik',$id)->where('is_deleted','0')->count();
            $tanggapan = DB::table('tanggapan')->where('nik',$id)->join('pengaduan','tanggapan.id_pengaduan','=','pengaduan.id_pengaduan')->join('petugas','tanggapan.id_petugas','=','petugas.id_petugas')->get();
            return view('riwayat',['active'=>'riwayat'],compact('data','dataCount','tanggapan'));
        }else{
            return redirect('/');
        }
    }

    public function profil(){
        if(Auth::check()){
        return view('profil',['active'=>'profile']);
    }else{
        return redirect('/');
    }   
}
    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt($request->only('username','password'))) {
            if(Auth::check()){
                if(Auth::user()->level === 'admin'){
                    $request->session()->regenerate();
                    return redirect('/adminIndex')->withSuccess('Success');
                
                }else{
                    $request->session()->regenerate();
                    return redirect('/petugasIndex')->withSuccess('Success');
                }
            }else{
                return redirect('/')->withError('Error');
            }
            }else{
            if(Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect()->intended('/home');
            }else{
                return Redirect::back()->withErrors(['msg' => 'Username and Password are incorrect']);
            }
        }
    }
    

    public function admin(){
        if(Auth::check()){
            if(Auth::user()->level == 'admin'){
                return view('admin.index',["title"=> "title"]);
        }else{
            return Redirect::back();
        }
            }
    }

    public function petugas(){
        if(Auth::check()){
            if(Auth::user()->level == 'petugas'){
                return view('petugas.index',["title"=> "title"]);
            }else{
                return Redirect::back();
            }
        }
        
    }

    public function petugasPengaduan(){
        if(Auth::user()->level === "petugas"){
            $pengaduan = DB::table('pengaduan')->where('status','0')->get();
            return view('petugas.pengaduan',["title" => "pengaduan"],compact('pengaduan'));
            }elseif(Auth::user()->level === "admin"){
                $pengaduan = DB::table('pengaduan')->where('status','0')->get();

                return view('admin.pengaduan',["title" => "pengaduan"],compact('pengaduan'));
            }else{
                return redirect('/home')->withError('Access not allowed');
            }
    }

    public function akunPetugas(){
        if(Auth::user()->level === "petugas"){
        $dataakun = DB::table('masyarakat')->where('is_verified','0')->where('error_code',
        
        )->get();
        $errorCode = DB::table('error')->get();
        return view('petugas.akunmasyarakat',["title" => "akun"],compact('dataakun','errorCode'));
        }elseif(Auth::user()->level === "admin"){
            $dataakun = DB::table('masyarakat')->where('is_verified','0')->where('error_code',null)->get();
            $errorCode = DB::table('error')->get();
            return view('admin.akunmasyarakat',["title" => "akun"],compact('dataakun','errorCode'));
        }else{
            return redirect('/home')->withError('Access not allowed');
        }
    }
    public function konfirmasi_akun(Request $request){
        $timestamp = DB::raw('CURRENT_TIMESTAMP');
        $nik = $request->nik;
        $change = DB::table('masyarakat')->where('nik',$nik)->update([
            'is_verified' => '1',
            'verified_by' => Auth::user()->nama_petugas,
            'verified_at' => $timestamp
        ]);
        if($change){
            return redirect('/akunA')->withSuccess('Success');
        }else{
            return redirect ('/akunA')->withError('Error');
        }
    }

    public function register(Request $request){

        $request->validate([
                'nik' => 'required|unique:masyarakat',
                'name' => 'required',
                'password' => 'required|min:6',
                'username' => 'required|unique:masyarakat',
                'telp' => 'required',
            ]
        );
            $data = $request->all();
            $check = $this->create($data);
          if(!is_null($check)){
            return redirect('/home')->withSuccess('Account Registered');
        }else{
            return redirect('/home')->withError('Error, something wrong');
        }
    }
    public function create(array $data)
    {
        return masyarakat::create([
        'nama' => $data['name'],
        'nik' => $data['nik'],
        'telp' => $data['telp'],
        'username' => $data['username'],
        'password' => Hash::make($data['password']),
      ]);
    }   

    public function logout(Request $request){
        Session::flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home');

    }

    public function kirim_pengaduan(Request $request){
        if(Auth::check()){
            $validation = $request->validate(
                [
                    'g-recaptcha-response' => 'required|captcha',
                    'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]
            );
            $date = Carbon::now()->format('Y-m-d');
            $timestamp = DB::raw('CURRENT_TIMESTAMP');
            $image_file = $request->file('foto');
            $image_name = rand().'.'.$image_file->getClientOriginalExtension();
            $save = $image_file->move(public_path('img_pengaduan'),$image_name);
            
            $insert = DB::table('pengaduan')->insert([
                'nik' => Auth::user()->nik,
                'isi_laporan' => $request->isi,
                'foto' => $image_name,
                'created_at' => $timestamp,                
                'tgl_pengaduan' => $date
            ]);
            if($validation){
                if($insert){
                    return redirect('/pengaduan')->withSuccess('Mengirim Pengaduan berhasil');
                }else{
                    return redirect('/pengaduan')->with('pengaduan', 'Error ');
                }
                }else{
                    return redirect('/pengaduan')->with('pengaduan', 'Error');
                }
        }else{
            return redirect('/pengaduan')->with('pengaduan', 'Error');
        }
    }

    public function edit_profil(Request $request,$id,$username){
       
             if(!$request->validate([
                'nama' => 'required|max:35',
                'telp' => 'required|max:13'])){
                return redirect('/profil')->with('edit','error')->withError('Error Validation Fails');
            }else{
                        DB::table('masyarakat')->where('nik',$id)->update([
                            'nama' => $request->nama,
                            'telp' => $request->telp
                        ]);
                        return redirect('/profil')->withSuccess('Successfully Editing Datas'); 
                    }
                   
                
                }
                
        public function memberikan_tanggapan(Request $request){
            if(Auth::check()){
                $date = Carbon::now()->format('Y-m-d');
                $timestamp = DB::raw('CURRENT_TIMESTAMP');
                if($request->validate([
                    'tanggapan' => 'required|max:255'
                ])){
                    $insert = DB::table('tanggapan')->insert([
                        'id_pengaduan' => $request->id_pengaduan,
                        'tgl_tanggapan' => $date,
                        'tanggapan' => $request->tanggapan,
                        'id_petugas' => Auth::user()->id_petugas,
                        'sent_at' => $timestamp,
                    ]);
                    if($insert){
                        DB::table('pengaduan')->where('id_pengaduan',$request->id_pengaduan)->update([
                            'status' => 'selesai',
                        ]);
                        return redirect('/pengaduanA')->withSuccess('Successfuly Memberikan Tanggapan');
                    }else{
                        return redirect('/')->withError('error insert');
                    }

                }else{
                    return redirect('/')->with('tanggapan','error');
                }

            }else{
                return redirect('/')->withError('Access not allowed');
            }

        }
                
        public function tolak_akun(Request $request,$nik){
            if(Auth::check()){
                $timestamp = DB::raw('CURRENT_TIMESTAMP');
                $update = DB::table('masyarakat')->where('nik',$nik)->update([
                    'error_code' => $request->alasan
                ]);
                if($update){
                    return redirect('/akunA')->withSuccess('Successfully Denied Account');
                }else{
                    return redirect('/akunA')->withError('error');
                }
            }else{
                return redirect('/')->withError('Access Denied');
                }
        }
        
    public function arsip_tanggapan($id,$nik){
        $update = DB::table('pengaduan')->where('id_pengaduan',$id)->update([
            'is_deleted' => '1'
        ]);
        if($update){
            $a = Auth::user()->nik;
            return redirect('/riwayat/'.$a)->withSuccess('Dipindahkan ke arsip');
        }else{
            
            return redirect('/riwayat/'.$a)->withSuccess('Gagal dipindahkan ke arsip');
        }
    }

    public function arsipUser($nik){
        $data = DB::table('pengaduan')->where('nik',$nik)->where('is_deleted','1')->get();
        return view('arsip',['active'=>''],compact('data'));
    }

    
}
