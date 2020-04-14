@extends('layouts.app')
@section('title', 'デグーQ&A')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="row p-1 question">
                        <div class="col-md-12 bg-white shadow-sm rounded-sm p-3">
                            <h2>#{{$question->id}}: {{$question->text}}</h2>
                        </div>
                    </div>
                    <div class="row answerform">
                        <div class="col-md-12">
                            <form action="/qa/addAnswer" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="answer_flg" value="1" />
                                <input type="hidden" name="question_id" value="{{$question->id}}" />
                                @if($question->answer_flg == 0)
                                <h2>まだ回答がありません。</h2>
                                @endif
                                <div class="form-group">
                                    <label for="QuestionFrom">回答を入力してください。</label>
                                    <textarea class="form-control" id="QuestionFrom" name="answer_text"
                                        rows="7"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">回答する</button>
                            </form>
                            @foreach($answers as $answer)
                            <div class="row answer-card mt-1">
                                <div class="col-md-12 bg-white shadow-sm p-3">
                                    <div class="row">
                                        <div class="col-md-12 answer">
                                            <h4>{{ $answer->user->name }}</h4>
                                            <p>{{ $answer->updated_at }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 answer">
                                            <p>
                                                {{ $answer->text }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row p-1 answer">
                        <div class="col-md-12 bg-white shadow-sm rounded-sm p-3">
                            <h2 class="text-center">まだ回答されていない質問</h2>
                            <small class="d-block text-center">みんなが回答を待っています！回答してね！</small>
                            <ul>
                                @foreach($questions as $question)
                                <li>
                                    <a href="{{ url('qa').'/'.$question->id }}">
                                        {{ Str::limit($question->text,60) }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                            <div class="row p-3">
                                <div class="col-md-12">
                                    <img class="img-fluid" src="https://via.placeholder.com/336x280.png?text=Ad" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection