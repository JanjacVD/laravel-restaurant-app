<body>
    <h1>Rezervacija otkazana</h1>
    <table>
        <tr>
            <td>
                Ime:
            </td>
            <td>
                {{$details['name']}}
            </td>
        </tr>
        <tr>
            <td>
                Broj rezervacije:
            </td>
            <td>
                {{$details['order']}}
            </td>
        </tr>
        <tr>
            <td>
                Datum:
            </td>
            <td>
                {{$details['date']}}
            </td>
        </tr>
        <tr>
            <td>
                Vrijeme:
            </td>
            <td>
                {{$details['time']}}
            </td>
        </tr>
    </table>
</body>