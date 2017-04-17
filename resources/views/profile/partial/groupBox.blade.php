
@if(isset($group))

	<div class='service-box'>
        <a href="group/{{$group->id}}">
			<div class="cover">
				<img src="{{$group->image}}" alt="" />
			</div>
        </a>

        <a href="service/{{$service->id}}">
			<div class="content">
				<h3 class='title title2'>{{$group->name}}</h3>

				<div class="space15">
				</div>
				<p class='paragraph2'>{{str_limit($group->description, 100)}}</p>

			</div>
		</a>
	</div>
@endif
