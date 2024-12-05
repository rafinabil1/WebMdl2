<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Mengembalikan data post dengan penyesuaian untuk menambahkan status dan message
        return [
            'success' => true, // Menambahkan status sukses
            'message' => 'Data Post Ditemukan', // Pesan status
            'data' => [
                'id' => $this->id,
                'title' => $this->title,
                'content' => $this->content,
                'image_url' => url('/storage/posts/' . $this->image), // Menambahkan URL untuk gambar
                'created_at' => $this->created_at->format('Y-m-d H:i:s'), // Format tanggal
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'), // Format tanggal
            ],
        ];
    }
}
