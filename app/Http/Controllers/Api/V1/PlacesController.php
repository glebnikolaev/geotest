<?php

namespace App\Http\Controllers\Api\V1;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Place;
use GooglePlaces;

class PlacesController extends Controller
{
    /**
     * Выводим список сохраненных мест
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        return json_encode($places);
    }

    /**
     * Вывод подсказок
     *
     * @param  string $query
     * @return \Illuminate\Http\Response
     */
    public function find(string $query): string
    {
        $response = GooglePlaces::placeAutocomplete($query);

        return json_encode($response);
    }

    /**
     * Сохраняем место в базе
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'api_request' => 'required|max:255',
            'api_response' => 'required',
        ]);

        $place = new Place;
        $place->api_request = $request->api_request;
        $place->api_response = json_encode($request->api_response);
        $place->save();

        return json_encode(['status' => 'success']);

    }

    /**
     * Удаляем место из базы
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::find($id);
        if ($place) {
            $place->forceDelete();
            return json_encode(['status' => 'success']);
        } else {
            return json_encode(['status' => 'failure']);
        }
    }
}
