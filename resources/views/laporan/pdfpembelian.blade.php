<!DOCTYPE html>
<html>
<head>
	<title>User list - PDF</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<center><h1>Laporan Uang Keluar</h1></center>
<div class="container">
	<table border="1" width="100%;">
		<thead>
			<tr>
			<th>Tanggal</th>
			<th>Uang Masuk</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pem as $data)
			<tr>
				<td>{{ $data->created_at }}</td>
				<td>Rp.{{ number_format($data->total) }},-</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	Total Uang Keluar Dari Tanggal {{$a}} Sampai {{$b}}: Rp.{{number_format($sum)}},-
</div>
</body>
</html>