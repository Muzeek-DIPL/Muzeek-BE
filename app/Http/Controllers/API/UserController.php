<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseBuilder;
use App\Models\Musician;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected static $default_values = [
        'about' => '',
        'location' => '',
        'img_link' => 'https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/default_avatar.png?alt=media&token=01f59951-b62a-462b-b50a-fb27de146e0c',
    ];

    // Method ini digunakan untuk mendaftarkan user ke dalam sistem
    // @param $request: Http Request berupa JSON
    // @return: data user dan access token atau pesan error dalam format JSON
    public function register(Request $request)
    {
        // Validasi http request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'full_name' => 'required|string|min:3',
            'phone' => 'required|string',
        ]);
        // Mengembalikan response error jika validasi gagal
        if ($validator->fails()) {
            return ResponseBuilder::error($validator->errors()->all(), 422);
        }

        // Membuat user baru melalui ORM User
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'about' => self::$default_values['about'],
            'location' => self::$default_values['location'],
            'img_link' => self::$default_values['img_link'],
        ]);

        // Membuat access_token
        $token = $user->createToken('auth_token')->plainTextToken;
        $user->published = false;

        // Mengembalikan response berhasil dengan data user dan access_token
        return ResponseBuilder::success([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], "Register success");
    }

    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('username', 'password'))) {
            return ResponseBuilder::error(['Invalid username or password'], 401);
        }

        $user = User::where('username', $request['username'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        if (Musician::where('user_id', $user->id)->first()) {
            $user->published = true;
        } else {
            $user->published = false;
        }

        return ResponseBuilder::success([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], "Login success");
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'full_name' => 'required|string|min:3',
            'phone' => 'required|string',
            'about' => 'string',
            'location' => 'string',
            'img_link' => 'string',
        ]);
        if ($validator->fails()) {
            return ResponseBuilder::error($validator->errors()->all(), 422);
        }

        $user = User::find($request->user()->id);
        $user->email = $request->email;
        $user->full_name = $request->full_name;
        $user->about = $request->about == '' ? $user->about : $request->about;
        $user->location = $request->location == '' ? $user->location : $request->location;
        $user->phone = $request->phone;
        $user->img_link = $request->img_link == '' ? $user->img_link : $request->img_link;
        $user->save();

        return ResponseBuilder::success($user, "Update success");
    }

    public function logout()
    {
        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return ResponseBuilder::success(null, "Logout success");
    }

    // Method ini digunakan untuk mem-publish user menjadi musisi
    // @param $request: Http Request
    // @return: pesan "Profile unpublished" atau "Profile published" dalam format JSON
    public function publish(Request $request)
    {
        // Mengembalikan pesan "Profile unpublished" jika status user adalah musisi
        if ($musician = Musician::where('user_id', $request->user()->id)->first()) {
            $musician->delete();
            return ResponseBuilder::success(null, "Profile unpublished");
        }

        // Simpan user ke dalam tabel musisi
        Musician::create([
            'user_id' => $request->user()->id,
            'instrument' => "Other",
            'likes' => 0,
        ]);

        // Mengembalikan pesan "Profile published"
        return ResponseBuilder::success(null, "Profile published");
    }

    public function update_instrument(Request $request){
        $validator = Validator::make($request->all(), [
            'instrument' => 'required|string',
        ]);
        if ($validator->fails()) {
            return ResponseBuilder::error($validator->errors()->all(), 422);
        }

        $musician = Musician::where('user_id', $request->user()->id)->first();
        $musician->instrument = $request->instrument;
        $musician->save();

        return ResponseBuilder::success(null, "Instrument updated");
    }
}