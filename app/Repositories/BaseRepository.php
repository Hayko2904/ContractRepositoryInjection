<?php


namespace App\Repositories;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseRepository extends Repository
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'success' => true,
                'result' => $this->model::query()->create($request->toArray())
            ];

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            $data = [
                'success' => false,
                'result' => $e->getMessage()
            ];
        }

        return $data;
    }
}
