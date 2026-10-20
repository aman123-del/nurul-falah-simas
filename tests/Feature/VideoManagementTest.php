<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideoManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_welcome_page_shows_videos(): void
    {
        Video::create([
            'judul' => 'Video Profil Santri',
            'keterangan' => 'Dokumentasi profil',
            'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Video Profil Santri');
        $response->assertSee('https://www.youtube.com/embed/dQw4w9WgXcQ');
    }

    public function test_welcome_page_shows_fallback_when_empty(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Video Dokumentasi Sedang Dipersiapkan');
    }

    public function test_guest_cannot_access_video_management(): void
    {
        $response = $this->get(route('video.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_video_list(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('video.index'));
        $response->assertStatus(200);
        $response->assertSee('Manajemen Video Kegiatan');
    }

    public function test_authenticated_user_can_create_video(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('video.store'), [
            'judul' => 'Kajian Rutin Pesantren',
            'keterangan' => 'Kajian ba\'da subuh',
            'youtube_url' => 'https://youtu.be/dQw4w9WgXcQ',
        ]);

        $response->assertRedirect(route('video.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('videos', [
            'judul' => 'Kajian Rutin Pesantren',
            'youtube_url' => 'https://youtu.be/dQw4w9WgXcQ',
        ]);
    }

    public function test_authenticated_user_can_update_video(): void
    {
        $user = User::factory()->create();
        $video = Video::create([
            'judul' => 'Judul Lama',
            'keterangan' => 'Ket Lama',
            'youtube_url' => 'https://youtu.be/dQw4w9WgXcQ',
        ]);

        $response = $this->actingAs($user)->put(route('video.update', $video->id), [
            'judul' => 'Judul Baru Diperbarui',
            'keterangan' => 'Ket Baru',
            'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);

        $response->assertRedirect(route('video.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('videos', [
            'id' => $video->id,
            'judul' => 'Judul Baru Diperbarui',
        ]);
    }

    public function test_authenticated_user_can_delete_video(): void
    {
        $user = User::factory()->create();
        $video = Video::create([
            'judul' => 'Video Akan Dihapus',
            'youtube_url' => 'https://youtu.be/dQw4w9WgXcQ',
        ]);

        $response = $this->actingAs($user)->delete(route('video.destroy', $video->id));

        $response->assertRedirect(route('video.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('videos', [
            'id' => $video->id,
        ]);
    }
}
