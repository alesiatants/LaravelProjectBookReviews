@extends('layouts.app')
@section('content')
	<h1 class="mb-10 text-2xl">Add Review for {{$book->title}}</h1>
	<form action="{{route('books.reviews.store',$book)}}" method="POST">
	@csrf
	<label for="review">Review</label>
<textarea name="review" id="review" required class="input mb-4" @class(['border-red-500'=> $errors->has('review')])>{{old('long_description')}}</textarea>
@error('review')
		<p class='error'>{{$message}}</p>
	@enderror
<label for="rating">Rating</label>
<select name="rating" id="rating" required class="input mb-4" @class(['border-red-500'=> $errors->has('rating')])>
<option value="">Select a rating</option>
@for ($i=1; $i<=5; $i++)
@if (old('rating')==$i)
<option value="{{$i}}" selected>{{$i}}</option>
@else
<option value="{{$i}}">{{$i}}</option>
@endif

@endfor
</select>
@error('rating')
		<p class='error'>{{$message}}</p>
	@enderror
<button type="submit" class="btn">Add review</button>
</form>
@endsection