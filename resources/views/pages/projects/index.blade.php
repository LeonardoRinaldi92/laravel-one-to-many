@extends('layouts.app')
@section('title')
Portfolio Leonardo Rinaldi | Progetti 
@endsection
@section('content')
<div class="container">
    <div>
        <select name="type" id="select-type">
            @if(isset($typeSelected)) 
                <option value="home">Torna alla Home</option>
            @else
                <option value="">scegli</option>
            @endif
            @foreach ($types as $type)
                <option value="{{$type->slug}}" @if(isset($typeSelected) && $typeSelected->id === $type->id) selected @endif>{{$type->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="row">
        @forelse ($projects as $project)
        <div class="col-4 p-3 mt-3">
            <div class="card text-center p-2">
                <a href="{{route('projects.show', $project)}}" class="text-decoration-none text-dark">
                    <h3>{{$project['name']}}
                    </h3>
                    <img class="w-100" src="{{asset('storage/'. $project['image'])}}" alt="" >
                    <h6><i>{{$project['short_description']}}</i>
                    </h6>
                </a>
            </div>
        </div>
        @empty
            <h3>non sono presenti progetti...mi dispiace</h3>
        @endforelse
    </div>
</div>
@endsection