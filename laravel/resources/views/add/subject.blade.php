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
    @if(!empty(session('status_delete_true')))
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
            <span class="title-sub">กระบวนการเพิ่มข้อมูล / ลบข้อมูล / แก้ไขข้อมูลในหน้านี้</span>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('saveSchool')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            @error('subject_name')
                                <span class="text-danger">กรุณากรอกข้อมูล "ชื่อวิชาเรียน"</span>
                                <br>
                            @enderror
                            <label for="subject_name">ชื่อวิชาเรียน</label>
                            <input type="text" name="subject_name" id="subject_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            @error('subject_type')
                                <span class="text-danger">กรุณากรอกข้อมูล "หน่วยกิจ"</span>
                                <br>
                            @enderror
                            <label for="subject_type">หน่วยกิจ</label>
                            <input type="text" name="subject_type" id="subject_type" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="subject_desc">รายละเอียด เพิ่มเติม</label>
                            <textarea name="subject_desc" id="subject_desc" value=""  class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            @error('subject_status')
                                <span class="text-danger">กรุณาเลือก "สถานะ"</span>
                                <br>
                            @enderror
                            <label for="subject_status">สถานะ</label><br><br>
                            <input type="radio" name="subject_status" id="subject_status" value="1"> ใช้งานทันที &emsp;
                            <input type="radio" name="subject_status" id="subject_status" value="2" > ยังไม่ใช้งาน
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
                            <th>ชื่อวิชาเรียน</th>
                            <th>หน่วยกิจ</th>
                            <th>สถานะ</th>
                            <th>รายละเอียด</th>
                            <th class="flex-right">แก้ไขข้อมูล /  ลบข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $number = 1
                        @endphp
                        @foreach ($subject as $R)
                            <tr>
                                <td>{{$number++}}</td>
                                <td>{{$R->subject_name}}</td>
                                <td>{{$R->subject_type}}</td>
                                <td>

                                    @if ($R->subject_status == '1')
                                        <span class="badge bg-success"> เปิดใช้งาน</span>
                                    @elseif ($R->subject_status == '2')
                                        <span class="badge bg-warning"> ยังเปิดไม่ใช้งาน</span>
                                    @else
                                        -
                                    @endif

                                </td>

                                <td>{{$R->subject_desc}}</td>
                                <td class="flex-right">
                                    <a href="{{route('editSubject',$R->id)}}" class="btn btn-warning btn-margin"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{route('subject.delete',$R->id)}}" method="post">
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
              {{ $subject->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</body>
</html>
