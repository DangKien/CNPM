@extends('front.layouts.default')
@if(isset($nameCate))
	@section ('title', $nameCate)   
@endif
@section ('myJs')
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="panel">
			  	<div class="panel-body">
	  				<div class="menu-left padding-left-0 col-md-3 col-sm-5 text-center">
	  					<ul>
	  					    <li class="active-li"><a href="{{ url('lien-he') }}"> {{ $nameCate }}</a></li>
	  					    @if (isset($menu)) 
	
	  		                    @foreach ($menu as $item) 
		  		                	<li class="{{ request()->is($slug."/".$item->slug) ? "active-li-sp" : " "  }} ">
		  		                		<a class="color-theme-medium" href="{{ url('',  [$slug ,"$item->slug"]) }} ">{{ $item->name}}</a>
		  		                	</li>
	  		              		@endforeach
	  		              	@endif
	  					</ul>
	  				</div>
	  				<div class="col-sm-9 col-md-8 col-lg-9 padding-topbot-15px">
	  					<div class="dashboard-content">
	  						<div class="tab-content">
	  							<div id="gioithieuchung" class="tab-pane fade in active">
	  								<div class="tab-pane active" id="tabs-guide-index" role="tabpanel">
	  									<h2 class="text-center">
	  									Trường mầm non Color House
	  									</h2>
	  									<br><br>

	  									<p style="color" class="detail"><b><i>Color House thuộc hệ thống Trường Cao đẳng Quốc tế được thành lập tháng 12/2011 và chính thức đi vào hoạt động từ tháng 4/2012 đến nay.</i></b>
	  									</p><br>
	  									<p>Trường mầm non Color House Việt Nam là một trong những trường mầm non của Hà Nội tiên phong trong việc áp dụng phương pháp và triết lý giáo dục của Tiến sĩ Maria.</p>
	  									<br>
	  									<img class="img-responsive" src="{{ url('Frontend/img/gioithieu') }}/mn1.jpg" style="width: 100%;" alt="">
	  									<br>
	  									<p>Được thành lập từ tháng 12/2011 bởi một số nhà đầu tư và nhà giáo tâm huyết với giáo dục và với phương châm “Chắp cánh cho những thiên thần nhỏ”, Color House đã trở thành địa chỉ có uy tín trong việc nuôi dưỡng và giáo dục tốt.</p>
										<br>
										<br>
										<img class="img-responsive" src="{{ url('Frontend/img/gioithieu') }}/mn1.jpg" style="width: 100%;" alt="">
										<br>
	  									<p>Chương trình học phong phú của chúng tôi nhắm tới việc khơi dậy niềm đam mê học hỏi sẵn có trong trẻ và giúp trẻ học. Quan trọng hơn cả việc khuyến khích trẻ tiếp thu kiến thức, chúng tôi chú trộng đến việc hình thành nhân cách tốt cho trẻ để chúng trở thành những đứa trẻ tự tin, có kỷ luật, biết quan tâm đến người khác, tư duy logic và hành động tích cực. Chúng tôi tin rằng những trải nghiệm vui và đầy ý nghĩa của trẻ ở trường ABC Kids sẽ là sự khởi đầu vững chắc cho trẻ trong cuộc đời cũng như tương lai học tập của trẻ.</p>
	  									<p>Đội ngũ giáo viên có bằng cấp, được thường xuyên đào tạo về Montessori là những cô giáo trẻ, tâm huyết với nghề và yêu trẻ.
	  									<p></p>
	  									<br>
	  									<br>
	  									<p class="text-right">Trân trọng cảm ơn!</p>
	  									
	  								</div>
	  							</div>
	  							<div id="cosovatchat" class="tab-pane fade">
	  								<div class="tab-pane active" id="tabs-guide-index" role="tabpanel">
	  										tab cơ sở vật chất
	  								</div>
	  							</div>
	  							<div id="giaovien" class="tab-pane fade">
	  								<div class="tab-pane active" id="tabs-guide-index" role="tabpanel">
	  										tab đội ngũ giáo viên
	  								</div>
	  							</div>
	  							<div id="giaoduc" class="tab-pane fade">
	  								<div class="tab-pane active" id="tabs-guide-index" role="tabpanel">
	  										tab phương pháp giáo dục
	  								</div>
	  							</div>
	  						</div>
	  					</div>
	  					
	  				</div>
			  	</div>
			</div>
		</div>
	</section>
@endsection
