@extends('templates.chotel.master')
@section('main')
    <div class="about">
        @include('templates.chotel.leftbar')
        <div>
            @if(Session::has('msg'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('msg')}}
                </div>
            @endif
            <h3>Liên hệ đến BHotel</h3>
            <div class="vnecontent form">

                <h1>Liên hệ với chúng tôi</h1>

                <p>
                    TRUNG TÂM ĐÀO TẠO LẬP TRÌNH VINAENTER EDU<br/>
                    Trụ sở: 154 Phạm Như Xương, Liên Chiểu, Đà Nẵng<br/>
                    Web: <a href="http://vinaenter.edu.vn" title="">www.vinaenter.edu.vn</a>
                </p>

                <form action="" method="post">
                    @csrf
                    <p><input type="text" class="wpcf7-text" placeholder="Họ tên *" name="full_name"/></p>
                    <p><input type="text" class="wpcf7-email" placeholder="Email *" name="email"/></p>
                    <p><input type="text" class="wpcf7-text" placeholder="Chủ đề *" name="title"/></p>
                    <p><textarea class="wpcf7-textarea" placeholder="Nội dung *" name="description"></textarea></p>
                    <p><input type="submit" class="wpcf7-submit" value="Gửi liên hệ"/></p>
                </form>

            </div>
        </div>
    </div>
@stop
