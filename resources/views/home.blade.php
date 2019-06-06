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
		body{
			font-family: Microsoft JhengHei;
		}
		.container{
			width:100%;
			height:100%;
			background: -webkit-linear-gradient(#FFF5CF,#FFE38F);
			background: -o-linear-gradient(#FFF5CF,#FFE38F);
			background: -moz-linear-gradient(#FFF5CF,#FFE38F);
			background: linear-gradient(#FFF5CF,#FFE38F);
		}
		.left_side{
			width:65px;
			float:left;
			text-align: center;
			margin-left: 75px;
			margin-right: 25px;
		}
		.timer{
			width:65px;
			height:65px;
			background: -webkit-linear-gradient(#FFDB3C,#E69745);
			background: -o-linear-gradient(#FFDB3C,#E69745);
			background: -moz-linear-gradient(#FFDB3C,#E69745);
			background: linear-gradient(#FFDB3C,#E69745);
			font-size:14px;
			color: #323232;
			letter-spacing:1.3px;
			display:  flex;
			align-items: center;
			justify-content:  center;
			margin-bottom:15px;
		}
		.question_no div{
			width:45px;
			height:25px;
			margin: auto;
			line-height:25px;
		}
		.question_no_default{
			background-color: #FDFDFD;
			border: 1px #DBDBDB;
			font-size:12px;
			color: #323232;
			border-style: solid;
		}
		.question_no_now{
			background-color:#FFC36A;
			border: 1px #DBDBDB;
			font-size:12px;
			color: #323232;
			border-style: solid;
		}
		
		.main_view{
			width:860px;
			height:720px;
			float:left;
			text-align: center;
			background-color:#FFC36A;
			box-shadow:0 2px 10px 0 rgba(175, 115, 0, 0.5);
			margin-right: 25px;
		}
		
		.main_view_header{
			width:830px;
			height:65px;
			margin: auto;
			margin-top: 15px;
			margin-bottom: 15px;
			background-color:#FFF5CF;
			color: #323232;
			font-size: 20px;
			letter-spacing:1.8px;
		}
		
		.main_view_header p{
			color: #323232;
			font-size: 20px;
			letter-spacing:1.8px;
		}
		
		.tab_active{
			background-color:#FFE8A1!important;
			display: inline-block;
		}
		
		.main_view_tab{
			height:25px;
			width:830px;
			margin: auto;
			margin-left: 15px;
		}
		.main_view_tab div{
			line-height:25px;
			height:25px;
			float: left;
			padding-left: 20px;
			padding-right: 20px;
			background-color:#FFF5D4;
			font-size:14px;
			color: #323232;
			letter-spacing:1.3px;
			border: solid 1px #FFFFFF;
		}
		
		.main_view_content{
			width:830px;
			height:585px;
			overflow-y: scroll;
			margin: auto;
			background-color:white;
			//align-items: center;
			//justify-content: center;
			//display: flex;
		}
		
		#main_1{
			position: relative;
			top:50%;
			transform:translateY(-50%);
		}
		
		#main_2{
			position: relative;
			top:50%;
			transform:translateY(-50%);
		}
		
		#main_4 img{
			width:810px;
			height:585px;
		}
		
		#main_5 img{
			width:810px;
			height:585px;
		}
		
		.main_view_content_start{
			width:440px;
			height:180px;
			margin: auto;
			background-color: #ffffff;
			border: solid 4px #ffc36a;
			border-radius: 20px;
			box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.26);
		}
		
		.main_view_content_start p{
			margin-top:20px;
			color: #1E1E1E;
			font-size: 20px;
			letter-spacing: 1.8px;
			line-height: 1.4;
		}
		
		.main_view_content_start_button{
			width:150px;
			height:30px;
			background-color: #FFC36A;
			border-radius: 5px;
			box-shadow: 0 2px 0 0 #8b572a;
			color: #323232;
			font-size: 18px;
			letter-spacing: 1.5px;
			margin-top: 20px;
		}
		
		.main_view_content_search img{
			width:180px;
			height:74px;
		}
		
		.main_view_content_search p{
			font-size:16px;
			color: #323232;
			letter-spacing:1.5px;
		}
		
		.main_view_content_search_bar{
			width:400px;
			height:45px;
			display: inline-block;
			background-color:#FFFFFF;
			border-radius: 31px;
			border: solid 1px #e4e4e4;
		}
		
		.main_view_content_search_bar img{
			width:20px;
			height:20px;
			float: right;
			margin-right: 20px;
			margin-top: 12px;
		}
		
		.main_view_content_search_btn{
			width:160px;
			height:30px;
			background-color: #f3f3f3;
			border-radius: 15px;
			font-size:14px;
			color: #323232;
			letter-spacing:1.3px;
			margin: auto;
			line-height: 30px;
			margin-top: 20px;
		}
		
		#main_3 .main_3_1{
			margin:30px 30px 30px 20px;
		}
		
		#main_3 .main_3_1 > img{
			width:100px;
			height:42px;
			float: left;
			margin-right:10px;
		}
		
		.main_3_1_search_bar{
			width:650px;
			height:45px;
			display: inline-block;
			background-color:#FFFFFF;
			border-radius: 31px;
			border: solid 1px #e4e4e4;
		}
		
		.main_3_1_search_bar img{
			width:20px;
			height:20px;
			float: right;
			margin-right: 25px;
			margin-top: 12px;
		}
		
		.main_3_2{
			text-align: left;
			margin-left: 130px;
			margin-right: 30px;
		}
		
		.main_3_2_block{
			margin-top: 20px;
		}
		
		.main_3_2_title{
			font-family: MicrosoftJhengHeiBold;
			font-size: 16px;
			letter-spacing:1.5px;
			line-height: 1.4;
			color: -webkit-link;
			cursor: pointer;
			text-decoration: underline;
		}
		
		.main_3_2_description{
			font-size: 16px;
			letter-spacing:1.5px;
			line-height: 1.4;
		}
		
		#main_6{
			width:810px;
			height:640px;
			background-color: #735555;
		}
		
		.main_6_header img{
			width:810px;
			height:130px;
		}
		
		.main_6_tab{
			height:30px;
			margin:20px 40px 20px 40px;
			display: flex;
		}
		
		.main_6_tab div{
			padding:3px 30px 0px 30px;
			background-color: #c7826f;
			border-radius: 12px;
			box-shadow: 0 4px 0 0 #753c00;
			margin-left:5px;
		}
		
		.main_6_tab_active{
			background-color: #ac4e35!important;
		}
		
		.main_6_content{
			text-align: left;
			margin:20px 40px 30px 40px;
			color:white;
		}
		
		.main_6_content_title{
			font-family: MicrosoftJhengHeiBold;
			font-size: 18px;
			letter-spacing:1.5px;
			line-height: 1.4;
		}
		
		.main_6_content_content{
			font-family:MicrosoftJhengHeiBold;
			font-size: 16px;
			letter-spacing:1.5px;
			line-height: 1.4;
		}
		
		.main_6_content_special{
			color:#F8E71C;
			text-decoration:underline;
		}
		
		hr.style-one {
			border: 0;
			height: 1px;
			background: #333;
			//background-image: linear-gradient(to right, #ccc, #333, #ccc);
			margin: 15px;
		}
		
		.question{
			width:320px;
			height:720px;
			float:left;
			margin: auto;
			//text-align: center;
			background-color:#FFC36A;
			box-shadow:0 2px 10px 0 rgba(175, 115, 0, 0.5);
		}
		
		.question_header{
			width:290px;
			height:105px;
			margin:auto;
			margin-top: 15px;
		}
		.question_header img{
			width: 100%;
		}
		
		.question_content{
			width:290px;
			height:585px;
			margin:auto;
			overflow-y: scroll;
			background-color:white;
		}
		
		.question_content_none{
			background-color:#F0F0F0;
		}
		
		.question_each_content{
			margin:15px;
			display: flex;
		}
		.question_each_title{
			font-size:14px;
			color: #323232;
			letter-spacing:1.3px;
			line-height:1.4;
			margin:15px;
		}
		.question_each_content_img{
			float: left;
			margin-right: 15px;
		}
		
		.question_each_content_img img{
			width:60px;
			height:70px;
		}
		.question_each_content_text{
			width:165px;
			float: left;
		}
		.question_each_content_text_position{
			font-family: MicrosoftJhengHeiBold;
			font-size:16px;
			color: #8B572A;
			margin-bottom: 5px;
		}
		.question_each_content_text_descrition{
			font-size:14px;
			color: #323232;
			letter-spacing:1.3px;
			line-height:1.4;
		}
		.question_each_content_text_order{
			font-family:MicrosoftJhengHeiBold;
			font-size:14px;
			color: #1E52FF;
			letter-spacing:1.3px;
			line-height:1.4;
		}
		.question_each_content_text_link{
			font-family:MicrosoftJhengHeiBold;
			color: #2373F5;
			text-decoration:underline;
		}
		.answer_choose{
			margin-bottom:5px
		}
		.save_btn{
			width:80px;
			height:30px;
			font-size:14px;
			color: #323232;
			border-radius: 5px;
			background-color: #ffad33;
			text-align: center;
			line-height: 30px;
			float:right;
		}
		.save_btn:hover{
			background-color:#EC8D00;
		}
        </style>
    </head>
    <body>
		<div id="app" class="container">
			<div class="left_side">
				<div class="timer">
					<div>Time
					</br>
						<label id="minutes">00</label>:<label id="seconds">00</label>
					</div>
				</div>
				<div class="question_no">
					<div class="question_no_default question_no_now">1</div>
					<div class="question_no_default">2</div>
					<div class="question_no_default">3</div>
					<div class="question_no_default">4</div>
					<div class="question_no_default">5</div>
					<div class="question_no_default">6</div>
					<div class="question_no_default">7</div>
					<div class="question_no_default">8</div>
					<div class="question_no_default">9</div>
					<div class="question_no_default">10</div>
					<div class="question_no_default">11</div>
					<div class="question_no_default">12</div>
					<div class="question_no_default">13</div>
					<div class="question_no_default">14</div>
					<div class="question_no_default">15</div>
					<div class="question_no_default">16</div>
					<div class="question_no_default">17</div>
					<div class="question_no_default">18</div>
					<div class="question_no_default">19</div>
					<div class="question_no_default">20</div>
					<div class="question_no_default">21</div>
				</div>
			</div>
			<div class="main_view">
				<div class="main_view_header">
					1111111111111111
				</div>
				<div class="main_view_tab">
					<div id="tab_1" class="tab_active">數位閱讀學習平台</div>
					<div id="tab_2"  hidden>原住民委員會</div>
					<div id="tab_3" hidden>原著民委員會</div>
				</div>
				<div class="main_view_content">
					<div id="main_1" class="main_view_content_start" hidden>
						<p>歡迎來到<br>【數位閱讀學習平台】</p>
						<button class="main_view_content_start_button" onclick="timer_start()">開始</button>
					</div>
					<div id="main_2" class="main_view_content_search" hidden>
						<img src="/images/PIRLS_logo.png">
						<p>數位學習搜尋器</p>
						<div class="main_view_content_search_bar"><img src="/images/icon-search.png" onclick="main_change(3);"></div>
						<div class="main_view_content_search_btn"><span>數位閱讀學習平台</span></div>
					</div>
					<div id="main_3" hidden>
						<div class="main_3_1">
							<img src="/images/PIRLS_logo.png">
							<div class="main_3_1_search_bar"><img src="/images/icon-search.png"></div>
						</div>
						<div class="main_3_2">
							<div class="main_3_2_block">
								<div class="main_3_2_title" href="#">
									花蓮原住民文創商城 - inmall.com.tw
								</div>
								<div class="main_3_2_description">
									www.inmall.com.tw/‎<br>
									齊全的花蓮原住民文創商品 送禮 收藏 特價優惠，不要錯過
								</div>
							</div>
							<div class="main_3_2_block">
								<div class="main_3_2_title">
									原住民部落 - 九族文化村連結日月潭，歡樂無限大大大
								</div>
								<div class="main_3_2_description">
									https://www.nine.com.tw/m/html/introduction/02.aspx<br>
									原住民表演. 文化廣場. 讓火神迎接早上第一批遊客，為歡樂的一天拉開序幕，暢遊九族一整天之後，離去前，不要忘記再看一場精彩的歡送會。 娜魯灣劇場. 娜魯灣劇場 …
								</div>
							</div>
							<div class="main_3_2_block">
								<div class="main_3_2_title">
									原住民族委員會全球資訊網原住民族16族簡介
								</div>
								<div class="main_3_2_description">
									https://www.apc.gov.tw/portal/cateInfo.html?CID=8F19B...<br>
									阿美族 · 泰雅族 · 排灣族 · 布農族 · 卑南族 · 魯凱族 · 鄒族 · 賽夏族 · 雅美族(達悟族) · 邵族 · 噶瑪蘭族 · 太魯閣族 · 撒奇萊雅族 · 賽德克族 · 拉阿魯哇族 · 卡那卡那富族…
								</div>
							</div>
							<div class="main_3_2_block">
								<div class="main_3_2_title">
									原住民文化－捨棄、傳承與借鑒- 中時電子報
								</div>
								<div class="main_3_2_description">
									https://www.chinatimes.com/newspapers/20171004000747...<br>
									2017年10月4日 - 拋開專業思維和固有教育的束縛，我重新認識了原住民們對於發揚本民族文化的執著與熱情，重新認識了原住民們優美的歷史與文化。與原住民部落 ...
								</div>
							</div>
						</div>
					</div>
					<div id="main_4" hidden>
						<img src="/images/web-1.png">
					</div>
					<div id="main_5" hidden>
						<img src="/images/web-2.png">
					</div>
					<!-- 賽夏族 -->
					<div id="main_6">
						<div class="main_6_header">
							<img src="/images/Say-Siyat-banner.png">
						</div>
						<div class="main_6_tab">
								<div class="main_6_tab_active">矮靈祭由來</div>
								<div>矮靈祭儀式</div>
								<div>祭典中的器物</div>
								<div>矮靈祭新聞報導</div>
							</div>
						<div id="main_6_1" class="main_6_content" hidden>
							<div class="main_6_content_title">
								矮靈祭的由來
							</div>
							<br>
							<div class="main_6_content_content">　　很久以前上坪溪上游住著一群身軀只有三尺長的矮人，他們身材短小，但臂力驚人、擅長巫術，精於農耕，而且還將農耕技巧傳授給賽夏族人；因此每年稻栗成熟時，賽夏族人會邀請矮人們共同慶祝穀物豐收。<br><br>
　　矮人們認為長期協助賽夏族人改善農耕技術，漸漸自大起來，甚至常到部落欺負婦女，讓賽夏族人忍無可忍，但又不敢正面報復，於是開始密謀消滅矮人。<br><br>
　　賽夏族青年想到，每次豐年慶結束後，矮人們都會爬上兩族交界懸崖上的大樹休息，因此，他們決定暗中將那棵大樹底部切去大半，塗上泥巴偽裝。果然，那年的豐年慶後，矮人們喝完酒上了大樹休息。承受不了矮人重量的大樹就開始傾斜、倒塌！砰！樹上的矮人們一一掉進深潭中淹死了。<br><br>
　　其中有兩位矮人沒爬上樹，倖免於死，沿河逃命時，邊撕山棕葉子邊詛咒：「撕破這一片，山豬吃掉你們的農作物。再撕這一片，麻雀啄食你們的農作物。你們如果不按期舉行矮人祭，農作物會欠收，族群會滅亡！」不久後，賽夏族開始瘟疫流行，農作物欠收，認為是矮靈的報復，從此開始舉行矮靈祭，祭悼被害死的矮靈。 
							</div>
						</div>
						<div id="main_6_2" class="main_6_content">
							<div class="main_6_content_title">
								矮靈祭儀式
							</div>
							<br>
							<div class="main_6_content_content">　　矮靈祭每隔2年舉行小祭，每10年舉行大祭，傳統是在農作物收成後的月圓前後舉行(約農曆十月中旬)。祭典時間長達一個多月，按照儀式階段可略分為祭典前、祭典中與祭典後三階段。<br><br>
● 祭典前： 決定祭典時間、準備避邪用的<span class="main_6_content_special">芒草結</span>等工作，賽夏族人依例聚在祭場，到祭屋內向長老告解後，在祭場切分豬肉，並供各姓氏家族代表領回。<br><br>
● 祭典中： 遵守禁忌及祭祀流程。
迎 靈：族人在清晨近6點時集中在祭場中央圍成環狀緩慢舞蹈、持續低聲吟唱祭歌，迎請矮靈。<br>
會 靈：入夜後進行會靈儀式，由族人配戴舞帽與臀鈴進行會靈舞到天明。會靈舞期間長老會對族人說話，提醒族人注重傳統文化以及祭典注意事項。<br>
娛 靈： 在迎靈與會靈後隔天進行娛靈，可供外人參觀，舉行歌舞與傳統歌謠的吟唱。<br>
逐 靈： 逐靈就是請回矮靈，儀式過程同樣以歌舞的形式進行，請回矮靈後將場地中的泥土、支架填平，恢復原狀。<br>
送 靈： 到野外處後送別矮靈。<br>
● 祭典後： 祭典活動圓滿與犒賞慶功。 
							</div>
						</div>
						<div id="main_6_3" class="main_6_content" hidden>
							<div class="/images/main_6_content_title">
								祭典中的器物
							</div>
							<br>
							<div class="main_6_content_content">
							<img src="/images/Say-Siyat-img-2.png">臀鈴<br>
賽夏族特有的樂器，由竹管與薏仁米製作而成，在矮靈祭期間，每一姓氏派人背著臀鈴繞祭場舞蹈，悲傷的聲音呈現了矮靈祭複雜的心情。臀鈴為一種特殊的樂器，背在身後，有的呈上窄下寬的四邊形，有的呈橢圓形狀，上頭鑲了鏡片、亮片等裝飾，據說這種特有的神聖樂器，在矮靈祭以外的時間不可背戴，避免觸犯禁忌招犯不乾淨的事物。
<img src="Say-Siyat-img-3.png">肩旗<br>
又稱為舞帽，或是月光旗。賽夏族在矮靈祭中重要的神聖物，作用為辟邪。早期，主要為扛戴在頭上的舞帽。後來因為越做越大，無法戴在頭上，改為扛在肩上，稱之為肩旗。賽夏族人相信肩旗上有矮人一同參與祭典儀式。 
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="question">
				<div class="question_header">
					<img src="/images/Mission-banner.png">
				</div>
				<div class="question_content question_content_none">
					<div id="q_0" class="question_each" hidden>
						<div class="question_each_title">
						</div>
						<div class="question_each_content">
							<div class="question_each_content_img">
								<img src="/images/techer-pic.png">
							</div>
							<div class="question_each_content_text">
								<div class="question_each_content_text_position">老師</div>
								<div class="question_each_content_text_descrition">在臺灣的原住民族已經增加到十多個囉！讓我們一起來探索帶著些許神秘色彩又豐富的原住民文化吧！</div>
							</div>
						</div>
						<hr class="style-one" />
					</div>
					<div id="q_1" class="question_each" hidden>
						<div class="question_each_title">
							1. 看左側的Google搜尋結果
						</div>
						<div class="question_each_content">
							<div class="question_each_content_img">
								<img src="/images/student-pic.png">
							</div>
							<div class="question_each_content_text">
								<div class="question_each_content_text_position">學生</div>
								<div class="question_each_content_text_order">點選最可以說明16族原住民文化的網頁</div>
							</div>
						</div>
						<hr class="style-one" />
					</div>
					<div id="q_1_1" class="question_each" hidden>
						<div class="question_each_title">
						</div>
						<div class="question_each_content">
							<div class="question_each_content_img">
								<img src="/images/techer-pic.png">
							</div>
							<div class="question_each_content_text">
								<div class="question_each_content_text_position">老師</div>
								<div class="question_each_content_text_descrition">現在，請點選以下連結<span class="question_each_content_text_link">「兒童網」</span>來瞭解原住民的訊息。</div>
							</div>
						</div>
						<hr class="style-one" />
					</div>
					<div id="q_2" class="question_each" hidden>
						<div class="question_each_title">
							2. 與賽德克族相鄰的是哪幾族?
						</div>
						<div class="question_each_content">
							<div class="question_each_content_img">
								<img src="/images/student-pic.png">
							</div>
							<div class="question_each_content_text">
								<div class="question_each_content_text_position">學生</div>
								<div class="question_each_content_text_descrition">
									<div class="answer_choose"><input type="radio" name="answer[2]" value="A">泰雅族</div>
									<div class="answer_choose"><input type="radio" name="answer[2]" value="B">排灣族</div>
									<div class="answer_choose"><input type="radio" name="answer[2]" value="C">賽夏族</div>
									<div class="answer_choose"><input type="radio" name="answer[2]" value="D">卑南族</div>
									<div class="save_btn">儲存</div>
								</div>
							</div>
						</div>
						<hr class="style-one" />
					</div>
				</div>
				
			<!-- Q1 -->
				<!--div id="q1" class="question_block">
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
				</div-->
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
			
			main_change(2);
			question_show(0);
		}
		
		function question_no_change(num){
			$(".question_no div").removeClass('question_no_now');
			num = num -1;
			$(".question_no div:eq("+num+")").addClass('question_no_now');
		}
		
		function main_change(num){
			$(".main_view_content > div").hide();
			$("#main_"+num).show();
		}
		
		function question_show(num){
			$(".question_content").removeClass('question_content_none');
			$("#q_"+num).show();
		}
	</script>
</html>
