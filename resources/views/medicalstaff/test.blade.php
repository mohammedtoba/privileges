@extends('layouts/fixed_menu')
@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-lg-6 col-sm-4">
                <h4 class="nav_top_align">
                    <i class="fa fa-gear"></i>
                    Test
                </h4>
            </div>
            <div class="col-lg-6 col-sm-8">
                <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                    <li class="breadcrumb-item">
                        <a href="index">
                            <i class="fa fa-home" data-pack="default" data-tags=""></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Medical staff</a>
                    </li>
                    <li class="breadcrumb-item active">Education</li>
                </ol>
            </div>
        </div>
    </div>
</header> 
<div class="outer form_wizzards">
    <div class="inner bg-container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-mint">
                        <i class="fa fa-mortar-board"></i>
                        Laravel 5 - Column sorting with pagination example from scratch
                    </div>
                    <div class="card-body m-t-25">
                        <div class="alert-warning">
                            <ul>
                                @foreach($Notification as $n)
                                <li>{{$n->data['content'].' at '.$n->created_at}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>Qualification</th>
                                <th>year</th>
                                <th>university</th>
                                <th>country</th>
                            </tr>
                            @if($q->count())
                                @foreach($q as $key => $qual)
                                    <tr>
                                        <td>{{ $qual->qualif_desc }}</td>
                                        <td>{{ $qual->qualif_year }}</td>
                                        <td>{{ $qual->qualif_univ }}</td>
                                        <td>{{ $qual->qualif_country }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
