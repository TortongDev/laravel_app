<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.5.1-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-5.0.2\dist\css\bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>เพิ่มวิชาเรียน</title>
</head>
<body>
    @include('componant.header-admin')
    @if(!empty(session('success')))
        <script>
            Swal.fire({
                title: 'แจ้งเตือน',
                text: 'บันทึกข้อมูลสำเร็จ',
                icon: 'success'
            })
        </script>
    @endif
    @if(!empty(session('error')))
        <script>
            Swal.fire({
                title: 'แจ้งเตือน',
                text: 'บันทึกข้อมูลไม่สำเร็จ',
                icon: 'error'
            })
        </script>
    @endif
    @if(!empty(session('delete')))
        <script>
            Swal.fire({
                title: 'แจ้งเตือน',
                text: 'ลบข้อมูลสำเร็จ',
                icon: 'success'
            })
        </script>
    @endif
    <div class="container">
        <div class="row mt-5 mb-5">
            <h3>เพิ่มห้องเรียน</h3>

            <span class="title-sub">กระบวนการเพิ่มข้อมูล / ลบข้อมูล / แก้ไขข้อมูลในหน้านี้</span>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('saveClassroom')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            @error('class_id')
                                <span class="text-danger">กรุณากรอกข้อมูล "หมายเลขที่ห้องเรียน"</span>
                                <br>
                            @enderror
                            <label for="class_id">หมายเลขที่ห้องเรียน</label>
                            <input type="text" name="class_id" id="class_id" class="form-control">
                        </div>
                        <div class="col-md-6">
                            @error('classroom_name')
                                <span class="text-danger">กรุณากรอกข้อมูล "ชื่อห้องเรียน"</span>
                                <br>
                            @enderror
                            <label for="classroom_name">ชื่อห้องเรียน</label>
                            <input type="text" name="classroom_name" id="classroom_name" class="form-control">
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            @error('classroom_level_id')
                                <span class="text-danger">กรุณากรอกข้อมูล "ระดับชั้น"</span>
                                <br>
                            @enderror
                            <label for="classroom_level_id">ระดับชั้น</label>
                            <select name="classroom_level_id" id="classroom_level_id" class="form-control">
                                <option value="">เลือก</option>
                                @foreach ($level_classes as $le)
                                    <option value="{{$le->id}}">{{$le->level}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            @error('classroom_teacher_id')
                                <span class="text-danger">กรุณาเลือก "ผู้รับผิดชอบ"</span>
                                <br>
                            @enderror
                            <label for="classroom_teacher_id">ผู้รับผิดชอบ</label><br>
                            <select name="classroom_teacher_id" id="classroom_teacher_id" class="form-control">
                                <option value="">เลือก</option>
                                @foreach ($teachers as $t)
                                    <option value="{{$t->id}}">{{$t->teacher_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            @error('classroom_desc')
                                <span class="text-danger">กรุณาเลือก "รายละเอียด"</span>
                                <br>
                            @enderror
                            <label for="classroom_desc">รายละเอียด เพิ่มเติม</label>
                            <textarea name="classroom_desc" id="classroom_desc" value=""  class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            @error('classroom_status')
                                <span class="text-danger">กรุณาเลือก "สถานะพร้อมใช้งาน"</span>
                                <br>
                            @enderror
                            <label for="classroom_status">สถานะพร้อมใช้งาน</label><br><br>
                            <input type="radio" name="classroom_status" id="classroom_status1" value="1" > <label for="classroom_status1">พร้อมใช้งาน</label> &nbsp;
                            <input type="radio" name="classroom_status" id="classroom_status2" value="2" > <label for="classroom_status2">ยังไม่พร้อมใช้งาน</label>

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล</button>
                            <button class="btn btn-warning" type="reset"><i class="fa-solid fa-rotate"></i> ล้างข้อมูล</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <table class="table">
                    <thead class="bg bg-light">
                        <tr>
                            <th>#</th>
                            <th>รหัสห้องเรียน</th>
                            <th>ชื่อห้องเรียน</th>
                            <th>ผู้รับผืดชอบ</th>
                            <th>ชั้นเรียนประจำ</th>
                            <th>สถานะการใช้งาน</th>
                            <th>รายละเอียด</th>
                            <th class="flex-right">แก้ไขข้อมูล /  ลบข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $number = 1
                        @endphp
                        @foreach ($classroom as $R)
                            <tr>
                                <td>{{$number++}}</td>
                                <td>{{$R->class_id}}</td>
                                <td>{{$R->classroom_name}}</td>
                                <td>{{$R->teacher_name}}</td>
                                <td>{{$R->level}}</td>
                                <td>

                                    @if ($R->classroom_status == '1')
                                        <span class="badge bg-success"> เปิดใช้งาน</span>
                                    @elseif ($R->classroom_status == '2')
                                        <span class="badge bg-warning"> ยังเปิดไม่ใช้งาน</span>
                                    @else
                                        -
                                    @endif

                                </td>

                                <td>{{$R->classroom_desc}}</td>
                                <td class="flex-right">
                                    <a href="{{route('editClassroom',$R->id)}}" class="btn btn-warning btn-margin"><i class="fa-solid fa-pen-to-square"></i></a>
                                    {{-- <form action="{{route('subject.delete',$R->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-margin"><i class="fa-solid fa-trash"></i></button>
                                    </form> --}}

                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
        <div class="row mt-5">
            <div class="col-md-12">
              {{ $classroom->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</body>
</html>
