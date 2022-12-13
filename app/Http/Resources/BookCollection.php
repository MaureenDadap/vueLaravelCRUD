<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BookCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'title' => $this->title,
        //     'author' => $this->author,
        //     'description' => $this->description,
        //     'year' => $this->year,
        //     'genres' => BookGenreJunctionCollection::collection($this->genres),
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        // ];
    }
}
