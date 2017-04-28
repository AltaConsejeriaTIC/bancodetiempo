@if(isset($group))

	<div class='service-box'>
        @if(isset($edit))
			<div class="col-md-5 icons-button-content">
				<button class="icons-button" @click="myData.editgroup{{$group->id}} = true"><i class="fa fa-pencil"></i></button>
				<button class="icons-button" @click="myData.deletegroup{{$group->id}} = true"><i class="fa fa-trash-o"></i></button>
			</div>
			@include('profile.partial.formEditGroup')
		@endif
        <a href="group/{{$group->id}}">
			<div class="cover">
				<img src="{{$group->image}}" alt="" />
			</div>
        </a>

        <a href="group/{{$group->id}}">
			<div class="content">
				<h3 class='title title2'>{{$group->name}}</h3>

				<div class="space15">
				</div>
				<p class='paragraph2'>{{str_limit($group->description, 100)}}</p>

			</div>
		</a>
	</div>
@endif
