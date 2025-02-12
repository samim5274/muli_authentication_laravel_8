<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Document</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- FontAwesome JS-->
    <script defer src="/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="/assets/css/portal.css">
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: navy; }
        p { font-size: 14px; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>Date: {{ $date }}</p>
    <p>{{ $content }}</p>

    <div class="table-responsive">
        <table class="table app-table-hover mb-0 text-left">
            <thead>
                <tr>
                    <th class="cell">Order</th>
                    <th class="cell">Product</th>
                    <th class="cell">User</th>
                    <th class="cell">Date</th>
                    <th class="cell">Status</th>
                    <th class="cell">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($value as $i => $row)
                    <tr>
                        <td class="cell">#INV-{{$row->invoice}}</td>
                        <td class="cell"><span class="truncate">{{$row->exreceived->name}} dolor sit amet eget volutpat erat</span></td>
                        <td class="cell">{{$row->exreceived->name}}</td>
                        <td class="cell"><span>{{$row->created_at->format('d-M')}}</span><span class="note">{{$row->created_at->format('h:i A')}}</span></td>
                        @php
                            $statuses = [
                                1 => ['text' => 'Submitted', 'class' => 'bg-info'],
                                2 => ['text' => 'Pending', 'class' => 'bg-warning'],
                                3 => ['text' => 'Paid', 'class' => 'bg-success'],
                                4 => ['text' => 'Cancelled', 'class' => 'bg-danger']
                            ];
                        @endphp
                        <td class="cell">
                            <span class="badge {{ $statuses[$row->status]['class'] }}">
                                {{ $statuses[$row->status]['text'] }}
                            </span>
                        </td>
                        <td class="cell">${{$row->amount}}/-</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
