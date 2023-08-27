<?php

namespace App\Http\Controllers;

use App\Http\Resources\RequestsCollection;
use App\Http\Requests\RequestsValidation;
use App\Models\RequestsStoreModel;
use App\Models\RequestsUpdateModel;
use App\Enums\RequestsEnum;
use App\Models\User;

class RequestsController extends Controller
{    
    /**
     * Получение списка всех заявок
     *
     * @param  string $access_token
     * @return \App\Http\Resources\RequestsCollection
     */    
    public function index(string $access_token = '') {
        if(!empty($access_token)) {
            $filter = User::where('api_token', '=', $access_token)->first();
            
            if ($filter !== null) {
                return new RequestsCollection(RequestsStoreModel::all());
            } else {
                return response()->json(['Введите правильный `access_token`']);
            }
        } else return response()->json(['Введите `access_token`']);
    }
    
    /**
     * Создание заявки после валидации
     *
     * @param  mixed $request
     * @return void|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(RequestsValidation $request) {
        return response()->json(RequestsStoreModel::create(array_merge($request->all(), ['status' => RequestsEnum::Active])));
    }
    
    /**
     * Ответ на заявку после валидации
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(RequestsValidation $request, string $id, string $access_token = '') {
        if(!empty($access_token)) {
            $filter = User::where('api_token', '=', $access_token)->first();
            
            if ($filter !== null) {
                RequestsUpdateModel::where('id', $id)->update(array_merge($request->all(), ['status' => RequestsEnum::Resolved]));
                return response()->json(RequestsUpdateModel::Find($id));
            } else {
                return response()->json(['Введите правильный `access_token`']);
            }
        } else return response()->json(['Введите `access_token`']);
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