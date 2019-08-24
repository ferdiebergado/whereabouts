<?php

namespace App\Http\Controllers;

use App\Http\Resources\WhereaboutResource;
use App\Whereabout;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class WhereaboutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        return WhereaboutResource::collection(Whereabout::latest('end_date')->paginate($request->length));
    }

    public function show($id)
    {
        return new WhereaboutResource(Whereabout::findOrFail((int) $id));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'activity' => 'required',
            'venue' => 'required',
            'sponsor' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'user_id' => 'required|integer'
        ]);

        DB::beginTransaction();

        try {

            $user = User::findOrFail($request->input('user_id'));

            $whereabout = Whereabout::firstOrCreate($request->only([
                'activity',
                'venue',
                'sponsor',
                'start_date',
                'end_date',
                'user_id'
            ]));

            $user->whereabouts()->save($whereabout);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();

        return new WhereaboutResource($whereabout);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'activity' => 'required',
            'venue' => 'required',
            'sponsor' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'user_id' => 'required|integer'
        ]);

        DB::beginTransaction();

        try {

            $whereabout = Whereabout::findOrFail((int) $id);

            $whereabout->update($request->only([
                'activity',
                'venue',
                'sponsor',
                'start_date',
                'end_date',
                'user_id'
            ]));
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();

        return new WhereaboutResource($whereabout);
    }

    public function destroy($id)
    {

        $whereabout = Whereabout::findOrFail((int) $id);

        if ($whereabout->delete()) {
            return response()->json(['data' => "Resource $id deleted."]);
        }
    }
}
