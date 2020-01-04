<?php
/*
 * @Description:
 * @Author: LMG
 * @Date: 2020-01-03 23:37:45
 * @LastEditors  : LMG
 * @LastEditTime : 2020-01-03 23:55:18
 */

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Enum\UserEnum;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => UserEnum::getStatusName($this->status),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at
        ];
    }
}