<?php

namespace App\Repositories;

use App\Helpers\ResponseBuilder;
use App\Interfaces\MusicianInterface;
use App\Models\Musician;
use App\Models\UserLikedMusician;
use Illuminate\Http\Request;

class MusicianRepository implements MusicianInterface
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

    // Method ini digunakan untuk mem-publish user menjadi musisi
    // @param $request: Http Request
    // @return: data musisi sesuai filter dalam format JSON
    public function get(Request $request)
    {
        $sort_param = $request->input('sort_by');
        $order_by = $sort_param == 'likes' ? 'likes' : 'created_at';

        $response = new Musician;
        $key = $request->input('keyword');
        $instrument = empty($request->input('instrument'))
            ? self::$instruments
            : explode(',', $request->input('instrument'));

        if ($key || $instrument) {
            $response = Musician::join('users', 'musicians.user_id', '=', 'users.id')
                ->whereIn('musicians.instrument', $instrument)
                ->where(function ($query) use ($key) {
                    $query->where('users.location', 'ILIKE', '%' . $key . '%')
                        ->orWhere('users.full_name', 'ILIKE', '%' . $key . '%');
                })
                ->orderBy('musicians.' . $order_by, 'desc')
                ->paginate(8, self::$selected_field);
        } else {
            $response = Musician::join('users', 'musicians.user_id', '=', 'users.id')
                ->orderBy($order_by, 'desc')
                ->paginate(8, self::$selected_field);
        }

        return ResponseBuilder::success($response, "Success");
    }

    // Method ini digunakan untuk mengambil data musisi berdasarkan id
    // @param $id: id musisi
    // @return: data musisi sesuai id yang diberikan
    public function get_by_id(int $id)
    {
        // Query ke tabel musisi yang dijoin dengan user berdasarkan id
        $response = Musician::join('users', 'musicians.user_id', '=', 'users.id')
            ->select(self::$selected_field)
            ->find($id);

        // Menambahkan field liked_by pada response dengan mengambil data dari tabel user_liked_musician
        $response->liked_by = $response->liked_by()->get()->pluck('user_id');

        // Mengembalikan data musisi
        return ResponseBuilder::success($response, "Success");
    }

    // Method ini digunakan untuk mengambil data musisi berdasarkan id
    // @param $request: Http Request
    // @param $id: id musisi
    // @return: data jumlah likes dari musisi yang telah diliked oleh user
    public function like(Request $request, int $id)
    {
        // Query ke tabel musisi yang berdasarkan id
        $musician = Musician::find($id);

        // Query ke tabel user_liked_musician berdasarkan id user
        $user_liked_musician = $musician->liked_by()
            ->firstWhere('user_id', $request->user()->id);

        // Jika user sudah pernah meng-like musisi maka kurangi jumlah likes musisi
        // dan hapus record dari tabel user_liked_musician dengan id user saat ini
        if ($user_liked_musician) {
            $user_liked_musician->delete();
            $musician->likes = $musician->likes - 1;
            $musician->save();

            // Mengambalikan data jumlah likes musisi
            return ResponseBuilder::success(
                ['likes' => $musician->likes],
                "Musician disliked"
            );
        }

        // Jika user belum pernah meng-like musisi maka buat record pada tabel user_liked_musician
        // dan tambah jumlah likes musisi
        UserLikedMusician::create([
            'user_id' => $request->user()->id,
            'musician_id' => $id,
        ]);
        $musician->likes = $musician->likes + 1;
        $musician->save();

        // Mengambalikan data jumlah likes musisi
        return ResponseBuilder::success(
            ['likes' => $musician->likes],
            "Musician liked"
        );
    }
}
