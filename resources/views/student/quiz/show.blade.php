@extends('layouts.app')
@section('content')
<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/11/19
 * Time: 2:16 PM
 */
?>

<div class="jumbotron">
    <small>
        {{$quiz->courseDepartment}} {{$quiz->courseNumber}} {{$quiz->courseSection}} {{$quiz->semester}} {{$quiz->year}}
    </small>
    <div class="h1">
        {{$quizName->title}}
    </div>
        {!! Form::open(array('route' => array('student.quiz.store', $quizName->id_quiz))) !!}
        <div class="row">
            @foreach($questions as $question)

                @if($quizName->can_bet == 1) <!---CHECKS IF YOU CAN BET----->
                    <div class="col-2">
                        @if($question->question_type ==="multiple answer")
                            @foreach($optionNum as $num)
                                @if($num->id_question == $question->id_question)
                                {{Form::number('bet_'.$question->id_question, null, array('placeholder'=>'BET', 'class'=>'form-control', 'max'=>floor($points/$num->count), 'min'=>0, 'required'))}}
                                    @endif
                            @endforeach
                        @else
                            {{Form::number('bet_'.$question->id_question, null, array('placeholder'=>'BET', 'class'=>'form-control', 'max'=>floor($points), 'min'=>0, 'required'))}}
                        @endif
                    </div>
                @endif
                <div class="col-10">
                    {{$question->question_label}}

                    <!---=========== Checks for short answer ==================-->
                    @if($question->question_type ==="short answer")
                        {{Form::text('short_'.$question->id_question, null,array('class'=>'form-control'))}}

                    @elseif($question->question_type ==="multiple choice")
                        <!---=========== Checks for Multiple Choice ==================-->
                        @foreach($options as $option)
                            @if($option->id_question == $question->id_question)
                                <br/>
                                {{Form::radio($option->id_question,$option->id_option)}}
                                {{Form::label($option->id_question, $option->option)}}
                            @else

                            @endif <!------========== CHECKS IF option belongs to question =============----->
                        @endforeach
                    @else
                        <!---=========== Checks for Multiple answer ==================-->
                        @foreach($options as $option)
                            @if($option->id_question == $question->id_question)
                                <br/>
                                {{Form::checkbox('MC_'.$option->id_option.'_'.$option->id_question,$option->id_option)}}
                                {{Form::label('MC_'.$option->id_option.'_'.$option->id_question, $option->option)}}
                            @else

                            @endif <!------========== CHECKS IF option belongs to question =============----->
                        @endforeach

                    @endif<!------========== CHECKS IF question is short answer or multiple choice =============----->
                </div>
            @endforeach
            {{Form::button("Submit", array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Delete', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
        </div>
        {!! Form::close() !!}

</div>
@stop
