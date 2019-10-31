<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="{{$publicURL}}/admin/assets/img/find_user.png" class="user-image img-responsive" />
            </li>


            <li>
                <a class="active-menu" href="{{route('admin.admin.index')}}"><i class="fa fa-dashboard fa-3x"></i> Trang chủ</a>
            </li>
            <li>
                <a href="{{route('admin.room.getRoom')}}"><i class="fa fa-bar-chart-o fa-3x"></i> Phòng</a>
            </li>
            <li>
                <a href="{{route('admin.roomType.getRoomType')}}"><i class="fa fa-qrcode fa-3x"></i> Loại phòng</a>
            </li>
            <li>
                <a href="{{route('admin.utility.getUtility')}}"><i class="fa fa-sitemap fa-3x"></i> Tiện ích</a>
            </li>
            <li>
                <a href="{{route('admin.user.index')}}"><i class="fa fa-sitemap fa-3x"></i>Nguời dùng</a>
            </li>
            <li>
                <a href="{{route('admin.contact.getContact')}}"><i class="fa fa-sitemap fa-3x"></i>Contact</a>
            </li>
            <li>
                <a href="{{route('admin.about.getAbout')}}"><i class="fa fa-sitemap fa-3x"></i>Giới thiệu</a>
            </li>
        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->
