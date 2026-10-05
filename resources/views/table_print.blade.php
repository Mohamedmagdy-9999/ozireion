
<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="rtl">

<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <meta charset="UTF-8">


    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>

    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>




</head>


<body >
<table style="text-align: center"  id="tbl_exporttable_to_xls" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
    <thead>
    <tr style="background: #ccc;padding: 3px">
        <th class="wd-15p border-bottom-0">اسم الطالب عربى</th>
        <th class="wd-15p border-bottom-0">student name</th>
        <th class="wd-15p border-bottom-0">اللغة التانية</th>
        <th class="wd-15p border-bottom-0">حالة القيد</th>
        <th class="wd-15p border-bottom-0">الشعبة</th>
        <th class="wd-15p border-bottom-0">ملاحظات</th>

    </tr>
    </thead>
    <tbody>


    @foreach ($student as $key=> $students)
        <tr style="padding: 3px ;{{$key%2==1?'background: #ccc':''}}">

            <td style="    border: 1px solid #dee2e6;">{{$students->name_ar}} {{$students->father->name_ar}}</td>
            <td style="    border: 1px solid #dee2e6;">{{$students->name_en}} {{$students->father->name_en}}</td>
            <td>{{$students->language->name_en?? ''}}</td>
            <td style="    border: 1px solid #dee2e6;">{{$students->status->name ?? ''}}</td>
            <td style="    border: 1px solid #dee2e6;">{{$students->section->name ?? ''}}</td>
            <td style="    border: 1px solid #dee2e6;"></td>

        </tr>
    @endforeach



    </tbody>
</table>
</body>
</html>
