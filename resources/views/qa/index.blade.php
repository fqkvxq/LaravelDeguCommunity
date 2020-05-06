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
    @endif
    @component('component/success')
    @endcomponent
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
            <div class="row">
                <div class="col-md-12">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form method="POST" action="/qa/addQuestion">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="answer_flg" value="0" />
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            @auth
                                            <h5 class="modal-title" id="exampleModalLabel">質問を入力してください。</h5>
                                            @endauth
                                            @guest
                                            <h5 class="modal-title" id="exampleModalLabel">ログインしてください。</h5>
                                            @endguest
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @auth
                                        <div class="modal-body p-1">
                                            <div class="form-group mb-1">
                                                <select class="form-control" name="category" id="exampleFormControlSelect1">
                                                <option>タップして質問カテゴリを選択</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mb-1">
                                                <input name="question_title" class="form-control" placeholder="質問タイトルを入力してください" type="text" id="" required>
                                            </div>
                                            <div class="form-group mb-1">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" name="question_text" placeholder="質問文をこちらへ入力してください。" rows="10" required></textarea>
                                            </div>
                                        </div>
                                        @endauth
                                        <div class="modal-footer">
                                            @auth
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                            <button type="submit" class="btn btn-danger">送信</button>
                                            @endauth
                                            @guest
                                            <p>質問を投稿するためには、ログインが必要です。</p>
                                            <button href="/login" class="mx-auto btn btn-primary">ログイン</button>
                                            @endguest
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                </div>
            </div>
            {{-- カード --}}
            @foreach($questions as $question)
            <a href="{{ url('qa').'/'.$question->id }}">
            <div class="row question-card mt-1">
                <div class="col-md-12 bg-white shadow-sm p-3">
                    <div class="row">
                        <div class="col-md-12 tag">
                            <!-- {{ $question->answer_flg }} -->
                            @if($question->answer_flg == 1)
                            <span class="hasanswertag"><span class="answerscount mb-0">{{count(App\Question::find($question->id)->answers)}}</span>件の回答のある質問</span>
                            @endif
                            @if($question->answer_flg == 0)
                            <span class="noanswertag">未回答の質問</span>
                            @endif
                            @if(!empty($question->category->name))
                            <span class="category">{{ $question->category->name }}</span>
                            @endif
                            @if(date("d") - date("d",strtotime($question->created_at)) <= 1)
                            <span class="new">新着</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 question">
                            <h2>
                                {{ Str::limit($question->title,60) }}
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 answer">
                            <p>
                                {{ Str::limit($question->text,300) }}
                            </p>
                        </div>
                    </div>
                    <div class="row mx-auto fonticons">
                        <div class="col-4 text-center"><i class="far fa-comment"></i><span class="icon-count comment-count">{{count(App\Question::find($question->id)->answers)}}</span></div>
                        <div class="col-4 text-center"><i class="far fa-heart"></i><span class="icon-count fav-count">999</span></div>
                        <div class="col-4 text-center">
                            <a href="//twitter.com/share?url={{ url('qa/'.$question->id) }}&text={{Str::limit($question->text,100)}}" class="twitter-share-button" data-text="{{ Str::limit($question->title,60) }}" data-url="{{ url('qa/'.$question->id) }}" data-lang="ja">
                                <i class="fas fa-share-alt"></i><span class="icon-count fav-count">SHARE</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            @endforeach
            {{-- カードここまで --}}
            {{-- pagination --}}
            <div class="pagination justify-content-center my-4">
                {{ $questions->links('pagination::bootstrap-4') }}
            </div>
        </div>
        {{-- 以下、サイドバー --}}
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