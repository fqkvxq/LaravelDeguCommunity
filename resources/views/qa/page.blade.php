@extends('layouts.app')
@section('title', $question->title."｜デグーQ&A")
@section('content')
<div class="container">
    @component('component/success')
    @endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="row px-0 pt-1">
                <div class="col-md-8">
                    <div class="row question">
                        <div class="col-md-12 bg-white shadow-sm p-3">
                            <h2 class="h3">{{$question->title}}</h2>
                            <span>{{ $question->category->name }}</span>
                            {{-- <img src="{{ $question->user->profile_image_url }}" alt="プロフィール写真"> --}}
                            <span class="h6 questionerinfo d-block mb-3">{{ $question->user->name }}さん, {{ $question->created_at->format('n月j日') }}</span>
                            <p>{{App\Library\BaseClass::eReplaceUrl($question->text)}}</p>
                            <div class="row mx-auto fonticons">
                                <div class="col-12 text-right">
                                    <a href="//twitter.com/share?url={{ url('qa/'.$question->id) }}&text={{Str::limit($question->text,100)}}" class="twitter-share-button" data-text="{{ Str::limit($question->title,60) }}" data-url="{{ url('qa/'.$question->id) }}" data-lang="ja">
                                        <i class="fas fa-share-alt"></i><span class="icon-count fav-count">SHARE</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row answerlist">
                        <div class="col-md-12">
                            @foreach($answers as $answer)
                            <div class="row answer-card mt-1">
                                <div class="col-md-12 bg-white shadow-sm p-3">
                                    <div class="row">
                                        <div class="col-md-12 answer">
                                            <h3 class="h5 answerername mb-0">{{ $answer->user->name }}<span class="h6">さんの回答：</span></h3>
                                            <span class="date d-block mb-3">{{\Carbon\Carbon::parse($answer->updated_at)->format("n月j日")}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 answer">
                                            <p>
                                                {{ App\Library\BaseClass::eReplaceUrl($answer->text) }}
                                            </p>
                                            <div class="row mx-auto fonticons">
                                                <div class="col-12 text-right">
                                                   <a href="//twitter.com/share?url={{ url('qa/'.$question->id) }}&text={{Str::limit($question->text,100)}}" class="twitter-share-button" data-text="{{ Str::limit($question->title,60) }}" data-url="{{ url('qa/'.$question->id) }}" data-lang="ja">
                                                        <i class="fas fa-share-alt"></i><span class="icon-count fav-count">SHARE</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row answerform">
                        <div class="col-md-12 px-1">
                            @auth
                            <form action="/qa/addAnswer" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="answer_flg" value="1" />
                                <input type="hidden" name="question_id" value="{{$question->id}}" />
                                @if($question->answer_flg == 0)
                                <h2>まだ回答がありません。</h2>
                                @endif
                                <div class="form-group mt-1">
                                    <textarea class="form-control" id="QuestionFrom" name="answer_text"
                                        rows="7" placeholder="回答を入力し、交流をしましょう！" required></textarea>
                                </div>
                                <div class="text-center mb-3 answer-button">
                                    <button type="submit" class="btn  btn-lg">質問にこたえる！</button>
                                </div>
                            </form>
                            @endauth
                            @guest
                            <a href="/login"><img class="img-fluid mx-auto d-block" src="https://degiita.s3-ap-northeast-1.amazonaws.com/degiita/answer_needlogin.jpeg" alt="質問に回答するためにはログインが必要となります。"></a>
                            @endguest
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row answer">
                        <div class="col-md-12 bg-white shadow-sm rounded-sm p-3">
                            <h2 class="h3 text-center">質問一覧</h2>
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