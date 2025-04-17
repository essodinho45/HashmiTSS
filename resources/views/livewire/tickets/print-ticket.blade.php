<html dir="rtl">

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>

<body onload="window.print()">
    <div>
        <table>
            <tbody>
                <tr>
                    <td><b>{{ __(key: '#') }}</b></td>
                    <td>{{ $ticket->id }}</td>
                </tr>
                <tr>
                    <td><b>{{ __(key: 'Customer Name') }}</b></td>
                    <td>{{ $ticket->customer_name }}</td>
                </tr>
                <tr>
                    <td><b>{{ __(key: 'Customer Mobile') }}</b></td>
                    <td>{{ $ticket->customer_mobile }}</td>
                </tr>
                <tr>
                    <td><b>{{ __(key: 'Customer Address') }}</b></td>
                    <td>{{ $ticket->customer_address }}</td>
                </tr>
                <tr>
                    <td><b>{{ __('Employee') }}</b></td>
                    <td>{{ $ticket->employee->name ?? '' }}</td>
                </tr>
                <tr>
                    <td><b>{{ __('Note') }}</b></td>
                    <td>{{ $ticket->note }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
