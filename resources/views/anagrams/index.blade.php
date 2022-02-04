@extends('anagrams.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Anagrams</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Word</th>
            <th>Sorted Letters</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->word }}</td>
            <td>{{ $value->letters_sorted }}</td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}   
@endsection