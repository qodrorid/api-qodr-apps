<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\WakatimeTracking;

class DashboardController extends Controller
{
    
    public function wakatime()
    {
        $userId   = Auth::user()->id;
        $wakatime = WakatimeTracking::where('user_id', $userId)->where('date', date('Y-m-d'))->first();
        $languages = '';
        $editors   = '';

        foreach (json_decode($wakatime->languages) as $key => $language) {
            $languages .= $language->name . ', ';
            if ($key === 1) break;
        }

        foreach (json_decode($wakatime->editors) as $key => $editor) {
            $editors .= $editor->name . ', ';
            if ($key === 1) break;
        }

        $result = [
            'conding'  => !is_null($wakatime) ? $wakatime->text_duration : '0 hrs 0 mins',
            'language' => $languages . 'more...',
            'editor'   => $editors . 'more...'
        ];

        return $this->success('success!', $result);
    }

}