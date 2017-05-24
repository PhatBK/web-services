 
<div class="col-md-3 ">
        <ul class="list-group" id="menu">
                <li href="#" class="list-group-item menu1 active">
                <span class="glyphicon glyphicon-th-list"></span>Thể Loại
                </li>
            @foreach ($theloai as $tl)
                @if(count($tl->loaimon) > 0)
                    <li href="#" class="list-group-item menu1">
                       {{$tl->ten}}
                    </li>
                        <ul>
                            @foreach ($tl->loaimon as $lm)
                                <li class="list-group-item">
                                    <a href="loaimon/{{$lm->id}}/{{$lm->ten_khong_dau}}.html">{{$lm->ten}}</a>
                                </li>
                            @endforeach
                        </ul>
                @endif
            @endforeach
        </ul>
        <ul class="list-group" id="menu">
                <li href="#" class="list-group-item menu1 active">
                    <p style="color: #40ff00;"><span class="glyphicon glyphicon-globe"></span>Món Ăn Vùng Miền</p>
                </li>
            @foreach ($vungmien as $vm)
                @if(count($vm->monan) > 0)
                    <li href="#" class="list-group-item menu1">
                       <a href="vungmien/{{ $vm->id }}/{{ $vm->ten_khong_dau }}.html">{{$vm->ten}}</a> 
                    </li>
                @endif
            @endforeach
        </ul>
        <ul class="list-group" id="menu">
                <li href="#" class="list-group-item menu1 active">
                    <p  style="color: #00ff00;"><span class="glyphicon glyphicon-user"></span>Thành Viên Ưu Tú</p>
                </li>
                            
                @foreach($thanhvienuutu as $tv)
                        <li href="#" class="list-group-item menu1">
                            <p style="color: red;"> <a > {!!"$tv->username&nbsp"!!}</a> {{"Vote:$tv->master"}}</p>
                        </li>
                @endforeach
        </ul>
        <ul class="list-group" id="menu">
                <li href="#" class="list-group-item menu1 active">
                    <p><span class="glyphicon glyphicon-link"></span>Cửa Hàng Cộng Tác</p>
                </li>
            @foreach ($cuahangAll as $ch)
                        <li class="list-group-item">
                            <a href="cuahang/{{ $ch->id }}/{{ $ch->ten_khong_dau }}.html">{{ $ch->ten }}</a> 
                        </li>
            @endforeach
        </ul>
</div>
