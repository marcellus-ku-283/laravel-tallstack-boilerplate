<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Loan\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
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
            'momentum_id' => $this->momentum_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'balance' => $this->balance,
            'security_question_id' => $this->securityAnswer->question_id ?? null,
            'loans' => new Collection($this->whenLoaded('loans')) ?? [],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
