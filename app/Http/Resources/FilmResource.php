<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'poster' => isset($this->poster) ? asset('/storage/'.$this->poster): asset('/image/no-photo.png'),
            'genres' => $this->genres
        ];
    }

    // public function withResponse($request, $response)
    // {   
    //     $response->header('Charset', 'utf-8');
    //     $response->header('Any-other-header', 'header-value');
    //     $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    // }
}
