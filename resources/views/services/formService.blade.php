@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mi oferta</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/service/save') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ trans('dictionary.title') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}{{isset($service->name) ? $service->name : ''}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">{{ trans('dictionary.description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}{{isset($service->description) ? $service->description : ''}}" required>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                            <label for="value" class="col-md-4 control-label">{{ trans('dictionary.value') }}</label>

                            <div class="col-md-6">
                                <input id="value" type="text" class="form-control" name="value" value="{{ old('value') }}{{isset($service->value) ? $service->value : ''}}" required>

                                @if ($errors->has('value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('value') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('virtuality') ? ' has-error' : '' }}">
                            <label for="virtuality" class="col-md-4 control-label">{{ trans('dictionary.virtuality') }}</label>

                            <div class="col-md-6">
                                <input id="virtuality" type="checkbox" class="" name="virtuality" value="1" {{isset($service->virtuality) && $service->virtuality == 1 ? 'selected' : ''}}>

                                @if ($errors->has('virtuality'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('virtuality') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                                
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">{{ trans('dictionary.cover') }}</label>

                            <div class="col-md-6">
                            
                            
                            	<img src="{{isset($service->image) ? '/images/services/'.$service->image : ''}}"  {{isset($service->image) ? '' : 'class=hidden'}}>
                            	
                            
                                <input id="image" type="file" class="" name="image" value="">

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">{{ trans('dictionary.category') }}</label>

                            <div class="col-md-6">
                            
                           		
                                <select name="category" required>
                                	<option value="">------</option>
                                	@foreach($categories as $category)
                                		
                                		<option value="{{$category->id}}" {{isset($service->category_id) && $service->category_id == $category->id ? 'selected' : ''}} > {{$category->category}} </option>
                                		
                                	@endforeach
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                                <button type="submit" class="btn btn-primary">
                                    {{ trans('dictionary.save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection