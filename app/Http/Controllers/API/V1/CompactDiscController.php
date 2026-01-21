<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\CompactDiscCreateRequest;
use App\Http\Requests\API\V1\CompactDiscUpdateRequest;
use App\Http\Resources\API\V1\CompactDiscResource;
use App\Models\CompactDisc;

class CompactDiscController extends Controller
{
    public function index()
    {
        return CompactDiscResource::collection(CompactDisc::query()->paginate());
    }

    public function store(CompactDiscCreateRequest $request)
    {
        $compactDiscData = $request->safe()->only([
            'artist',
            'album_name',
            'number_of_songs',
            'released_on'
        ]);

        $shelfItemData = $request->safe()->only([
            'rating',
            'acquired_on',
            'last_used_on',
            'status',
            'purchase_price',
            'purchase_location',
            'description'
        ]);

        $compactDisc = CompactDisc::firstOrCreate($compactDiscData);

        $shelfItemData['itemable_type'] = CompactDisc::class;
        $shelfItemData['itemable_id'] = $compactDisc->id;

        $request->user()->shelfItems()->create($shelfItemData);

        return response()->json([
            'status' => 201,
            'message' => 'success'
        ]);
    }

    public function show(CompactDisc $compactDisc)
    {
    }

    public function update(CompactDiscUpdateRequest $request, CompactDisc $compactDisc)
    {
    }

    public function destroy(CompactDisc $compactDisc)
    {
    }
}
