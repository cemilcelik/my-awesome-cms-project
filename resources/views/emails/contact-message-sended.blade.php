<html>
    <head>
        <title>Contact Message Sended</title>
    </head>
    <body>
        <h3>Contact Form Message</h3>
        <p>Hello, you contact message sended.</p>
        <table>
            <tr>
                <td>Name Surname</td>
                <td>:</td>
                <td>{{ $feedback->name_surname }}</td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td>:</td>
                <td>{{ $feedback->email }}</td>
            </tr>
            <tr>
                <td>Message</td>
                <td>:</td>
                <td>{{ $feedback->message }}</td>
            </tr>
        </table>
    </body>
</html>
