<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>CHotel | VinaEnter Edu</title>
	<link rel="stylesheet" href="{{getenv('PUBLIC_URL')}}/chotel/css/style.css" type="text/css">
</head>
<body>
	<div class="page">
		<div class="header">
			<a href="{{route('chotel.chotel.getIndex')}}" id="logo"><img src="{{getenv('PUBLIC_URL')}}/chotel/images/logo.png" alt="logo"></a>
			<div>
				<div>
					<a href="http://vinaenter.edu.vn">Một dự án PHP tại VinaEnter Edu</a>
				</div>
				<div>
					<ul>
						<li class="selected">
							<a href="{{route('chotel.chotel.getIndex')}}"><span>Trang chủ</span></a>
						</li>
						<li>
							<a href="{{route('chotel.chotel.getAbout')}}"><span>Giới thiệu</span></a>
						</li>
						<li>
							<a href="/category/1"><span>Các phòng</span></a>
						</li>
						<li>
							<a href="{{route('chotel.chotel.getContact')}}"><span>Liên hệ</span></a>
						</li>
					</ul>
					<form action="{{route('chotel.chotel.getSearch')}}" method="post">

						<input type="text" name="search" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Tìm khách sạn':this.value;" value="Tìm khách sạn">
						<input type="submit" value="">
                        @csrf
					</form>
				</div>
			</div>
		</div>
		<div class="body">
