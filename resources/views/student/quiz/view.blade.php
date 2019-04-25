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
            {{$quizName->title}} Review
        </div>
        @foreach($questions as $question)
            <div class="row" style="padding:1%;">
            @if($quizName->can_bet == 1) <!---CHECKS IF YOU CAN BET----->
                <div class="col-2">
                    <!--- THIS IS WHERE THE BET IS --->
                </div>
                @endif
                <div class="col-10">
                    <h3>{{$question->question_label}}</h3>
                      <ul style="list-style: none; padding-left:0px;">
                            @foreach($options as $option)
                                @if($option->id_question == $question->id_question)
                                    <li>
                                        <!---=========== Checks for Multiple Choice ==================-->
                                    @if($question->question_type ==="multiple choice")
                                        @if(!empty($option->id_answer))
                                            {{Form::radio($option->id_question,$option->id_option, true)}}
                                                <label>
                                                    {{$option->option}}
                                                    @if($option->isCorrect == 1)
                                                        <small style="color:green"> ** This is the correct answer</small>
                                                    @endif
                                                </label>
                                        @else
                                            {{Form::radio($option->id_question,$option->id_option)}}
                                                <label>
                                                    {{$option->option}}
                                                    @if($option->isCorrect == 1)
                                                        <small style="color:green"> ** This is the correct answer</small>
                                                    @endif
                                                </label>
                                        @endif
                                    @elseif($question->question_type ==="multiple answer")
                                        <!---=========== Checks for Multiple answer ==================-->
                                            @if(!empty($option->id_answer))
                                            {{Form::checkbox('MC_'.$option->id_option.'_'.$option->id_question,$option->id_option, true)}}
                                                <label>
                                                    {{$option->option}}
                                                    @if($option->isCorrect == 1)
                                                        <small style="color:green"> ** This is the correct answer</small>
                                                    @endif
                                                </label>
                                        @else
                                            {{Form::checkbox('MC_'.$option->id_option.'_'.$option->id_question,$option->id_option)}}
                                                <label>
                                                    {{$option->option}}
                                                    @if($option->isCorrect == 1)
                                                        <small style="color:green"> ** This is the correct answer</small>
                                                    @endif
                                                </label>
                                        @endif

                                    @else
                                        {{$option->answer}}
                                    @endif<!------========== CHECKS IF question is short answer or multiple choice =============----->
                                    </li>
                                @else
                                @endif <!------========== CHECKS IF option belongs to question =============----->
                            @endforeach
                        </ul>
                </div> <!--- end div for options -->
            </div> <!-- end row div -->
        @endforeach
        <a href="/student/courses" class="btn btn-dark">Back</a>

    </div>


@stop
