<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Image;
use App\Models\Padlet;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PadletController extends Controller {
    public function index(): JsonResponse {
        $padlets = Padlet::with(['entries', 'user'])->get();
        return response()->json($padlets, 200);
    }

    public function findById(int $id): JsonResponse {
        $padlet = Padlet::where('id', $id)
            ->with(['entries', 'user'])->first();
        return $padlet != null ? response()->json($padlet, 200) : response()->json(null, 200);
    }

    public function findBySearchTerm(string $searchTerm): JsonResponse {
        $padlets = Padlet::with(['entries', 'user'])
            ->where('title', 'LIKE', '%' . $searchTerm . '%')
            ->orWhereHas('user', function ($query) use ($searchTerm) {
                $query->where('firstName', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('lastName', 'LIKE', '%' . $searchTerm . '%');
            })
            ->orWhereHas('entries', function ($query) use ($searchTerm) {
                $query->where('entryText', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('rating', 'LIKE', '%' . $searchTerm . '%');
            })->get();
        return response()->json($padlets, 200);
    }

    /**
     * save a new padlet
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse {
        $request = $this->parseRequest($request);
        DB::beginTransaction();
        try {
            $padlet = Padlet::create($request->all());

            if (isset($request['entries']) && is_array($request['entries'])) {
                foreach ($request['entries'] as $entry) {
                    $entry = Entry::firstOrNew([
                        'entryText' => $entry['entryText']
                    ]);
                    $padlet->entries()->save($entry);


                }
            }
            DB::commit();
            return response()->json($padlet, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("saving padlet failed: " . $e->getMessage(), 420);
        }
    }

    public function update(Request $request, string $id): JsonResponse {
        DB::beginTransaction();
        try {
            $padlet = Padlet::with(['entries', 'user'])->where('id', $id)->first();
            if ($padlet != null) {
                $padlet->update($request->all());

                //delete all old entries
                $padlet->entries()->delete();
                // save entries
                if (isset($request['entries']) && is_array($request['entries'])) {
                    foreach ($request['entries'] as $entryIndex) {
                        $entry = Entry::firstOrNew([
                            'entryText' => $entryIndex['entryText']
                        ]);
                        $padlet->entries()->save($entry);
                    }
                }

                $padlet->save();
            }
            DB::commit();
            $padlet1 = Padlet::with(['entries', 'user'])
                ->where('id', $id)->first();
            // return a vaild http response
            return response()->json($padlet1, 201);
        } catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating padlet failed: " . $e->getMessage(), 420);
        }
    }

    public function delete(int $id) : JsonResponse {
        $padlet = Padlet::where('id', $id)->first();
        if ($padlet != null) {
            $padlet->delete();
            return response()->json('padlet (' . $id . ', ' . $padlet->title . ') successfully deleted', 200);
        } else {
            return response()->json('padlet could not be deleted - it does not exist', 422);
        }
    }

    public function parseRequest(Request $request): Request {
        return $request;
    }

}
