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

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $ext = $request->image->extension();
            $name = uniqid(date('His'));

            $nameFile = "{$name}.{$ext}";

            $upload = Image::make($dataForm['image'])->resize(800, 600)->save(storage_path("app/public/events/{$nameFile}",100));

            if(!$upload){
                return response()->json(['error' => "Erro ao fazer upload do arquivo"],500);
            }else{
                $dataForm['image'] = $nameFile;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
