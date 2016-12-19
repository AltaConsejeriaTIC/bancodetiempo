@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body  medium">
                	{!! Form::open(['url' => '/service/save', 'method' => $method, 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', trans('dictionary.title'), ['class' => 'col-md-4 control-label', 'id' => 'name']) }}

                            <div class="col-md-6">
                               
                               {{ Form::text('name', isset($service->name) ? $service->name : "", ['class' => 'form-control', 'required']) }}
                               
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                             {{ Form::label('description', trans('dictionary.description'), ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::textarea('description', isset($service->description) ? $service->description : "", ['class' => 'form-control', 'required']) }}

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                             {{ Form::label('value', trans('dictionary.value'), ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::number('value', isset($service->value) ? $service->value : "", ['class' => 'form-control', 'required']) }}

                                @if ($errors->has('value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('value') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('virtually') ? ' has-error' : '' }}">
                             {{ Form::label('virtually', trans('dictionary.virtuality'), ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::checkbox('virtually', 1, isset($service->virtually) ? $service->virtually : "") }}

                                @if ($errors->has('virtually'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('virtually') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                                
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            {{ Form::label('image', trans('dictionary.cover'), ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                            
                            
                            	<img src="{{isset($service->image) ? '/images/services/'.$service->image : ''}}"  {{isset($service->image) ? '' : 'class=hidden'}}>                            	
                            
                            	                          
                                {{ Form::file('image', '') }}

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            {{ Form::label('category', trans('dictionary.category'), ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                            

                                {{ Form::select('category', $selectedCategories , isset($service->category_id) ? $service->category_id : null, ['class' => 'form-control', 'required', 'placeholder' => '-----']) }}

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
								{{ Form::hidden('serviceId', isset($service->id) ? $service->id : "") }}
								
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('dictionary.save') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!]
                </div>
            </div>
        </div>
    </div>
</div>

@endsection