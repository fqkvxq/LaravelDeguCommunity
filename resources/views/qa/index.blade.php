@extends('layouts.app') @section('title', 'デグーQ&A') @section('content')
<div class="container qa-index">
    @if ($errors->any())
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif @if (session('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success">
                {{ session("success") }}
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 mx-auto px-0">
                    <div class="row p-1">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        <button class="btn btn-lg btn-block btn-success" type="button"
                                            data-toggle="collapse" data-target="#QuestionCollapse" aria-expanded="false"
                                            aria-controls="QuestionCollapse">
                                            質問を追加する！
                                        </button>
                                    </p>
                                    <div class="collapse" id="QuestionCollapse">
                                        <form method="POST" action="/qa/addQuestion">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="answer_flg" value="0" />
                                            <div class="form-group">
                                                <label for="QuestionFrom">質問を入力してください。</label>
                                                <textarea class="form-control" id="QuestionFrom" name="question_text"
                                                    rows="7"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-block btn-primary">
                                                質問を投稿する！
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- カード --}}
            @foreach($questions as $question)
            @php
                if($question->answer_flg == 1){
                    $isAnswer = "回答のある質問";
                }else{
                    $isAnswer = "未回答の質問";
                }
            @endphp
            <a href="{{ url('qa').'/'.$question->id }}">
            <div class="row p-1 question-card">
                <div class="col-md-12 bg-white shadow-sm rounded p-3">
                    <div class="row">
                        <div class="col-md-12 tag">
                            <span>{{$isAnswer}}</span>
                            <span class="viewcount">閲覧数：333</span>
                            <span class="new">新着</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 question">
                            <h2>
                                {{ Str::limit($question->text,60) }}
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 answer">
                            <p>
                                {{$question->answers[0]->text}}
                            </p>
                        </div>
                    </div>
                    <span class="details d-block text-right">>>続きを読む</span>
                </div>
            </div>
            </a>
            @endforeach
            {{-- カードここまで --}}
        </div>
        <div class="col-md-4">
            <div class="row p-1">
                <div class="col-md-12 bg-white shadow-sm rounded-sm p-3">
                    <h2 class="text-center">回答のある質問</h2>
                    <small class="d-block text-center">みんなが回答を待っています！回答してね！</small>
                    <ul>
                        @foreach($questions as $question)
                            @php
                            if($question->answer_flg == 1){
                                echo "<li>";
                                echo "<a href=".url('qa')."/".$question->id.">".Str::limit($question->text,60)."</a>";
                                echo "</li>";
                            } 
                            @endphp
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-md-12 bg-white shadow-sm rounded-sm p-3">
                    <h2 class="text-center">まだ回答されていない質問</h2>
                    <small class="d-block text-center">みんなが回答を待っています！回答してね！</small>
                    <ul>
                        @foreach($questions as $question)
                            @php
                            if($question->answer_flg == 0){
                                echo "<li>";
                                echo "<a href=".url('qa')."/".$question->id.">".Str::limit($question->text,60)."</a>";
                                echo "</li>";
                            } 
                            @endphp
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection