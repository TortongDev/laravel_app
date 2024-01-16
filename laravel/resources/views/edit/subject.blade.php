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
    <title>แก้ไขข้อมูลวิชาเรียน</title>
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
                <form action="{{route('updateSubject',$subject->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            @error('subject_name')
                                <span class="text-danger">กรุณากรอกข้อมูล "ชื่อวิชาเรียน"</span>
                                <br>
                            @enderror
                            <label for="subject_name">ชื่อวิชาเรียน</label>
                            <input type="text" name="subject_name" id="subject_name" value="{{$subject->subject_name}}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            @error('subject_type')
                                <span class="text-danger">กรุณากรอกข้อมูล "หน่วยกิจ"</span>
                                <br>
                            @enderror
                            <label for="subject_type">หน่วยกิจ</label>
                            <input type="text" name="subject_type" id="subject_type" value="{{$subject->subject_type}}" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="subject_desc">รายละเอียด เพิ่มเติม</label>
                            <textarea name="subject_desc" id="subject_desc" class="form-control">{{$subject->subject_desc}}</textarea>
                        </div>
                        <div class="col-md-6">
                            @error('subject_status')
                                <span class="text-danger">กรุณาเลือก "สถานะ"</span>
                                <br>
                            @enderror
                            <label for="subject_status">สถานะ</label><br><br>
                            <input type="radio" name="subject_status" id="subject_status" @if($subject->subject_status == '1') checked  @endif value="1"> ใช้งานทันที &emsp;
                            <input type="radio" name="subject_status" id="subject_status" @if($subject->subject_status == '2') checked  @endif value="2" > ยังไม่ใช้งาน
                        </div>

                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> อัพเดทข้อมูล</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>
