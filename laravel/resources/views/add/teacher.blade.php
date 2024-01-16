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
            <h3>เพิ่มรายชื่อผู้สอน</h3>
            <span class="title-sub">กระบวนการเพิ่มข้อมูล / ลบข้อมูล / แก้ไขข้อมูลในหน้านี้</span>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('saveTeacher')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            @error('teacher_name')
                                <span class="text-danger">กรุณากรอกข้อมูล "ชื่อผู้สอน"</span>
                                <br>
                            @enderror
                            <label for="teacher_name">ชื่อผู้สอน</label>
                            <input type="text" name="teacher_name" id="teacher_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            @error('teacher_lastname')
                                <span class="text-danger">กรุณากรอกข้อมูล "นามสกุล"</span>
                                <br>
                            @enderror
                            <label for="teacher_lastname">นามสกุล</label>
                            <input type="text" name="teacher_lastname" id="teacher_lastname" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="teacher_qualification">วุฒิการศึกษาล่าสุด</label>
                            <select name="teacher_qualification" id="teacher_qualification" value=""  class="form-control">
                                <option value="">เลือก</option>
                                <option value="ปวช">ปวช</option>
                                <option value="ปวส">ปวส</option>
                                <option value="ปริญญาตรี">ปริญญาตรี</option>
                                <option value="ปริญญาโท">ปริญญาโท</option>
                                <option value="ปริญญาเอก">ปริญญาเอก</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="image">ภาพโปรไฟล์</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            @error('teacher_status')
                                <span class="text-danger">กรุณาเลือก "สถานะ"</span>
                                <br>
                            @enderror
                            <label for="teacher_status">สถานะ</label><br><br>
                            <input type="radio" name="teacher_status" id="teacher_status" value="1"> ใช้งานทันที &emsp;
                            <input type="radio" name="teacher_status" id="teacher_status" value="2" > ยังไม่ใช้งาน
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
                            <th>ชื่อผู้สอน</th>
                            <th>นามสกุล</th>
                            <th>วุฒิการศึกษา</th>
                            <th>สถานะการทำงาน</th>
                            <th>รูปภาพโปรไฟล์</th>
                            <th class="flex-right">แก้ไขข้อมูล /  ลบข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $number = 1
                        @endphp
                        @foreach ($teacher as $R)
                            <tr>
                                <td>{{$number++}}</td>
                                <td>{{$R->teacher_name}}</td>
                                <td>{{$R->teacher_lastname}}</td>
                                <td>{{$R->teacher_qualification}}</td>
                                <td>

                                    @if ($R->teacher_status == '1')
                                        <span class="badge bg-success"> ยังทำงานออยู่</span>
                                    @elseif ($R->subject_status == '2')
                                        <span class="badge bg-warning"> ย้ายไปแล้ว</span>
                                    @else
                                        -
                                    @endif

                                </td>

                                <td>
                                    <img src="{{asset("storage/$R->image")}}" width="200px" height="100px" alt="รูปภาพ">

                                </td>
                                <td class="flex-right">
                                    <a href="{{route('editTeacher',$R->id)}}"  class="btn btn-warning btn-margin"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{route('deleteTeacher',$R->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-margin"><i class="fa-solid fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
        <div class="row mt-5">
            <div class="col-md-12">
              {{ $teacher->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</body>
</html>
