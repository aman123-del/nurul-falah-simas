<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'judul',
        'keterangan',
        'youtube_url',
    ];

    /**
     * Dapatkan ID YouTube dari berbagai format URL (watch, youtu.be, shorts, embed)
     */
    public function getYoutubeIdAttribute(): ?string
    {
        $url = trim((string) $this->youtube_url);
        if (empty($url)) {
            return null;
        }

        // Cek jika user langsung memasukkan 11 karakter ID YouTube
        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', $url)) {
            return $url;
        }

        // Ekstrak ID dari URL
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|youtube\.com\/shorts\/)([a-zA-Z0-9_-]{11})/i', $url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    /**
     * Dapatkan URL Embed YouTube yang valid untuk iframe
     */
    public function getEmbedUrlAttribute(): ?string
    {
        $id = $this->youtube_id;
        return $id ? "https://www.youtube.com/embed/{$id}" : null;
    }

    /**
     * Dapatkan Thumbnail resolusi tinggi dari YouTube
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        $id = $this->youtube_id;
        return $id ? "https://img.youtube.com/vi/{$id}/hqdefault.jpg" : null;
    }
}
