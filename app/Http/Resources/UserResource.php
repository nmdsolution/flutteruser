<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{


    public function toArray($request)
    {
        // Map Domain User model values
        return [
            'data' => [
                'id' => $this->getId()->value(),
                'name' => $this->getName()->getValue(),
                'email' => $this->getemail()->value(),
                'emailVerifiedDate' => $this->getEmailVerifiedDate()->getvalue(),
                'createAt' => $this->getCreateAt(),
                'updatedAt' => $this->getUpdatedAt(),
            ]
        ];
    }
}
