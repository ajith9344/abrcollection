<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowSimResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return 
        ['name'=>$this->name,
         'network'=>$this->network,
         'noofconn'=>$this->noofconn,
         'date'=>$this->date,
         'phone'=>$this->phone,
         'address'=>$this->address];        
    }
}
