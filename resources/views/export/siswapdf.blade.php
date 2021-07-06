<table class="table table-hover" style="border: 1px solid #dddddd">
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Rata-Rata Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $sw)
        <tr>
            <td>{{$sw->nama_lengkap()}}</td>
            <td>{{$sw->jenis_kelamin}}</td>
            <td>{{$sw->agama}}</td>
            <td>{{$sw->rerata()}}</td>
        </tr>
        @endforeach

    </tbody>
</table>

