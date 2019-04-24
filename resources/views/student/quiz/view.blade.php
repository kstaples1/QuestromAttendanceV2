@extends('layouts.app')
@section('content')
    <?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/17/19
 * Time: 11:23 AM
 */
?>

    <div class="jumbotron" style="margin-top:2vh;">
        <small>
            {{$quiz->courseDepartment}} {{$quiz->courseNumber}} {{$quiz->courseSection}} {{$quiz->semester}} {{$quiz->year}}
        </small>
        <div class="h1">
            {{$quizName->title}}
        </div>
        {!! Form::open(array('route' => array('student.quiz.store', $quizName->id_quiz))) !!}
        @foreach($questions as $question)
            <div class="row" style="padding:1%;">
            @if($quizName->can_bet == 1) <!---CHECKS IF YOU CAN BET----->
                <div class="col-2">
                    <!--- THIS IS WHERE THE BET IS --->
                </div>
                @endif
                <div class="col-10">
                    <h3>{{$question->question_label}}</h3>

                    <!---=========== Checks for short answer ==================-->
                    @if($question->question_type ==="short answer")
                        {{Form::text('short_'.$question->id_question, null,array('class'=>'form-control'))}}
                    @else
                        <ul style="list-style: none; padding-left:0px;">
                            @foreach($options as $option)
                                @if($option->id_question == $question->id_question)
                                    <li>
                                        <!---=========== Checks for Multiple Choice ==================-->
                                    @if($question->question_type ==="multiple choice")

                                        {{Form::radio($option->id_question,$option->id_option)}}
                                        {{Form::label($option->id_question, $option->option)}}
                                    @else
                                        <!---=========== Checks for Multiple answer ==================-->
                                        {{Form::checkbox('MC_'.$option->id_option.'_'.$option->id_question,$option->id_option)}}
                                        {{Form::label('MC_'.$option->id_option.'_'.$option->id_question, $option->option)}}
                                    @endif<!------========== CHECKS IF question is short answer or multiple choice =============----->
                                    </li>
                                @else

                                @endif <!------========== CHECKS IF option belongs to question =============----->
                            @endforeach
                        </ul>

                @endif <!-- Ends if statement to check for short answer -->
                </div> <!--- end div for options -->
            </div> <!-- end row div -->
        @endforeach
        {{Form::button("Submit", array('class'=>'btn btn-success', 'type'=>'submit', 'title'=>'Delete', 'data-placement'=>'top', 'data-toggle'=>'tooltip'))}}
        {!! Form::close() !!}

    </div>


@stop
