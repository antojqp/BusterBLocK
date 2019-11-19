<?php
if (Auth::user()) {
	$level = Auth::user()->level;
}else{
	$level = 0;
}
?>
<div class="container-fluid bg-light p-3">
		<div class="row my-5 ">
            @foreach ($movies as $movie)
            <?php 
                if($level == 1){
                    $movLink = "<a href='".url("/movie/modify/$movie->id/edit")."' class='btn-primary btn-sm'>Modify</a>";
                }else{
                    $movLink = "<a href='". url("/reserve/$movie->id") ."' class='btn-primary btn-sm'>Reservar&info</a>";
                }//end if
            ?>
				@if ($row == 5)
					</div>
					<br>
					<div class='row my-5'>
					  <div class='col-sm text-center'>
							<img src='/storage/images/{{$movie->img}}' width='150px' height='200px' alt='{{e($movie->name)}}'>
							<p class='small text-center text-justify text-info'>{{e($movie->name)}}</p>
							{!!$movLink!!}
						</div>	
						<?php $row = 0; ?>
					
				@else
					<div class='col-sm text-center'>
							<img src='/storage/images/{{$movie->img}}' width='150px' height='200px' alt='{{e($movie->name)}}'>
							<p class='small text-center text-justify text-info'>{{e($movie->name)}}</p>
							{!!$movLink!!}
					</div>
					<?php $row++; ?>
					@endif

			@endforeach
  		</div>
  		<div class="container-fluid py-1">
			{{ $movies->links() }}

		  </div>
	</div>