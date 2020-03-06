<div class="white-box">
	<h3 class="box-title dib">{!! $title ?? '' !!}</h3>
	<span class="pull-right">
        {{ $buttons ?? '' }}
    </span>
    {{ $slot }}

    {{ $bottom ?? ''}}
</div>