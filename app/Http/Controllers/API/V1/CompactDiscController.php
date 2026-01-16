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
        return CompactDiscResource::collection(CompactDisc::all());
    }

    public function store(CompactDiscCreateRequest $request)
    {
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
