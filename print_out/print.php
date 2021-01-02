@if($view == 'print')
	<center style="margin-bottom:40px">
		<h1 style="margin-bottom:0">Sasaran Kerja</h1>
		<h3 style="margin-top:0">Pegawai Negeri Sipil</h3>
	</center>
@else
<a href="{{URL::current().'/print'.(Request::has('periode')?'?periode='.Request::get('periode'):'')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-print"></i> Print</a>
<a href="{{URL::current().'/pdf'.(Request::has('periode')?'?periode='.Request::get('periode'):'')}}" class="btn btn-sm btn-primary pull-right" style="margin-right:5px"><i class="fa fa-file-pdf-o"></i> PDF</a>
<h3 class="header">Kegiatan <small>Tugas Jabatan</small></h3>
@endif

@if($view !== 'print')
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Data Pegawai</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item"><span class="text-primary">NIP:</span> <span class="pull-right">{{$user->nip}}</span></li>
					<li class="list-group-item"><span class="text-primary">Nama:</span> <span class="pull-right">{{$user->nama}}</span></li>
					<li class="list-group-item"><span class="text-primary">Pangkat/Gol:</span> <span class="pull-right">{{$user->pangkat}}, {{$user->golongan}}</span></li>
					<li class="list-group-item"><span class="text-primary">Unit Kerja:</span> <span class="pull-right">{{$user->unit_kerja}}</span></li>
				</ul>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Data Periode</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item"><span class="text-primary">ID:</span> <span class="pull-right">{{$periode->id}}</span></li>
					<li class="list-group-item"><span class="text-primary">Periode:</span> 
						<div class="dropdown pull-right">
							<button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						    	Periode {{$periode->periode}} <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								@foreach($periodes as $periode)
								    <li><a href="?periode={{$periode->id}}">{{$periode->periode}}</a></li>
								@endforeach
							</ul>
						</div>
					</li>
					<li class="list-group-item"><span class="text-primary">Dari Tanggal:</span> <span class="pull-right">{{$periode->from}}</span></li>
					<li class="list-group-item"><span class="text-primary">Sampai Tanggal:</span> <span class="pull-right">{{$periode->to}}</span></li>
				</ul>
			</div>
		</div>
	</div>
@endif

<div class="skp" style="page-break-after: always;">
	<table class="table table-bordered" border="1" width="100%" cellspacing="0" cellpadding="2">
		<tr>
			<th bgcolor="#ddd" width="5%">NO</th>
			<th bgcolor="#ddd" colspan="2" width="45%" align="left">I. PEJABAT PENILAI</th>
			<th bgcolor="#ddd" width="5%">NO</th>
			<th bgcolor="#ddd" colspan="6" align="left">II. PEGAWAI NEGERI SIPIL YANG DINILAI</th>
		</tr>
		<tr>
			<td align="center">1</td>
			<td width="10%">Nama</td>
			<td>{{$atasan['nama']}}</td>
			<td align="center">1</td>
			<td colspan="2">Nama</td>
			<td colspan="4">{{$user->nama}}</td>
		</tr>
		<tr>
			<td align="center">2</td>
			<td>NIP</td>
			<td>{{$atasan['nip']}}</td>
			<td align="center">2</td>
			<td colspan="2">NIP</td>
			<td colspan="4">{{$user->nip}}</td>
		</tr>
		<tr>
			<td align="center">3</td>
			<td>Pangkat / Gol.Ruang</td>
			<td>{{$atasan['pangkat']}} ({{$atasan['golongan']}})</td>
			<td align="center">3</td>
			<td colspan="2">Pangkat / Gol.Ruang</td>
			<td colspan="4">{{$user->pangkat}} ({{$user->golongan}})</td>
		</tr>
		<tr>
			<td align="center">4</td>
			<td>Jabatan</td>
			<td>{{$atasan['jabatan']}}</td>
			<td align="center">4</td>
			<td colspan="2">Jabatan</td>
			<td colspan="4">{{$user->jabatan}}</td>
		</tr>
		<tr>
			<td align="center">4</td>
			<td>Unit Kerja</td>
			<td>{{$atasan['unitkerja']}}</td>
			<td align="center">4</td>
			<td colspan="2">Unit Kerja</td>
			<td colspan="4">{{$user->unit_kerja}}</td>
		</tr>

		<tr>
			<th bgcolor="#ddd" rowspan="2">NO</th>
			<th bgcolor="#ddd" rowspan="2" colspan="2" width="45%">III. KEGIATAN TUGAS JABATAN</th>
			<th bgcolor="#ddd" rowspan="2" width="5%">AK</th>
			<th bgcolor="#ddd" colspan="6">TARGET</th>
		</tr>
		<tr>
			<th bgcolor="#ddd" width="15%" colspan="2">KUANT / OUTPUT</th>
			<th bgcolor="#ddd" width="15%">KUAL / MUTU</th>
			<th bgcolor="#ddd" width="15%" colspan="2">WAKTU</th>
			<th bgcolor="#ddd" width="20%">BIAYA</th>
		</tr>
		@if($kegiatan_tahunan->count() > 0)
			@foreach($kegiatan_tahunan as $key => $kegiatan)
				<tr>
					<td align="center">{{$key+1}}</td>
					<td colspan="2">{{$kegiatan->label}}</td>
					<td align="center">{{$kegiatan->angka_kredit}}</td>
					<td align="center">{{$kegiatan->quantity}}</td>
					<td align="center">{{$kegiatan->satuan->name}}</td>
					<td align="center">{{$kegiatan->quality}}</td>
					<td align="center">{{$kegiatan->target_waktu}}</td>
					<td align="center">Bulan</td>
					<td align="right">{{$kegiatan->cost_rp}}</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td colspan="10" class="text-center">Tidak ada data</td>
			</tr>
		@endif
	</table>

	@if($view === 'print')<br><br>
		<table width="100%">
			<tr>
				<td align="center" width="50%">Pejabat Penilai,</td>
				<td align="center" width="50%">Karawang, {{$date}}<br>Pegawai Negeri Sipil Yang Dinilai</td>
			</tr>
			<tr>
				<td><br><br><br></td>
				<td><br><br><br></td>
			</tr>
			<tr>
				<td align="center">
					<b><u>{{$atasan['nama']}}</u></b>
					<br>{{$atasan['nip']}}
				</td>
				<td align="center">
					<b><u>{{$user->nama}}</u></b>
					<br>{{$user->nip}}
				</td>
			</tr>
		</table>
	@endif
</div>