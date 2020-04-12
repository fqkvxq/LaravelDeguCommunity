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
                <div class="col-md-12 px-1 py-3 mt-1 bg-white">
                    <!-- Button trigger modal -->
                    <div type="button" class="question_button btn-block" data-toggle="modal" data-target="#exampleModal">
                        <p class="px-2 mb-0">こちらをタップして質問を入力してください。<span class="text-cursor"></span></p>
                    </div>
                </div>
            </div>

            {{-- modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form method="POST" action="/qa/addQuestion">
                    {{ csrf_field() }}
                    <input type="hidden" name="answer_flg" value="0" />
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">質問を入力してください。</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-1">
                            <div class="form-group mb-1">
                                <select class="form-control" id="exampleFormControlSelect1">
                                <option>タップして質問カテゴリを選択</option>
                                <option>食事</option>
                                <option>飼育環境</option>
                                <option>掃除</option>
                                <option>ふれあい</option>
                                <option>健康</option>
                                </select>
                            </div>
                            <div class="form-group mb-1">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="question_text" placeholder="質問文をこちらへ入力してください。" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                            <button type="submit" class="btn btn-danger">送信</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
            {{--  --}}
            {{-- カード --}}
            @foreach($questions as $question)
            <a href="{{ url('qa').'/'.$question->id }}">
            <div class="row question-card mt-1">
                <div class="col-md-12 bg-white shadow-sm p-3">
                    <div class="row">
                        <div class="col-md-12 tag">
                            <!-- {{ $question->answer_flg }} -->
                            @if($question->answer_flg == 1)
                            <span>回答のある質問</span>
                            @endif
                            @if($question->answer_flg == 0)
                            <span>未回答の質問</span>
                            @endif
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
                                質問内容をここに入力　質問内容をここに入力　質問内容をここに入力　質問内容をここに入力　質問内容をここに入力　質問内容をここに入力　質問内容をここに入力　質問内容をここに入力　
                            </p>
                        </div>
                    </div>
                    <span class="details d-block text-right readdetail">続きを読む</span>
                </div>
            </div>
            </a>
            @endforeach
            {{-- カードここまで --}}
            {{ $questions->links('pagination::bootstrap-4') }}
        </div>
        <div class="col-md-4">
            <div class="row my-1">
                <div class="col-md-12 bg-white shadow-sm p-3">
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

@endsection