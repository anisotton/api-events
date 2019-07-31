<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class EventApiController extends Controller
{

    public function __construct(Event $event, Request $request)
    {
        $this->event = $event;
        $this->request = $request;
    }
    /**
     * List events
     *
     * Metodo que lista os eventos do usuario logado
     * 
     * @response {[
     *  "id": 1,
     *  "user_id": 1,
     *  "name": "Event 2",
     *  "description": "Desc event 2",
     *  "cover_image": "2049155d40ad4b9ffdd.png",
     *  "published": 1,
     *  "created_at": "2019-07-30 20:41:05",
     *  "updated_at": "2019-07-31 04:18:23"
     * ]}
     *
     */
    public function index()
    {
        $data = $this->event->where('user_id', auth()->user()->id)->get();
        return response()->json($data);
    }

    /**
     * List all events
     *
     * Metodo que lista todos os eventos publicados
     * 
     * @response {[
     *  "id": 1,
     *  "user_id": 1,
     *  "name": "Event 2",
     *  "description": "Desc event 2",
     *  "cover_image": "2049155d40ad4b9ffdd.png",
     *  "published": 1,
     *  "created_at": "2019-07-30 20:41:05",
     *  "updated_at": "2019-07-31 04:18:23"
     * ]}
     *
     */

    public function allEvents()
    {
        $data = $this->event->where('published', 1)->get();
        return response()->json($data);
    }




/**
     * publish
     *
     * Metodo que publica um evento
     * 
     * @queryParam id Id do evento a ser publicado
     * 
     * @response {
     *  "id": 1,
     *  "user_id": 1,
     *  "name": "Event 2",
     *  "description": "Desc event 2",
     *  "cover_image": "2049155d40ad4b9ffdd.png",
     *  "published": 1,
     *  "created_at": "2019-07-30 20:41:05",
     *  "updated_at": "2019-07-31 04:18:23"
     * }
     *
     */
    public function publish($id, $value = 1)
    {
        if (!$data = $this->event->find($id))
            return response()->json(['error' => "Dado não encontrado"], 404);


        if ($data->user_id != auth()->user()->id)
            return response()->json(['message' => "Non-Authoritative"], 203);

        //dd($value);

        $data->update(['published' => $value]);

        return response()->json($data);
    }

/**
     * Unpublish
     *
     * [Metodo que despublica um evento]
     * 
     * @queryParam id Id do evento a ser despublicado
     * 
     * @response {
     *  "id": 1,
     *  "user_id": 1,
     *  "name": "Event 2",
     *  "description": "Desc event 2",
     *  "cover_image": "2049155d40ad4b9ffdd.png",
     *  "published": 0,
     *  "created_at": "2019-07-30 20:41:05",
     *  "updated_at": "2019-07-31 04:18:23"
     * }
     *
     */
    public function unpublish($id)
    {
        return $this->publish($id, 0);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->event->rules());

        $dataForm = $request->all();

        if ($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            $ext = $request->cover_image->extension();
            $name = uniqid(date('His'));

            $nameFile = "{$name}.{$ext}";

            $upload = Image::make($dataForm['cover_image'])->resize(850, 315)->save(storage_path("app/public/events/{$nameFile}", 100));

            if (!$upload) {
                return response()->json(['error' => "Erro ao fazer upload do arquivo"], 500);
            } else {
                $dataForm['cover_image'] = $nameFile;
            }
        }
        $dataForm['user_id'] = auth()->user()->id;
        $data = $this->event->create($dataForm);

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$data = $this->event->find($id)) {

            if ($data->user_id != auth()->user()->id) {
                return response()->json(['message' => "Non-Authoritative"], 203);
            } else {
                return response()->json(['error' => "Dado não encontrado"], 404);
            }
        } else {
            return response()->json($data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$data = $this->event->find($id))
            return response()->json(['error' => "Dado não encontrado"], 404);


        if ($data->user_id != auth()->user()->id)
            return response()->json(['message' => "Non-Authoritative"], 203);


        $this->validate($request, $this->event->rules());

        $dataForm = $request->all();

        if ($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {

            if ($data->cover_image) {
                Storage::disk('public')->delete("/events/{$data->cover_image}");
            }

            $ext = $request->cover_image->extension();
            $name = uniqid(date('His'));

            $nameFile = "{$name}.{$ext}";

            $upload = Image::make($dataForm['cover_image'])->resize(850, 315)->save(storage_path("app/public/events/{$nameFile}", 100));

            if (!$upload) {
                return response()->json(['error' => "Erro ao fazer upload do arquivo"], 500);
            } else {
                $dataForm['cover_image'] = $nameFile;
            }
        }

        $data->update($dataForm);

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$data = $this->event->find($id))
            return response()->json(['error' => "Dado não encontrado"], 404);

        if ($data->user_id != auth()->user()->id)
            return response()->json(['message' => "Non-Authoritative"], 203);

        if ($data->cover_image) {
            Storage::disk('public')->delete("/events/{$data->cover_image}");
        }

        $data->delete();

        return response()->json(['success' => "Evento deletado com sucesso!"]);
    }
}
