@extends('front_end.layout.master')
@section('content')
    <h3 class="page-title">BÀI TẬP</h3>
<form method="POST" action="{{ route('tests.store') }}" id="del">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <div class="panel panel-default">
        <div class="panel-heading">
            Câu Hỏi Về Hiệp Gay
        </div>
        <?php //dd($questions) ?>
    @if(count($questions) > 0)
        <div class="panel-body">
        <?php $i = 1; ?>
        @foreach($questions as $question)
            @if ($i > 1) <hr /> @endif
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="form-group">
                        <strong>Câu {{ $i }}.<br />{!! nl2br($question->question_text) !!}</strong>

                        @if ($question->code_snippet != '')
                            <div class="code_snippet">{!! $question->code_snippet !!}</div>
                        @endif

                        <input
                            type="hidden"
                            name="questions[{{ $i }}]"
                            value="{{ $question->id }}">
                    @foreach($question->options as $option)
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}">
                            {{ $option->option }}
                        </label>
                    @endforeach
                    </div>
                </div>
            </div>
        <?php $i++; ?>
        @endforeach
        </div>
    @endif
    </div>

    <button type="submit" class="btn btn-default">Đồng ý</button>
    </form>
    @endsection