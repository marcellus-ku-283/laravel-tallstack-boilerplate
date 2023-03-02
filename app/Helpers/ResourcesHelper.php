<?php

namespace App\Helpers;

class ResourcesHelper
{
    public static function collection($data = [], $keys = [])
    {
        if (empty($keys)) {
            return collect($data);
        }
        sort($keys);
        return collect($data)->map(function ($item) use ($keys) {
            $element = [];
            collect($keys)->each(function ($key) use ($item, &$element) {
                if (array_key_exists($key, $item)) {
                    $element[$key] = $item[$key];
                }
            });
            return $element;
        });
    }

    public static function resource($resource, $keys = [])
    {
        if (empty($keys)) {
            return $resource;
        }
        sort($keys);
        $element = [];
        collect($keys)->each(function ($key) use ($resource, &$element) {
            if (array_key_exists($key, $resource)) {
                $element[$key] = $resource[$key];
            }
        });
        return $element;
    }
}
