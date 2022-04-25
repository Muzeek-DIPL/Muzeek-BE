<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Models\Musician;
use App\Models\UserLikedMusician;
use Illuminate\Http\Request;

class MusicianController extends Controller
{
    protected static $selected_field = [
        'musicians.*',
        'users.about',
        'users.location',
        'users.full_name',
        'users.phone',
        'users.email',
        'users.img_link',
    ];

    protected static $instruments = [
        'Gitar',
        'Bass',
        'Piano',
        'Perkusi',
        'Vokal',
        'Strings',
        'Other',
    ];

    public function get(Request $request)
    {
        $page = $request->input('page') || 1;
        $limit = $page == 1 ? 9 : $page * 9;
        $offset = $page == 1 ? 0 : $page * $limit;

        $sort_param = $request->input('sort_by');
        $order_by = $sort_param == 'likes' ? 'likes' : 'created_at';

        $response = new Musician;
        $key = $request->input('keyword');
        $instrument = empty($request->input('instrument'))
        ? self::$instruments
        : explode(',', $request->input('instrument'));

        if ($key || $instrument) {
            $response = Musician::join('users', 'musicians.user_id', '=', 'users.id')
                ->where('users.location', 'like', '%' . $key . '%')
                ->orWhere('users.full_name', 'like', '%' . $key . '%')
                ->whereIn('musicians.instrument', $instrument)
                ->orderBy('musicians.' . $order_by, 'desc')
                ->offset($offset)
                ->limit($limit)
                ->get(self::$selected_field);
        } else {
            $response = Musician::join('users', 'musicians.user_id', '=', 'users.id')
                ->orderBy($order_by, 'desc')
                ->offset($offset)
                ->limit($limit)
                ->get(self::$selected_field);
        }

        return ResponseBuilder::success($response, "Success");
    }

    public function get_by_id(int $id)
    {
        $response = Musician::join('users', 'musicians.user_id', '=', 'users.id')
            ->select(self::$selected_field)
            ->find($id);

        $response->liked_by = $response->liked_by()->get()->pluck('user_id');

        return ResponseBuilder::success($response, "Success");
    }

    public function like(Request $request, int $id)
    {
        $musician = Musician::find($id);
        $user_liked_musician = $musician->liked_by()
            ->firstWhere('user_id', $request->user()->id);
        if ($user_liked_musician) {
            $user_liked_musician->delete();
            $musician->likes = $musician->likes - 1;
            $musician->save();

            return ResponseBuilder::success(
                ['likes' => $musician->likes],
                "Musician disliked");
        }

        UserLikedMusician::create([
            'user_id' => $request->user()->id,
            'musician_id' => $id,
        ]);

        $musician->likes = $musician->likes + 1;
        $musician->save();

        return ResponseBuilder::success(
            ['likes' => $musician->likes],
            "Musician liked");
    }
}