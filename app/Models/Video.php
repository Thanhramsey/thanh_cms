<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'video_path',
        'embed_url',
        'is_published',
        'order',
    ];

    /**
     * Get the YouTube embed URL from the raw embed_url.
     * This is a simple example, you might need more robust parsing.
     * For YouTube, embed_url could be just the video ID.
     *
     * @return string|null
     */
    public function getYoutubeEmbedUrlAttribute()
    {
        if (empty($this->url)) {
            return null;
        }

        $youtubeId = null;
        $url = $this->url;

        // Pattern for standard YouTube URL: https://www.youtube.com/watch?v=VIDEO_ID
        if (preg_match('/^.*(?:youtu.be\/|v\/|e\/|embed\/|watch\?v=|\?v=)([^&?]*).*$/i', $url, $matches)) {
            $youtubeId = $matches[1];
        }

        if ($youtubeId) {
            return "https://www.youtube.com/embed/" . $youtubeId;
        }

        // If the URL itself is already an embed URL, just return it
        if (Str::startsWith($url, 'https://www.youtube.com/embed/')) {
            return $url;
        }

        return null; // Not a recognized YouTube URL format
    }

    /**
     * Check if the video is an external embed (YouTube/Vimeo).
     *
     * @return bool
     */
    public function isExternalEmbed()
    {
        return !empty($this->embed_url);
    }

    /**
     * Check if the video is a local upload.
     *
     * @return bool
     */
    public function isLocalVideo()
    {
        return !empty($this->video_path);
    }
}