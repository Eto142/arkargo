<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentEmail extends Model
{
    protected $fillable = [
        'to',
        'subject',
        'message',
        'attachment_name',
        'attachment_mime',
        'attachment_data',
    ];

    protected $hidden = [
        'attachment_data',
    ];

    public function hasAttachment(): bool
    {
        return ! empty($this->attachment_name);
    }

    public function isImageAttachment(): bool
    {
        return $this->hasAttachment() && str_starts_with((string) $this->attachment_mime, 'image/');
    }
}
