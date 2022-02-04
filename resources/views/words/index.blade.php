@extends('words.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Words</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Word</th>
            <th>Sorted Letters</th>
            <th>Anagrams</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->word }}</td>
            <td>{{ $value->letters_sorted }}</td>
            @if($value->anagrams > 0)
            <td><a href="{{url('/anagrams/'.$value->word)}}">{{ $value->anagrams }}</a></td>
            @else
            <td>{{ $value->anagrams }}</td>
            @endif
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}   
@endsection