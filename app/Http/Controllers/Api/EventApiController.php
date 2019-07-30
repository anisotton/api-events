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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->event->all();
        return response()->json($data);
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
            return response()->json(['error' => "Dado não encontrado"], 404);
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

        if ($data->cover_image) {
            Storage::disk('public')->delete("/events/{$data->cover_image}");
        }

        $data->delete();

        return response()->json(['success' => "Evento deletado com sucesso!"]);
    }
}
