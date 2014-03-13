@extends('layouts.default')

@section('content')
<article class="legal">

	<header>
		<h1>{{ $title }}</h1>
	</header>

	<div class="content">
		{{ $body }}
	</div>
</article>
@stop