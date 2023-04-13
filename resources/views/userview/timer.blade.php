@extends('layouts.userlayout')
@section('main')


<style>
    h1 {
        font-size: 52px;
        margin-bottom: 40px;
    }

    #timer {
        font-size: 60px;
        margin-bottom: 20px;
    }

    button {
        padding: 10px 30px;
        background-color: #378bac;
        border: 1px solid #fff;
        color: #fff;
        border-radius: 8px;
        font-size: 16px;
        margin: 0 5px;
        outline: none;
        cursor: pointer;
    }

    button:hover {
        border: 1px solid #FF7373;
        color: #aa7373;
        background: #fff;
    }
</style>
<br>
<br>

<div class="container" style="margin-top:10%;margin-bottom:2%">
    <h1>Click Start To Record The Time Spent On The Work </h1>
    <div id="timer">00:00</div>
    <button id="start">Start</button>
    <button id="reset">Reset</button>
    <form action="{{route('start-service-post',$serviceperson->id)}}" method="post">
        {{csrf_field()}}
        <!-- <input name="timespent" value="" hidden id="time-spent" readonly> -->
        <!-- <button id="stop">stop to submit</button> -->
        <input name="timespent" value="" hidden id="time-spent" readonly>
        <button id="stop" type="submit">stop to submit</button>
    </form>


</div>
<div class="container" style="margin-bottom:2%">

</div>

<script type="text/javascript">
    var watch = (function() {
        var timer = document.getElementById("timer");
        var stop = document.getElementById("stop");
        var reset = document.getElementById("reset");
        var time = "00:00"
        var seconds = 0;
        var minutes = 0;
        var t;

        timer.textContent = time;

        function buildTimer() {
            seconds++;
            if (seconds >= 60) {
                seconds = 0;
                minutes++;
                if (minutes >= 60) {
                    minutes = 0;
                    seconds = 0;
                }
            }
            return timer.textContent = (minutes < 10 ? "0" + minutes.toString() : minutes) + ":" + (seconds < 10 ? "0" + seconds.toString() : seconds);
        }

        function stopTimer() {
            stop.addEventListener("click", function() {

                // console.log(buildTimer(t));
                var timespent = buildTimer(t);
                var timeArr = timespent.split(':');
                timeArr[0] = timeArr[0] * 60;
                var timeInSeconds = 0;
                timeArr.forEach((timeElement) => {
                    timeInSeconds += parseFloat(timeElement);
                })
                timeInHours = timeInSeconds / (60 * 60);
                console.log('timeInSeconds: ' + timeInSeconds);
                var finalTime = timeInHours;
                sessionStorage.setItem('time', finalTime);
                var getTime = sessionStorage.getItem('time');
               // alert(getTime)
                document.getElementById("time-spent").value = getTime;

                clearTimeout(t);
            })
        }

        function startTimer() {
            start.addEventListener("click", function() {
                clearTimeout(t);
                t = setInterval(buildTimer, 1000);
            });
        }

        function resetTimer() {
            reset.addEventListener("click", function() {
                timer.textContent = time;
                seconds = 0;
                minutes = 0;
            });
        }
        return {
            start: startTimer(),
            stop: stopTimer(),
            reset: resetTimer()
        };
    })()
</script>
