<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\CompactDiscCreateRequest;
use App\Http\Requests\API\V1\CompactDiscUpdateRequest;
use App\Models\CompactDisc;

class CompactDiscController extends Controller
{
    public function index()
    {

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
