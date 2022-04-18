<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'name_users' => $this->name_users,
            'email' => $this->email,
            'password'=>$this->password,
            'sex_users' => $this->sex_users,
            'created_at_time_users' => $this->created_at_time_users,
            'address_users' => $this->address_users,
            'phone_users' => $this->phone_users,
        ];
    }
}
