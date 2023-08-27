<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RequestsCollection;
use App\Http\Requests\RequestsValidation;
use App\Models\RequestsStoreModel;
use App\Models\RequestsUpdateModel;
use App\Enums\RequestsEnum;

class RequestsController extends Controller
{
    // GET
    public function index() {
        return new RequestsCollection(RequestsStoreModel::all());
    }

    // POST
    public function store(RequestsValidation $request) {
        return response()->json(RequestsStoreModel::create(array_merge($request->all(), ['status' => RequestsEnum::Active])));
    }

    // PUT
    public function update(RequestsValidation $request, string $id) {
        RequestsUpdateModel::where('id', $id)->update(array_merge($request->all(), ['status' => RequestsEnum::Resolved]));
        return response()->json(RequestsUpdateModel::Find($id));
    }

    public function delete(string $id) {
        RequestsUpdateModel::where('id', $id)->delete();
        return response()->json(RequestsUpdateModel::Find($id));
    }
}