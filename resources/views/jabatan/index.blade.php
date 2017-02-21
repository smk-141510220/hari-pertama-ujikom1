@extends('layouts.app')

@section('content')


<center><h1>Data jabatan</h1></center>

<hr>
<div class="col-md-11 "> 
<table class="table table-striped table bordered table-hover">
<tr class="danger">

				<a href="{{url('/jabatan/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
				{{$jabatan->links()}}

	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode jabatan</center></th>
		<th><center>nama jabatan</center></th>
		<th><center>besaran uang</center></th>
		
		<th colspan="3">Action</th>
			
		</tr>
	</thead>
	<tbody>
		@php
		$no=1;
		@endphp
		@foreach($jabatan as $jabatans)
		<tr>
			<td>{{$no++}}</td>
			<td>{{$jabatans->kode_jabatan}}</td>
			<td>{{$jabatans->nama_jabatan}}</td>
			<?php $jabatans->besaran_uang=number_format($jabatans->besaran_uang,2,',','.') ?>
			<td>{{$jabatans->besaran_uang}}</td>
			
		<td><a href="{{route('jabatan.edit',$jabatans->id)}}" class="btn btn-warning">Update</a></td>	
		</td>
		<td>

	<td>
		 <td >
                                  <center><a data-toggle="modal" href="#delete{{ $jabatans->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip">Delete</a></center>
                                  @include('modals.delete', [
                                    'url' => route('jabatan.destroy', $jabatans->id),
                                    'model' => $jabatans
                                  ])
                            </td>
		@endforeach

	</tbody>
</table>
</div>
</center>


@endsection




