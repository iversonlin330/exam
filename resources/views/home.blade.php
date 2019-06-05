<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Exam</title>
		<script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
		.left_side{
			width:10%;
			float:left;
			text-align: center;
		}
		.main_view{
			width:55%;
			float:left;
			text-align: center;
		}
		.question{
			width:25%;
			float:left;
			//text-align: center;
		}
        </style>
    </head>
    <body>
		<div id="app" class="container">
			<div class="left_side">
				<div class="timer">
					<label id="minutes">00</label>:<label id="seconds">00</label>
				</div>
				<div class="question_no">
					<div>1</div>
					<div>2</div>
					<div>3</div>
					<div>4</div>
					<div>5</div>
					<div>6</div>
					<div>7</div>
					<div>8</div>
					<div>9</div>
					<div>10</div>
					<div>11</div>
					<div>12</div>
					<div>13</div>
					<div>14</div>
					<div>15</div>
					<div>16</div>
					<div>17</div>
					<div>18</div>
					<div>19</div>
					<div>20</div>
					<div>21</div>
				</div>
			</div>
			<div class="main_view">
				<button onclick="timer_start()">開始</button>
			</div>
			<div class="question">
			<!-- Q1 -->
				<div id="q1" class="question_block">
					<div class="question_title">
						點選最可以說明16族原住民文化的網頁。
					</div>
					<div class="question_answer">
						<div>
							<input type="radio" name="q[1]" value="A">花蓮原住民文創商城
						</div>
						<div>
							<input type="radio" name="q[1]" value="B">九族文化村
						</div>
						<div>
							<input type="radio" name="q[1]" value="C">原住民族委員會
						</div>
						<div>
							<input type="radio" name="q[1]" value="D">中時電子報
						</div>
					</div>
				</div>
				<div id="q2" class="question_block">
					<div class="question_title">
						
					</div>
				</div>
			</div>
			<div id="question_template" class="question_block" hidden>
				<div class="question_title">
					點選最可以說明16族原住民文化的網頁。
				</div>
				<div class="question_answer">
					<div>
						<input type="radio" name="q[1]" value="A">花蓮原住民文創商城
					</div>
					<div>
						<input type="radio" name="q[1]" value="B">九族文化村
					</div>
					<div>
						<input type="radio" name="q[1]" value="C">原住民族委員會
					</div>
					<div>
						<input type="radio" name="q[1]" value="D">中時電子報
					</div>
				</div>
			</div>
		</div>
    </body>
	<script>
		var question_title = [];
		question_title[1] = '點選最可以說明16族原住民文化的網頁。',
		question_title[2] = '與賽德克族相鄰的是哪幾族?';
		question_title[3] = '「矮靈祭」是哪一族的傳統祭典？';
		question_title[4] = '以下哪一個不是故事中的矮人專長或喜歡的事?';
		question_title[5] = '故事中的矮人是怎麼死去的?';
		question_title[6] = '請分別寫出賽夏族青年要將大樹底部切去大半，塗上泥巴的原因?';
		question_title[7] = '故事中，倖免於難的矮人下了什麼詛咒?';
		question_title[8] = '舉行「矮靈祭」的目的是什麼？';
		question_title[9] = '「矮靈祭」的祭典順序為何?甲：舞蹈和吟唱祭歌乙：由主祭者送別矮靈丙：聚集祭場，到祭屋內向長老告解';
		question_title[10] = '「矮靈祭」的精神類似哪種活動?';
		question_title[11] = '以下描述何者正確?';
		question_title[12] = '矮靈祭使用的物品都有其功用，請寫出下面兩項物品各自代表的意義。';
		question_title[13] = '請寫出賽夏族人一度想「封庄」的兩個理由?';
		question_title[14] = '賽夏族人舉辦「矮靈祭」期間，應該以何種心態參加?';
		question_title[15] = '讀完本文，請各指出一項尊重與不尊重不同族群傳統活動的行為。';
		question_title[16] = '你覺得本篇報導的作者贊成「封庄」嗎？';
		question_title[17] = '布農族頭目為什麼要派勇士出發找太陽?';
		question_title[18] = '故事中，被射傷眼睛的太陽提出了哪個要求才願意變成月亮?';
		question_title[19] = '布農族為了感謝月亮所舉辦的祭典，接近以下哪一個類型?';
		question_title[20] = '請根據矮靈祭的由來與布農族射日英雄兩個網頁完成下列表格：';
		question_title[21] = '你有多喜歡「原住民文化」這個專題任務?';
		function add_question(num){
			var title = question_title[num];
			var html = '<div class="question_block"><div class="question_title">'+title+'</div><div class="question_anwser">'+anwser+'</div></div>';
			$(".question").append(html);
		}
		
		var sec = 0;
		var timer_is_start = false;
		function pad ( val ) { return val > 9 ? val : "0" + val; }
		function timer_start(){
			if(!timer_is_start){
				setInterval( function(){
					$("#seconds").html(pad(++sec%60));
					$("#minutes").html(pad(parseInt(sec/60,10)));
				}, 1000);
				timer_is_start = true;
			}			
		}
		
	</script>
</html>
