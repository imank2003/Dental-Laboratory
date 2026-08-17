<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سطل زباله</title>

    <style>
        body {
            font-family: Tahoma, sans-serif;
            background: #f4f4f4;
            padding: 30px;
        }

        .container {
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #222;
            color: white;
        }

        .btn {
            padding: 7px 12px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            color: white;
        }

        .restore {
            background: green;
        }

        .delete {
            background: red;
        }

        form {
            display: inline-block;
        }
    </style>

</head>

<body>


<div class="container">

    <h2>سطل زباله</h2>


    @if(session('success'))

        <p style="color:green">
            {{ session('success') }}
        </p>

    @endif



    <table>

        <thead>

            <tr>
                <th>نوع</th>
                <th>عنوان</th>
                <th>تاریخ حذف</th>
                <th>عملیات</th>
            </tr>

        </thead>


        <tbody>


        @forelse($items as $item)


            <tr>

                <td>
                    {{ ucfirst($item['type']) }}
                </td>


                <td>
                    {{ $item['title'] }}
                </td>


                <td>
                    {{ $item['deleted_at'] }}
                </td>


                <td>


                    <form action="{{ route('admin.trash.restore', [
                        'type' => $item['type'],
                        'id' => $item['id']
                    ]) }}" method="POST">

                        @csrf
                        @method('PATCH')

                        <button class="btn restore">
                            بازیابی
                        </button>

                    </form>



                    <form action="{{ route('admin.trash.forceDelete', [
                        'type' => $item['type'],
                        'id' => $item['id']
                    ]) }}" method="POST">


                        @csrf
                        @method('DELETE')


                        <button class="btn delete"
                        onclick="return confirm('آیا از حذف دائمی مطمئن هستید؟')">

                            حذف کامل

                        </button>


                    </form>


                </td>

            </tr>


        @empty


            <tr>

                <td colspan="4">
                    سطل زباله خالی است.
                </td>

            </tr>


        @endforelse


        </tbody>


    </table>


</div>


</body>

</html>