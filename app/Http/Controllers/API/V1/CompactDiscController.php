<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompactDiscCreateRequest;
use App\Http\Requests\CompactDiscUpdateRequest;
use App\Models\CompactDisc;
use Illuminate\Http\Request;

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
