<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RequestsCollection;
use App\Http\Requests\RequestsValidation;
use App\Models\RequestsModel;

class RequestsController extends Controller
{
    // GET
    public function index() {
        return new RequestsCollection(RequestsModel::all());
    }

    // POST
    public function store(RequestsValidation $request) {
        return response()->json(RequestsModel::create($request->all()));
    }

    // PUT
    public function update(RequestsValidation $request) {
        return Address::update($request->all());
    }
}