

@foreach ($medias as $media)
    <li class="d-inline-block get-all-media">
        <input @if($type == 'single') type="radio" @else type="checkbox" @endif name="media[]" id="mediaid{{$media->id}}" value="{{$media->id}}"/>
        <label for="mediaid{{$media->id}}" id="getmedia-{{$media->id}}">
            <img class="d-block" src="{{asset($media->file)}}" alt="{{$media->name}}">
        </label>
    </li>
@endforeach




