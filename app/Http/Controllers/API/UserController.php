<?php
namespace App\Http\Controllers\API;

use App\Helpers\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Models\Musician;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'full_name' => 'required|string|min:3',
            'phone' => 'required|string',
        ]);
        if ($validator->fails()) {
            return ResponseBuilder::error($validator->errors()->all(), 422);
        }
        error_log('username: ' . $request->username);
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

        $token = $user->createToken('auth_token')->plainTextToken;
        $user->published = false;

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

    public function publish(Request $request)
    {
        if ($musician = Musician::where('user_id', $request->user()->id)->first()) {
            $musician->delete();
            return ResponseBuilder::success(null, "Profile unpublished");
        }

        Musician::create([
            'user_id' => $request->user()->id,
            'instrument' => "Other",
            'likes' => 0,
        ]);
        return ResponseBuilder::success(null, "Profile published");
    }
}