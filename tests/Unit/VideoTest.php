<?php

namespace Tests\Unit;

use App\Models\Video;
use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    public function test_can_extract_youtube_id_from_watch_url(): void
    {
        $video = new Video(['youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ']);
        $this->assertEquals('dQw4w9WgXcQ', $video->youtube_id);
        $this->assertEquals('https://www.youtube.com/embed/dQw4w9WgXcQ', $video->embed_url);
    }

    public function test_can_extract_youtube_id_from_short_url(): void
    {
        $video = new Video(['youtube_url' => 'https://youtu.be/dQw4w9WgXcQ']);
        $this->assertEquals('dQw4w9WgXcQ', $video->youtube_id);
        $this->assertEquals('https://www.youtube.com/embed/dQw4w9WgXcQ', $video->embed_url);
    }

    public function test_can_extract_youtube_id_from_shorts_url(): void
    {
        $video = new Video(['youtube_url' => 'https://www.youtube.com/shorts/dQw4w9WgXcQ']);
        $this->assertEquals('dQw4w9WgXcQ', $video->youtube_id);
        $this->assertEquals('https://www.youtube.com/embed/dQw4w9WgXcQ', $video->embed_url);
    }

    public function test_handles_raw_id(): void
    {
        $video = new Video(['youtube_url' => 'dQw4w9WgXcQ']);
        $this->assertEquals('dQw4w9WgXcQ', $video->youtube_id);
    }

    public function test_handles_invalid_url_gracefully(): void
    {
        $video = new Video(['youtube_url' => 'https://invalid-domain.com/video']);
        $this->assertNull($video->youtube_id);
        $this->assertNull($video->embed_url);
    }
}
