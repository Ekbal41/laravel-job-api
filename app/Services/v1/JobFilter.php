<?php

namespace App\Services\v1;

use Illuminate\Http\Request;

class JobFilter
{
    public function transform(Request $request)
    {
        $allQueryItems = $request->query();
        $queryItems = [];
        foreach ($allQueryItems as $key => $value) {
            if ($key == 'title') {
                $queryItems[] = ['title', 'like', '%' . $value . '%'];
            } elseif ($key == 'location') {
                $queryItems[] = ['location', 'like', '%' . $value . '%'];
            } elseif ($key == 'salary') {
                $queryItems[] = ['salary', 'like', '%' . $value . '%'];
            } elseif ($key == 'time') {
                $queryItems[] = ['time', 'like', '%' . $value . '%'];
            } elseif ($key == 'category') {
                $queryItems[] = ['category', 'like', '%' . $value . '%'];
            } elseif ($key == 'type') {
                $queryItems[] = ['type', 'like', '%' . $value . '%'];
            } elseif ($key == 'description') {
                $queryItems[] = ['description', 'like', '%' . $value . '%'];
            }
        }
        return $queryItems;
    }
}
