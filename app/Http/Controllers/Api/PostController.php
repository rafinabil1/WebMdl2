<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Menampilkan semua post.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        // Ambil data post terbaru dengan pagination
        $posts = Post::latest()->paginate(5);

        // Kembalikan data dalam bentuk collection menggunakan PostResource
        return PostResource::collection($posts);
    }

    /**
     * Menampilkan satu post berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Resources\Json\JsonResource
     */
    public function show($id)
    {
        // Temukan post berdasarkan ID
        $post = Post::find($id);

        // Jika post tidak ditemukan, kembalikan response error
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post tidak ditemukan',
            ], 404);
        }

        // Kembalikan data post dalam bentuk PostResource
        return new PostResource($post);
    }

    /**
     * Menyimpan post baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Buat post baru
        $post = Post::create($validated);

        // Kembalikan response sukses
        return response()->json([
            'success' => true,
            'message' => 'Post berhasil dibuat',
            'data' => new PostResource($post),
        ], 201);
    }

    /**
     * Mengupdate post berdasarkan ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Temukan post berdasarkan ID
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post tidak ditemukan',
            ], 404);
        }

        // Validasi data input
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        // Update post
        $post->update($validated);

        // Kembalikan response sukses
        return response()->json([
            'success' => true,
            'message' => 'Post berhasil diupdate',
            'data' => new PostResource($post),
        ]);
    }

    /**
     * Menghapus post berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        // Temukan post berdasarkan ID
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post tidak ditemukan',
            ], 404);
        }

        // Hapus post
        $post->delete();

        // Kembalikan response sukses
        return response()->json([
            'success' => true,
            'message' => 'Post berhasil dihapus',
        ]);
    }
}
