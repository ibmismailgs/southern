<?php
    $setting = App\Models\BackEnd\Setting::first();
?>

<footer class="footer">
    <div class="w-100 clearfix">
        <span class="text-center text-sm-left d-md-inline-block">
            @if (empty($setting))
            @else
        	    {{ __('©' . date("Y"))}} <a href="{{ isset($setting) ? $setting->website : ''}}" class="text-primary">{{ isset($setting) ? $setting->name : ''}}, </a>All Rights Reserved
            @endif
        </span>
        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">
            @if (empty($setting))
            @else
                Email: <b class="text-primary">{{ isset($setting) ? $setting->email : ''}}, </b> Phone: <b class="text-primary">{{ isset($setting) ? $setting->phone : ''}}</b>
            @endif
        </span>
    </div>
</footer>
