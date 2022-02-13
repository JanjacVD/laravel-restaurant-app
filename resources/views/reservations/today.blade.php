<!DOCTYPE html>
<html lang="HR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacije za danas</title>
</head>
<style>
:root{
    font-size: 8px;
}
td{
    font-size: 0.8rem;
}
    table, td {
  border: 1px solid;
  padding:3px;
}
</style>
<body style="font-family: DejaVu Sans, sans-serif;">
    <h1>Rezervacije za {{ date('d/m/Y')}}</h1>
    <table style="width:100%">
        <tr>
            <td>
                Stol
            </td>
            <td>
                Broj rezervacije
            </td>
            <td>
                Ime
            </td>
            <td>
                Broj osoba
            </td>
            <td>
                Pušaći
            </td>
            <td>
                Mobitel
            </td>
            <td>
                Poruka
            </td>
            <td>
                Vrijeme
            </td>
        </tr>
        @forelse ($info as $row)
        <tr>
            <td>
                <span style="width:20px; height:20px; background:none"></span>
            </td>
            <td>
                {{$row->order_number}}
            </td>
            <td>
                {{$row->name}}
            </td>
            <td>
                {{$row->people}}
            </td>
            <td>
                @if($row->smoke == '0') Ne @elseif ($row->smoke == '1') Da @endif
            </td>
            <td>
                {{$row->phone}}
            </td>
            <td>
                @if($row->message != 'No-message'){{$row->message}} @else NULL @endif
            </td>
            <td>
                {{$row->reservation_time}}
            </td>
        </tr>
        @empty
        <h1>Nema rezervacija</h1>
        @endforelse
    </table>
</body>

</html>