<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LanguageController extends Controller
{
    public function switchLang(Request $requset, $lang)
    {
        $previousUrl = url()->previous();

        $previousRequest = app('request')->create($previousUrl);

		$query = $previousRequest->query();

		$routeName = app('router')->getRoutes()->match($previousRequest)->getName();

		$segments = $previousRequest->segments();

		if (array_key_exists($lang, config('translatable.locales'))) {

			if ($routeName && Lang::has('routes.' . $routeName, $lang)) {

				if (count($query)) {
					return redirect()->to($lang . '/' . trans('routes.' . $routeName, [], $lang) . '?' . http_build_query($query));
				}

				return redirect()->to($lang . '/' . trans('routes.' . $routeName, [], $lang));
			}

			$segments[0] = $lang;

			if (count($query)) {
				return redirect()->to(implode('/', $segments) . '?' . http_build_query());
			}

			return redirect()->to(implode('/', $segments));
		}

    }
}
