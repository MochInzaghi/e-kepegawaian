<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/test" method="post">
        @csrf
        <h1>Nama pegawai : {{ $data_pegawai->namapegawai }}</h1>
        <input type="hidden" name="data_pegawai_id" value="{{ $data_pegawai->id }}">
        <label for="tmt">TMT</label>
        <input type="date" id="tmt" name="tmt">
        <label for="jabatanterakhir">Jabatan Terakhir</label>
        <input type="text" id="jabatanterakhir" name="jabatanterakhir">
        <button type="submit">Submit Edit</button>
    </form>
</body>

</html>
