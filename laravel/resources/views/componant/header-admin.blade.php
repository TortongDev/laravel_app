<header>
    <div class="header-logo">
        <img src="{{asset('pic_school/logo-school.png')}}" width="70px" height="60px" alt="">  โรงเรียนดีดี วิทยา
    </div>
</header>
<nav class="navbar">
    <ul class="ul-main">
        <li><a href="/">หน้าแรก</a></li>
        <li>
            <a href="#">บริหารข้อมูล</a>
            <ul class="ul-list">
                <li><a href="{{route('addSubject')}}">เพิ่มข้อมูลวิชาเรียน</a></li>
                <li><a href="{{route('addTeacher')}}">เพิ่มข้อมูลผู้สอน</a></li>
                <li><a href="{{route('addClassroom')}}">เพิ่มข้อมูลห้องเรียน</a></li>
            </ul>
        </li>
        <li>
            <a href="#">รายงาน</a>
            <ul class="ul-list">
                <li><a href="#">เมนู 1</a></li>
                <li><a href="#">เมนู 2</a></li>
            </ul>
        </li>
        <li><a href="#">ตั้งค่าทั่วไป</a></li>
        <li><a href="#">จองห้องประชุม</a></li>
    </ul>
</nav>
