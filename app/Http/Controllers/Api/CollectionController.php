<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CollectionRequest;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

class CollectionController extends Controller
{
    public function getCollections()
    {
        $user = JWTAuth::parseToken()->toUser();
        $collections = Collection::all();
        $response = [
          'collections' => $collections,
            'user' => $user
        ];
        return response()->json($response);
    }

    public function getCollection($id)
    {
        $collection = Collection::find($id);
        if (!$collection){
            return response()->json(['message' => 'Collection not found!'], 404);
        }
        $response = [
            'collections' => $collection
        ];
        return response()->json($response);
    }

    public function saveCollection(CollectionRequest $request)
    {
        $collection = new Collection();
        $collection->fill($request->request->all());
        $collection->save();
        return response()->json(['collection' => $collection], 201);
    }

    public function updateCollection(CollectionRequest $request, $id)
    {
        $collection = Collection::find($id);
        if (!$collection){
            return response()->json(['message' => 'Collection not found!'], 404);
        }
        $collection->fill($request->request->all());
        $collection->save();
        return response()->json(['collection' => $collection], 201);
    }

    public function deleteCollection($id){
        $collection = Collection::find($id);
        if (!$collection){
            return response()->json(['message' => 'Collection not found!'], 404);
        }
        $collection->delete();
        return response()->json(['message' => 'Collection deleted!'], 200);
    }

}
