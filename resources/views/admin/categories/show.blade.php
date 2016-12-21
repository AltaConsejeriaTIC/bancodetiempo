<div id="show-dialog{{$category->id}}" class="modal fade" tabindex="-1" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="panel-heading modal-title titleContent">Información Categoría {{$category->category}} </h4>
      </div>      
			<div class="modal-body">									
				<div class="row">                      
          <div class="panel panel-primary modalPanel">
            <div class="panel-body">             
              <span>

                <img class="profileImg" src="{{ '/resources/categories/'.$category->image }}">
              </span>           
              
              <h3 class="subTitle">{{ $category->category }}</h3>              
             
            </div>
          </div>
        </div>
      </div>
		</div>			
  </div>
</div>