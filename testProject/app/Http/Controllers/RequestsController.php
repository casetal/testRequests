<?php

namespace App\Http\Controllers;

use App\Http\Resources\RequestsCollection;
use App\Http\Requests\RequestsValidation;
use App\Models\RequestsStoreModel;
use App\Models\RequestsUpdateModel;
use App\Enums\RequestsEnum;

class RequestsController extends Controller
{    
    /**
     * Получение списка всех заявок
     *
     * @return \App\Http\Resources\RequestsCollection
     */
    public function index() {
        return new RequestsCollection(RequestsStoreModel::all());
    }
    
    /**
     * Создание заявки
     *
     * @param  mixed $request
     * @return void|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(RequestsValidation $request) {
        return response()->json(RequestsStoreModel::create(array_merge($request->all(), ['status' => RequestsEnum::Active])));
    }
    
    /**
     * Ответ на заявку
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(RequestsValidation $request, string $id) {
        RequestsUpdateModel::where('id', $id)->update(array_merge($request->all(), ['status' => RequestsEnum::Resolved]));
        return response()->json(RequestsUpdateModel::Find($id));
    }
    
    /**
     * Удаление заявки
     *
     * @param  mixed $id
     * @return void|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function delete(string $id) {
        RequestsUpdateModel::where('id', $id)->delete();
        return response()->json(RequestsUpdateModel::Find($id));
    }
}