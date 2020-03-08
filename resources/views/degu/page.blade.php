@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 bg-white shadow-sm">
            <div class="row">
                <div class="col-md-6 mx-auto py-5">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <img class="img-fluid" src="https://via.placeholder.com/1200x630" alt="">
                                </td>
                            </tr>
                            <tr>
                                <th>お名前</th>
                                <td>{{$degu->degu_name}}</td>
                            </tr>
                            <tr>
                                <th>性別</th>
                                <td>{{$degu->degu_sex}}</td>
                            </tr>
                            <tr>
                                <th>ひとこと</th>
                                <td>{{$degu->degu_profile}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-block btn-outline-primary">Twitter</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection