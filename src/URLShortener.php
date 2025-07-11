<?php

namespace Mauroziux\Laravel\URLShortener;
use Route;

/**
 * Helper class for the URL shortener
 */
class URLShortener
{
    
    public static function routes(array $options = [])
    {
            
        $prefix = config("urlshortener.url_prefix");
        
        if(!empty($prefix)) {
            Route::prefix($prefix)->group(
                function () use ($options) {
                    self::allRoutes($options);
                }
            );
        }else{
            self::allRoutes($options);
        }
        
    }
    
    private static function allRoutes(array $options = [])
    {
        
        if(config('urlshortener.route_resource_enabled')) {
            self::routeResource($options);
        }

        self::routeRedirect($options);
        
    }
    
    public static function routeResource(array $options = [])
    {
        Route::resource('urls', \Mauroziux\Laravel\URLShortener\Http\Controllers\URLController::class);
    }
    
    public static function routeRedirect(array $options = [])
    {

        $prefixCode = config("urlshortener.url_prefix_code");

        Route::get($prefixCode . '{code}', '\Mauroziux\Laravel\URLShortener\Http\Controllers\RedirectController@index')->where('code', '^[^/]+$')->name('urlshortener.redirect');
    }
    
    public static function shorten($url)
    {
        
        $url = new URL([ "url" => $url ]);
        $url->save();

        return $url;
        
    }
    
}
