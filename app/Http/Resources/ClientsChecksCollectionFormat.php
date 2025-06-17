<?php

namespace App\Http\Resources;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;


class ClientsChecksCollectionFormat extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->typeName(),
            'client' => $this->client(),
            'model' => $this->modelName(),
            'status' => $this->status,
            'created_at' => $this->created_at,
            // 'details' => $this->whenLoaded('details', $this->details)
        ];
    }

    protected function modelName()
    {
        return  Str::snake(class_basename($this->resource));
    }

    protected function typeName()
    {
        return str_replace('_', ' ', ucwords($this->type ?? '', '_'));
    }

    protected function client()
    {
        $client = Client::where('client_id', $this->client_id)->first();
        return  $client->name;
    }

    // protected function createdAt()
    // {
    //     return Carbon::parse($this->created_at)->toDayDateTimeString();
    // }
}
