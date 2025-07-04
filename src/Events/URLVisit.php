<?php

namespace Mauroziux\Laravel\URLShortener\Events;

use Illuminate\Queue\SerializesModels;
use Mauroziux\Laravel\URLShortener\URL;

/**
 * Event emitted when a shortened URL is accessed
 */
class URLVisit
{

    use SerializesModels;

    public $url;

    public function __construct(URL $url)
    {
        $this->url = $url;
    }
}
