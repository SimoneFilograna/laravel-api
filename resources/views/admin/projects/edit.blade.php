@extends('layouts.app')

@section("content")
    <div class="container edit-container mt-5">
        <div class="row">
            <div class="col text-light">
                <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" enctype="multipart/form-data">
                    @csrf()
                    @method("put")
                    
                    {{-- title --}}
        
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control @error("title") is-invalid                            
                        @enderror" value="{{old("title", $project->title)}}">
                        @error("title")
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    

                    {{-- TYPE --}}

                    <div class="mb-3">
                        <label for="type_id" class="form-label">Type</label>
                        <select name="type_id" class="form-select @error('type_id') is-invalid                           
                        @enderror" id="type_id">
                            {{-- ciclo sulla tabella types per aggiugnere le option --}}
                            @foreach($types as $type)
                                <option value="{{$type->id}}" {{$project->type_id === $type->id ? "selected" : ""}}>{{$type->type}}</option>                                               
                            @endforeach
                        </select>
                        @error("language")
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- TECHNOLOGIES --}}

                    <div class="mb-3 mt-2">
                        <label class="form-label mb-3">Technologies</label>

                        <div class="">
                            @foreach ($technologies as $singleTech)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="{{$singleTech->id}}" {{$project->technologies?->contains($singleTech->id) ? "checked" : ""}} id="flexCheckDefault" name="technologies[]">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$singleTech->name}}
                                </label>                            
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- link --}}

                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" id="link" name="link" class="form-control @error("link") is-invalid                            
                        @enderror" value="{{old("title", $project->link)}}">
                        @error("link")
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- description --}}

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea  id="description" name="description" class="form-control @error("description") is-invalid                            
                        @enderror">{{old("description", $project->description)}}</textarea>
                        @error("description")
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- thumb --}}

                    <div class="mb-3">
                        <label for="thumb" class="form-label">Thumb</label>
                        <input type="file" accept="image/* " id="thumb" name="thumb" class="form-control @error("thumb") is-invalid                            
                        @enderror">
                        @error("thumb")
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- date --}}

                    <div class="mb-3">
                        <label for="date" class="form-label">Release</label>
                        <input type="date" id="date" name="release"  class="form-control @error("release") is-invalid                            
                        @enderror" value="{{old("release", $project->release->format("Y-m-d"))}}">
                        @error("release")
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- submit button --}}

                    <button type="submit" class="btn btn-primary mt-4">SUBMIT</button>
                    <a class="btn btn-primary mt-4" href="{{route("admin.projects.index")}}"> CANCEL</a>

                </form>
            </div>
        </div>
    </div>

@endsection