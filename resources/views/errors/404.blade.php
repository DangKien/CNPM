<!DOCTYPE html>
<html>
<head>
	<title>Lỗi 404</title>
	<link rel="icon" href="{{ url('Frontend/img/logo_title1.png') }}" type="image/gif" sizes="32x32">
</head>
<body style="background-image: url('{{ url('Frontend/img/error/error.png')  }}');">
	<div style="width: 100%; text-align: center;">
	    <div>
			<h1 style="color: rgba(236, 9, 7, 0.86);
			    font-weight: 600;
			    font-size: 163px;
			    font-family: 'Myriad Pro';
			    margin-bottom: 0px; "> 404 </h1>
			<p><span style="font-size: 25px; color: rgba(236, 9, 7, 0.86); font-weight: 600;">Oh...!<span>Chúng tôi không thể tìm thấy trang của bạn.</p>
				<div style="">
				  	<p>
				  		<a href="{{ route('home') }}" 
				  			style="color: white;
						    background: rgba(0,0,0,0.3);
						    text-decoration: none;
						    padding: 5px 10px;
						    font-size: 13px;
						    font-family: arial, serif;
						    font-weight: bold;">
						Go Back to Home
						</a>
					</p>
				</div>
	     </div>
	  </div>
</body>
</html>