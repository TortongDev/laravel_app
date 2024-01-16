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
    <style>
        input,textarea,select
        {
            color: gray !important;
        }
    </style>
    <title>แก้ไขข้อมูลผู้สอน</title>
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
    @if(!empty(session('status_delete')))
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
            <h3>เพิ่มวิชาเรียน</h3>
            <span class="title-sub">หน้าฟอร์มแก้ไขข้อมูล</span>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('updateTeacher', $teacher->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <div class="card-header">รูปภาพโปรไฟล์</div>
                                <div class="card-content">
                                    <img src="{{asset("storage/$teacher->image")}}" width="100%" height="100%" alt="profile">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            @error('teacher_name')
                                <span class="text-danger">กรุณากรอกข้อมูล "ชื่อผู้สอน"</span>
                                <br>
                            @enderror
                            <label for="teacher_name">ชื่อผู้สอน</label>
                            <input type="text" name="teacher_name" id="teacher_name" value="{{$teacher->teacher_name}}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            @error('teacher_lastname')
                                <span class="text-danger">กรุณากรอกข้อมูล "นามสกุล"</span>
                                <br>
                            @enderror
                            <label for="teacher_lastname">นามสกุล</label>
                            <input type="text" name="teacher_lastname" id="teacher_lastname" value="{{$teacher->teacher_lastname}}" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="teacher_qualification">วุฒิการศึกษาล่าสุด</label>
                            <select name="teacher_qualification" id="teacher_qualification" class="form-control">
                                <option value="" @if($teacher->teacher_qualification == '') selected @endif>เลือก</option>
                                <option value="ปวช" @if($teacher->teacher_qualification == 'ปวช') selected @endif>ปวช</option>
                                <option value="ปวส" @if($teacher->teacher_qualification == 'ปวส') selected @endif>ปวส</option>
                                <option value="ปริญญาตรี" @if($teacher->teacher_qualification == 'ปริญญาตรี') selected @endif>ปริญญาตรี</option>
                                <option value="ปริญญาโท" @if($teacher->teacher_qualification == 'ปริญญาโท') selected @endif>ปริญญาโท</option>
                                <option value="ปริญญาเอก" @if($teacher->teacher_qualification == 'ปริญญาเอก') selected @endif>ปริญญาเอก</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="image">ภาพโปรไฟล์</label>
                            <input type="file" name="image" value="{{$teacher->image}}" id="image" class="form-control">
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
                    <div class="row mt-5 mb-4">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล</button>
                            <button class="btn btn-warning" type="reset"><i class="fa-solid fa-rotate"></i> ล้างข้อมูล</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    @include('componant.footer')
</body>
</html>
