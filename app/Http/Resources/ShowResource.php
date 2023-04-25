<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
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
            ['name' => $this->name,
            'server'=>$this->server,
            'account'=>$this->account,
            'username'=>$this->username,
            'password'=>$this->password,
            'type'=>$this->type,
            'network'=>$this->network,
            'noofconn'=>$this->noofconn,
            'phone'=>$this->phone,
            'rental'=>$this->rental,
            'address'=>$this->address,
            'total'=>$this->total,
            'remark'=>$this->remark];
        
    }
}
